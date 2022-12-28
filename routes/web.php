<?php

use App\Http\Controllers\CarOffer\CarEquipmentController;
use App\Http\Controllers\CarOffer\CarInfoController;
use App\Http\Controllers\CarOffer\CarOfferController;


use App\Models\CarManufacturer;
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
Route::get("/carInfo/manufacturer",[CarInfoController::class,'index'])->name('carInfo.index');
Route::get("/carInfo/model/{CarManufacturer:name}",[CarInfoController::class,'show'])->name('carInfo.show');
Route::get("/carInfo/version/{CarModel:name}",[CarInfoController::class,'showVersion'])->name('carInfo.showVersion');
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
    Route::post("/carInfo/storeManufacturer",[CarInfoController::class,'storeManufacturer'])->name("carInfo.storeManufacturer");
    Route::post("/carInfo/storeModel",[CarInfoController::class,'storeModel'])->name("carInfo.storeModel");
    Route::post("/carInfo/storeVersion",[CarInfoController::class,'storeVersion'])->name("carInfo.storeVersion");
    //carEquipment store
    Route::get("/carEquipment",[CarEquipmentController::class,'index'])->name("carEquipment.index");
    Route::post("/carEquipment",[CarEquipmentController::class,'store'])->name("carEquipment.store");
});
