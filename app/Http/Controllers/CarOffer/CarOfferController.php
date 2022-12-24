<?php

namespace App\Http\Controllers\CarOffer;

use App\Exceptions\OfferException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\CreateOfferRequest;
use App\Http\Requests\Offer\UpdateOfferRequest;
use App\Models\Offer;
use App\Services\CarOffer\CarOfferService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CarOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response | View
     */
    public function index(Request $request){
        //todo pagination
        $data=Offer::all()->first();
        if($request->wantsJson()){
            return response()->json(array(),200);
        }
        return view('offers/index',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(){
        return view('offers/create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateOfferRequest $request
     * @return Response | Redirect
     */
    public function store(CreateOfferRequest $request){
        //todo custom exception
        //todo request validation
        $data=$request->validated();
        try{
            (new CarOfferService)->store($data);
        }catch (OfferException $exception){
            return Response()->json("error",500);
        }finally{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Offer $Offer
     * @param Request $request
     * @return Response | View
     */
    public function show(Offer $Offer,Request $request){
        if($request->wantsJson()){
            return response()->json($Offer,200);
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
    public function edit(Offer $Offer){
        return view('offers/edit',[
            'Offer'=>$Offer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOfferRequest $request
     * @param Offer $Offer
     * @return void
     */
    public function update(UpdateOfferRequest $request, Offer $Offer){
        //todo custom exception
        //todo request validation
        $data=$request->validated();
        try{
            (new CarOfferService())->update($Offer,$data);
        }catch (OfferException $exception){
            return Response()->json("error",500);
        }finally{
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Offer $Offer
     * @return void
     */
    public function destroy(Offer $Offer){
        //todo custom exception
        try{
            (new CarOfferService())->destroy($Offer);
        }catch (OfferException $exception){
            return Response()->json("error",500);
        }finally{
            return back();
        }
    }
}
