<?php


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


});
Route::get('/unauth', [UserController::class, 'unAuth'])->name('api.unAuth');
Route::post('/deploy', [DeployController::class, 'handle']);
Route::get('/deploy', [DeployController::class, 'handle']);
Route::post('/github-webhook', [DeployController::class, 'handleWebhook']);
