<?php

namespace App\Http\Controllers\Bills;

use App\Bill;
use App\RingoProduct;
use App\RingoSubProductList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Auth;

class TvController extends BillController
{
    /**
     * validate Tv SmartCard
     */
    public function validateSmartCard($provider)
    {
        $validation = 'required|string|min:8|max:13';
        $this->validate(request(), ['cardNo' => $validation]);
        return $this->tvSmartCardValidation($provider, request()->cardNo);
    }

    /**
     * Topup Tv( Dstv|Gotv|Startime)
     */
    public function store()
    {
        $this->validate(request(), [
            'cardNo' => 'required|string|min:10|max:18',
            'email' => 'required|email',
            'package' => 'required|json',
            'owner' => 'required|string',
            'phone' => 'required|string|min:10|max:13',
        ]);

        $uniqueReference = $this->getUniqueReference();
        $status = $this->processTvTopup($uniqueReference);
        $message = $status ? $this->successResponse : $this->failureResponse;

        return back()->withNotification($this->clientNotify($message, $status));
    }

    /**
     * Proces Tv Topup
     */
    protected function processTvTopup($uniqueReference)
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

            $status = $subProduct ? $this->topup($subProduct, $details, $uniqueReference, 'tv') : false;

            $status ? $this->notify($this->tvTopupNotification($details, $uniqueReference, $this->responseObject)) : false;

            return $status;
        }
    }
}
