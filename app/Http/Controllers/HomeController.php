<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            return redirect(route('admin.index'));
        }
        return view('home');
    }

    public function myOffers(){
        $offers=Offer::where("author.id",'=',Auth::id())->paginate(10,['id','status','type']);

        return view("user/myOffers",
            [
                "offers"=>$offers,
            ]);
    }

    public function extendedUserPanel(){
        if(Auth::user()->isExtended()){
            return view("user/extendedUserPanel");
        }
        return view("user/extendedUserAdd");

    }
    public function payments(){

    }
}
