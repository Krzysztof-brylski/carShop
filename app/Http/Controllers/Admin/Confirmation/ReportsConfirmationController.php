<?php

namespace App\Http\Controllers\Admin\Confirmation;

use App\Dto\Admin\AdminPanelTableDTO;
use App\Http\Controllers\Controller;
use App\Models\Admin\ReportConfirmation;
use App\Services\Admin\AdminService;
use App\Services\Admin\ConfirmationService;


class ReportsConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(){
        $result=(new AdminPanelTableDTO(  ReportConfirmation::paginate(9,['id','user_id']),
            get_class_methods(ConfirmationService::class)))->data;
        return Response()->json($result,200);
    }

    /**
     * Display the specified resource.
     * @param ReportConfirmation $ReportConfirmation
     * @return Response
     */
    public function show(ReportConfirmation $ReportConfirmation){
        return Response()->json($ReportConfirmation->getUser(),200);
    }

    /**
     * Confirm Report
     * @param ReportConfirmation $ReportConfirmation
     */
    public function confirm(ReportConfirmation $ReportConfirmation){
        (new ConfirmationService())->confirm($ReportConfirmation);
    }

    /**
     * Reject Report
     * @param ReportConfirmation $ReportConfirmation
     */
    public function reject(ReportConfirmation $ReportConfirmation){
        (new ConfirmationService())->reject($ReportConfirmation);
    }
}
