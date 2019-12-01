<?php

namespace App\Http\Controllers\Bills;

use App\RingoProduct;
use App\RingoSubProductList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MiscController extends BillController
{

    protected $apiErrorResponse = 'Top failed, Pls try again later';
    protected $failureResponse = 'Insuffient balance, Pls fund your account';
    protected $successResponse = ' Operation successful Pls check Your inbox for your pin(s)';

    /**
     * Topup Tv( Dstv|Gotv|Startime)
     */
    public function store()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'package' => 'required|json',
            'phone' => 'required|string|min:10|max:13',
        ]);

        $uniqueReference = $this->getUniqueReference();
        $status = $this->processMiscTopup($uniqueReference);
        $message = $status ? $this->successResponse : $this->failureResponse;

        return back()->withNotification($this->clientNotify($message, $status));
    }

    /**
     * Proces Tv Topup
     */
    protected function processMiscTopup($uniqueReference)
    {
        $packageId = json_decode(request()->package, true);

        $packageId = $packageId['id'] ?? $packageId;

        $subProduct = RingoSubProductList::find($packageId);

        $details['email'] = $subProduct ? request()->email : false;

        $details['type'] = $subProduct ? $subProduct->name : false;

        $details['amount'] = $subProduct ? $subProduct->selling_price : false;

        $details['product'] = $subProduct ? ucwords(strtolower($subProduct->product->name))  : false;

        $this->successResponse = $details['product'] . $this->successResponse;

        if ($subProduct && (Auth::user()->balance >= $subProduct->selling_price)) {

            $status = $subProduct ? $this->topup($subProduct, $details, $uniqueReference, 'misc') : false;

            $status ? $this->notify($this->miscTopupNotification($details, $uniqueReference, $this->responseObject)) : false;

            return $status;
        }
        return false;
    }
}
