<?php
namespace App\Services\Admin;

use App\Dto\Admin\DashBoardDTO;
use App\Models\Admin\OfferConfirmation;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminService{



    public function dashBoard(){

        return new DashBoardDTO(
            User::where("accountType",'=',"standard")->count(),
            Offer::where("status",'=',"confirmed")->count(),
            Offer::where("status",'=',"confirmed")->count(),
            Offer::where("status",'=',"confirmed")->sum('price'),
            OfferConfirmation::count()
        );
    }
    public function createAdmin($data){
        //todo send verification email
        $admin=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'offersCredit'=>0,
            'accountType' =>'admin',
            'accountRole' =>'standard',
            'password' => Hash::make(date("h-i-s, j-m-y, it is w Day")),
        ]);
        if(!$admin){
            throw new \Exception('error');
        }

    }
    public function deleteAdmin(User $User){
        if(!$User){
            throw new \Exception('USER DONT EXIST');
        }
        if(!$User->isAdmin()){
            throw new \Exception('USER IS NOT ADMIN');
        }
        $User->delete();
    }


}
