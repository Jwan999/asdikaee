<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Hdrm147\ZainCash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showApplication(Request $request,Order $order = null)
    {
        $zain = null;
        if($order) {
           $response = ZainCash::decode($request->token,config("zaincash.secret"));
           if($response["orderid"] != $order->id) {
               abort(401);
           }
           $order->payment_status = $response["status"];
           $order->payment_payload = $response;
           $order->save();
           $zain = $response;

        }
        return view("welcome")->with("zain",$zain);
    }


}
