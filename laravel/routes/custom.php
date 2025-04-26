<?php

use App\Models\User;
use App\Models\UserRole;
use App\Models\VerificationSms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\OrderController;
use App\Models\Admin;
use Illuminate\Support\Str;

Route::get('order/cancel/{id}', function ($id) {
    try {
        $currentAdmin = Auth::guard('admin')->user();
        $order=db('orders')->where('id',$id)->updateRecord(['state'=>7,'cancel_status'=>'تم الإلغاء','canceled_by'=>'('.$currentAdmin->username.'المسؤول (']);
        $state=db('status')->parent('orders',$id)->storeRecord(['status'=>7]);
        if($state->status==true && $order->status==true){
            $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
            getDetailOrder($orderItem);
            sendNotification($orderItem->user->notif_token, 'cancel_order', $orderItem, 'تم إلغاء الرحلة من قبل المسؤول.', true, 1, 1);
            if($orderItem->driver!=null){
                sendNotification($orderItem->driver->notif_token, 'cancel_order_item', $orderItem, 'تم إلغاء الرحلة من قبل المسؤول.', true, 1, 1);

            }else{
                sendNotification($orderItem->delivery_id->token, 'cancel_order', $orderItem, 'success', true, 0, 0);

            }
            if ($orderItem->agency != null) {
                $agency = $orderItem->agency->notif_token;
                sendNotification($agency, 'cancel_order', $orderItem, 'success', true);
            }
        }
        return back();
    } catch (\Exception $e) {
        Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
    }
    return abort(404);
})->name('cancel_order');
Route::get('/app/driver', function () {
    return response()->file(public_path() . '/driver.apk', [
        'Content-Type' => 'application/vnd.android.package-archive',
        'Content-Disposition' => 'attachment; filename="okay-driver.apk"',
    ]);
});
Route::get('/app/peyk', function () {
    return response()->file(public_path() . '/peyk.apk', [
        'Content-Type' => 'application/vnd.android.package-archive',
        'Content-Disposition' => 'attachment; filename="okay.apk"',
    ]);
});

Route::get("/searchAddress", function () {
    return searchAddress("خرسندی");
});
Route::get("/map", function () {
    return view('theme.map');
});
Route::get("/getdriver", function () {
    return db('users')->findRecord(1);
});
Route::get("/handle_optimization_rch/{name}", function ($name) {
    $rch = db('optimization_rch')->where('title', $name)->firstRecord();
    dispatch(new \App\Jobs\RCHJob($rch, 0));
    return "ok";
});
Route::get("/handle_optimization_hru/{name}", function ($name) {
    $hru = db('optimization_hru')->where('title', $name)->firstRecord();
    dispatch(new \App\Jobs\HRUJob($hru, 0));
    return "ok";
});


Route::get('/call/{user_info}/{admin_info}', function ($user_info, $admin_info) {
    foreach (db('prefixes')->getRecords() as $prefixes) {
        $user_info = Str::replaceFirst($prefixes->number, '', $user_info);
    }


    while (substr($user_info, 0, 1) == '0') {
        $user_info = substr($user_info, 1, strlen($user_info));
    }
    $user = db('users')->where('mobile', 'like', '%' . $user_info . '%')->firstRecord();
    $driver = db('drivers')->where('mobile', 'like', '%' . $user_info . '%')->firstRecord();

    $admins = Admin::where('number', 'like', '%' . $admin_info . '%')->get();
    foreach ($admins as $admin) {
        $token = $admin->notif_token;
        $model = $driver == null ? $user : $driver;
        $data = [
            'user_id' => $user != null ? $user->id : 0,
            'provider_id' => $driver != null ? $driver->id : 0,
            'user_avatar' => $model != null ? $model->image : '',
            'user_mobile' => $user_info,
            'user_name' => $model != null ? $model->name : '',];


        sendNotification($token, 'callAdmin', $data);


    }

    return response()->api($data);
});
Route::get('/test', function () {
    $drivers=db('drivers')->where('status_driver', 1)->where('type_activity',7)->getRecords();
    return $drivers;

//    VerificationSms::VerificationCode(123456,'09900733439');
});




