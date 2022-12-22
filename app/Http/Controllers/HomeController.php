<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
                dd(Http::withHeaders(['X-Api-Key'=>"atRCPecK83QFV89KmdDMmQ==odJKRkFOCd8ErDTF"])
                    ->get("https://api.api-ninjas.com/v1/cars",[
                        "made"=>"adui",
                        "model"=>"a12",
                    ])->json());

        return view('home');
    }
}
