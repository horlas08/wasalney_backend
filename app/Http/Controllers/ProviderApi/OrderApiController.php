<?php

namespace App\Http\Controllers\ProviderApi;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class OrderApiController extends Controller
{


    function storeMain(Request $request)
    {
        try {
            $result = [];
            $user = $request->user();
            $orderDetail = null;
            $delivery = db('deliveries')->findRecord($request->delivery_id);
            if ($user->category_slug == 'users') {
                $u = db('users')->findRecord($user->record_id);
                if ($request->name == null && $request->mobile == null)
                    $request->merge(['delivery_id' => $request->delivery_id, 'name' => $u->name, 'mobile' => $u->mobile, 'price' => (int)$request->price, 'hurry' => $request->hurry, 'comeback' => $request->comeback, 'pay_side' => $request->pay_side, 'origin_lat' => $request->origin_lat, 'origin_long' => $request->origin_long, 'origin_address' => $request->origin_address, 'destination_lat' => $request->destination_lat, 'destination_long' => $request->destination_long, 'destination_address' => $request->destination_address, 'pay_type' => 1, 'user' => $user->record_id, 'path_info' => $request->path_info, 'state' => 1, 'status' => [['status' => 1]], 'price_detail' => [['final_price' => $request->price, 'decrease_percent' => $request->base_price, 'back_price' => $request->back_price, 'base_price' => $request->base_price, 'hurry_percent' => $request->hurry_percent, 'multiply_price' => $request->multiply_price,]]]);
                else
                    $request->merge(['delivery_id' => $request->delivery_id, 'name' => $request->name, 'mobile' => $request->mobile, 'price' => (int)$request->price, 'hurry' => $request->hurry, 'comeback' => $request->comeback, 'pay_side' => $request->pay_side, 'origin_lat' => $request->origin_lat, 'origin_long' => $request->origin_long, 'origin_address' => $request->origin_address, 'destination_lat' => $request->destination_lat, 'destination_long' => $request->destination_long, 'destination_address' => $request->destination_address, 'pay_type' => 1, 'user' => $user->record_id, 'path_info' => $request->path_info, 'state' => 1, 'status' => [['status' => 1]], 'price_detail' => [['final_price' => $request->price, 'decrease_percent' => $request->base_price, 'back_price' => $request->back_price, 'base_price' => $request->base_price, 'hurry_percent' => $request->hurry_percent, 'multiply_price' => $request->multiply_price,]]]);
                $order = storeRecord($request, 'orders', null, null, true);

//                $status = db('status')->parent("orders", $order->data->id)->getRecords();
//                $infoAddress = db('path_info')->parent("orders", $order->data->id)->getRecords();
                if ($order->status == true) {
                    $serviceId = $order->data->delivery_id->id;
                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
                    if ($orderItem->delivery_id->type->id == 1) {
//                        $request->merge(['order_id' => $order->data->id, 'type_parcel' => $request->type_parcel, 'price_parcel' => $request->price_parcel]);
//                    $orderDetail = storeRecord($request, 'order_motor_details');
                        $orderDetail = db('order_motor_details')->storeRecord(['order_id' => $order->data->id, 'type_parcel' => $request->type_parcel, 'price_parcel' => $request->price_parcel, 'price_product' => $request->price_product]);
                        $detailId = $orderDetail->data->id;
                        $orderItem->motorDetails = db('order_motor_details')->findRecord($detailId);

                    } elseif ($orderItem->delivery_id->type->id > 3) {
//                    return $request->order_detail_truck;
//                    foreach ($request->order_detail_truck as $value)
//                    $orderDetail = storeRecord([$request->order_detail_truck],'moving_order_details',null,null, true);
                        $orderDetail = db('moving_order_details')->storeRecord($request->order_detail_truck, true);
                        $detailId = $orderDetail->data->id;
                        db('moving_order_details')->where('id', $detailId)->updateRecord(['order_id' => $order->data->id]);
                        $orderItem->truckDetails = db('moving_order_details')->withRelations(['equipment_detail'])->findRecord($detailId);
                    }
                    sendSoketStore($orderItem, $serviceId);
//                    array_push($result, ['orderDetail' => $orderDetail, 'order' => $orderItem]);

                    // dispatch(new CancelOrderJob ($orderItem))->delay(Carbon::now()->addSeconds(620));

                    return response()->api($orderItem, '', 200);
                } else
                    return response()->api(null, $order->message, 400);
            }
//
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function storeTruck(Request $request)
    {
        try {
            $result = [];
            $user = $request->user();
            $orderDetail = null;
            $a = [];
            array_push($a, $request->order_detail_truck);
//            return $a;
            if ($user->category_slug == 'users') {
                $u = db('users')->findRecord($user->record_id);
                if ($request->name == null && $request->mobile == null)
                    $request->merge(['delivery_id' => $request->delivery_id, 'name' => $u->name, 'mobile' => $u->mobile, 'price' => (int)$request->price, 'comeback' => $request->comeback, 'pay_side' => $request->pay_side, 'origin_lat' => $request->origin_lat, 'origin_long' => $request->origin_long, 'origin_address' => $request->origin_address, 'destination_lat' => $request->destination_lat, 'destination_long' => $request->destination_long, 'destination_address' => $request->destination_address, 'pay_type' => 1, 'user' => $user->record_id, 'path_info' => $request->path_info, 'moving_order_details' => $a, 'state' => 1, 'status' => [['status' => 1]]]);
                else
                    $request->merge(['delivery_id' => $request->delivery_id, 'name' => $request->name, 'mobile' => $request->mobile, 'price' => (int)$request->price, 'comeback' => $request->comeback, 'pay_side' => $request->pay_side, 'origin_lat' => $request->origin_lat, 'origin_long' => $request->origin_long, 'origin_address' => $request->origin_address, 'destination_lat' => $request->destination_lat, 'destination_long' => $request->destination_long, 'destination_address' => $request->destination_address, 'pay_type' => 1, 'user' => $user->record_id, 'path_info' => $request->path_info, 'moving_order_details' => $a, 'state' => 1, 'status' => [['status' => 1]]]);
                $order = storeRecord($request, 'orders', null, null, true);
//                $orderDetail = db('moving_order_details')->storeRecord($request->order_detail_truck, true);
//                $detailId = $orderDetail->data->id;
//                db('moving_order_details')->where('id', $detailId)->updateRecord(['order_id' => $order->data->id]);
                if ($order->status == true) {
                    $serviceId = $order->data->delivery_id->id;
                    $service = db('deliveries')->findRecord($serviceId);
                    $orderItem = db('orders')->withRelations(['status', 'path_info', 'moving_order_details'])->findRecord($order->data->id);
                    sendSoketStore($orderItem, $service->id);
//                    if($orderItem->agency==null){
//                        sendNotification($service->token, 'add_order', $orderItem, 'success', true,0,1);
//                    }
//                    else{
//                        $agency=$orderItem->agency->notif_token;
//                        sendNotification($agency, 'add_order', $orderItem, 'success', true,0,1);
//                    }
//                    $drivers=db('drivers')->where('status_driver', 1)->where('type_activity',$service->id)->getRecords();

                    array_push($result, ['orderDetail' => $orderDetail, 'order' => $orderItem]);

                    return response()->api($result, '', 200);
                } else
                    return response()->api($result, $order->message, 400);
            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getMyOrder(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->withRelations(['status', 'path_info', 'price_detail'])->where('id', $request->id)->where('user', $user->record_id)->firstRecord();
            if($order!=null) {
                getDetailOrder($order);
                return response()->api($order);
            }else {
                return response()->api(null,'سفارش برای شما یافت نشد.',400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

    function getMesssages(Request $request)
    {
        try {
            $user = $request->user();
            $order=db('orders')->where('id',$request->id)->where('user',$user->record_id)->firstRecord();
            if($order!=null) {
                $message=db('message')->parent('orders', $request->id)->getRecords();
                if($message!=null) {
                    return response()->api($message);
                }else {
                    return response()->api(null);
                }
            }
            return response()->api(null,'اطلاعاتی برای شما یافت نشد.',400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

    function getMesssage(Request $request)
    {
//        try {

            $user = $request->user();
//        $message=db('message')->findRecord(63);
            $message = db('message')->where('user',$user->record_id)->where('id',$request->id)->firstRecord();
            if ($message != null) {
                return response()->api($message);
            } else {
                return response()->api(null, 'لایوجد', 400);
            }
//        } catch (\Exception $e) {
//            Storage::disk('file')->append('logApi.txt', $e->getMessage());
//        }
//        return response()->api(null, 'خطا', 400);
    }
    function sendMesssage (Request $request)
    {
        try {
            $user = $request->user();
            $order=db('orders')->where('id',$request->id)->where('user',$user->record_id)->firstRecord();

            if($order!=null) {
                $message=db('message')->parent('orders', $order->id)->storeRecord(['messsage'=>$request->message,'driver'=>$order->driver->id,'user'=>$user->record_id,'user_sent'=>true]);
          
                if($message->status==true) {
//                    db('test')->storeRecord(['test'=>$message->data->id]);
                    sendNotification($order->driver->fcm_token, 'recive_message', $message->data,'sucsses');

                    return response()->api($message->data);
                }else {
                    return response()->api(null,$message->message,400);
                }
            }
            return response()->api(null,'امکان ارسال پیام برای شما وجود ندارد.',400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

    function updateOrder(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->where('id', $request->id)->where('user', $user->record_id)->updateRecord(['pay_type' => $request->pay_type]);

            if ($order->status == true) {
                if ($order->data->pay_type->id == 2) {
                    $comision = db('commission')->parent("deliveries", $order->data->delivery_id->id)->where('level', $order->data->driver->level->id)->firstRecord();
                    $price = calculateCashPrice($comision->percent, $order->data->price);
                    db('orders')->where('id', $order->data->id)->where('user', $user->record_id)->updateRecord(['net_price' => (int)$price]);
                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
                    getDetailOrder($orderItem);
                    sendSoketByDriver($orderItem, 'update_order');

                    $storeWallet = db('wallet')->parent("users", $user->record_id)->storeRecord(['price' => (int)$orderItem->price, 'type' => 1, 'order' => $orderItem->id]);
                    $userInfo = db('users')->withRelations(['wallet'])->findRecord($user->record_id);
                    $credit = driverCredit($userInfo->wallet);
                    $userUpdate = db('users')->where('id', $user->record_id)->withRelations(['wallet'])->updateRecord(['credit' => $credit]);
                    if ($userUpdate->status == true)
                        sendNotification($userInfo->fcm_token, 'update_wallet', $storeWallet->data, 'success', true);

                    return response()->api($orderItem);
                } else if ($order->data->pay_type->id == 3) {
                    $comision = db('commission')->parent("deliveries", $order->data->delivery_id->id)->where('level', $order->data->driver->level->id)->firstRecord();
                    $price = finalPriceDriver($order->data, $comision->percent);
                    db('orders')->where('id', $order->data->id)->where('user', $user->record_id)->updateRecord(['net_price' => (int)$price]);
                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
                    getDetailOrder($orderItem);
                    sendSoketByDriver($orderItem, 'update_order');

//                    $storeWallet = db('wallet')->parent("users", $user->record_id)->storeRecord(['price' => $orderItem->price, 'type' => 2, 'order' => $orderItem->id]);
//                    $userInfo = db('users')->withRelations(['wallet'])->findRecord($user->record_id);
//                    $credit = driverCredit($userInfo->wallet);
//                    $userUpdate = db('users')->where('id', $user->record_id)->withRelations(['wallet'])->updateRecord(['credit' => $credit]);
//                    if ($userUpdate->status == true)
//                        sendNotification($userInfo->fcm_token, 'update_wallet', $storeWallet->data, 'success', true);

                    return response()->api($orderItem);
                } else if ($order->data->pay_type->id == 4) {
                    $comision = db('commission')->parent("deliveries", $order->data->delivery_id->id)->where('level', $order->data->driver->level->id)->firstRecord();
                    $price = finalPriceDriver($order->data, $comision->percent);
                    db('orders')->where('id', $order->data->id)->where('user', $user->record_id)->updateRecord(['net_price' => (int)$price]);
                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
                    getDetailOrder($orderItem);
                    sendSoketByDriver($orderItem, 'update_order');

//                    $storeWallet = db('wallet')->parent("users", $user->record_id)->storeRecord(['price' => $orderItem->price, 'type' => 2, 'order' => $orderItem->id]);
//                    $userInfo = db('users')->withRelations(['wallet'])->findRecord($user->record_id);
//                    $credit = driverCredit($userInfo->wallet);
//                    $userUpdate = db('users')->where('id', $user->record_id)->withRelations(['wallet'])->updateRecord(['credit' => $credit]);
//                    if ($userUpdate->status == true)
//                        sendNotification($userInfo->fcm_token, 'update_wallet', $storeWallet->data, 'success', true);

                    return response()->api($orderItem);
                } else if ($order->data->pay_type->id == 1) {
                    $comision = db('commission')->parent("deliveries", $order->data->delivery_id->id)->where('level', $order->data->driver->level->id)->firstRecord();
                    $price = finalPriceDriver($order->data, $comision->percent);
                    db('orders')->where('id', $order->data->id)->where('user', $user->record_id)->updateRecord(['net_price' => (int)$price]);
                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
                    getDetailOrder($orderItem);
                    sendSoketByDriver($orderItem, 'update_order');
//                    sendNotification($orderItem->user->fcm_token, 'update_order', $orderItem, 'success', true);

//                    $userInfo = db('users')->withRelations(['wallet'])->findRecord($user->record_id);
//                    $credit = driverCredit($userInfo->wallet);
//                    $userUpdate = db('users')->where('id', $user->record_id)->withRelations(['wallet'])->updateRecord(['credit' => $credit]);
//                    if ($userUpdate->status == true)
//                        sendNotification($userInfo->fcm_token, 'update_wallet', $userInfo, 'success', true);

                    return response()->api($orderItem);
                }

            } else
                return response()->api(null, $order->message, 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }

//update options taxi
    function updateOrderOption(Request $request)
    {
        try {
            $user = $request->user();
            $orderUpdate = db('orders')->where('id', $request->id)->where('user', $user->record_id)->updateRecord(['price' => (int)$request->price, 'comeback' => $request->comeback, 'stop_time' => $request->stop_time,'stop_minutes' => $request->stop_minutes,'stop_minutes2' => $request->stop_minutes2,'stop_time2' => $request->stop_time2, 'destination_long' => $request->destination_long, 'destination_lat' => $request->destination_lat, 'destination_address' => $request->destination_address,]);
//            return $request->path_info;
            $infoOrigin = [];
            $infoDes = [];
            foreach ($request->path_info as $value) {
                $array = [];
                array_push($array, $value);

                foreach ($array as $arr) {
                    $arrayItems = [];

                    if (isset($arr['id']))
                        $pathUpdate = db('path_info')->parent('orders', $request->id)->where('id', $arr['id'])->updateRecord(['lat' => $arr['lat'], 'long' => $arr['long'], 'address' => $arr['address']]);

                    else
                        $pathNew = db('path_info')->parent('orders', $request->id)->storeRecord(['lat' => $arr['lat'], 'long' => $arr['long'], 'address' => $arr['address'], 'type' => 'مقصد دوم']);


                }
            }

            if ($orderUpdate->status == true && $pathUpdate->status == true) {
                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($orderUpdate->data->id);
                getDetailOrder($orderItem);

                sendSoketByDriver($orderItem, 'update_order');
                return response()->api($orderItem);
            } else {
                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($orderUpdate->data->id);
                return response()->api($orderItem, $orderUpdate->message, 400);
            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function changeDestination(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->where('id', $request->id)->where('user', $user->record_id)->updateRecord(['destination_lat' => $request->destination_lat, 'destination_long' => $request->destination_long, 'destination_address' => $request->destination_address,]);
            $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
            getDetailOrder($orderItem);

            if ($order->status == true) {
                sendSoketByDriver($orderItem, 'update_order_list');
//                sendNotification($orderItem->delivery_id->token, 'update_order_list', $orderItem, 'success', true);

                return response()->api($orderItem);
            } else {
                return response()->api($orderItem, $order->message, 400);
            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function hurry(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->where('user', $user->record_id)->findRecord($request->id);
            if ($order != null) {

                $deliveries = db('deliveries')->findRecord($order->delivery_id->id);
//                $addPrice = $order->price * (floatval($deliveries->hurry_price) / 100);
//                $price = $order->price + $addPrice;
                $orderUpdate = db('orders')->where('id', $order->id)->updateRecord(['price' => (int)$request->price, 'hurry' => $request->hurry, 'hurry_percent' => $deliveries->hurry_price]);
                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($orderUpdate->data->id);
                getDetailOrder($orderItem);
//                if ($orderItem->agency != null) {
//                    $agency = $orderItem->agency->notif_token;
//                    sendNotification($agency, 'update_order', $orderItem, 'success', true, 0, 1);
//                } else {
                $drivers_send = db('drivers_send')->parent('orders', $orderItem->id)->getRecords();
                if ($drivers_send != [])
                    foreach ($drivers_send as $value) {
                        sendNotification($orderItem->delivery_id->token, 'update_order_list', $orderItem, 'success', true);
                    }//                }
//                sendNotification($orderItem->delivery_id->token, 'update_order_list', $orderItem, 'success', true);

                if ($orderUpdate->status == true) {
                    return response()->api($orderItem, '', 200);
                } else {
                    return response()->api($orderItem, $orderUpdate->message, 400);
                }
            } else {
                return response()->api($order, __('سفارش موجود نیست!'), 400);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api($order, __('خطا'), 400);
    }

    function progressOrder(Request $request)
    {
        try {
            $user = $request->user();
            $arrayOrder = [];
//            if ($user->category_slug == 'users') {
            $orders = db('orders')->where('user', $user->record_id)->where('state', '<', 5)->withRelations(['status', 'path_info'])->getRecords();
            if ($orders != []) {
                foreach ($orders as $order) {
                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                    getDetailOrder($orderItem);
                    array_push($arrayOrder, $orderItem);
                }
//
                return response()->api($arrayOrder, '', 200);
            } else {
                return response()->api(null, '', 200);
            }
//            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function myOrders(Request $request)
    {
        try {
            $user = $request->user();
            $orders = db('orders')->where('user', $user->record_id)->where('delivery_id', $request->id)->withRelations(['status', 'path_info'])->getRecords();
            if ($orders != null && !$orders->isEmpty() && $orders != []) {

                return response()->api($orders, '', 200);
            }
            return response()->api($orders, '', 200);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function myOrdersDetailsMotor(Request $request)
    {
        try {
            $orderDetail = db('order_motor_details')->where('order_id', $request->id)->getRecords();
            return response()->api($orderDetail, '', 200);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function DetailsTruck(Request $request)
    {
        try {
            $orderDetail = db('moving_order_details')->where('order_id', $request->id)->withRelations(['equipment_detail'])->getRecords();

            return response()->api($orderDetail, '', 200);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

//کنسل کردن سفارش بعد از قبول راننده
    function cancelOrderRegister(Request $request)
    {
        try {
            $user = $request->user();
            $u = db('users')->findRecord($user->record_id);
            $ordero = db('orders')->where('id', $request->id)->where('user', $user->record_id)->firstRecord();
            if ($ordero != null) {
                $statusesOrder = db('status')->parent("orders", $ordero->id)->getRecords();
                $statusCount = $statusesOrder->last()->status->id;
                if ($statusCount == 2 && $ordero->driver != null) {
                    $order = db('orders')->where('id', $ordero->id)->updateRecord(['cancel_status' => 'تم الإلغاء', 'state' => 7, 'canceled_by' => $u->name, 'cancel_reason' => $request->cancel_reason]);
                    $status = db('status')->parent('orders', $order->data->id)->storeRecord(['status' => 7]);
                    if ($order->status == true && $status->status == true) {
                        $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
                        if ($orderItem->delivery_id->id == 1) {
//                        $request->merge(['order_id' => $order->data->id, 'type_parcel' => $request->type_parcel, 'price_parcel' => $request->price_parcel]);
//                    $orderDetail = storeRecord($request, 'order_motor_details');
                            $orderItem->motorDetails = db('order_motor_details')->where('order_id', $orderItem->id)->firstRecord();

                        } elseif ($orderItem->delivery_id->id > 3) {
//
                            $orderItem->truckDetails = db('moving_order_details')->withRelations(['equipment_detail'])->where('order_id', $orderItem->id)->firstRecord();
                        }
                        sendSoketByDriver($orderItem, 'cancel_order_item');

                        return response()->api($orderItem, '', 200);
                    }
                    return response()->api(null, $order->message, 400);
                } else
                    return response()->api(null, __('شما در این وضعیت نمیتوانید سفارش لغو کنید.'), 400);
            } else {
                return response()->api(null, __('سفارش موجود نیست!'), 400);
            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    //کنسل کردن سفارش قبل از قبول راننده

    function cancelOrderRequest(Request $request)
    {

        //  try {
        $user = $request->user();
        $orderItem = db('orders')->where('user', $user->record_id)->where('state', 1)->findRecord($request->id);

        if ($orderItem->driver == null) {
            // if ($orderItem->agency != null) {
            //     $agency = $orderItem->agency->notif_token;
            //     // sendNotification($agency, 'cancel_order', $orderItem, 'success', true);
            // }
            // else
            $drivers_send = db('drivers_send')->parent('orders', $orderItem->id)->getRecords();
            if ($drivers_send != [])
                foreach ($drivers_send as $value) {
                    if($value->driver->fcm_token!=null)
                    sendNotification($value->driver->fcm_token, 'cancel_order', $orderItem, 'success');

                }

            if ($orderItem->percent_code != null) {
                $gift = db('gift_cart')->where('gift_code', $orderItem->percent_code)->firstRecord();
                if ($gift != null) {
                    db('discount_order')->parent('gift_cart', $gift->id)->where('order', $orderItem->id)->deleteRecord();
                }
            }

            if ($orderItem->delivery_id->type->id < 3 && $orderItem->delivery_id->type->id != 1) {
                db('order_motor_details')->where('order_id', $orderItem->id)->deleteRecord();
            } elseif ($orderItem->delivery_id->type->id > 3) {
                $detail = db('moving_order_details')->where('order_id', $orderItem->id)->firstRecord();
                if ($detail != null) {
                    db('equipment_detail')->parent("moving_order_details", $detail->id)->deleteRecords();
                    db('floor_detail')->parent("moving_order_details", $detail->id)->deleteRecords();
                    db('moving_order_details')->where('order_id', $orderItem->id)->deleteRecord();
                }
            }
            db('status')->parent('orders', $orderItem->id)->deleteRecords();
            deleteRecord('orders', $orderItem->id);

            return response()->api(null, '', 200);
        } else
            return response()->api(null, __('شما در این وضعیت نمیتوانید سفارش لغو کنید.'), 400);
        //  } catch (\Exception $e) {
        //      Storage::disk('file')->append('logApi.txt', $e->getMessage());
        //  }
        //  return response()->api(null,__('خطا'), 400);
    }

//    function getDriverMyOrder(Request $request){
//        try {
//            $user = $request->user();
//
//            db('orders')->where('user',$user->record_id)->where()
//             } catch (\Exception $e) {
//                 Storage::disk('file')->append('logApi.txt', $e->getMessage());
//             }
//             return response()->api(null,__('خطا'), 400);
//    }

    function setRate(Request $request)
    {
        try {
            $user = $request->user();
            $check = db('orders')->where('id', $request->id)->where('user', $user->record_id)->firstRecord();
            if ($check != null) {
                $order = db('orders')->where('id', $request->id)->updateRecord(['driver_rate' => $request->driver_rate]);
                if ($order->status == true) {
                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->data->id);
                    $orderItem->detail = db('order_motor_details')->where('order_id', $order->data->id)->firstRecord();
                    if ($orderItem->agency == null) {
                        sendNotification($orderItem->driver->fcm_token, 'set_rate', $orderItem, 'success', true);
                    }

                    return response()->api($orderItem);
                } else
                    return response()->api(null, $order->message, 400);
            } else
                return response()->api(null, __('خطا'), 400);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getOrder(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->where('user', $user->record_id)->where("id", $request->id)->withRelations(['status', 'path_info'])->firstRecord();
            if ($order != null) {
                getDetailOrder($order);
                // $order->detail = db('order_motor_details')->where('order_id', $order->id)->firstRecord();
                return response()->api($order, '', 200);
            } else {
                return response()->api($order, __('سفارش موجود نیست!'), 200);
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }


    function giftTest(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->where('id', $request->id)->where('user', $user->record_id)->firstRecord();
            $gift = db('gift_cart')->where('gift_code', $request->code)->whereDate('expire_date', '>=', Carbon::today())->firstRecord();
            $countUse = db('discount_order')->parent('gift_cart', $gift->id)->getRecords()->count();
            $giftCode = null;
            $giftPercent = null;
            $price = $order->price;
            if ($order != null) {
                if ($order->percent_code == null) {
                    if ($gift != null) {
                        foreach ($gift->service as $service) {
                            if ($service->type->id == $order->delivery_id->type->id) {
                                if ($gift->count != null && $gift->count != 0) {
                                    if ($countUse <= $gift->count) {
                                        if ($gift->min_price != null && $gift->min_price != 0) {
                                            if ($gift->min_price <= $order->price) {
                                                $price = calculatePrice($order->price, $gift->percent);
                                                $giftCode = $gift->gift_code;
                                                $giftPercent = $gift->percent;
                                                $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => (int)$price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode]);
                                                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                                getDetailOrder($orderItem);
                                                if ($orderUpdate->status == true) {
                                                    db('discount_order')->parent('gift_cart', $gift->id)->storeRecord(['user' => $user->record_id, 'order' => $order->id]);

                                                    sendSoketByDriver($orderItem, 'update_order');

                                                    return response()->api($gift, '', 200);
                                                } else {
                                                    return response()->api(null, $orderUpdate->message, 400);
                                                }
                                            } else {
                                                return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                            }
                                        } elseif ($gift->min_price == null || $gift->min_price == 0) {
                                            $price = calculatePrice($order->price, $gift->percent);
                                            $giftCode = $gift->gift_code;
                                            $giftPercent = $gift->percent;
                                            $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => (int)$price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode]);
                                            $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                            getDetailOrder($orderItem);
                                            if ($orderUpdate->status == true) {
                                                db('discount_order')->parent('gift_cart', $gift->id)->storeRecord(['user' => $user->record_id, 'order' => $order->id]);

                                                sendSoketByDriver($orderItem, 'update_order');
                                                return response()->api($gift, '', 200);
                                            } else {
                                                return response()->api(null, $orderUpdate->message, 400);
                                            }
                                        }
                                    } else {
//                                        $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                        return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                    }
                                } elseif ($gift->count == null || $gift->count == 0) {
                                    if ($gift->min_price != null && $gift->min_price != 0) {
                                        if ($gift->min_price <= $order->price) {
                                            $price = calculatePrice($order->price, $gift->percent);
                                            $giftCode = $gift->gift_code;
                                            $giftPercent = $gift->percent;
                                            $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => (int)$price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode]);
                                            $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                            getDetailOrder($orderItem);
                                            if ($orderUpdate->status == true) {
                                                db('discount_order')->parent('gift_cart', $gift->id)->storeRecord(['user' => $user->record_id, 'order' => $order->id]);

                                                sendSoketByDriver($orderItem, 'update_order');

//                            sendNotification($orderItem->driver->notif_token, 'update_order', $orderItem, 'success', true);

                                                return response()->api($gift, '', 200);
                                            } else {
                                                return response()->api(null, $orderUpdate->message, 400);
                                            }
                                        } else {
                                            return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                        }
                                    } elseif ($gift->min_price == null || $gift->min_price == 0) {
                                        $price = calculatePrice($order->price, $gift->percent);
                                        $giftCode = $gift->gift_code;
                                        $giftPercent = $gift->percent;
                                        $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => (int)$price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode]);
                                        $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                        getDetailOrder($orderItem);
                                        if ($orderUpdate->status == true) {
                                            db('discount_order')->parent('gift_cart', $gift->id)->storeRecord(['user' => $user->record_id, 'order' => $order->id]);
                                            sendSoketByDriver($orderItem, 'update_order');
                                            return response()->api($gift, '', 200);
                                        } else {
                                            return response()->api(null, $orderUpdate->message, 400);
                                        }
                                    }
                                }
                            }
                        }


                    } else {
                        return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                    }
                } else {
                    return response()->api(null, __('کد تخفیف برای شما فعال است.'), 400);
                }
//                else {
//                    if ($gift != null) {
//                        foreach ($gift->service as $service) {
//                            if ($service->type->id == $order->delivery_id->type->id) {
//                                if ($gift->count != null && $gift->count != 0) {
//                                    if ($countUse <= $gift->count) {
//                                        if ($gift->min_price != null && $gift->min_price != 0) {
//                                            if ($gift->min_price <= $order->price) {
//                                                $price = calculateMainPrice($order->price, $gift->percent);
//                                                $giftCode = $gift->gift_code;
//                                                $giftPercent = $gift->percent;
//                                                $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => $price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode]);
//                                                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
//                                                getDetailOrder($orderItem);
//                                                if ($orderUpdate->status == true) {
//                                                    sendSoketByDriver($orderItem, 'update_order');
//
////                            sendNotification($orderItem->driver->notif_token, 'update_order', $orderItem, 'success', true);
//
//                                                    return response()->api($orderItem, '', 200);
//                                                } else {
//                                                    return response()->api($orderItem, $orderUpdate->message, 400);
//                                                }
//                                            } else {
//                                                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
//                                                return response()->api($orderItem, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
//                                            }
//                                        } elseif ($gift->min_price == null || $gift->min_price == 0) {
//                                            $price = calculateMainPrice($order->price, $gift->percent);
//                                            $giftCode = $gift->gift_code;
//                                            $giftPercent = $gift->percent;
//                                            $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => $price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode]);
//                                            $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
//                                            getDetailOrder($orderItem);
//                                            if ($orderUpdate->status == true) {
//                                                sendSoketByDriver($orderItem, 'update_order');
//                                                return response()->api($orderItem, '', 200);
//                                            } else {
//                                                return response()->api($orderItem, $orderUpdate->message, 400);
//                                            }
//                                        }
//                                    } else {
//                                        $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
//                                        return response()->api($orderItem, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
//                                    }
//                                } elseif ($gift->count == null || $gift->count == 0) {
//                                    if ($gift->min_price != null && $gift->min_price != 0) {
//                                        if ($gift->min_price <= $order->price) {
//                                            $price = calculateMainPrice($order->price, $gift->percent);
//                                            $giftCode = $gift->gift_code;
//                                            $giftPercent = $gift->percent;
//                                            $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => $price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode]);
//                                            $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
//                                            getDetailOrder($orderItem);
//                                            if ($orderUpdate->status == true) {
//                                                sendSoketByDriver($orderItem, 'update_order');
//
////                            sendNotification($orderItem->driver->notif_token, 'update_order', $orderItem, 'success', true);
//
//                                                return response()->api($orderItem, '', 200);
//                                            } else {
//                                                return response()->api($orderItem, $orderUpdate->message, 400);
//                                            }
//                                        } else {
//                                            $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
//                                            return response()->api($orderItem, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
//                                        }
//                                    } elseif ($gift->min_price == null || $gift->min_price == 0) {
//                                        $price = calculateMainPrice($order->price, $gift->percent);
//                                        $giftCode = $gift->gift_code;
//                                        $giftPercent = $gift->percent;
//                                        $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => $price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode]);
//                                        $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
//                                        getDetailOrder($orderItem);
//                                        if ($orderUpdate->status == true) {
//                                            sendSoketByDriver($orderItem, 'update_order');
//                                            return response()->api($orderItem, '', 200);
//                                        } else {
//                                            return response()->api($orderItem, $orderUpdate->message, 400);
//                                        }
//                                    }
//                                }
//                            }
//                        }
//
//
//                    } else {
//                        $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
//                        return response()->api($orderItem, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
//                    }
//                }
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }

        return response()->api(null, __('خطا'), 400);
    }


    function checkGift(Request $request)
    {
        try {
            $user = $request->user();

            $gift = db('gift_cart')->where('gift_code', $request->code)->whereDate('expire_date', '>=', Carbon::today())->firstRecord();
            $countUse = db('discount_order')->parent('gift_cart', $gift->id)->getRecords()->count();
            $order = db('orders')->where('id', $request->id)->where('user', $user->record_id)->firstRecord();

            $percent = 0;
            if ($gift != null) {
                foreach ($gift->service as $service) {
                    if ($service->type->id == $order->delivery_id->type->id) {
                        if ($gift->count != null && $gift->count != 0) {
                            if ($countUse <= $gift->count) {
                                if ($gift->min_price != null && $gift->min_price != 0) {
                                    if ($gift->min_price <= $order->price) {
                                        return response()->api($gift, '', 200);
                                    } else {
                                        return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                    }
                                } else {
                                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                    return response()->api($orderItem, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                }
                            } elseif ($gift->min_price == null || $gift->min_price == 0) {

                                return response()->api($gift, '', 200);

                            }
                        } else {
                            return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                        }
                    } elseif ($gift->count == null || $gift->count == 0) {
                        if ($gift->min_price != null && $gift->min_price != 0) {
                            if ($gift->min_price <= $order->price) {

                                return response()->api($gift, '', 200);
                            } else {
                                return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                            }
                        } elseif ($gift->min_price == null || $gift->min_price == 0) {

                            return response()->api($gift, '', 200);
                        }
                    }
                }
            } else {
//                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                return response()->api(0, __(' کد تخفیف معتبر نیست.'), 400);

            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }


    function checkGiftBeforStore(Request $request)
    {
        try {
            $user = $request->user();
            $gift = db('gift_cart')->where('gift_code', $request->code)->whereDate('expire_date', '>=', Carbon::today())->firstRecord();
            $countUse = db('discount_order')->parent('gift_cart', $gift->id)->getRecords()->count();
            // $order = db('orders')->where('id', $request->id)->where('user', $user->record_id)->firstRecord();

            $percent = 0;
            if ($gift != null) {
                foreach ($gift->service as $service) {
                    if ($service->type->id == $request->delivery_id) {
                        if ($gift->count != null && $gift->count != 0) {
                            if ($countUse <= $gift->count) {
                                if ($gift->min_price != null && $gift->min_price != 0) {
                                    if ($gift->min_price <= $request->price) {
                                        return response()->api($gift, '', 200);
                                    } else {
                                        return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                    }
                                } else {
//                                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                    return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                }
                            } elseif ($gift->min_price == null || $gift->min_price == 0) {

                                return response()->api($gift, __('کد تخفیف اعمال شد.'), 200);

                            }
                        } else {
                            return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                        }
                    } elseif ($gift->count == null || $gift->count == 0) {
                        if ($gift->min_price != null && $gift->min_price != 0) {
                            if ($gift->min_price <= $request->price) {

                                return response()->api($gift, __('کد تخفیف اعمال شد.'), 200);
                            } else {
                                return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                            }
                        } elseif ($gift->min_price == null || $gift->min_price == 0) {

                            return response()->api($gift, __('کد تخفیف اعمال شد.'), 200);
                        }
                    }
                }
            } else {
//                $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                return response()->api(0, __(' کد تخفیف معتبر نیست.'), 400);

            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getTraceAsString());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function setGiftCode(Request $request)
    {
        try {
            $user = $request->user();
            $order = db('orders')->where('id', $request->id)->where('user', $user->record_id)->firstRecord();
            $gift = db('gift_cart')->where('gift_code', $request->code)->whereDate('expire_date', '>=', Carbon::today())->firstRecord();
            $countUse = db('discount_order')->parent('gift_cart', $gift->id)->where("order", "!=", null)->getRecords()->count();
            if ($order != null) {
                if ($gift != null) {
                    foreach ($gift->service as $service) {
                        if ($service->type->id == $order->delivery_id->type->id) {
                            if ($gift->count != null && $gift->count != 0) {
                                if ($countUse <= $gift->count) {
                                    if ($gift->min_price != null && $gift->min_price != 0) {
                                        if ($gift->min_price <= $order->price) {
                                            $price = calculatePrice($order->price, $gift->percent);
                                            $giftCode = $gift->gift_code;
                                            $giftPercent = $gift->percent;
                                            $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => (int)$price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode, 'discounted_price' => $order->price]);
                                            $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                            getDetailOrder($orderItem);
                                            if ($orderUpdate->status == true) {
                                                // sendNotification($orderItem->delivery_id->token, 'update_order_list', $orderItem, 'success', true);
                                                db('discount_order')->parent('gift_cart', $gift->id)->storeRecord(['user' => $user->record_id, 'order' => $order->id]);
                                                return response()->api($gift, '', 200);
                                            } else {
                                                return response()->api($gift, $orderUpdate->message, 400);
                                            }
                                        } else {
                                            return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                        }
                                    } elseif ($gift->min_price == null || $gift->min_price == 0) {
                                        $price = calculatePrice($order->price, $gift->percent);
                                        $giftCode = $gift->gift_code;
                                        $giftPercent = $gift->percent;
                                        $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => (int)$price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode, 'discounted_price' => $order->price]);
                                        $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                        getDetailOrder($orderItem);
                                        if ($orderUpdate->status == true) {
                                            // sendNotification($orderItem->delivery_id->token, 'update_order_list', $orderItem, 'success', true);
                                            db('discount_order')->parent('gift_cart', $gift->id)->storeRecord(['user' => $user->record_id, 'order' => $order->id]);
                                            return response()->api($gift, '', 200);
                                        } else {
                                            return response()->api(null, $orderUpdate->message, 400);
                                        }
                                    }
                                } else {
                                    return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                }
                            } elseif ($gift->count == null || $gift->count == 0) {
                                if ($gift->min_price != null && $gift->min_price != 0) {
                                    if ($gift->min_price <= $order->price) {
                                        $price = calculatePrice($order->price, $gift->percent);
                                        $giftCode = $gift->gift_code;
                                        $giftPercent = $gift->percent;
                                        $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => (int)$price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode, 'discounted_price' => $order->price]);
                                        $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                        getDetailOrder($orderItem);
                                        if ($orderUpdate->status == true) {
                                            // sendNotification($orderItem->delivery_id->token, 'update_order_list', $orderItem, 'success', true);
                                            db('discount_order')->parent('gift_cart', $gift->id)->storeRecord(['user' => $user->record_id, 'order' => $order->id]);

                                            return response()->api($gift, '', 200);
                                        } else {
                                            return response()->api(null, $orderUpdate->message, 400);
                                        }
                                    } else {
                                        return response()->api($gift, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                                    }
                                } elseif ($gift->min_price == null || $gift->min_price == 0) {
                                    $price = calculatePrice($order->price, $gift->percent);
                                    $giftCode = $gift->gift_code;
                                    $giftPercent = $gift->percent;
                                    $orderUpdate = db('orders')->where('id', $order->id)->where('user', $user->record_id)->updateRecord(['price' => (int)$price, 'percent_discount' => $giftPercent, 'percent_code' => $giftCode]);
                                    $orderItem = db('orders')->withRelations(['status', 'path_info'])->findRecord($order->id);
                                    getDetailOrder($orderItem);
                                    if ($orderUpdate->status == true) {
                                        // sendNotification($orderItem->delivery_id->token, 'update_order_list', $orderItem, 'success', true);
                                        db('discount_order')->parent('gift_cart', $gift->id)->storeRecord(['user' => $user->record_id, 'order' => $order->id]);

                                        return response()->api($gift, '', 200);
                                    } else {
                                        return response()->api(null, $orderUpdate->message, 400);
                                    }
                                }
                            }
                        }
                    }


                } else {
                    return response()->api(null, __('امکان استفاده از کد تخفیف وجود ندارد.'), 400);
                }
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

}
