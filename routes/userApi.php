<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\MainApiController;

//user
Route::post('driver/login', [UserApiController::class, "login"]);
Route::post('driver/verify', [UserApiController::class, "verify"]);

//car
Route::get('get/documents', [UserApiController::class, "documents"]);
Route::get('/terms', [MainApiController::class, "terms"]);
Route::get('/gender', [MainApiController::class, "getGender"]);


//order
Route::post('order/get', [OrderApiController::class, "getOrder"]);
Route::get('dis', [UserApiController::class, "dis"]);


Route::group(['middleware' => 'auth:sanctum'], function () {
    //user
    Route::post('driver/update', [UserApiController::class, "update"]);
    Route::post('driver/setLocation', [UserApiController::class, "setLocation"]);
    Route::post('driver/editProfile', [UserApiController::class, "editProfile"]);
    Route::post('driver/editCar', [UserApiController::class, "editCar"]);
    Route::post('driver/editDoc1', [UserApiController::class, "editDocument1"]);
    Route::post('driver/editDoc2', [UserApiController::class, "editDocument2"]);
    Route::post('driver/editDoc3', [UserApiController::class, "editDocument3"]);
    Route::post('driver/editDoc4', [UserApiController::class, "editDocument4"]);
    Route::get('driver/setState', [UserApiController::class, "setStateApproval"]);
    Route::post('driver/addBank', [UserApiController::class, "bankInfo"]);
    Route::post('driver/chargeWallet', [UserApiController::class, "chargeWallet"]);
    Route::get('driver/messages', [UserApiController::class, "getMessageAdmin"]);

    Route::post('driver/getMessageAdmin', [MainApiController::class, "getMessageAdmin"]);

    Route::post('driver/getWallet', [UserApiController::class, "getWallet"]);
    Route::post('driver/addWallet', [PaymentController::class, "addWallet"]);
    Route::post('driver/accountCheck', [PaymentController::class, "checkAccount"]);

    Route::get('driver/getUser', [UserApiController::class, "getUser"]);
    Route::post('driver/setToken', [UserApiController::class, "setFCMToken"]);
    Route::post('driver/updateAvatar', [UserApiController::class, "updateAvatar"]);
    Route::post('driver/changeState', [UserApiController::class, "changeDriverState"]);
    Route::get('driver/dailyReport', [UserApiController::class, "daily"]);
    Route::get('driver/weeklyReport', [UserApiController::class, "weeklyReport"]);
    Route::get('driver/monthlyReport', [UserApiController::class, "monthReport"]);
    Route::get('driver/rateReport', [UserApiController::class, "rateReport"]);
    //order
        Route::post('order/getAddOrder', [OrderApiController::class, "getAddOrder"]);
    Route::post('order/getMyOrder', [OrderApiController::class, "getMyOrder"]);
    Route::get('order/all', [OrderApiController::class, "allOrders"]);
    Route::post('order/setRate', [OrderApiController::class, "setRate"]);
    Route::get('order/myOrder', [OrderApiController::class, "progressOrder"]);
    Route::get('order/myOrders', [OrderApiController::class, "progressOrders"]);
    Route::get('order/futureOrders', [OrderApiController::class, "futureOrders"]);
    Route::get('order/lastOrders', [OrderApiController::class, "lastOrders"]);
    Route::post('order/status/accept', [OrderApiController::class, "acceptOrder"]);
    Route::post('order/status/arrive', [OrderApiController::class, "arriveState"]);
    Route::post('order/status/receive', [OrderApiController::class, "receiveState"]);
    Route::post('order/status/done', [OrderApiController::class, "DoneState"]);
    Route::post('order/cancel', [OrderApiController::class, "cancelOrder"]);
    Route::post('order/getMessages', [OrderApiController::class, "getMesssages"]);
    Route::post('order/getmessage', [OrderApiController::class, "getMesssage"]);
    Route::post('order/sendMessage', [OrderApiController::class, "sendMesssage"]);



});
