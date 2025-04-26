<?php

namespace App\Http\Controllers\ProviderApi;


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
                $wallet = db('wallet')->parent("users", $user->record_id)->storeRecord(['type' => 3, 'price' => $price, 'title' => __('افزایش موجودی')]);
                $driver = db('users')->withRelations(['wallet'])->findRecord($user->record_id);
                $newCredit=driverCredit($driver->wallet);
                db('users')->where("id", $user->record_id)->updateRecord(['credit' => $newCredit]);
                if ($wallet->status == true) {
                    return response()->api($wallet->data,__('مبلغ به حساب شما افزوده شد.'),200);
                } else {
                    return response()->api(null, $wallet->message, 400);
                }
            } else {
                return response()->api(null, __('مبلغ وارد شده کمتر از حد مجاز است.'), 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }
}
