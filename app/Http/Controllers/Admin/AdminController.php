<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     *
     */
    public function index(){
        return view("admin/adminPage");
    }
    // users list -> admin
    // payment, ?mailing config
    // offers admin -> reports,
    // creating admins
    // confirmations -> offers, carInfo, offers-repairs

}
