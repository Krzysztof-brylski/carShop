<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\Confirmation\ExtendedAccountConfirmationController;
use App\Http\Controllers\Admin\Confirmation\ReportsConfirmationController;
use App\Http\Controllers\Admin\Confirmation\OfferConfirmationController;
use App\Http\Controllers\Admin\Confirmation\RepairsConfirmationController;

use App\Http\Controllers\CarOffer\CarEquipmentController;
use App\Http\Controllers\CarOffer\CarInfoController;
use App\Http\Controllers\CarOffer\CarOfferController;

use App\Http\Controllers\fakePaymentsController;
use App\Http\Controllers\paymentController;
use App\Models\Admin\ExtendedUserConfirmation;
use App\Models\Admin\RepairConfirmation;
use App\Models\CarEquipment;
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
Route::get("/carInfo/manufacturer",[CarInfoController::class,'showManufacturers'])->name('carInfo.showManufacturers');
Route::get("/carInfo/model/{CarManufacturer:name}",[CarInfoController::class,'showModels'])->name('carInfo.showModels');
Route::get("/carInfo/version/{CarModel:name}",[CarInfoController::class,'showVersions'])->name('carInfo.showVersions');
Route::get("/carEquipment",[CarEquipmentController::class,'index'])->name("carEquipment.index");
Route::get("/search/{CarManufacturer:name?}/{CarModel:name?}/{CarVersion:name?}",[CarOfferController::class,'search'])->name("Offer.search")->scopeBindings();
Route::get("Offer/{Offer}",[CarOfferController::class,'show'])->name("Offer.show");
Route::post("/pay/update/{Payments:token}",[PaymentController::class,'updatePaymentStatus'])->name("update.payment");
Route::get("Offer",[CarOfferController::class,'index'])->name("Offer.index");
Route::middleware('auth')->group(function (){

    Route::resource('Offer', CarOfferController::class)->except(["show","index","create"]);
    /**admin actions**/
    Route::middleware('user.admin')->group(function (){
        Route::get("/admin",[AdminController::class,'index'])->name("admin.index");
        Route::get("/admin/dashBoard",[AdminController::class,'dashBoard'])->name("admin.dashboard");
        /** user management**/
        Route::get("/admin/usersList",[AdminController::class,'userList'])->name("admin.userList");
        Route::get("/admin/usersList/show/{User}",[AdminController::class,'userList'])->name("admin.userListShow");
        Route::post("/admin/usersList/banUser/{User}",[AdminController::class,'banUser'])->name("admin.banUser");
        Route::post("/admin/baned/usersList/unBanUser/{User}",[AdminController::class,'unBanUser'])->name("admin.unBanUser");
        Route::post("/admin/baned/usersList/deleteUser/{User}",[AdminController::class,'deleteUser'])->name("admin.deleteUser");
        Route::get("/admin/baned/usersList",[AdminController::class,'banedUserList'])->name("admin.banedUserList");
        /** admin user management **/
        Route::get("/admin/adminList",[AdminController::class,'adminList'])->name("admin.adminList");
        Route::post("/admin/adminList/deleteAdmin/{User}",[AdminController::class,'deleteAdmin'])->name("admin.deleteAdmin");
        Route::post("/admin/makeAdmin/",[AdminController::class,'createAdmin'])->name("admin.createAdmin");
        /**offer confirmation**/
        Route::get("/admin/offerConfirmation/",[OfferConfirmationController::class,'index'])->name("admin.offerConfirmation.index");
        Route::get("/admin/offerConfirmation/show/{OfferConfirmation}",[OfferConfirmationController::class,'show'])->name("admin.offerConfirmation.show");
        Route::post("/admin/offerConfirmation/confirm/{OfferConfirmation}",[OfferConfirmationController::class,'confirm'])->name("admin.offerConfirmation.confirm");
        Route::post("/admin/offerConfirmation/reject/{OfferConfirmation}",[OfferConfirmationController::class,'reject'])->name("admin.offerConfirmation.reject");
        /**report confirmation **/
        Route::get("/admin/reportConfirmation/",[ReportsConfirmationController::class,'index'])->name("admin.reportConfirmation.index");
        Route::get("/admin/reportConfirmation/show/{ReportConfirmation}",[ReportsConfirmationController::class,'show'])->name("admin.reportConfirmation.show");
        Route::post("/admin/reportConfirmation/confirm/{ReportConfirmation}",[ReportsConfirmationController::class,'confirm'])->name("admin.reportConfirmation.confirm");
        Route::post("/admin/reportConfirmation/reject/{ReportConfirmation}",[ReportsConfirmationController::class,'reject'])->name("admin.reportConfirmation.reject");
        /**extended user confirmation**/
        Route::get("/admin/extendedUserConfirmation/",[ExtendedAccountConfirmationController::class,'index'])->name("admin.extendedUserConfirmation.index");
        Route::get("/admin/extendedUserConfirmation/show/{ExtendedUserConfirmation}",[ExtendedAccountConfirmationController::class,'show'])->name("admin.extendedUserConfirmation.show");
        Route::post("/admin/extendedUserConfirmation/confirm/{ExtendedUserConfirmation}",[ExtendedAccountConfirmationController::class,'confirm'])->name("admin.extendedUserConfirmation.confirm");
        Route::post("/admin/extendedUserConfirmation/reject/{ExtendedUserConfirmation}",[ExtendedAccountConfirmationController::class,'reject'])->name("admin.extendedUserConfirmation.reject");
        /**repairs confirmation **/
        Route::get("/admin/repairsConfirmation/",[RepairsConfirmationController::class,'index'])->name("admin.repairsConfirmation.index");
        Route::get("/admin/repairsConfirmation/show/{RepairConfirmation}",[RepairsConfirmationController::class,'show'])->name("admin.repairsConfirmation.show");
        Route::post("/admin/repairsConfirmation/confirm/{RepairConfirmation}",[RepairsConfirmationController::class,'confirm'])->name("admin.repairsConfirmation.confirm");
        Route::post("/admin/repairsConfirmation/reject/{RepairConfirmation}",[RepairsConfirmationController::class,'reject'])->name("admin.repairsConfirmation.reject");
        /**carEquipment store**/
        Route::post("/admin/createCarEquipment",[CarEquipmentController::class,'store'])->name("carEquipment.store");
        Route::post("/carEquipment/delete/{CarEquipment}",[CarEquipmentController::class,'delete'])->name("carEquipment.delete");
        /**carInfo store and update**/
        Route::post("/admin/carInfo/storeManufacturer",[CarInfoController::class,'storeManufacturer'])->name("carInfo.storeManufacturer");
        Route::post("/admin/carInfo/storeModel",[CarInfoController::class,'storeModel'])->name("carInfo.storeModel");
        Route::post("/admin/carInfo/storeVersion",[CarInfoController::class,'storeVersion'])->name("carInfo.storeVersion");
    });
    /**extended user actions**/
    Route::middleware('user.extended')->group(function (){

    });
    /**all users actions**/
    Route::get("/myOffers",[\App\Http\Controllers\HomeController::class,'myOffers'])->name("myOffers");
    Route::get("/extendedUserPanel",[\App\Http\Controllers\HomeController::class,'extendedUserPanel'])->name("extendedUserPanel");
    Route::post("Offer/markReserved/{Offer}",[CarOfferController::class,'markReserved'])->name("Offer.reserve");
    Route::post("Offer/markSold/{Offer}",[CarOfferController::class,'markSold'])->name("Offer.sold");

    //totally not fake payments
    Route::middleware("disable.payment")->group(function (){
        Route::get("select/offer",[CarOfferController::class,'select'])->name("offer.select");
        Route::post("/pay/establish",[PaymentController::class,'establishPayment'])->name("establish.payment");
    });
    Route::middleware(['disable.payment','check.offer.token'])->group(function (){
        Route::get("/create/offer/standard",[CarOfferController::class,'createStandard'])->name("create.offer.standard")->middleware();
        Route::get("/create/offer/extended",[CarOfferController::class,'createExtended'])->name("create.offer.extended")->middleware();
    });






});
