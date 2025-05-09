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


// Improved webhook route with better error handling and debugging
Route::any('/simple-webhook', function() {
    $projectPath = base_path();
    $logDir = $projectPath . '/storage/logs';
    $logFile = $logDir . '/webhook.log';

    // Create logs directory if it doesn't exist
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }

    // Make sure log file is writable
    if (!is_writable($logDir)) {
        chmod($logDir, 0755);
    }

    // Log webhook receipt
    $logMessage = date('Y-m-d H:i:s') . " - Webhook received\n";
    file_put_contents($logFile, $logMessage, FILE_APPEND);

    // Debug information
    $debug = [
        'user' => shell_exec('whoami'),
        'pwd' => shell_exec('pwd'),
        'git_version' => shell_exec('git --version'),
        'permissions' => shell_exec('ls -la ' . $projectPath)
    ];

    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Debug info: " . print_r($debug, true) . "\n", FILE_APPEND);

    // Try a different approach that might work better with permission issues:
    // 1. Fetch changes
    // 2. Try a reset (which sometimes works better than pull with permissions)
    // 3. If that fails, just show what changes would be made

    // First, fetch the changes
    $fetchCommand = 'git config --global --add safe.directory'. $projectPath. ' && cd '. $projectPath . ' && git pull 2>&1';
    $fetchOutput = shell_exec($fetchCommand);
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Fetch output: " . ($fetchOutput ?? 'No output') . "\n", FILE_APPEND);

    // Then try a soft reset - this approach sometimes works better with permission issues
    // $resetCommand = 'cd ' . $projectPath . ' && git reset --mixed origin/main 2>&1';
    // $resetOutput = shell_exec($resetCommand);
    // file_put_contents($logFile, date('Y-m-d H:i:s') . " - Reset output: " . ($resetOutput ?? 'No output') . "\n", FILE_APPEND);

    // Get information about what changed
    $logCommand = 'cd ' . $projectPath . ' && git status 2>&1';
    $logOutput = shell_exec($logCommand);
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Status output: " . ($logOutput ?? 'No output') . "\n", FILE_APPEND);

    // Clear cache
    $cacheCommand = 'cd ' . $projectPath . ' && php artisan optimize:clear 2>&1';
    $cacheOutput = shell_exec($cacheCommand);
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Cache clear output: " . ($cacheOutput ?? 'No output') . "\n", FILE_APPEND);

    // Combine all outputs
    $output = "Fetch: " . ($fetchOutput ?? 'Success') . "\n";
    // $output .= "Reset: " . ($resetOutput ?? 'Success') . "\n";
    $output .= "Status: " . ($logOutput ?? 'Unknown') . "\n";
    $output .= "Cache: " . ($cacheOutput ?? 'Success') . "\n";

    if ($output === null) {
        $errorMessage = "Command execution failed or returned no output\n";
        file_put_contents($logFile, date('Y-m-d H:i:s') . " - ERROR: " . $errorMessage, FILE_APPEND);

        // Try using a direct git command instead
        file_put_contents($logFile, date('Y-m-d H:i:s') . " - Trying alternative execution method\n", FILE_APPEND);

        // Check if sudo access is available for this user (unlikely but worth trying)
        $sudoTestOutput = shell_exec('sudo -n echo test 2>&1');
        $hasSudo = !str_contains($sudoTestOutput ?? '', 'password');

        if ($hasSudo) {
            // Try with sudo if available
            $altOutput = shell_exec('sudo git -C ' . $projectPath . ' pull 2>&1');
            file_put_contents($logFile, date('Y-m-d H:i:s') . " - Sudo output: " . ($altOutput ?? 'null') . "\n", FILE_APPEND);
        } else {
            // Just try to get status (read-only operation) to check repo access
            $altOutput = shell_exec('cd ' . $projectPath . ' && git status 2>&1');
            file_put_contents($logFile, date('Y-m-d H:i:s') . " - Git status output: " . ($altOutput ?? 'null') . "\n", FILE_APPEND);

            // Create a message that explains how to fix the permissions
            $fixCommand = "sudo chown -R www:www " . $projectPath . "/.git";
            file_put_contents($logFile, date('Y-m-d H:i:s') . " - To fix permissions, run: " . $fixCommand . "\n", FILE_APPEND);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Git command failed. The www user does not have permission to update the Git repository.',
            'solution'=> 'Run this command on your server: sudo chown -R www:www ' . $projectPath . '/.git',
            'debug' => $debug
                    ])->withHeaders([
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => 'Sun, 02 Jan 1990 00:00:00 GMT'
        ]);
    }

    // Log the result
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Command output: " . $output . "\n\n", FILE_APPEND);

    // Check if there were permission errors
    $hasPermissionErrors = (strpos($output, 'Permission denied') !== false);

    // Standard success response
    $response = [
        'status' => $hasPermissionErrors ? 'partial' : 'completed',
        'output' => $output,
        'debug' => $debug
    ];

    // Add notice if there were permission errors
    if ($hasPermissionErrors) {
        // Special handling for .user.ini files which often can't be modified
        if (strpos($output, '.user.ini') !== false) {
            $response['notice'] = 'Some files cannot be updated due to hosting restrictions.';
            $response['solution'] = 'Run these commands on your server to fix permissions while skipping protected files:
            sudo find ' . $projectPath . ' -not -path "*/\.*" -exec chown www:www {} \;
            sudo find ' . $projectPath . ' -path "*/\.git*" -exec chown www:www {} \;';
        } else {
            $response['notice'] = 'File permission errors detected.';
            $response['solution'] = 'Run this command on your server to fix: sudo chown -R www:www ' . $projectPath;
        }

        // Log this event
        file_put_contents($logFile, date('Y-m-d H:i:s') . " - PERMISSION ERRORS DETECTED. Check the solution in the response.\n", FILE_APPEND);
    }

    return response()->json($response)->withHeaders([
        'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
        'Pragma' => 'no-cache',
        'Expires' => 'Sun, 02 Jan 1990 00:00:00 GMT'
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
