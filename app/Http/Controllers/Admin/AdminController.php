<?php

namespace App\Http\Controllers\admin;
use App\Dto\Admin\AdminPanelTableDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Models\User;
use App\Services\Admin\AdminService;
use App\Services\Admin\AdminUsersService;
use App\Services\Admin\UsersListService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;


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
     * @return void
     */
    public function userList(){
        $data=(new AdminPanelTableDTO(
            User::where("accountRole","!=","admin")
                ->where("accountType","!=","baned")
                ->paginate(9,['id','name','accountRole']),
            get_class_methods(UsersListService::class)
        ))->data;
        return Response()->json($data,"200");
    }

    /**
     * @return JsonResponse
     */
    public function banedUserList(){

        $data=(new AdminPanelTableDTO(
            $data=User::where("accountRole","!=","admin")
                ->where("accountType","=","baned")
                ->paginate(9,['id','name','accountRole']),
            get_class_methods(UsersListService::class)
        ))->data;
        return Response()->json($data,"200");

    }
    public function deleteUser(User $User){
        try{
            (new UsersListService())->deleteUser($User);
        }catch (\Exception $exception){
            return Response()->json($exception->getMessage(),'500');
        }finally{
            return Response()->json("OK",'200');
        }
    }
    /**
     * @return JsonResponse
     */
    public function adminList(){
        $data=(new AdminPanelTableDTO(
            $data=User::where("accountRole","=","admin")
                ->paginate(9,['id','name','accountRole']),
            get_class_methods(AdminUsersService::class)
        ))->data;
        return Response()->json($data,"200");
    }

    /**
     * @return JsonResponse
     */
    public function dashBoard(){

        return Response()->json((new AdminService())->dashBoard()->DashBoardData,'200');
    }

    /**
     * @param User $User
     * @return JsonResponse
     */
    public function banUser(User $User){

        try{
            (new UsersListService())->banUser($User);
        }catch (\Exception $exception){
            return Response()->json($exception->getMessage(),'500');
        }finally{
            return Response()->json("ok",'200');
        }
    }

    /**
     * @param User $User
     * @return JsonResponse
     */
    public function unBanUser(User $User){
        try{
            (new UsersListService())->unBanUser($User);
        }catch (\Exception $exception){
            return Response()->json($exception->getMessage(),'500');
        }finally{
            return Response()->json("ok",'200');
        }
    }
    /**
     * @param CreateAdminRequest $request
     * @return JsonResponse
     */
    public function createAdmin(CreateAdminRequest $request){
        $data=$request->validated();
        try{
            (new AdminService())->createAdmin($data);
        }catch (\Exception $exception){
            return Response()->json($exception->getMessage(),'500');
        }finally{
            return Response()->json("ok",'201');
        }

    }
    public function deleteAdmin(User $User){
        try{
            (new AdminService())->deleteAdmin($User);
        }catch (\Exception $exception){
            return Response()->json($exception->getMessage(),'500');
        }finally{
            return Response()->json("OK",'200');
        }
    }


}
