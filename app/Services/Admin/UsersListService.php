<?php

namespace App\Services\Admin;

use App\Models\User;

class UsersListService{

    public function banUser(User $User){
        if(!$User){
            throw new \Exception('USER DONT EXIST');
        }
        if($User->isAdmin()){
            throw new \Exception('CANT BAN ADMIN USER');
        }
        if($User->isBaned()){
            throw new \Exception('USER ALREADY BANED');
        }
        $User->ban();
    }

    public function unBanUser(User $User){
        if(!$User){
            throw new \Exception('USER DONT EXIST');
        }
        if($User->isAdmin()){
            throw new \Exception('CANT BAN ADMIN USER');
        }
        if(!$User->isBaned()){
            throw new \Exception('USER ALREADY UN-BANED');
        }
        $User->unBan();
    }
    public function deleteUser(User $User){
        if(!$User){
            throw new \Exception('USER DONT EXIST');
        }
        if($User->isAdmin()){
            throw new \Exception('CANT DELETE ADMIN USER');
        }
        if(!$User->isBaned()){
            throw new \Exception('USER IS UN-BANED');
        }
        $User->delete();
    }


    public function show(){
        /**
         * declaration for show btn in table,
         *  implementation in controller
         */
    }
}
