<?php

namespace App\Http\Controllers\Control;

use App\Coins;
use App\Transaction;
use App\CoinTransaction;
use App\AirtimePercentage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BitcoinsController extends ModController
{
    protected $errorResponse = 'Invalid Operation';
    protected $failureResponse = 'Operation Failed';
    protected $successResponse = 'Operation Successful';

    public function show()
    {
        $transactions = Transaction::where('class_type', 'App\CoinTransaction')->orderBy('id', 'desc')->paginate(20);

        return view('control.bitcoins ', compact('transactions'));
    }

    public function settings()
    {
        $coins = Coins::whereStatus(true)->get();

        return view('control.bitcoin', compact('coins'));
    }

    public function editCoinsConfig(Coins $coin)
    {
        //validate request
        $this->validate(request(), [
            'buyRate' => 'required|numeric',
            'sellRate' => 'required|numeric',
        ]);

        $status = $coin->update([
            'buy_rate' => request()->buyRate,
            'sell_rate' => request()->sellRate
        ]);
        $message = $status ? $this->successResponse : $this->failureResponse;

        return back()->withNotification($this->clientNotify($message, $status));
    }

    public function edit(Transaction $trans)
    {
        if (request()->has('completed')) {
            $transactionStatus = ['status' =>  2];
            $status = $trans->class->update($transactionStatus);
            $status ? $trans->update($transactionStatus) : false;
            $status ? $this->notifyUser($trans->user->id, $this->bitcoinPurchaseNotification($trans)) : false;
            $message = $status ? $this->successResponse : $this->failureResponse;
        } else if (request()->has('decline')) {
            $transactionStatus = ['status' =>  0];
            $status = $trans->class->update($transactionStatus);
            $status ? $trans->update($transactionStatus) : false;
            $status ? $this->creditUserWallet($trans->user->id, ($trans->amount * $trans->class->rate) ) : false;
            $status ? $this->notifyUser($trans->user->id, $this->bitcoinPurchaseDeclineNotification($trans)) : false;
            $message = $status ? $this->successResponse : $this->failureResponse;
        } else {
            $status = false;
            $message = $this->errorResponse;
        }

        return back()->withNotification($this->clientNotify($message, $status));
    }


    public function funding(Transaction $trans)
    {
        $creditAmout = $trans->class->amount * $trans->class->rate;
        if (request()->has('completed')) {
            $transactionStatus = ['status' =>  2];
            $trans->class->update($transactionStatus);
            $trans->update(['status' =>  2, 'balance_after' => ($trans->user->balance + $creditAmout)]);
            $status = $this->creditUserWallet($trans->user_id, $creditAmout);
            $status ? $this->notifyUser($trans->user_id, $this->creditNotification($creditAmout, $trans->method)) : false;
            $message = $status ? $this->successResponse : $this->failureResponse;
        } else if (request()->has('decline')) {
            $transactionStatus = ['status' =>  0];
            $status = $trans->class->update($transactionStatus);
            $status ? $trans->update($transactionStatus) : false;
            $message = $status ? $this->successResponse : $this->failureResponse;
        } else {
            $status = false;
            $message = $this->errorResponse;
        }

        return back()->withNotification($this->clientNotify($message, $status));
    }
}
