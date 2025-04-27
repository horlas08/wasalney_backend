<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use Cassandra\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use function PHPUnit\Framework\isEmpty;


class PaymentController extends Controller
{
    function addWallet(Request $request)
    {
        try {
            $user = $request->user();
            if ($request->price >= 100000) {
                $price=$request->price/10;
                $wallet = db('wallet')->parent("drivers", $user->record_id)->storeRecord(['type' => 3, 'price' => $price, 'title' => 'افزایش موجودی']);
                $driver = db('drivers')->findRecord($user->record_id);
                $newCredit=$driver->credit+$price;
                db('drivers')->where("id", $user->record_id)->updateRecord(['credit' => $newCredit]);
                if ($wallet->status == true) {
                    return response()->api($wallet->data,__('مبلغ به حساب شما افزوده شد.'),200);
                } else {
                    return response()->api(null, $wallet->message, 400);
                }
            } else {
//            $w=db('wallet')->parent("drivers", $user->record_id)->getRecords();
                return response()->api(null, __('مبلغ وارد شده کمتر از حد مجاز است.'), 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function checkAccount(Request $request)
    {
        try {
            $user = $request->user();
            $bank = db('info_bank')->parent("drivers", $user->record_id)->firstRecord();
            if ($bank != null && $bank->cart_number != null && $bank->shaba != null && $bank->name != null &&$bank->bank->title != null ) {
                if ($request->price >= 100000) {
                    $check=db('account_check')->where('user',$user->record_id)->where('state',3)->firstRecord();
                    if($check==null){
                        $account = db('account_check')->storeRecord(['user' => $user->record_id,'state'=>3, 'price' => $request->price, 'title' => 'وديعة التسوية', 'card_number' => $bank->cart_number, 'shaba' => $bank->shaba]);
                        if ($account->status == true) {
                            return response()->api($account->data, 'لقد تم إرسال طلبك. الرجاء الإنتظار.', 200);
                        } else {
                            return response()->api(null, $account->message, 400);
                        }
                    }
                    else{
                        return response()->api(null, 'لديك طلب مسجل، انتظر الموافقة عليه ثم قدمه.', 400);
                    }

                } else {
//            $w=db('wallet')->parent("drivers", $user->record_id)->getRecords();
                    return response()->api(null, 'المبلغ المطلوب أقل من الحد.' ,  400);

                }
            }
            return response()->api(null, 'اطالمعلومات المصرفية غير كاملة.', 400);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

}
