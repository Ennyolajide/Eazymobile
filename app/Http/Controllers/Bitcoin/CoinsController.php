<?php
namespace App\Http\Controllers\Bitcoin;

use App\Coin;
use App\CoinTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TransactionController;


class CoinsController extends TransactionController
{

    protected $failureResponse = 'Insuffient balance, Pls fund your account';
    protected $successResponse = 'Coin Purchase successful <br/> <p class="text-center">Pls wait while the coin is been automatically transfered to your wallet</p>';

    protected function initCoinPayment(){
        return new CoinPayment();
    }

    public function index(){

        $coinAPis = new CoinPayment();
        $rates = $coinAPis->rates();

        return view('dashboard/bitcoin/index', compact('rates'));
    }

    public function buy()
    {
        $coinAPis = new CoinPayment();
        $rate = $coinAPis->rates()['sell_rate'];

        return view('dashboard/bitcoin/buy', compact('rate'));
    }

    public function sell()
    {
        $coinAPis = new CoinPayment();
        $rate = $coinAPis->rates()['buy_rate'];

        return view('dashboard/bitcoin/sell', compact('rate'));
    }

    /**
     *  Execute Coin Transaction
     */
    public function purchaseCoin()
    {
        $coinAPis = new CoinPayment();
        $rate = $coinAPis->rates()['sell_rate'];
        $reference = $this->getUniqueReference();
        $enoughBalance = Auth::user()->balance >= (request()->amount * $rate);
        $record = $enoughBalance ? $this->storeCoinPayment(NULL,request()->amount,$rate,3,request()->wallet) : false;
        $status = $record ? $this->debitWallet(request()->amount * $rate) : false;
        $status ? $this->recordTransaction($record, $reference, false, true, false, false, $rate) : false;

        return back()->withNotification($this->clientNotify($status ? $this->successResponse : $this->failureResponse, $status));

    }

    public function getPaymentUrl(){
        $coinAPis = new CoinPayment();
        $rate = $coinAPis->rates()['buy_rate'];
        $type = request()->has('funding') ? 1 : 2;
        $ipn = config('constants.site.url').'/gateways/coinpayment/ipn';
        $coinAPis->Setup(config('constants.coinpayment.key.private'), config('constants.coinpayment.key.public'));
        $object = $coinAPis->CreateTransactionSimple(request()->amount, 'USD', 'BTC', Auth::user()->email, '', $ipn);

        if (isset($object['error'])) {
            $noError = $object['error'] == 'ok';
            $rate = $noError ? $coinAPis->rates()['buy_rate'] : false;
            $reference = $noError ? $object['result']['txn_id'] : false;
            $coinRecord = $noError ? $this->storeCoinPayment($object, request()->amount, $rate, $type) : false;
            $coinRecord ? $this->recordTransaction($coinRecord, $reference, false, false, 'Bitcoin', false) : false;

            return $noError ?
                redirect($object['result']['status_url']) : back()->withNotification($this->clientNotify('Unknown Error', false));
        } else {
            return back()->withNotification($this->clientNotify('Unknown Error', false));
        }
    }

    /**
     * Store Coin Payments
     */
    protected function storeCoinPayment($object, $amount, $rate, $type, $wallet=null){
        $otherType = is_null($wallet) ? 'Bitcoin To Cash' : 'Bitcoin Purchase';
        return CoinTransaction::create([
            'user_id' => Auth::user()->id, 'amount' => $amount, 'rate' => $rate, 'transaction_type' => $type, 'wallet' => $wallet,
            'object' => json_encode($object, true), 'type' => ($type == 1) ? 'Bitcoin Funding' : $otherType, 'class' => 'App\CoinTransaction',
        ]);
    }
}

