<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderApi\UserApiController;
use App\Http\Controllers\ProviderApi\MainApiController;
use App\Http\Controllers\ProviderApi\PaymentController;
use App\Http\Controllers\ProviderApi\AddressApiController;
use App\Http\Controllers\ProviderApi\OrderApiController;
use App\Http\Controllers\ProviderApi\AgencyApiController;

//user
Route::post('user/login', [UserApiController::class, "login"]);
Route::post('user/verify', [UserApiController::class, "verify"]);


//main
Route::get('/getSlider', [MainApiController::class, "getSlider"]);
Route::get('/getSliders', [MainApiController::class, "getSliders"]);
Route::get('/getServices', [MainApiController::class, "getServices"]);
Route::get('/getQuestions', [MainApiController::class, "getQuestions"]);
Route::get('/getInfoSupport', [MainApiController::class, "getInfoSupport"]);
Route::post('/getInfoServices', [MainApiController::class, "getServicesInfo"]);
Route::get('/getInfoProduct', [MainApiController::class, "infoProduct"]);
Route::get('/getItemsCancel', [MainApiController::class, "getCancelItem"]);


//address
Route::post('/address/find', [AddressApiController::class, "getAddress"]);
Route::post('/search/address', [AddressApiController::class, "findAddress"]);


//order
Route::post('/order/orderDetails', [OrderApiController::class, "myOrdersDetailsMotor"]);
Route::post('/order/orderDetailTruck', [OrderApiController::class, "DetailsTruck"]);

Route::get('order/all', [OrderApiController::class, "order"]);

//agency
Route::post('/getAgencies', [AgencyApiController::class, "getAgencies"]);
Route::post('/search/agency', [AgencyApiController::class, "search"]);

Route::get('/get/time/{origin}/{destinations}', [AddressApiController::class, "time"]);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('user/update', [UserApiController::class, "update"]);
    Route::post('user/setToken', [UserApiController::class, "setFCMToken"]);

    Route::get('user/getUser', [UserApiController::class, "getUser"]);
    Route::get('user/getWallet', [UserApiController::class, "getWallet"]);
    Route::post('user/getItemWallet', [UserApiController::class, "getItemWallet"]);
    Route::post('user/addWallet', [PaymentController::class, "addWallet"]);
    Route::post('user/update/avatar', [UserApiController::class, "updateAvatar"]);
    Route::get('user/getFavorite', [UserApiController::class, "getFavoritePlaces"]);
    Route::post('user/addFavorite', [UserApiController::class, "addFavoritePlaces"]);
    Route::post('user/deleteFavorite', [UserApiController::class, "deleteFavoritePlaces"]);
    Route::post('user/editFavorite', [UserApiController::class, "editFavorite"]);
    Route::post('user/addPlace', [UserApiController::class, "addRepetitivePlace"]);
    Route::post('user/deletePlace', [UserApiController::class, "deleteRepetitivePlace"]);
    Route::post('user/chargeWallet', [UserApiController::class, "chargeWallet"]);
    Route::post('user/getRate', [UserApiController::class, "getItemRate"]);

    //order
    Route::post('order/get', [OrderApiController::class, "getOrder"]);

    Route::post('order/store', [OrderApiController::class, "store"]);
    Route::post('order/storeMain', [OrderApiController::class, "storeMain"]);
    Route::post('getMyOrder', [OrderApiController::class, "getMyOrder"]);
    Route::post('order/storeTruck', [OrderApiController::class, "storeTruck"]);
    Route::post('order/myOrders', [OrderApiController::class, "myOrders"]);
    Route::post('order/update', [OrderApiController::class, "updateOrder"]);
    Route::post('order/update/option', [OrderApiController::class, "updateOrderOption"]);
    Route::post('order/update/destination', [OrderApiController::class, "changeDestination"]);
    Route::post('order/cancel', [OrderApiController::class, "cancelOrderRegister"]);
    Route::post('order/cancelRequest', [OrderApiController::class, "cancelOrderRequest"]);
    Route::post('order/setRate', [OrderApiController::class, "setRate"]);
    Route::get('order/progressOrder', [OrderApiController::class, "progressOrder"]);

    Route::post('order/hurry', [OrderApiController::class, "hurry"]);
    Route::post('order/gift', [OrderApiController::class, "giftTest"]);
    Route::post('gift', [OrderApiController::class, "checkGiftBeforStore"]);
    Route::post('set/gift', [OrderApiController::class, "setGiftCode"]);
    Route::post('order/checkGiftCode', [OrderApiController::class, "checkGift"]);

    Route::post('order/getMessages', [OrderApiController::class, "getMesssages"]);
    Route::post('order/getMessage', [OrderApiController::class, "getMesssage"]);
    Route::post('order/sendMessage', [OrderApiController::class, "sendMesssage"]);

});