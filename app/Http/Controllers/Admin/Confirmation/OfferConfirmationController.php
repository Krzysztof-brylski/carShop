<?php

namespace App\Http\Controllers;

use App\Models\Admin\OfferConfirmation;
use App\Services\Admin\AdminService;
use Illuminate\Http\Response;

//todo pagination
class OfferConfirmationController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(){
        return Response()->json(OfferConfirmation::all(),200);
    }

    /**
     * Display the specified resource.
     * @param OfferConfirmation $offerConfirmation
     * @return Response
     */
    public function show(OfferConfirmation $offerConfirmation){
        return Response()->json($offerConfirmation->toArray(),200);
    }

    /**
     * Confirm offer
     * @param OfferConfirmation $offerConfirmation
     */
    public function Confirm(OfferConfirmation $offerConfirmation){
        (new AdminService())->Confirm($offerConfirmation);
    }

    /**
     * Reject offer
     * @param OfferConfirmation $offerConfirmation
     */
    public function Reject(OfferConfirmation $offerConfirmation){
        (new AdminService())->Reject($offerConfirmation);
    }
}
