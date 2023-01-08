<?php

namespace App\Http\Controllers\Admin\Confirmation;
use App\Dto\Admin\AdminPanelTableDTO;
use App\Http\Controllers\Controller;
use App\Models\Admin\RepairConfirmation;
use App\Services\Admin\AdminService;
use App\Services\Admin\ConfirmationService;

class RepairsConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(){
        $result=(new AdminPanelTableDTO(  RepairConfirmation::paginate(9,['id','offer_id']),
            get_class_methods(ConfirmationService::class)))->data;
        return Response()->json($result,200);
    }

    /**
     * Display the specified resource.
     * @param RepairConfirmation $RepairConfirmation
     * @return Response
     */
    public function show(RepairConfirmation $RepairConfirmation){
        return Response()->json($RepairConfirmation->getOffer(),200);
    }

    /**
     * Confirm offer
     * @param RepairConfirmation $RepairConfirmation
     */
    public function confirm(RepairConfirmation $RepairConfirmation){
        (new ConfirmationService())->confirm($RepairConfirmation);
    }

    /**
     * Reject offer
     * @param RepairConfirmation $RepairConfirmation
     */
    public function reject(RepairConfirmation $RepairConfirmation){
        (new ConfirmationService())->reject($RepairConfirmation);
    }
}
