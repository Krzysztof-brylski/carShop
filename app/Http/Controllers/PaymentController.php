<?php

namespace App\Http\Controllers;

use App\Events\OfferPaymentStatusUpdateEvent;
use App\Models\Payments;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class paymentController extends Controller
{
    //

    public function establishPayment(Request $request){
        $data=$request->validate([
            'toPay'=>'required|',
            'type'=>'string|required',
            'originUrl'=>'string|required',
        ]);
        //todo make routes
        $token=Http::post('127.0.0.1:8888/',array(
            'originUrl'=>$data['originUrl'],
            'statusUpdateUrl'=>url("/pay/update"),
            'toPay'=>(float)$data['toPay'],
            'clientEmail'=>Auth::user()->email,
        ))->collect('token')->toArray()[0];
        //todo make model
        $payment=Payments::create([
            'userId'=>Auth::id(),
            'toPay'=>(float)$data['toPay'],
            'token'=>$token,
            'paymentFor'=>$data['type'],
        ]);
        return Redirect::away("http://127.0.0.1:8888/payment/$token");
    }

    public function updatePaymentStatus(Payments $Payments,Request $request){
        $data=$request->all();
        if($Payments->status !="inProgress"){
            abort(403);
        }
        $Payments->status=$data['status'];
        $Payments->save();
        event((new OfferPaymentStatusUpdateEvent($Payments->status,$Payments->paymentFor, $Payments->getUser())));
        //event();
        //todo unlock
        return Response()->json("created",201);
    }



}
