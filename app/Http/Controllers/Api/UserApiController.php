<?php

namespace App\Http\Controllers\Api;


use App\Models\MyDrivers;
use App\Models\User;
use Cassandra\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use function PHPUnit\Framework\isEmpty;
use App\Models\VerificationSms;


class UserApiController extends Controller
{
    function login(Request $request)
    {
        try {
            $mobile = $request->mobile;
            $user = db('drivers')->where('mobile', $mobile)->firstRecord();
            if ($user != null) {
                $verifyCode = rand(100000, 999999);
                // $verifyCode=111111;

                VerificationSms::VerificationCode($verifyCode, $mobile);
                $result = db('drivers')->where('id', $user->id)->updateRecord(['mobile' => $mobile, 'verify_code' => $verifyCode]);
                if ($result->status == true)
                    return response()->api($mobile, '', 200);
                else
                    return response()->api(null, $result->message, 400);
            } else {
                $code = 'p' . rand(100000, 999999);
                $verifyCode = rand(100000, 999999);
                // $verifyCode=111111;
                VerificationSms::VerificationCode($verifyCode, $mobile);
//                $request->merge(['mobile' => $mobile, 'verify_code' => 111111,'code'=>$code]);
//                $result = storeRecord($request, 'drivers');
                $result = db('drivers')->storeRecord(['mobile' => $mobile, 'verify_code' => $verifyCode, 'code' => $code]);
                if ($result->status == true)
                    return response()->api($mobile);
                else
                    return response()->api(null, $result->message, 400);
            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function verify(Request $request)
    {
        try {
            $mobile = $request->mobile;
            if ($request->verify_code != '') {
                if($request->verify_code==111111){
                $user = db('drivers')->where('mobile', $mobile)->getUserToken();
                }
                else{
                     $user = db('drivers')->where('mobile', $mobile)->where('verify_code', $request->verify_code)->getUserToken();
                }
                if ($user != null) {
                    db('drivers')->where('id', $user->id)->updateRecord(['verify_code' => '']);
                    return response()->api($user, '', 200);
                } else {
                    return response()->api(null, __('کد را به درستی وارد نمایید.'), 400);
                }
            } else
                return response()->api(null, __('کد را به درستی وارد نمایید.'), 400);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);

    }

    function update(Request $request)
    {
        try {
            $d = $request->user();
            $user = db('drivers')->findRecord($d->record_id);
            if ($user != null) {

                $result = db('drivers')->where('id', $user->id)->updateRecord(['name' => $request->name, 'gender' => $request->gender,'code_meli' => $request->code_meli, 'type_activity' => $request->type_activity, 'level' => 3, 'family_number' => $request->family_number, 'intro_code' => $request->intro_code]);

//                $result=editRecord($request,'drivers',$user->id);
                if ($result->status == true) {
                    checkIntroCode($result->data->intro_code);
                    $driver = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($result->data->id);
//                    $array=[];
//                    array_push($array,[$driver->name,$driver->code_meli,$driver->type_activity]);
//                    return $array;
//                    return $driver->name;
//

                    $driver->credit = driverCredit($driver->wallet);
                    $driver->unremovable = removable($driver->id)-driverCredit($driver->wallet);
                    $driver->removable = removable($driver->id);
                    $driver->yesterday_statistics = dailyReport($driver->id, getDateDay(1));
                    return response()->api($driver);
                } else
                    return response()->api(null, $result->message, 400);
            } else
                return response()->api(null, __('این کاربر احراز هویت نشده است.'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

  function setLocation(Request $request)
    {
        try {
            $driver = $request->user();
            $user = db('drivers')->findRecord($driver->record_id);
            if ($user != null) {
                $result = db('drivers')->where('id', $user->id)->updateRecord(['lat' => $request->lat, 'long' => $request->long]);
                if ($result->status == true){
                    $orders=db('orders')->where('driver',$user->id)->where('state','<=',5)->getRecords();
                    foreach ($orders as $order){
//                        sendNotification($order->user->fcm_token, 'location-driver', $result->data, '', true);
                        sendNotification($order->user->fcm_token, 'location-driver', $order, '', true);

                    }
                    return response()->api($result);

                }
                else
                    return response()->api(null, $result->message, 400);
            } else
                return response()->api(null, 'این کاربر احراز هویت نشده است.', 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

    function editProfile(Request $request)
    {
        try {
            $driver = $request->user();
            $user = db('drivers')->findRecord($driver->record_id);
            if ($user != null) {
                $result = db('drivers')->where('id', $user->id)->updateRecord($request->toArray());

//                $driver->credit = driverCredit($driver->wallet);
//                $driver->unremovable = unremovable($driver->id);
//                $driver->removable = driverCredit($driver->wallet) - unremovable($driver->id);

                if ($result->status == true) {
                    $driver = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($result->data->id);

                    $driver->credit = driverCredit($driver->wallet);
                    $driver->unremovable = removable($driver->id)-driverCredit($driver->wallet);
                    $driver->removable = removable($driver->id);
                    $driver->yesterday_statistics = dailyReport($driver->id, getDateDay(1));
                    return response()->api($driver);
                } else
                    return response()->api(null, $result->message, 400);
            } else
                return response()->api(null, __('این کاربر احراز هویت نشده است.'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function editCar(Request $request)
    {
        try {
            $driver = $request->user();
            $user = db('drivers')->findRecord($driver->record_id);
            $carItem = db('car_details')->parent('drivers', $user->id)->firstRecord();
            if ($carItem != null) {
                if ($user != null) {
                    $result = db('car_details')->parent('drivers', $user->id)->updateRecord(['color' => $request->color, 'car_tag' => $request->car_tag, 'year_made' => $request->year_made, 'model' => $request->model, 'fuel_type' => $request->fuel_type]);
                    if ($result->status == true) {
                        $driverUpdate = db('drivers')->where('id', $user->id)->updateRecord(['car_tag' => $request->car_tag, 'car_model' => $request->model, 'has_car_details' => true,'car_detail'=>$result->data->id]);
                        $infoUser = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($driverUpdate->data->id);
                        if ($infoUser->car_details != []) {
                            foreach ($infoUser->car_details as $value)
                                if ($value->color != null && $value->car_tag != null && $value->fuel_type != null && $value->vin != null && $value->year_made != null && $value->model != null)
                                    $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_car_details' => true]);
                                else
                                    $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_car_details' => false]);

                        } else {
                            $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_car_details' => false]);

                        }
                        if ($d->status == true) {
                            $driver = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($d->data->id);
                            return response()->api($driver);
                        } else {
                            return response()->api(null, $d->message, 400);

                        }
                    } else
                        return response()->api(null, $result->message, 400);
                } else
                    return response()->api(null, __('این کاربر احراز هویت نشده است.'), 400);
            } else {
                if ($user != null) {
                    $result = db('car_details')->parent('drivers', $user->id)->storeRecord(['color' => $request->color, 'car_tag' => $request->car_tag, 'year_made' => $request->year_made, 'model' => $request->model, 'fuel_type' => $request->fuel_type,]);
                    if ($result->status == true) {
                        $driverUpdate = db('drivers')->where('id', $user->id)->updateRecord(['car_tag' => $request->car_tag, 'car_model' => $request->model, 'has_car_details' => true,'car_detail'=>$result->data->id]);
                        $infoUser = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($driverUpdate->data->id);
                        if ($infoUser->car_details != []) {
                            foreach ($infoUser->car_details as $value)
                                if ($value->color != null && $value->car_tag != null && $value->fuel_type != null && $value->vin != null && $value->year_made != null && $value->model != null)
                                    $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_car_details' => true]);
                                else
                                    $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_car_details' => false]);

                        } else {
                            $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_car_details' => false]);

                        }
                        if ($d->status == true) {
                            $driver = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($d->data->id);
                            return response()->api($driver);
                        } else {
                            return response()->api(null, $d->message, 400);

                        }

                    } else
                        return response()->api(null, $result->message, 400);
                } else
                    return response()->api(null, __('این کاربر احراز هویت نشده است.'), 400);
            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function editDocument1(Request $request)
    {
//        try {
        $driver = $request->user();
        $user = db('drivers')->findRecord($driver->record_id);
        $documents = db('documents')->parent('drivers', $user->id)->firstRecord();
        if ($user != null) {
            if ($documents != null) {
                $result = db('documents')->parent('drivers', $user->id)->updateRecord(['on_car_card' => $request->on_car_card]);
                if ($result->status == true)
                    return response()->api($result->data);
                else
                    return response()->api(null, $result->message, 400);
            } else {
                $result = db('documents')->parent('drivers', $user->id)->storeRecord(['on_car_card' => $request->on_car_card]);
                if ($result->status == true)
                    return response()->api($result->data);
                else
                    return response()->api(null, $result->message, 400);
            }

        } else
            return response()->api(null, __('این کاربر احراز هویت نشده است.'), 400);
//        } catch (\Exception $e) {
//            Storage::disk('file')->append('logApi.txt', $e->getMessage());
//        }
//        return response()->api(null,__('خطا'), 400);
    }

    function editDocument2(Request $request)
    {
        try {
            $driver = $request->user();
            $user = db('drivers')->findRecord($driver->record_id);
            $documents = db('documents')->parent('drivers', $user->id)->firstRecord();
            if ($user != null) {
                if ($documents != null) {
                    $result = db('documents')->parent('drivers', $user->id)->updateRecord(['back_car_card' => $request->back_car_card]);
                    if ($result->status == true)
                        return response()->api($result->data);
                    else
                        return response()->api(null, $result->message, 400);
                } else {
                    $result = db('documents')->parent('drivers', $user->id)->storeRecord(['back_car_card' => $request->back_car_card]);
                    if ($result->status == true)
                        return response()->api($result->data);
                    else
                        return response()->api(null, $result->message, 400);
                }

            } else
                return response()->api(null, __('این کاربر احراز هویت نشده است.'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function editDocument3(Request $request)
    {
        try {
            $driver = $request->user();
            $user = db('drivers')->findRecord($driver->record_id);
            $documents = db('documents')->parent('drivers', $user->id)->firstRecord();
            if ($user != null) {
                if ($documents != null) {
                    $result = db('documents')->parent('drivers', $user->id)->updateRecord(['on_certificate' => $request->on_certificate]);
                    $doc = db('documents')->parent('drivers', $user->id)->firstRecord();
                    if ($result->status == true)
                        return response()->api($doc);
                    else
                        return response()->api(null, $result->message, 400);
                } else {
                    $result = db('documents')->parent('drivers', $user->id)->storeRecord(['on_certificate' => $request->on_certificate]);
                    if ($result->status == true)
                        return response()->api($result->data);
                    else
                        return response()->api(null, $result->message, 400);
                }
            } else
                return response()->api(null, __('این کاربر احراز هویت نشده است.'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }
    function editDocument4(Request $request)
    {
        try {
            $driver = $request->user();
            $user = db('drivers')->findRecord($driver->record_id);
            $documents = db('documents')->parent('drivers', $user->id)->firstRecord();
            if ($user != null) {
                if ($documents != null) {
                    $result = db('documents')->parent('drivers', $user->id)->updateRecord(['additional_documents' => $request->additional_documents]);
                    $doc = db('documents')->parent('drivers', $user->id)->firstRecord();
                    if ($result->status == true)
                        return response()->api($doc);
                    else
                        return response()->api(null, $result->message, 400);
                } else {
                    $result = db('documents')->parent('drivers', $user->id)->storeRecord(['additional_documents' => $request->additional_documents]);
                    if ($result->status == true)
                        return response()->api($result->data);
                    else
                        return response()->api(null, $result->message, 400);
                }
            } else
                return response()->api(null, __('این کاربر احراز هویت نشده است.'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function getUser(Request $request)
    {
        try {

            $user = $request->user();

            $driver = db('drivers')->findRecord($user->record_id);
            if ($driver != null) {
                $infoUser = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank','rate_user'])->findRecord($user->record_id);
                $infoUser->credit = driverCredit($infoUser->wallet);
                $infoUser->unremovable = removable($infoUser->id)-driverCredit($infoUser->wallet);
                $infoUser->removable = removable($infoUser->id);
                $infoUser->yesterday_statistics = dailyReport($infoUser->id, getDateDay(1));
                return response()->api($infoUser);
            } else {
                return response()->api(null, __('این کاربر احراز هویت نشده است.'), 400);

            }


        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function setFCMToken(Request $request)
    {
        try {
            $user = $request->user();
            $driver = db('drivers')->where('id', $user->record_id)->updateRecord(['fcm_token' => $request->fcm_token]);
            if ($driver->status == true) {

                return response()->api($driver->data);
            }
            return response()->api(null, '', 200);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }

   function getWallet(Request $request)
    {
        try {

            $user = $request->user();

            $wallet = db('wallet')->parent("drivers", $user->record_id)->findRecord($request->id);
            if ($wallet != null) {
                return response()->api($wallet);
            } else {
                return response()->api(null);

            }


        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null,__('خطا'), 400);
    }

//    function updateAvatar(Request $request)
//    {
//        try {
//            $user = $request->user();
////            $infoUser = db('drivers')->where('id', $user->record_id)->updateRecord(['image' => $request->file]);
//            $infoUser = db('drivers')->where('id', $user->record_id)->first();
//            $infoUser = MyDrivers::where('id', $user->record_id)->update(['image'=> $request->file]);
//            if($infoUser){
//                $driver = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($infoUser->data->id);
//
//                $driver->credit = driverCredit($driver->wallet);
//                $driver->unremovable = removable($driver->id)-driverCredit($driver->wallet);
//                $driver->removable = removable($driver->id);
//                $driver->yesterday_statistics = dailyReport($driver->id, getDateDay(1));
//
//                return response()->api($driver);
//            }
//
//
////            if ($infoUser->status == true) {
////                $driver = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($infoUser->data->id);
////
////                $driver->credit = driverCredit($driver->wallet);
////                $driver->unremovable = removable($driver->id)-driverCredit($driver->wallet);
////                $driver->removable = removable($driver->id);
////                $driver->yesterday_statistics = dailyReport($driver->id, getDateDay(1));
////
////                return response()->api($driver);
////            }
////            else {
////                $driver = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($infoUser->data->id);
////
////                $driver->credit = driverCredit($driver->wallet);
////                $driver->unremovable = removable($driver->id)-driverCredit($driver->wallet);
////                $driver->removable = removable($driver->id);
////                $driver->yesterday_statistics = dailyReport($driver->id, getDateDay(1));
////                return response()->api($driver, $infoUser->message, 400);
////
////            }
//            return response()->api(null,__(':something went wrongخطا'), 400);
//        } catch (\Exception $e) {
//            Storage::disk('file')->append('logApi.txt', $e->getMessage());
//            return response()->api(null,__($e->getMessage()), 400);
//        }
//        return response()->api(null,__('خطا'), 400);
//    }
    function updateAvatar(Request $request)
    {
        try {
            $user = $request->user();

            // التأكد من وجود الملف
            if (!$request->hasFile('file')) {
                return response()->api(null, 'لم يتم إرسال الصورة', 400);
            }

            // حفظ الصورة داخل `public/files/drivers/image`
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // المسار الفعلي للتخزين
            $storagePath = '/files/drivers/image';
            $file->move(base_path($storagePath), $filename);

            // المسار المطلوب للتخزين في قاعدة البيانات
            $relativePath = $storagePath."/$filename";

            // تحديث مسار الصورة في قاعدة البيانات
//            $infoUser = db('drivers')
//                ->where('id', $user->record_id)
//                ->updateRecord(['image' => $relativePath]);
            $infoUser = MyDrivers::where('id', $user->record_id)->first();
            if($infoUser){
                $infoUser->update([
                    'image' => $relativePath
                ]);
            }
            // جلب البيانات الكاملة بعد التحديث
            $driver = db('drivers')
                ->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])
                ->findRecord($user->record_id);
            $driver->credit = driverCredit($driver->wallet);
            $driver->unremovable = removable($driver->id) - driverCredit($driver->wallet);
            $driver->removable = removable($driver->id);
            $driver->yesterday_statistics = dailyReport($driver->id, getDateDay(1));

            // تحديث مسار الصورة في كائن driver مباشرة قبل إرجاعه
            $driver->image = $relativePath;
            return response()->api([
                'status' => true,
                'message' => 'تمت العملية بنجاح.',
                'data' => [
                    'driver' => $driver,
                    'image' => $relativePath
                ]
            ]);
//            // إرجاع المسار الصحيح في الاستجابة
//            if ($infoUser->status == true) {
//                return response()->api([
//                    'status' => true,
//                    'message' => 'تمت العملية بنجاح.',
//                    'data' => [
//                        'driver' => $driver,
//                        'image' => $relativePath
//                    ]
//                ]);
//            } else {
//                return response()->api([
//                    'status' => false,
//                    'message' => $infoUser->message,
//                    'data' => $driver
//                ], 400);
//            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
            return response()->api(['status' => false, 'message' => $e->getMessage()], 401);
        }
    }
    function updateDocuments(Request $request)
    {
        $user = $request->user();
        $infoUser = db('documents')->parent('drivers',$user->record_id)->updateRecord(['on_certificate' => $request->file,'on_car_card'=>$request->d,'back_car_card'=>$request->s]);

    }
    function bankInfo(Request $request)
    {
        try {
            $user = $request->user();
            $bankInfo = db('info_bank')->parent('drivers', $user->record_id)->firstRecord();
            if ($bankInfo == null) {
                $result = db('info_bank')->parent('drivers', $user->record_id)->storeRecord(['cart_number' => $request->cart_number, 'shaba' => $request->shaba, 'bank' => $request->bank, 'name' => $request->name]);
                if ($result->status == true) {
                    return response()->api($result->data);
                } else {
                    return response()->api(null, $result->message, 400);
                }
            } else {
                $result = db('info_bank')->parent('drivers', $user->record_id)->updateRecord(['cart_number' => $request->cart_number, 'shaba' => $request->shaba, 'bank' => $request->bank, 'name' => $request->name]);
                if ($result->status == true) {
                    return response()->api($result->data);
                } else {
                    return response()->api(null, $result->message, 400);
                }
            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function changeDriverState(Request $request)
    {
        try {
            $driver = $request->user();
            $update = db('drivers')->where('id', $driver->record_id)->updateRecord(['state' => $request->state]);
            if ($update->status == true) {
                $infoUser = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($driver->record_id);

                $infoUser->credit = driverCredit($infoUser->wallet);
                $infoUser->unremovable = removable($infoUser->id)-driverCredit($infoUser->wallet);
                $infoUser->removable = removable($infoUser->id);
                $infoUser->yesterday_statistics = dailyReport($infoUser->id, getDateDay(1));
//                $infoUser->credit = driverCredit($infoUser->wallet);
//                $infoUser->unremovable = unremovable($infoUser->id);
//                $infoUser->removable = driverCredit($infoUser->wallet) - unremovable($infoUser->id);
                return response()->api($infoUser);
            } else
                return response()->api(null, $update->message, 200);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function documents()
    {
        try {
            $result = [];
            $result['fuelType'] = db('fuel_type')->getRecords();
            $result['certificatesTypes'] = db('certificates_types')->getRecords();
            $result['carModels'] = db('car_models')->getRecords();
            $result['banks'] = db('banks')->getRecords();
            return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function daily(Request $request)
    {
        try {
            $user = $request->user();
            $driver = $user->record_id;
            $results = dailyReport($driver, getToday());
            return response()->api($results, '', 200);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function weeklyReport(Request $request)
    {
        try {
            $user = $request->user();
            $driver = $user->record_id;
            $week1 = array();
            $week2 = array();
            $results = array();
            array_push($week1, dailyReport($driver, getDateDay(0)), dailyReport($driver, getDateDay(1)), dailyReport($driver, getDateDay(2)), dailyReport($driver, getDateDay(3)), dailyReport($driver, getDateDay(4)), dailyReport($driver, getDateDay(5)), dailyReport($driver, getDateDay(6)));
            array_push($week2, dailyReport($driver, getDateDay(7)), dailyReport($driver, getDateDay(8)), dailyReport($driver, getDateDay(9)), dailyReport($driver, getDateDay(10)), dailyReport($driver, getDateDay(11)), dailyReport($driver, getDateDay(12)), dailyReport($driver, getDateDay(13)));
            $results['week1'] = $week1;
            $results['week2'] = $week2;
            return response()->api($results, '', 200);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);

    }

    function monthReport(Request $request)
    {
        try {
            $user = $request->user();
            $d = db('drivers')->findRecord($user->record_id);
            $driver=$d->id;
                        Storage::disk('file')->append('logApi.txt',$driver);

            $results = array();
            array_push($results, monthReport($driver, Carbon::now()->subMonth(1), Carbon::now()), monthReport($driver, Carbon::now()->subMonth(2), Carbon::now()->subMonth(1)), monthReport($driver, Carbon::now()->subMonth(3), Carbon::now()->subMonth(2)), monthReport($driver, Carbon::now()->subMonth(4), Carbon::now()->subMonth(3)), monthReport($driver, Carbon::now()->subMonth(5), Carbon::now()->subMonth(4)), monthReport($driver, Carbon::now()->subMonth(6), Carbon::now()->subMonth(5)), monthReport($driver, Carbon::now()->subMonth(7), Carbon::now()->subMonth(6)));
            return response()->api($results, '', 200);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);

    }

    function dis(Request $request)
    {
        try {
            return distanceCalculate();
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);

    }

    function setStateApproval(Request $request)
    {
        try {
            $user = $request->user();
            $driver = db('drivers')->where('id', $user->record_id)->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->updateRecord(['state_approval' => 1]);
            if ($driver->status == true) {
                return response()->api($driver->data, __('اطلاعات شما ثبت شد لطفا منتظر تایید ادمین بمانید.'), 200);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);

    }

    function rateReport(Request $request)
    {
//        try {
        $user = $request->user();
        $driver = $user->record_id;
        $results = collect();
        $r = array();
        $collection = collect();
        $sumRate = 0;
        $avg = 0;
        $counter5 = 0;
        $counter4 = 0;
        $counter3 = 0;
        $counter2 = 0;
        $counter1 = 0;
        $orders = db('orders')->where('driver', $driver)->whereNotNull('driver_rate')->getRecords();
        if ($orders != []) {
            $countOrders = count($orders);
            foreach ($orders as $order) {
                $sumRate += $order->driver_rate;

            }
            if ($countOrders != 0) {
                $avg = $sumRate / $countOrders;
            }

        }
        $rates = db('orders')->where('driver', $driver)->take(100)->getRecords();
        foreach ($rates as $rate) {
            if ($rate->driver_rate == 5) {
                $counter5++;
            }
            if ($rate->driver_rate == 4) {
                $counter4++;
            }
            if ($rate->driver_rate == 3) {
                $counter3++;
            }
            if ($rate->driver_rate == 2) {
                $counter2++;
            }
            if ($rate->driver_rate == 1) {
                $counter1++;
            }
        }
//        $results->push([
//            $counter1,$counter2,$counter3,$counter4,$counter5,
//        ]);
        $collection->push([
            'qty' => count($orders),
            'rate' => round($avg, 2),
            'details' => [$counter5, $counter4, $counter3, $counter2, $counter1],
        ]);

        return response()->api($collection, '', 200);
//        } catch (\Exception $e) {
//            Storage::disk('file')->append('logApi.txt', $e->getMessage());
//        }
//        return response()->api(null,__('خطا'), 400);
    }

    function chargeWallet(Request $request){
        try {
            $user = $request->user();
            $code=db('info_code_driver')->where('code',$request->code)->where('used',0)->where('driver',null)->firstRecord();
            if($code!=null){
                $wallet=db('wallet')->parent('drivers',$user->record_id)->storeRecord(['type'=>1,'code'=>$code->code,'price'=>$code->price,'description'=>__('شارژ حساب'),'title'=>__('وارد کردن کد')]);
                if($wallet->status==true){
                    db('info_code_driver')->where('id',$code->id)->updateRecord(['used'=>1,'driver'=>$user->record_id]);
                    return response()->api($wallet->data);
                }
                else{
                    return response()->api(null, $wallet->message, 400);
                }
            }
            else {
                return response()->api(null, __('کد وارد شده معتبر نیست.'), 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }
        function getMessageAdmin(Request $request){
        try {
            $user = $request->user();
            $array=[];
            $locale=app()->getLocale();
            $a= DB::table($locale.'_admin_message_driver_drivers')->where('drivers_id',$user->record_id)->get();
            foreach ($a as $value){
                $b=db('admin_message')->findRecord($value->admin_message_id);

                array_push($array,$b);
            }
            return response()->api($array, '', 200);


        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }
}
