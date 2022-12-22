<?php

namespace App\Http\Controllers\CarOffer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\CreateOfferRequest;
use App\Http\Requests\Offer\UpdateOfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CarOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response | View
     */
    public function index(Request $request)
    {
        //todo pagination
        $data=Offer::all();
        if($request->wantsJson()){
            return response()->json(array(),200);
        }
        return view('offers/index',[
            'data'=>$data,
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $result=DB::table("car_manufacturer")->where("manufacturer","=","volkswagen")->get()->first();
        dd(key_exists("Golf",$result));

//        return view('offers/create',[
//            'cars'=>DB::table('car_manufacturer')->get()->all(),
//            'equipment'=>DB::table('car_equipment')->get()->first(),
//        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOfferRequest $request
     * @return void
     */
    public function store(CreateOfferRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Offer $Offer
     * @param Request $request
     * @return Response | View
     */
    public function show(Offer $Offer,Request $request)
    {
        if($request->wantsJson()){
            return response()->json(array(),200);
        }
        return view('offers/show',[
            'Offer'=>$Offer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Offer $Offer
     * @return void
     */
    public function edit(Offer $Offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOfferRequest $request
     * @param Offer $Offer
     * @return void
     */
    public function update(UpdateOfferRequest $request, Offer $Offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Offer $Offer
     * @return void
     */
    public function destroy(Offer $Offer)
    {
        $Offer->delete();
        //
    }
}
