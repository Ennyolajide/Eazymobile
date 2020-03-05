<?php

namespace App\Http\Controllers;

use App\Bank;
use App\PaymentGateway;
use App\AirtimePercentage;
use App\Http\Controllers\Bitcoin\CurrencyConverterController;

class WalletController extends PaystackController
{
    public function index()
    {

        $banks = Bank::where('user_id', 1)->get();
        $bitcoinRate = $this->rates()['buy_rate'];
        $gateways = PaymentGateway::where('status', true)->get();
        $networks = AirtimePercentage::where('airtime_to_cash_percentage_status', true)->get();

        return view('dashboard.wallet.fund', compact('banks', 'gateways', 'networks','bitcoinRate'));
    }
}
