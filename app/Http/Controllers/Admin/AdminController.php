<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Models\Admin\OfferConfirmation;
use App\Models\User;
use App\Services\Admin\AdminService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //todo pagination
    /**
     * @return View
     */
    public function index(){
        return view("admin/adminPanel");
    }

    /**
     * @param OfferConfirmation $OfferConfirmation
     * @return void
     */
    public function userList(OfferConfirmation $OfferConfirmation){

        (new AdminService())->Confirm($OfferConfirmation);
//        $data=User::where("accountRole","!=","admin")
//            ->where("accountType","!=","baned")
//            ->get();
//        return Response()->json($data,"200");
    }

    /**
     * @return JsonResponse
     */
    public function banedUserList(){
        $data=User::where("accountRole","!=","admin")
            ->where("accountType","=","baned")
            ->get();
        return Response()->json($data,"200");
    }
    /**
     * @return JsonResponse
     */
    public function adminList(){
        $data=User::where("accountRole","=","admin")
            ->get();
        return Response()->json($data,"200");
    }

    /**
     * @param CreateAdminRequest $request
     */
    public function createAdmin(CreateAdminRequest $request){

    }





    // users list -> admin
    // payment, ?mailing config
    // offers admin -> reports,
    // creating admins
    // confirmations -> offers, carInfo, offers-repairs

}
