<?php

namespace App\Http\Controllers\CarOffer;

use App\Exceptions\OfferException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\CreateOfferRequest;
use App\Http\Requests\Offer\UpdateOfferRequest;
use App\Http\Requests\Search\SearchRequest;
use App\Http\Requests\Search\SerachRequest;
use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\CarVersion;
use App\Models\Offer;
use App\Models\User;
use App\Services\CarOffer\CarOfferService;
use App\Services\Searching\SearchingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Nette\Utils\Paginator;

class CarOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response | View
     */
    public function index(Request $request){
        $result=Offer::where("type","=","extended")->orderBy("price","desc")->limit(12)
            ->get(['id','status','carInfo','price','details.engineType','details.productionYear','details.mileage','images'])
            ->toArray();
        return response()->json($result,200);
    }

    /**
     * Display a listing of the resources matching filters.
     *
     * @param CarManufacturer $CarManufacturer
     * @param CarModel $CarModel
     * @param CarVersion $CarVersion
     * @param Request $request
     * @return void
     */
    public function search(CarManufacturer $CarManufacturer,CarModel $CarModel,CarVersion $CarVersion,Request $request){
        $data=$request->all();
        $result=(new CarOfferService)->search($CarManufacturer,$CarModel,$CarVersion,$data);
        if($request->wantsJson()){
            return Response()->json($result,200);
        }
        return view("offers/index",["offers"=>$result]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function select(){
        return view('offers/select');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function createStandard(){
        return view('offers/add/createStandard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function createExtended(){
        return view('offers/add/createExtended');
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
        }catch (\Exception $exception){
            return Response()->json($exception->getMessage(),500);
        }finally{
            return Response()->json("ok",201);
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
            'Offer'=>$Offer,
            "User"=>$Offer->getAuthor(),
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
     * @param Offer $Offer
     * @return JsonResponse
     */
    public function markReserved(Offer $Offer){
        try{
            (new CarOfferService())->changeStatus("reserved",$Offer,Auth::id());
        }catch (\Exception $exception) {
            abort(403);
        }finally{
            return back()->with('status','Status oferty zosta?? zmieniony')->with('error',false);
        }

    }

    /**
     * @param Offer $Offer
     * @return JsonResponse
     */
    public function markSold(Offer $Offer){
        try{
            (new CarOfferService())->changeStatus("sold",$Offer,Auth::id());
        }catch (\Exception $exception) {
            abort(403);
        }finally{
            return back()->with('status','Status oferty zosta?? zmieniony')->with('error',false);
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
            return back()->with('status','Wyst??pi?? b????d')->with('error',true);
        }finally{
            return back()->with('status','Oferta zosta??a usuni??ta')->with('error',false);
        }
    }
}
