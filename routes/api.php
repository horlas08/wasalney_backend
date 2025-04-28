<?php

use App\Http\Controllers\Api\AirportBookingController;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DeployController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/







Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/pvfiles/{catSlug}/{fieldName}/{fileName}', [FileController::class, "pvFile"])->name('file.pv.api');

    // Airport Taxi Service Routes
    Route::get('/airport/service-types', [AirportBookingController::class, 'getServiceTypes']);
    Route::post('/airport/bookings', [AirportBookingController::class, 'store']);
    Route::get('/airport/bookings', [AirportBookingController::class, 'getUserBookings']);
    Route::get('/airport/bookings/{booking}', [AirportBookingController::class, 'getBookingDetails']);
    Route::post('/airport/bookings/{booking}/cancel', [AirportBookingController::class, 'cancel']);
});
Route::get('/unauth', [UserController::class, 'unAuth'])->name('api.unAuth');
Route::post('/deploy', [DeployController::class, 'handle']);
