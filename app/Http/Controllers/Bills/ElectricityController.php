<?php

namespace App\Http\Controllers\Bills;

use App\Bill;
use App\Charge;
use App\RingoProduct;
use App\RingoSubProductList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ElectricityController extends BillController
{
    protected $invalidResponse = 'Invalid serviceId';
    protected $apiErrorResponse = 'Top failed, Please try again later';
    protected $failureResponse = 'Insuffient balance, Please fund your account';
    protected $successResponse = ' Operation successful Please check Your inbox for your pin(s)';


    /**
     * Validate meter
     */
    public function validateMeter($serviceId)
    {
        $this->validate(
            request(),
            ['serviceId' => 'numeric|min:1', 'meterId' => 'string|min:8']
        );

        return $this->electricityValidation($serviceId, request()->meterId);
    }

    /**
     * Store
     */
    public function store()
    {
        $this->requestValidation();
        $uniqueReference = $this->getUniqueReference();
        $this->charges = Charge::whereService('electricity')->first()->amount;
        $status = $this->processElectricityTopup($uniqueReference);
        $message = $status ? $this->successResponse : $this->failureResponse;

        return back()->withNotification($this->clientNotify($message, $status));
    }

    /**
     * Proces Electricity Topup
     */
    protected function processElectricityTopup($uniqueReference)
    {
        $product = RingoProduct::find(request()->packageId);
        $details['cardNo'] = $product ? request()->cardNo : false;
        $details['type'] = $product ? $product->name . ' Topup' : false;
        $details['amount'] = $product ? request()->amount : false;
        $details['product'] = $product ? ucwords(strtolower($product->name))  : false;
        $this->successResponse = $details['product'] . $this->successResponse;

        if (Auth::user()->balance >= request()->amount) {
            $status = $product ? $this->topup($product, $details, $uniqueReference, 'electricity') : false;
            $status ? $this->notify($this->electricityTopupNotification($details, $uniqueReference, $this->responseObject, $this->charges)) : false;

            return $status;
        }
        return false;
    }

    /**
     * Validation
     */
    protected function requestValidation()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'owner' => 'required|string',
            'phone' => 'required|string|min:10|max:13',
            'cardNo' => 'required|string|min:10|max:18',
            'amount' => ['required', 'numeric', 'min:1000', 'max:50000', function ($attribute, $value, $fail) {
                ($value % 100 == 0) ? false : $fail(':attribute can only be a multiple of 100');
            }],
            'packageId' => ['required', 'numeric', 'min:1', 'max:5', function ($attribute, $value, $fail) {
                in_array($value, RingoProduct::whereService('Electricity')->pluck('id')->toArray()) ? false : $fail('Invalid electricty :attribute');
            }],
        ]);
    }
}
