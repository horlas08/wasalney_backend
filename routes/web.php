<?php


use App\Models\Field;
use App\Models\UserAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\FileController;
use App\Http\Controllers\DeployController;
use \App\Http\Controllers\RouteController;
use \App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\AirportServiceTypeController;
use App\Http\Controllers\Admin\AirlineTravelRequestController;


// Only keep the simple-webhook route since that's the one you're using
Route::post('/simple-webhook', function() {
    $projectPath = base_path();

    // Log to a specific file for debugging
    file_put_contents($projectPath . '/storage/logs/webhook.log',
        date('Y-m-d H:i:s') . " - Webhook received\n",
        FILE_APPEND);

    // Run git commands
    $commands = [
        'cd ' . $projectPath,
        'git pull',
        'php artisan optimize:clear',
//        'php artisan config:cache',
//        'php artisan route:cache',
//        'php artisan view:cache'
    ];

    $commandString = implode(' && ', $commands);
    $output = shell_exec($commandString . ' 2>&1');

    // Log the result
    file_put_contents($projectPath . '/storage/logs/webhook.log',
        date('Y-m-d H:i:s') . " - Command output: " . $output . "\n\n",
        FILE_APPEND);

    return response()->json([
        'status' => 'completed',
        'output' => $output
    ]);
})->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

// Keep this test route for checking git status
Route::get('/test-git', function() {
    $projectPath = base_path();
    $output = shell_exec('cd ' . $projectPath . ' && git status 2>&1');

    return response()->json([
        'success' => $output && strpos($output, 'fatal:') === false,
        'output' => $output
    ]);
});

Route::get('/send-notifi', function () {
    //    $data = [
    //        "title" =>'test',
    //        "body" => 'body',
    //    ];
    $data = db('users')->findRecord(62);
    //    $s=[
    //        'id'=>$data->id,
    //        'code'=>$data->code,
    //    ];
    return sendNotification(
        $data->fcm_token,
        'recive_message',
        $data,
        'success',
        true,
        1,
        0
    );
});

Route::get('/sett/carr', function () {
    $drivers = db('drivers')->where('car_detail', null)->getRecords();
    if ($drivers != [])
        foreach ($drivers as $diver) {
            $car = db('car_details')->parent('drivers', $diver->id)->firstRecord();
            if ($car != null) {
                $upDriver = db('drivers')->where('id', $diver->id)->updateRecord(['car_detail' => $car->id]);
                if ($upDriver->status == true) {
                    return 1;
                }
                return 0;
            }
            return $diver->mobile;
        }

    return null;
});
Route::get('/test-setting', function () {

    foreach (\App\Models\Setting::where('logo', 'like', '/files%')->get() as $setting) {

        $setting->logo = \Illuminate\Support\Str::replaceFirst('/files', '', $setting->logo);
        $setting->save();
    }
    return 1;
});


Route::get('/set/car', function () {
    $drivers = db('drivers')->getRecords();
    dd($drivers);
    foreach ($drivers as $driver) {
        $car = db('car_details')->parent('drivers', $driver->id)->firstRecord();
        dd($car);
        if ($car != null) {
            $upDriver = db('drivers')->where('id', $driver->id)->updateRecord(['car_detail' => $car->id]);
            if ($upDriver->status == true) {
                return 1;
            }
            return 0;
        }
    }
    // $car=db('car_details')->parent('drivers',$id)->firstRecord();
    // if($car!=null){
    //     $upDriver=db('drivers')->where('id',$id)->updateRecord(['car_detail'=>$car->id]);
    //     if($upDriver->status == true){
    //         return 1;
    //     }
    //     return 0;
    // }
    return 3;
});


Route::get('/test-stream', function () {

    dd(cache());
    //    return view('admin-panel.test-stream');
});

Route::get('/agency', function () {

    $a = db('agency_admin_services_deliveries')->where('deliveries_id', 6)->get();
    $array = [];
    foreach ($a as $val) {
        $ag = db('agency_admin')->findRecord($val->agency_admin_id);
        array_push($array, $ag);
    }
    return $array;
    //    return view('admin-panel.test-stream');
});



Route::get('/test-editor', function () {

    return view('admin-panel.test-editor');
});



Route::get('/test-chart', function () {

    return view('admin-panel.test-chart');
});





Route::get('/captcha_src/refresh', function () {
    return captcha_src();
});



Route::get('/sitemap', [SettingController::class, 'sitemap'])->name('sitemap');



Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');


Route::post('/user/password', [UserController::class, 'changePassword'])->name('user.password');


Route::post('form/store/{slug}/{parentSlug?}/{parentId?}', [UserController::class, 'store'])->name('form.store')->middleware('user-access:store');

Route::put('form/edit/{slug}/{id}', [UserController::class, 'edit'])->name('form.edit')->middleware('user-access:edit');

Route::delete('form/delete/{slug}/{id}', [UserController::class, 'delete'])->name('form.delete')->middleware('user-access:delete');


Route::get('/pvfiles/{catSlug}/{fieldName}/{fileName}', [FileController::class, "pvFile"])->name('file.pv.web');

Route::get('/resize/{type}/{catSlug}/{fieldName}/{fileName}/{width}/{height?}', [FileController::class, "resize"])->name('file.resize.web');

Route::get('/stream/{type}/{catSlug}/{fieldName}/{fileName}', [FileController::class, "stream"])->name('file.stream.web');

Route::view('/terms-and-conditions', 'theme.terms-and-conditions');
Route::view('/about_us', 'theme.about-us');
Route::view('/complaint', 'theme.complaint');
Route::view('/contact-us', 'theme.contact-us');
Route::view('/privacy-policy', 'theme.privacy-policy');
Route::view('/delete-account', 'theme.delete-account');

Route::view('/', 'theme.home');


// Route::get('/',[RouteController::class,'baseUrl'])->name('baseUrl');

Route::get('/{firstValue}', [RouteController::class, 'firstUrl'])->name('firstUrl');

Route::get('/{firstValue}/{secondValue}', [RouteController::class, 'secondUrl'])->name('secondUrl');

Route::get('/{firstValue}/{secondValue}/{thirdValue}', [RouteController::class, 'thirdUrl'])->name('thirdUrl');
