<?php

namespace App\Http\Controllers\Admin\Confirmation;

use App\Dto\Admin\AdminPanelTableDTO;
use App\Http\Controllers\Controller;
use App\Models\Admin\OfferConfirmation;
use App\Services\Admin\AdminService;
use App\Services\Admin\ConfirmationService;
use Illuminate\Http\Response;

//todo pagination
class OfferConfirmationController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(){
        $result=(new AdminPanelTableDTO(  OfferConfirmation::paginate(9,['id','offer_id']),
            get_class_methods(ConfirmationService::class)))->data;
        return Response()->json($result,200);
    }

    /**
     * Display the specified resource.
     * @param OfferConfirmation $OfferConfirmation
     * @return Response
     */
    public function show(OfferConfirmation $OfferConfirmation){
        return Response()->json($OfferConfirmation->getOffer(),200);
    }

    /**
     * Confirm offer
     * @param OfferConfirmation $OfferConfirmation
     */
    public function confirm(OfferConfirmation $OfferConfirmation){
        (new ConfirmationService())->confirm($OfferConfirmation);
    }

    /**
     * Reject offer
     * @param OfferConfirmation $OfferConfirmation
     */
    public function reject(OfferConfirmation $OfferConfirmation){
        (new ConfirmationService())->reject($OfferConfirmation);
    }
}
