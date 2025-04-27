<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Collection\Collection;


class OrderApiController extends Controller
{


    function allOrders(Request $request)
    {
        try {
            $array = [];

            $user = $request->user();
            $driver = db('drivers')->findRecord($user->record_id);
            $status = $driver->state_approval->id;
            $typeActivity = $driver->type_activity->id;
            // if($driver->mobile=='07509870378'){
            //  return response()->api([], '', 200);
            // }

            if ($status == 2) {
                if ($driver->lat != null && $driver->long != null) {
                    if ($typeActivity > 7)
                        $orders = db('orders')->where('delivery_id', $typeActivity)->where('state', 1)->where('driver', '=', null)->getRecords();
                    else
                        $orders = db('orders')->whereBetween('delivery_id', [6, 7])->where('state', 1)->where('driver', '=', null)->getRecords();


                    if ($orders != [] && !$orders->isEmpty()) {
                        foreach ($orders as $order) {
                            if ($order->agency == null) {


                                $distance = (getDistanceBetweenPoints($driver->lat, $driver->long, $order->origin_lat, $order->origin_long)) * 1000;
                                $limit = db('limit')->findRecord(2);
                                if ($distance <= $limit->meter) {
                                    $order = db('orders')->withRelations(['status', 'path_info', 'drivers_send'])->findRecord($order->id);
                                    getDetailOrder($order);

                                    array_push($array, $order);
                                    $drivers_send = db('drivers_send')->parent('orders', $order->id)->where('driver', $driver->id)->firstRecord();
                                    if ($drivers_send == null) {
                                        db('drivers_send')->parent('orders', $order->id)->storeRecord(['driver' => $driver->id]);
                                    }
                                }
                            }


                        }
                        return response()->api($array, '', 200);
                    } else
                        return response()->api([], '', 200);
                } else {
                    return response()->api([], __('برای دریافت سفر روی دکمه لوکیشن بزنید تا سفارشات نزدیک به شما نمایش داده شود.'), 400);

                }

            } else {
                return response()->api([], '', 200);
            }


        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api([], __('خطا'), 400);
    }

    function progressOrder(Request $request)
    {
        try {
            $user = $request->user();
            $joinTable = getLang() . '_status';
            $baseTable = getLang() . '_orders';
            $order = DB::table($baseTable)
                ->join($joinTable, $baseTable . '.id', '=', $joinTable . '.parent_id')
                ->where($baseTable . '.driver', $user->record_id)->get();
            if ($order != null && $order != []) {
                if ($order->last() != null) {
                    if ($order->last()->status < 5) {
                        $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->last()->parent_id);
                        return response()->api($orderItem, '', 200);

                    } else
                        return response()->api(null, '', 200);
                }

            }
            return response()->api(null, '', 200);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function progressOrders(Request $request)
    {
        try {
            $user = $request->user();
            $array = [];
            $orders = db('orders')->where('driver', $user->record_id)->where('state', '<', 5)->getRecords();

            if ($orders != null && $orders != []) {
                foreach ($orders as $value) {
                    $order = db('orders')->withRelations(['status', 'path_info'])->findRecord($value->id);
                    getDetailOrder($order);
                    array_push($array, $order);

                }

                return response()->api($array, '', 200);

            } else
                return response()->api(null, '', 200);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }
    function futureOrders(Request $request)
    {
        try {
            $user = $request->user();
            $array = [];
            $orders = db('orders')->where('driver', $user->record_id)->where('state', '<', 5)->orderBy('id', 'DESC')->getRecords();
            if ($orders != null && $orders != []) {
                foreach ($orders as $value) {
                    if ($value->private == true || $value->reserve == true) {
                        $order = db('orders')->withRelations(['status', 'path_info'])->findRecord($value->id);
                        getDetailOrder($order);
                        array_push($array, $order);
                    }
                }
                return response()->api($array, '', 200);
            } else
                return response()->api(null, '', 200);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }
    function lastOrders(Request $request)
    {
        try {
            $user = $request->user();
            $array = [];
            $orders = db('orders')->where('driver', $user->record_id)->where('state', '>', 4)->orderBy('id', 'DESC')->getRecords();
            if ($orders != null && $orders != []) {
                foreach ($orders as $value) {

                    $order = db('orders')->withRelations(['status', 'path_info'])->findRecord($value->id);
                    getDetailOrder($order);
                    array_push($array, $order);
                }
                return response()->api($array, '', 200);
            } else
                return response()->api(null, '', 200);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }
    function getOrder(Request $request)
    {
        try {
            $order = db('orders')->withRelations(['status', 'path_info'])->findRecord($request->id);

            if ($order != null) {
                getDetailOrder($order);
                return response()->api($order, '', 200);
            } else {
                return response()->api(null, '', 200);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getMyOrder(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->where('driver', $user->record_id)->where('id', $request->id)->withRelations(['status', 'path_info'])->firstRecord();

            if ($order != null) {
                getDetailOrder($order);
                return response()->api($order, '', 200);
            } else {
                return response()->api(null, '', 200);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getMesssages(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->where('id', $request->id)->where('driver', $user->record_id)->firstRecord();
            if ($order != null) {
                $message = db('message')->parent('orders', $request->id)->getRecords();
                if ($message != null) {
                    return response()->api($message);
                } else {
                    return response()->api(null, $message->message, 400);
                }
            }
            return response()->api(null, 'پیامی برای شما یافت نشد.', 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

    function getMesssage(Request $request)
    {
        try {
            $user = $request->user();
            $message = db('message')->where('driver',$user->record_id)->where('id',$request->id)->firstRecord();
            if ($message != null) {
                return response()->api($message);
            } else {
                return response()->api(null, $message->message, 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

    function sendMesssage(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->where('id', $request->id)->where('driver', $user->record_id)->firstRecord();
            if ($order != null) {
                $message = db('message')->parent('orders', $request->id)->storeRecord(['messsage' => $request->message, 'driver' => $user->record_id,'user' => $order->user->id, 'driver_sent' => 1]);
                if ($message->status == true) {
//                    db('test')->storeRecord(['test'=>$message->data->id]);

                    sendNotification($order->user->fcm_token, 'recive_message', $message->data,'success');
                    return response()->api($message->data);
                } else {
                    return response()->api(null, $message->message, 400);
                }
            }
            return response()->api(null, 'امکان ارسال پیام برای شما وجود ندارد.', 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

    function getAddOrder(Request $request)
    {
        try {
            $user = $request->user();
            $orderItem = db('orders')->where('id', $request->id)->where('driver', null)->where('state', 1)->withRelations(['status', 'path_info'])->firstRecord();
            if ($orderItem != null) {
                getDetailOrder($orderItem);
                $driver = db('drivers')->where('id', $user->record_id)->where('state_approval', 2)->where('type_activity', $orderItem->delivery_id->id)->firstRecord();

//                if ($orderItem->agency == null) {
                if ($driver != null) {

                    if ($driver->lat != null && $driver->long != null) {
                        $distance = (getDistanceBetweenPoints($driver->lat, $driver->long, $orderItem->origin_lat, $orderItem->origin_long)) * 1000;

                        $limit = db('limit')->findRecord(2);

                        if ($distance <= $limit->meter) {
//                                    db('test')->storeRecord(['test' => $distance]);
                            return response()->api($orderItem, '', 200);

                        }
                        return response()->api(null, '', 200);
                    }

                    return response()->api(null, '', 200);
                }
                return response()->api(null, '', 200);
//                }
//            else {
//                    $agency = $orderItem->agency->notif_token;
//                    sendNotification($agency, 'add_order', $orderItem, 'success', true, 0, 1);
//                }

            }
            return response()->api(null, '', 200);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function acceptOrder(Request $request)
    {
        try {
            $driver = $request->user();
            $order = db('orders')->findRecord($request->id);
//            if($order->delivery_id==null){
            $orderUpdate = db('orders')->where('id', $order->id)->updateRecord(['driver' => $driver->record_id, 'state' => 2]);
            if ($orderUpdate->status == true) {
//                db('status')->parent('orders', $order->id)->updateRecord(['status' => 2]);
                db('status')->parent('orders', $order->id)->storeRecord(['status' => 2]);
                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                $orderItem->detail = db('order_motor_details')->where('order_id', $orderItem->id)->firstRecord();
//                    $orderItem->info=$orderItem->path_info->toArray();
//                    $orderItem->status=$orderItem->path_info->toArray();
                getDetailOrder($orderItem);
                if ($orderItem->user->fcm_token != null)
                    sendNotification($orderItem->user->fcm_token, 'update_order', $orderItem, __('راننده در خواست شما را قبول کرد'), true, 1, 1);
                $drivers_send = db('drivers_send')->parent('orders', $orderItem->id)->where('driver', '!=', $driver->record_id)->getRecords();
                if ($drivers_send != [])
                    foreach ($drivers_send as $value) {
                        if ($value->driver->fcm_token != null)
                            sendNotification($value->driver->fcm_token, 'cancel_order', $orderItem, 'success');

                    }
                return response()->api($orderItem, '', 200);
            } else
                return response()->api(null, $order->message, 200);

//            else{
//                return response()->api(null,'سفارش توسط راننده دیگری قبول شده است.', 200);


        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function arriveState(Request $request)
    {
        try {
            $driver = $request->user();
            $order = db('orders')->where('id', $request->id)->where('driver', $driver->record_id)->firstRecord();
//            $status = db('status')->parent('orders', $order->id)->getRecords()->last();
            if ($order != null && $order->state->id != 3) {
//                db('status')->parent('orders', $order->id)->updateRecord(['status' => 3]);
                db('orders')->where('id', $request->id)->where('driver', $driver->record_id)->updateRecord(['state' => 3]);
                db('status')->parent('orders', $order->id)->storeRecord(['status' => 3]);
                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                getDetailOrder($orderItem);

//                $orderItem->detail = db('order_motor_details')->where('order_id', $orderItem->id)->firstRecord();
                if ($orderItem->user->fcm_token != null)
                    sendNotification($orderItem->user->fcm_token, 'update_order', $orderItem, __('راننده به مبدا رسید'), true, 1, 1);
                return response()->api($orderItem, '', 200);
            } else
                return response()->api(null, __('خطا'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);

    }

    function receiveState(Request $request)
    {
        try {
            $driver = $request->user();
            $order = db('orders')->where('id', $request->id)->where('driver', $driver->record_id)->firstRecord();
//            $status = db('status')->parent('orders', $order->id)->getRecords()->last();
            if ($order != null && $order->state->id != 4) {
                db('orders')->where('id', $request->id)->where('driver', $driver->record_id)->updateRecord(['state' => 4]);
//                db('status')->parent('orders', $order->id)->updateRecord(['status' => 4]);
                db('status')->parent('orders', $order->id)->storeRecord(['status' => 4]);
                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                getDetailOrder($orderItem);
//                $orderItem->detail = db('order_motor_details')->where('order_id', $orderItem->id)->firstRecord();
                sendNotification($orderItem->user->fcm_token, 'update_order', $orderItem, '', true);
                return response()->api($orderItem, '', 200);
            } else
                return response()->api(null, __('خطا'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function DoneState(Request $request)
    {
        try {
            $user = $request->user();
            $driver = db('drivers')->findRecord($user->record_id);
            $order = db('orders')->where('id', $request->id)->where('state', '<', 5)->where('driver', $driver->id)->firstRecord();
//            $status = db('status')->parent('orders', $order->id)->getRecords()->last();
            if ($order != null) {
                $comision = db('commission')->parent("deliveries", $order->delivery_id->id)->where('level', $driver->level->id)->firstRecord();
                $pr = finalPriceDriver($order, $comision->percent);
                db('orders')->where('id', $order->id)->where('driver', $driver->id)->updateRecord(['state' => 6, 'net_price' => $pr]);
                db('status')->parent('orders', $order->id)->storeRecord(['status' => 5]);
                db('status')->parent('orders', $order->id)->storeRecord(['status' => 6]);
                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                $orderItem->detail = db('order_motor_details')->where('order_id', $orderItem->id)->firstRecord();
                if ($orderItem->pay_type == null || $orderItem->pay_type->id == 1) {
//                    $price = calculateCashPrice($comision->percent, $orderItem->price);
                    $p = finalPriceDriver($orderItem, $comision->percent);

                    $fp = $orderItem->price - $p;
                    rateOrder('users', $orderItem->user->id, $orderItem->price);
                    rateOrder('drivers', $driver->id, $orderItem->price);
                    $wallet = db('wallet')->parent("drivers", $driver->id)->storeRecord(['type' => 2, 'price' => $orderItem->price, 'title' => __('کاهش کمیسیون برای پرداخت نقدی مسافر'), 'order' => $orderItem->id]);
                    $wallet = db('wallet')->parent("drivers", $driver->id)->storeRecord(['type' => 1, 'price' => $p, 'title' => __('افزایش جهت پرداخت نقدی مسافر'), 'order' => $orderItem->id]);

                    sendNotification($driver->fcm_token, 'update_wallet', $wallet->data, 'success', true);
                } elseif ($orderItem->pay_type != null && $orderItem->pay_type->id == 2) {
//                    $price = calculateCashPrice($comision->percent, $orderItem->price);
                    $p = finalPriceDriver($orderItem, $comision->percent);
                    $wallet = db('wallet')->parent("drivers", $driver->id)->storeRecord(['type' => 1, 'price' => $p, 'title' => __('پرداخت اینترنتی مسافر'), 'order' => $orderItem->id]);
                    sendNotification($driver->fcm_token, 'update_wallet', $wallet->data, 'success', true);
                    $userWallet = db('wallet')->parent("users", $orderItem->user->id)->storeRecord(['type' => 2, 'price' => $orderItem->price, 'title' => __('کاهش از کیف پول'), 'order' => $orderItem->id,]);
                    $user1 = db('users')->findRecord($orderItem->user->id);
                    $newCredit = $user1->credit - $orderItem->price;
                    db('users')->where("id", $orderItem->user->id)->updateRecord(['credit' => $newCredit]);
                    rateOrder('users', $orderItem->user->id, $orderItem->price);
                    rateOrder('drivers', $driver->id, $orderItem->price);
                    sendNotification($user1->fcm_token, 'update_wallet', $userWallet->data, 'success', true);
                } elseif ($orderItem->pay_type != null && $orderItem->pay_type->id == 3) {
//                    $price = calculateCashPrice($comision->percent, $orderItem->price);
                    $p = finalPriceDriver($orderItem, $comision->percent);
                    $wallet = db('wallet')->parent("drivers", $driver->id)->storeRecord(['type' => 1, 'price' => $p, 'title' => __('پرداخت اینترنتی مسافر'), 'order' => $orderItem->id]);

                    sendNotification($driver->fcm_token, 'update_wallet', $wallet->data, 'success', true);
                    $userWallet = db('wallet')->parent("users", $orderItem->user->id)->storeRecord(['type' => 2, 'price' => $orderItem->price, 'title' => __('کاهش از کیف پول'), 'order' => $orderItem->id,]);
                    $user1 = db('users')->findRecord($orderItem->user->id);
                    $newCredit = $user1->credit - $orderItem->price;
                    db('users')->where("id", $orderItem->user->id)->updateRecord(['credit' => $newCredit]);
                    rateOrder('users', $orderItem->user->id, $orderItem->price);
                    rateOrder('drivers', $driver->id, $orderItem->price);
                    sendNotification($user1->fcm_token, 'update_wallet', $userWallet->data, 'success', true);
                } elseif ($orderItem->pay_type != null && $orderItem->pay_type->id == 4) {
//                    $price = calculateCashPrice($comision->percent, $orderItem->price);
                    $p = finalPriceDriver($orderItem, $comision->percent);
                    $pComision = $orderItem->price - $p;
                    $wallet = db('wallet')->parent("drivers", $driver->id)->storeRecord(['type' => 1, 'price' => $p, 'title' => __('پرداخت با امتیاز'), 'order' => $orderItem->id]);
                    sendNotification($driver->fcm_token, 'update_wallet', $wallet->data, 'success', true);
                    $userWallet = db('rate_user')->parent("users", $orderItem->user->id)->storeRecord(['type' => 2, 'cost' => $orderItem->price, 'count' => 1]);
                    $user1 = db('users')->findRecord($orderItem->user->id);
                    rateOrder('users', $orderItem->user->id, $orderItem->price);
                    rateOrder('drivers', $driver->id, $orderItem->price);
                    sendNotification($user1->fcm_token, 'update_rate', $userWallet->data, 'success', true);
                }

                $infoUser = db('drivers')->withRelations(['documents', 'car_details', 'wallet'])->findRecord($driver->id);
                $credit = driverCredit($infoUser->wallet);
                $infoUser->credit = $credit;
                $driverUpdate = db('drivers')->where('id', $driver->id)->updateRecord(['credit' => $credit]);
                getDetailOrder($orderItem);

                sendNotification($orderItem->user->fcm_token, 'update_order', $orderItem, __('سفر شما به پایان رسید'), true, 1, 1);
                return response()->api($orderItem, '', 200);
            } else
                return response()->api(null, __('خطا'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function setRate(Request $request)
    {
        try {
            $user = $request->user();
            $check = db('orders')->where('id', $request->id)->where('driver', $user->record_id)->firstRecord();
            if ($check != null) {
                $order = db('orders')->where('id', $check->id)->updateRecord(['user_rate' => $request->user_rate]);
                if ($order->status == true) {
                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
                    $orderItem->detail = db('order_motor_details')->where('order_id', $order->data->id)->firstRecord();
                    return response()->api($orderItem);
                } else
                    return response()->api(null, $order->message, 400);
            } else
                return response()->api(null, __('خطا'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function cancelOrder(Request $request)
    {
        try {
            $user = $request->user();
            $ordero = db('orders')->where('id', $request->id)->where('driver', $user->record_id)->firstRecord();
            if ($ordero != null) {
                $statusesOrder = db('status')->parent("orders", $ordero->id)->getRecords()->last();
                $statusId = $statusesOrder->status->id;

                if ($statusId > 1) {
                    db('status')->parent('orders', $ordero->id)->where('status', '>', 1)->deleteRecords();
                    db('orders')->where('id', $request->id)->where('driver', $user->record_id)->where('state', '>', 1)->updateRecord(['state' => 1]);
                    db('cancel_driver')->parent('drivers', $user->record_id)->storeRecord(['order' => $ordero->id]);
                    db('orders')->where('id', $ordero->id)->updateRecord(['driver' => null]);
                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($ordero->id);
                    getDetailOrder($orderItem);
                    sendNotification($orderItem->user->fcm_token, 'update_order', $orderItem, __('سفر شما توسط راننده لغو شد.'), true, 1, 1);
                    sendSoketStore($orderItem, $orderItem->delivery_id->id);
//                    sendNotification($orderItem->delivery_id->token, 'add_order', $orderItem, 'success', true, 0, 0);

                    return response()->api($orderItem, '', 200);
                } else
                    return response()->api(null, __('شما در این وضعیت نمیتوانید سفارش لغو کنید.'), 400);
            } else {
                return response()->api(null, __('سفارش موجود نیست!'), 400);
            }
//
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

}
