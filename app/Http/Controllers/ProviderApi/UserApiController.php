<?php

namespace App\Http\Controllers\ProviderApi;

use App\Models\MyUsers;
use App\Models\VerificationSms;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class UserApiController extends Controller
{
    function login(Request $request)
    {
        try {
            $mobile = '0' . $request->mobile;
            $user = db('users')->where('mobile', $mobile)->firstRecord();
            if ($user != null) {
                $verifyCode = rand(100000, 999999);
                // $verifyCode=111111;
                VerificationSms::VerificationCode($verifyCode, $mobile);
                $result = db('users')->where('id', $user->id)->updateRecord(['mobile' => $mobile, 'verify_code' => $verifyCode]);
                if ($result->status == true)
                    return response()->api($mobile);
                else
                    return response()->api(null, $result->message, 400);
            } else {
//                $request->merge(['mobile' => $mobile, 'verify_code' => 111111]);
//                $result = storeRecord($request, 'users');
                $code = 'c' . rand(100000, 999999);
                $verifyCode = rand(100000, 999999);
                // $verifyCode=111111;
                VerificationSms::VerificationCode($verifyCode, $mobile);
//                $request->merge(['mobile' => $mobile, 'verify_code' => 111111,'code'=>$code]);
//                $result = storeRecord($request, 'drivers');
                $result = db('users')->storeRecord(['mobile' => $mobile, 'verify_code' => $verifyCode, 'code' => $code]);
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
            $mobile = '0' . $request->mobile;
            if ($request->verify_code != '') {
                if ($request->verify_code == 111111) {
                    $user = db('users')->where('mobile', $mobile)->getUserToken();
                } else {
                    $user = db('users')->where('mobile', $mobile)->where('verify_code', $request->verify_code)->getUserToken();

                }

                if ($user != null) {
                    db('users')->where('id', $user->id)->updateRecord(['verify_code' => '']);
                    return response()->api($user, '', 200);
                } else {
                    return response()->api(null, __('کد را به درستی وارد نمایید.'), 400);
                }
            } else {
                return response()->api(null, __('کد را به درستی وارد نمایید.'), 400);

            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function update(Request $request)
    {
        try {
            $userr = $request->user();
//            $mobile = $request->mobile;
            $user = db('users')->findRecord($userr->record_id);
            if ($user != null) {
                $result = editRecord($request, 'users', $user->id);
                if ($result->status == true) {
                    checkIntroCode($result->data->intro_code);
                    return response()->api($result->data);
                } else
                    return response()->api(null, $result->message, 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getFavoritePlaces(Request $request)
    {
        try {
            $user = $request->user();
            $favorites = [];
            $favorites['favorites'] = db('favorite_place')->where('user', $user->record_id)->getRecords();
            $favorites['routes'] = db('repetitive_routes')->where('user', $user->record_id)->where('count', '>=', 1)->getRecords();
            return response()->api((object)$favorites);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getWallet(Request $request)
    {
        try {
            $user = $request->user();
            $wallet = db('wallet')->parent('users', $user->record_id)->getRecords();
            return response()->api($wallet);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getItemWallet(Request $request)
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
        return response()->api(null, __('خطا'), 400);
    }

    function getItemRate(Request $request)
    {
        try {
            $user = $request->user();
            $rate =  db('rate_user')->parent("users", $user->record_id)->findRecord($request->id);
            if ($rate != null) {
                return response()->api($rate);
            } else {
                return response()->api(null);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function deleteFavoritePlaces(Request $request)
    {
        try {
            $user = $request->user();
            $place = db('favorite_place')->where('user', $user->record_id)->where('id', $request->id)->deleteRecord();
            if ($place->status == true) {
                return response()->api($place->data);
            } else {
                return response()->api(null, $place->message, 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function editFavorite(Request $request)
    {
        try {
            $user = $request->user();
            if (db('favorite_place')->where('user', $user->record_id)->where('id', '!=', $request->id)->where('title', $request->title)->firstRecord() == null) {
                $place = db('favorite_place')->where('user', $user->record_id)->where('id', $request->id)->updateRecord(['title' => $request->title, 'address' => $request->address]);
                if ($place->status == true) {
                    return response()->api($place->data);
                } else {
                    return response()->api(null, $place->message, 400);
                }
            } else
                return response()->api(null, __('این عنوان از قبل ثبت شده است.'), 400);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function addFavoritePlaces(Request $request)
    {
        try {
            $user = $request->user();
            if (db('favorite_place')->where('user', $user->record_id)->where('title', $request->title)->firstRecord() == null) {
                $request->merge(['user' => $user->record_id, 'lat' => $request->lat, 'long' => $request->long, 'address' => $request->address, 'title' => $request->title]);
                $result = storeRecord($request, 'favorite_place');
                if ($result->status == true)
                    return response()->api($result->data, '', 200);
                else
                    return response()->api(null, $result->message, 400);
            } else
                return response()->api(null, __('این عنوان از قبل ثبت شده است.'), 400);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function addRepetitivePlace(Request $request)
    {
        try {
            $user = $request->user();
            $service_place_repitive = db('service_place_repitive')->findRecord(1);
            $routes = db('repetitive_place')->parent("users", $user->record_id)->storeRecord(['address_origin' => $request->address_origin, 'address_destination' => $request->address_des, 'title_destination' => $request->title_des, 'title_origin' => $request->title_origin, 'lat_destination' => $request->lat_des, 'long_destination' => $request->long_des, 'lat_origin' => $request->lat_origin, 'long_origin' => $request->long_origin, 'delivery' => $service_place_repitive->service->id]);
            if ($routes->status == true) {
                return response()->api($routes->data);
            } else {
                return response()->api(null, $routes->message, 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function deleteRepetitivePlace(Request $request)
    {
        try {
            $user = $request->user();
            $routes = db('repetitive_place')->parent("users", $user->record_id)->where('id', $request->id)->deleteRecord();
//            $route=db('repetitive_place')->parent("users", $user->record_id)->getRecords();
            if ($routes->status == true) {
                return response()->api($routes->data);
            } else {
                return response()->api(null, $routes->message, 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }


    function getUser(Request $request)
    {
        try {
            $user = $request->user();
            $infoUser = db('users')->withRelations(['repetitive_place', 'wallet', 'rate_user'])->findRecord($user->record_id);

            return response()->api($infoUser);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function setFCMToken(Request $request)
    {
        try {
            $user = $request->user();
            $driver = db('users')->where('id', $user->record_id)->updateRecord(['fcm_token' => $request->fcm_token]);
            if ($driver->status == true) {
                return response()->api($driver->data);
            }
            return response()->api(null, $driver->message, 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function updateAvatar(Request $request)
    {
        try {
            $user = $request->user();

//            $infoUser = db('users')->where('id', $user->record_id)->updateRecord(['image' => $request->file]);
            if (!$request->hasFile('file')) {
                return response()->api(null, 'لم يتم إرسال الصورة', 400);
            }
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $storagePath = '/files/users/image';
            $file->move(base_path($storagePath), $filename);
            $relativePath = $storagePath."/$filename";
            $iUser = MyUsers::where('id', $user->record_id)->first();
            if($iUser){
                $iUser->update([
                    'image' => 'users/image/'.$filename
                ]);
            }
//            if ($infoUser->status == true) {
//                $u = db('users')->findRecord($infoUser->data->id);
//                return response()->api($u);
//            } else {
//                return response()->api($infoUser->data, $infoUser->message, 400);
//
//            }
//            $iUser->image = $relativePath;
            return response()->api([
                'status' => true,
                'message' => 'تمت العملية بنجاح.',
                'data' => [
                    'user' => $iUser,
                    'image' => $relativePath
                ]
            ]);
        } catch (\Exception $e) {
            \Log::info('test', [$e->getMessage()]);
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function chargeWallet(Request $request)
    {
        try {
            $user = $request->user();
            $code = db('info_code')->where('code', $request->code)->where('used', 0)->where('user', null)->firstRecord();
            if ($code != null) {
                $wallet = db('wallet')->parent('users', $user->record_id)->storeRecord(['type' => 1, 'price' => $code->price, 'description' => __('شارژ حساب'), 'title' => __('وارد کردن کد')]);
                if ($wallet->status == true) {
                    db('info_code')->where('id', $code->id)->updateRecord(['used' => 1, 'user' => $user->record_id]);
                    return response()->api($wallet->data);
                } else {
                    return response()->api(null, $wallet->message, 400);
                }
            } else {
                return response()->api(null, __('کد وارد شده معتبر نیست.'), 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }
}
