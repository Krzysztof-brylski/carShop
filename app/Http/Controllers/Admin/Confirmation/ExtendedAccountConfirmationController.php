<?php

namespace App\Http\Controllers\Admin\Confirmation;

use App\Dto\Admin\AdminPanelTableDTO;
use App\Http\Controllers\Controller;
use App\Models\Admin\ExtendedUserConfirmation;
use App\Models\Admin\RepairConfirmation;
use App\Services\Admin\ConfirmationService;
use Illuminate\Http\Request;

class ExtendedAccountConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(){
        $result=(new AdminPanelTableDTO(  ExtendedUserConfirmation::paginate(9,['id','user_id']),
            get_class_methods(ConfirmationService::class)))->data;
        return Response()->json($result,200);
    }

    /**
     * Display the specified resource.
     * @param ExtendedUserConfirmation $ExtendedUserConfirmation
     * @return Response
     */
    public function show(ExtendedUserConfirmation $ExtendedUserConfirmation){
        return Response()->json($ExtendedUserConfirmation->getOffer(),200);
    }

    /**
     * Confirm offer
     * @param ExtendedUserConfirmation $ExtendedUserConfirmation
     */
    public function confirm(ExtendedUserConfirmation $ExtendedUserConfirmation){
        (new ConfirmationService())->confirm($ExtendedUserConfirmation);
    }

    /**
     * Reject offer
     * @param ExtendedUserConfirmation $ExtendedUserConfirmation
     */
    public function reject(ExtendedUserConfirmation $ExtendedUserConfirmation){
        (new ConfirmationService())->reject($ExtendedUserConfirmation);
    }
}
