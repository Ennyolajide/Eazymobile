<?php

namespace App\Http\Controllers\Bills;

use App\RingoProduct;
use App\RingoSubProductList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InternetController extends BillController
{
    protected $successResponse = ' Topup successful';
    protected $apiErrorResponse = 'Top failed, Please try again later';
    protected $failureResponse = 'Insuffient balance, Please fund your account';

    /**
     * Topup Internet
     */
    public function store()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'package' => 'required|json',
            'phone' => 'required|string|min:10|max:13',
            'cardNo' => 'required|string|min:10|max:18',
        ]);
        /*
        $uniqueReference = $this->getUniqueReference();
        $status = $this->processInternetTopup($uniqueReference);
        $message = $status ? $this->successResponse : $this->failureResponse;
        */

        return back()->withNotification($this->clientNotify('Try again later', false));
    }

    /**
     * Proces Internet Topup
     */
    protected function processInternetTopup($uniqueReference)
    {
        $packageId = json_decode(request()->package, true);

        $packageId = $packageId['id'] ?? $packageId;

        $subProduct = RingoSubProductList::find($packageId);

        $details['cardNo'] = $subProduct ? request()->cardNo : false;

        $details['type'] = $subProduct ? $subProduct->name . ' Topup' : false;

        $details['amount'] = $subProduct ? $subProduct->selling_price : false;

        $details['product'] = $subProduct ? ucwords(strtolower($subProduct->product->name))  : false;

        $this->successResponse = $details['product'] . $this->successResponse;

        if ($subProduct && (Auth::user()->balance >= $subProduct->selling_price)) {

            $status = $subProduct ? $this->topup($subProduct, $details, $uniqueReference, 'internet') : false;

            $status ? $this->notify($this->tvTopupNotification($details, $uniqueReference, $this->responseObject)) : false;

            return $status;
        }
    }
}
