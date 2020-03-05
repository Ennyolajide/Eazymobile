<?php

namespace App\Http\Controllers\Bitcoin;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;


class IpnController extends CoinPayment
{
    protected $ipnSecret;
    protected $merchantId;
    protected $debugEmail;

    /**
     * Error and Die/Halt script execution
     */
    protected function errorAndDie($error)
    {
        if (!empty($this->debugEmail)) {
            $report = 'Error: '.$error."\n\n";
            $report .= "POST Data\n\n";
            foreach (request()->all() as $k => $v) {
                $report .= "|$k| = |$v|\n";
            }
            Log::info('CoinPayments IPN Error => '.$report);
        }
        die('IPN Error: '.$error);
    }


    /**
     * Initilize IPN
     */
    protected function initIpnDetails()
    {
        $this->merchantId = config('constants.coinpayment.merchantId');
        $this->ipnSecret = config('constants.coinpayment.ipnSecret');
        $this->debugEmail = config('constants.coinpayment.debugEmail');
    }



    public function ipn()
    {
        $this->initIpnDetails();

        if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') {
            $this->errorAndDie('IPN Mode is not HMAC');
        }

        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
            $this->errorAndDie('No HMAC signature sent.');
        }

        $request = file_get_contents('php://input');
        if ($request === false || empty($request)) {
            $this->errorAndDie('Error reading POST data');
        }

        if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($this->merchantId)) {
            $this->errorAndDie('No or incorrect Merchant ID passed');
        }

        $hmac = hash_hmac("sha512", $request, trim($this->ipnSecret));
        if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) {
            //if ($hmac != $_SERVER['HTTP_HMAC']) { <-- Use this if you are running a version of PHP below 5.6.0 without the hash_equals function
            $this->errorAndDie('HMAC signature does not match');
        }

        // HMAC Signature verified at this point, load some variables.

        /* $txn_id = request()->txn_id;
        $item_name = request()->item_name;
        $item_number = request()->item_number;
        $amount1 = floatval(request()->amount1);
        $amount2 = floatval(request()->amount2);
        $currency1 = request()->currency1;
        $currency2 = request()->currency2;

        $status_text = request()->status_text; */

        $status = intval(request()->status);

        //depending on the API of your system, you may want to check and see if the transaction ID $txn_id has already been handled before at this point

        //These would normally be loaded from your database, the most common way is to pass the Order ID through the 'custom' POST field.

        $transaction = Transaction::WhereReference(request()->txn_id)->whereStatus(1)->first();

        $transaction ? $this->errorAndDie('Transaction Reference Not Found') : false;

        $orderTotal = (0.5/100 * $transaction->class->amount) + $transaction->class->amount;

        // Check the original currency to make sure the buyer didn't change it.
        request()->currency1 != 'BTC' ? $this->errorAndDie('Original currency mismatch!') : false;

        // Check amount against order total
        floatval(request()->amount1) < $orderTotal ? $this->errorAndDie('Amount is less than order total!') : false;

        if ($status >= 100 || $status == 2) {
            //$codes = new codes();
            // payment is complete or queued for nightly payout, success
            //$emailTemplate = '../emailTemplates/payment-confirmation.php';
            //$codes->activateInvestment($investmentId, $emailTemplatem, 'coinPayment.com');
        } elseif ($status < 0) {
            //payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent
        } else {
            //payment is pending, you can optionally add a note to the order page
        }
        die('IPN OK');
    }


    protected function fundWallet($trans)
    {
        $rate = $this->rates()['buy_rate'];

        $status = $trans->update(['status' => 2]);

        $status = $status ? $trans->class->update(['status' => 2, 'rate' => $rate ]) : false;

        $credited = $status ? $this->creditUserWallet($trans->user_id, ($rate * $trans->amount)) : false;

        $credited ? $this->notifyUser($trans->user_id, $this->coinPaymentNotification($trans)) : false;
    }

    protected function coinPaymentNotification($trans)
    {
        $notification['subject'] = 'Credit Notification';
        $notification['content'] = 'Your wallet has been credited with $' . $this->dollar($trans->amount);
        $notification['content'] .= ' equivalent in Naira '.$this->naira($trans->amount * $trans->class->rate);
        $notification['content'] .= ' using CoinPayment( Bitcoin '.$trans->transaction_type == 1 ? 'Funding' : 'Exchange' .' ) ';

        return $notification;
    }






}




