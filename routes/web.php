<?php

use App\Http\Controllers\CarOffer\CarEquipmentController;
use App\Http\Controllers\CarOffer\CarInfoController;
use App\Http\Controllers\CarOffer\CarOfferController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// cars info
Route::get("/carInfo",[CarInfoController::class,'index'])->name('carInfo.index');
Route::get("/carInfo/{manufacturer}",[CarInfoController::class,'show'])->name('carInfo.show');

Route::middleware('auth')->group(function (){
    Route::resource('Offer', CarOfferController::class);
    /**admin actions**/
    Route::middleware('user.admin')->group(function (){

    });
    /**extended user actions**/
    Route::middleware('user.extended')->group(function (){

    });
    /**normal user actions**/
    Route::middleware('user.standard')->group(function (){

    });
    /**all users actions**/
    //carInfo store and update
    Route::post("/carInfo",[CarInfoController::class,'store'])->name("carInfo.store");
    Route::post("/carInfo/{manufacturer}/update",[CarInfoController::class,'update'])->name("carInfo.edit");
    //carEquipment store
    Route::get("/carEquipment",[CarEquipmentController::class,'index'])->name("carEquipment.index");
    Route::post("/carEquipment",[CarEquipmentController::class,'store'])->name("carEquipment.store");
});
