<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //


    public function waec(){
        return  response()->json([
            "status" => 201,
            "message" => "Operation Successful, Recharge created, Reference : 1479bf50-445a-11ea-9776-db4e68d6d904",
            "reference" => "1479bf50-445a-11ea-9776-db4e68d6d904",
            "code" => "RECHARGE_COMPLETE",
            "paid_amount" => 896.76,
            "paid_currency" => "NGN",
            "topup_amount" => 900,
            "topup_currency" => "NGN",
            "target" => null,
            "product_id" => "BPM-NGCA-ASA",
            "time" => "2020-01-31T18:47:07.128Z",
            "country" => "Nigeria",
            "operator_name" => "WAEC",
            "completed_in" => 942,
            "customer_reference" => null,
            "pin_based" => true,
            "pins" => [
                [
                    "serialNumber" => "WRN192093787",
                    "pin" => "508337325137",
                    "expiresOn" => null
                ]
            ]
        ], 201);
    }

}
