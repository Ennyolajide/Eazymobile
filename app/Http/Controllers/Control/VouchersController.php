<?php

namespace App\Http\Controllers\Control;

use App\Voucher;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class VouchersController extends ModController
{
    protected $errorResponse = 'Invalid Operation';
    protected $failureResponse = 'Operation Failed';
    protected $successResponse = 'Operation Successful';

    public function show()
    {
        $transactions = Transaction::where('class_type', 'App\Voucher')->orderBy('id', 'desc')->paginate(20);

        return view('control.vouchers', compact('transactions'));
    }

    public function voucher(){
        $vouchers = [];
        return view('control.voucher',compact('vouchers'));
    }

    public function generate(){
        $this->validate(request(), [
            'number' => 'required|numeric|min:1|max:20',
            'amount' =>  'required|numeric|min:100|max:100000'
        ]);
        $vouchers = collect($this->generateVouchers(request()->amount,request()->number));

        return view('control.voucher',compact('vouchers'));
    }

    public function generateVouchers($amount,$num=1){
        $array = [];
        for($i=1; $i<=$num; $i++){
            $voucher = Voucher::create([
                'amount'  => $amount,
                'class'   => 'App\Vouchers',
                'voucher' => mt_rand(1010246, 9890100).rand(190101,998961).rand(100,999),
            ]);
            array_push($array, $voucher);
        }
        return $array;
    }

    public function gen(){
        return $this->generateVouchers(10000,10);

    }


}
