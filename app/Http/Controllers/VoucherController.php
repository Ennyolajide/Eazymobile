<?php

namespace App\Http\Controllers;

use App\User;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends TransactionController
{
    protected $successResponse = 'Wallet funding successful';
    protected $failureResponse = 'Voucher has been used by another user or it does not exist.';

    protected function recordAndMarkVoucherAsUsed($voucherRecord)
    {
        $reference = $this->getUniqueReference();
        $updated = $voucherRecord->update(['status' => false, 'class' => 'App\Voucher','user_id' => Auth::user()->id]);

        return $updated ? $this->recordTransaction($voucherRecord, $reference, true, false, 'Voucher', true) : false;
    }


    public function store()
    {
        //validate post data
        $this->validate(request(), ['voucher' => 'required|min:16|max:20']);

        $voucher = Voucher::whereVoucher(request()->voucher)->first();
        //check if the voucher is valid and it has not been used
        if (empty($voucher) || !$voucher->user_id || $voucher->status) {
            //mark Voucher as used to prevent multiple usage
            $marked = $this->recordAndMarkVoucherAsUsed($voucher);
            $status = $marked ? $this->creditWallet($voucher->amount) : false;
            $status ? $this->notify($this->voucherWalletFundingNotification($voucher)) : false;
            $message = $status ? $this->successResponse : $this->failureResponse;

            return back()->withNotification($this->clientNotify($message, $status));
        }else{
            return back()->withNotification($this->clientNotify($this->failureResponse, false));
        }

    }

}
