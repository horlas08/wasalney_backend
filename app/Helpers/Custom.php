<?php

use Illuminate\Http\Request;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use KMLaravel\GeographicalCalculator\Facade\GeographicalCalculatorFacade;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


function checkPvFile($catSlug, $fieldName, $fileName)
{
    $user = request()->user();

    return true;
}


function changeFieldImport($lang, $slug, $field, $row)
{

    return $row[$field->title];


}

function changeRequestImport($lang, $slug, $fields, $request)
{

    return $request;
}

function beforeValidationStore(Request $request, $lang, $slug, $parentSlug, $parentId)
{

    if (false) {
        $result['status'] = false;
        $result['message'] = getAlertError();
        $result['data'] = $request->toArray();
        return (object)$result;
    }
    $result['status'] = true;
    $result['message'] = getAlertSuccess();
    $result['data'] = $request;
    return (object)$result;

}

function beforeStore(Request $request, $lang, $slug, $parentSlug, $parentId)
{
    if (false) {
        $result['status'] = false;
        $result['message'] = getAlertError();
        $result['data'] = $request->toArray();
        return (object)$result;
    }

    if ($slug == 'agency_admin') {
        $request['password'] = \Hash::make($request['password']);
        $request['level'] = 1;
    }
    $result['status'] = true;
    $result['message'] = getAlertSuccess();
    $result['data'] = $request;
    return (object)$result;
}

function afterStore(Request $request, $lang, $slug, $parentSlug, $parentId, $record)
{
    if (false) {
        $result['status'] = false;
        $result['message'] = getAlertError();
        $result['data'] = $record;
        return (object)$result;
    }

    if ($slug == 'generate_code') {
        for ($i=0;$i<$request->count;$i++){
            $randnum = rand(1111111111,9999999999);
            db('info_code')->parent('generate_code',$record->id)->storeRecord(['code'=>$randnum,'price'=>$request->price]);
        }
    }
        if ($slug == 'generate_code_driver') {
        for ($i=0;$i<$request->count;$i++){
            $randnum = rand(1111111111,9999999999);
            db('info_code_driver')->parent('generate_code_driver',$record->id)->storeRecord(['code'=>$randnum,'price'=>$request->price]);
        }
    }

    if($slug=='car_details'){
        $driver=db('drivers')->where('id',$record->parent_id)->updateRecord(['car_details',$record->id]);
    }
        if ($slug == 'admin_message') {
        foreach ($record->driver as $value){
            sendNotification($value->fcm_token, 'new_message', $record, 'success', true);

        }
    }

    $result['status'] = true;
    $result['message'] = getAlertSuccess();
    $result['data'] = $record;
    return (object)$result;

}

function beforeValidationUpdate(Request $request, $lang, $slug, $id)
{
    if (false) {
        $result['status'] = false;
        $result['message'] = getAlertError();
        $result['data'] = $request->toArray();
        return (object)$result;
    }
    $result['status'] = true;
    $result['message'] = getAlertSuccess();
    $result['data'] = $request;
    return (object)$result;
}

function beforeUpdate(Request $request, $lang, $slug, $id)
{
//    dd($request);
    if (false) {
        $result['status'] = false;
        $result['message'] = getAlertError();
        $result['data'] = $request->toArray();
        return (object)$result;
    }
    $result['status'] = true;
    $result['message'] = getAlertSuccess();
    $result['data'] = $request;
    return (object)$result;
}

function afterUpdate(Request $request, $lang, $slug, $id, $record)
{
    if (false) {
        $result['status'] = false;
        $result['message'] = getAlertError();
        $result['data'] = $record;
        return (object)$result;
    }
    if($slug=='car_details'){
        $driver=db('drivers')->where('id',$record->parent_id)->updateRecord(['car_details',$record->id]);
    }
        if ($slug == 'account_check') {
        if($record->state->id==1){
            $wallet = db('wallet')->parent("drivers", $record->user->id)->storeRecord(['type' => 2, 'price' => $record->price, 'title' => 'تسوية الحساب مع تاون', 'order' => null]);
            sendNotification($record->user->fcm_token, 'update_wallet', $wallet->data, 'success', true);
        }
    }
    $result['status'] = true;
    $result['message'] = getAlertSuccess();
    $result['data'] = $record;
    return (object)$result;
}

function beforeDelete($lang, $slug, $id)
{
    if (false) {
        $result['status'] = false;
        $result['message'] = getAlertError();
        $result['data'] = null;
        return (object)$result;
    }
    $result['status'] = true;
    $result['message'] = getAlertSuccess();
    $result['data'] = null;

    return (object)$result;
}

function afterDelete($lang, $slug, $id, $record)
{
    if (false) {
        $result['status'] = false;
        $result['message'] = getAlertError();
        $result['data'] = $record;
        return (object)$result;
    }
    $result['status'] = true;
    $result['message'] = getAlertSuccess();
    $result['data'] = $record;
    return (object)$result;
}

//soket for driver/agency
function sendSoketStore($orderItem, $serviceId)
{
    $drivers = db('drivers')->where('state_approval', 2)->where('type_activity', $serviceId)->getRecords();
    // if($driver->mobile!='07509870378'){
    // if ($orderItem->agency == null) {
        if ($drivers != []) {
            foreach ($drivers as $driver) {
                if ($driver->lat != null && $driver->long != null) {
                    $distance = (getDistanceBetweenPoints($driver->lat, $driver->long, $orderItem->origin_lat, $orderItem->origin_long)) * 1000;

                    $limit = db('limit')->findRecord(2);

                    if ($distance <= $limit->meter) {
                        db('drivers_send')->parent('orders',$orderItem->id)->storeRecord(['driver' => $driver->id]);
                        if ($driver->fcm_token!=null)
                        sendNotification($driver->fcm_token, 'add_order', $orderItem, 'success', true, 0, 1);

                    }
                }
            }

        }
    // }
    // } else {
    //     $agency = $orderItem->agency->notif_token;
    //     sendNotification($agency, 'add_order', $orderItem, 'success', true, 0, 1);
    // }
}

function getAdmin()
{
    return Auth::guard('admin')->user();
}

function sendSoketByDriver($orderItem, $type)
{
    // if ($orderItem->agency == null) {
        sendNotification($orderItem->driver->fcm_token, $type, $orderItem, 'success', true, 0, 1);
    // } else {
    //     $agency = $orderItem->agency->notif_token;
    //     sendNotification($agency, $type, $orderItem, 'success', true, 0, 1);
    // }
}

function sendSoket($orderItem, $type)
{
    if ($orderItem->agency == null) {
        // sendNotification($orderItem->delivery_id->token, $type, $orderItem, 'success', true, 0, 1);
    } else {
        $agency = $orderItem->agency->notif_token;
        sendNotification($agency, $type, $orderItem, 'success', true, 0, 1);
    }
}

function sendSoketDelivery($orderItem)
{
    if ($orderItem->agency == null) {
        sendNotification($orderItem->delivery_id->token, 'update_order_list', $orderItem, 'success', true);
    } else {
        $agency = $orderItem->agency->notif_token;
        sendNotification($agency, 'update_order', $orderItem, 'success', true, 0, 1);
    }
}

//get address with lat and long

//function findAddress($lat, $long)
//{
//    $client = new \GuzzleHttp\Client();
//    $headers = [
//        'x-api-key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImYzODIxMTVkNDYyNTBhYjMxMTY4YTYwYTNmYTg1ZTFlMDllOWRkY2ZiZmIwN2YzZTk5YTE1NGQ1ZGMxZWM5YjgwNmU0OTAzN2QwYzI4MmI0In0.eyJhdWQiOiIyNTIxMSIsImp0aSI6ImYzODIxMTVkNDYyNTBhYjMxMTY4YTYwYTNmYTg1ZTFlMDllOWRkY2ZiZmIwN2YzZTk5YTE1NGQ1ZGMxZWM5YjgwNmU0OTAzN2QwYzI4MmI0IiwiaWF0IjoxNzAxNjg3OTA2LCJuYmYiOjE3MDE2ODc5MDYsImV4cCI6MTcwNDE5MzUwNiwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.gVbaqZoXHPl9OkKqud5D-NGMwWQFVFxWrpmYnhYpQe99kGSl81vme7VxqpyXT9A8UrmF7VlX_n7uNDhpyxZQyAUrBtYJZZ10GGUV16KlPU16Cju7Dpb9PA6LwkR0ZLbeH-nd7mqk58gF5BUIDE-9oFEXPVbSla1LEqsRbf_oGnwdnIhsCgJ5Tg3vAs07WEET2m-euwhhnkbrLtvDbcdRqtXrmzlx3BDxJXtOdMQVq-KGCijjLO6aSnvaZJx_tO5i3gFhx3rpGahTPS8mSQTVWx0wqdpbcirbLn645nZ0_KS9inNi5Dp0Blfs1ica6lgFs0yP2G5_SVClpKXZZRgggA'
//    ];
//    $request = new \GuzzleHttp\Psr7\Request('GET', 'https://map.ir/reverse?lat=' . $lat . '&lon=' . $long, $headers);
//    $res = $client->sendAsync($request)->wait();
//    $result = json_decode($res->getBody(), true);
//    return $result;
//
//}
function findAddress($lat, $long)
{
    $client = new \GuzzleHttp\Client();


    $request = new \GuzzleHttp\Psr7\Request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $long.'&key=AIzaSyB3PjQjbvfT990ovxDSaUHbywxJEKkd7Yc&language=Ar');
    $res = $client->sendAsync($request)->wait();
    $result = json_decode($res->getBody(), true);

    $address = $result['results'];
//        $p = $result['province'];
//        $c = $result['city'] != '' ? $result['city'] : $p;
//        $province = Province::whereHas('Cities', function ($query) {
//            $query->where('covered', 1);
//        })->where('name', 'Like', '%' . $p . '%')->first();
//        $city = $province == null ? null : City::where('covered', 1)->where('province_id', $province->id)->where('name', 'Like', '%' . $c . '%')->first();
    $province=null;
    $city=null;
    $address_result = array();
 
    foreach ($address as $a){
        // return $a['types'];
        if (in_array("route", $a['types'])){
            // if($type=="route"){
                $address_result['address'] = $a['formatted_address'];
            // }
        
        }
        else{
              $address_result['address'] = $address[0]['formatted_address'];
        }
     
    }
//    $address_result['address'] = $address;
    $address_result['province'] = $province != null ? $province->id : null;
    $address_result['city'] = $city != null ? $city->id : null;
    return $address_result;

}
//search live address
function searchAddress($text)
{
//    return $text;
    $client = new \GuzzleHttp\Client();
//    $headers = [
//        'x-api-key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImYzODIxMTVkNDYyNTBhYjMxMTY4YTYwYTNmYTg1ZTFlMDllOWRkY2ZiZmIwN2YzZTk5YTE1NGQ1ZGMxZWM5YjgwNmU0OTAzN2QwYzI4MmI0In0.eyJhdWQiOiIyNTIxMSIsImp0aSI6ImYzODIxMTVkNDYyNTBhYjMxMTY4YTYwYTNmYTg1ZTFlMDllOWRkY2ZiZmIwN2YzZTk5YTE1NGQ1ZGMxZWM5YjgwNmU0OTAzN2QwYzI4MmI0IiwiaWF0IjoxNzAxNjg3OTA2LCJuYmYiOjE3MDE2ODc5MDYsImV4cCI6MTcwNDE5MzUwNiwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.gVbaqZoXHPl9OkKqud5D-NGMwWQFVFxWrpmYnhYpQe99kGSl81vme7VxqpyXT9A8UrmF7VlX_n7uNDhpyxZQyAUrBtYJZZ10GGUV16KlPU16Cju7Dpb9PA6LwkR0ZLbeH-nd7mqk58gF5BUIDE-9oFEXPVbSla1LEqsRbf_oGnwdnIhsCgJ5Tg3vAs07WEET2m-euwhhnkbrLtvDbcdRqtXrmzlx3BDxJXtOdMQVq-KGCijjLO6aSnvaZJx_tO5i3gFhx3rpGahTPS8mSQTVWx0wqdpbcirbLn645nZ0_KS9inNi5Dp0Blfs1ica6lgFs0yP2G5_SVClpKXZZRgggA'
//    ];
    $request = new \GuzzleHttp\Psr7\Request('GET', 'https://maps.googleapis.com/maps/api/place/textsearch/json?query='. $text .'&key=AIzaSyB3PjQjbvfT990ovxDSaUHbywxJEKkd7Yc&language=Ar');
    $res = $client->sendAsync($request)->wait();
    $result = json_decode($res->getBody(), true);
    return $result['results'];

}

//محاسبه قیمت با کم شدن درصد کمیسیون
function calculateCashPrice($percent, $price)
{
    $comois = (int)($price * ($percent / 100));
    $finalPrice = ($price) - $comois;
    return $finalPrice;

}

//محاسبه مقدار کمیسیون
function calculateProfitPrice($price, $cashPrice)
{
    $finalPrice = ($price - $cashPrice);

    return $finalPrice;

}


function driverCredit($array)
{
    $priceInc = 0;
    $priceDec = 0;
    $price = 0;
    foreach ($array as $value) {
        if ($value->type->id == 1 || $value->type->id == 3)
            $priceInc += $value->price;
        if ($value->type->id == 2)
            $priceDec += $value->price;
    }
    $price = $priceInc - $priceDec;
    return $price;
}

function removable($id){
    $orders=db('orders')->where('driver',$id)->where('pay_type','!=',1)->getRecords();
    $price=0;
    if($orders!=[]){
        foreach ($orders as $order){
            $price+=$order->net_price;
        }
    }
    return $price;
}

function saveCredit($slug, $userId)
{
    $infoUser = db('wallet')->parent($slug, $userId)->getRecords();
    $credit = driverCredit($infoUser->wallet);
    db($slug)->where('id', $userId)->updateRecord(['credit' => $credit]);

}

//function calculatePriceByDate($user,$date){
//    Carbon\Carbon::today();
//    db('orders')->where('driver',$user)->whereDate('created_at','=',$)
//}
//function calculatePrice
function getToday()
{
    $today = Carbon::today();
    return $today;
}

function getDateDay($day)
{
    $result = Carbon::now()->subDays($day);
    return $result;
}

function getDateMonth($month)
{
    $result = Carbon::now()->subMonth($month);
    return $result;
}

function dailyReport($driver, $day)
{

    $results = array();
    $results['price'] = 0;
    $date = array();
    $distance = 0;
    $wallet = db('wallet')->parent("drivers", $driver)->where('type', 1)->whereDate('created_at', $day)->getRecords();
    $driverOrder = db('orders')->where('driver', $driver)->whereDate('created_at', $day)->getRecords();
    foreach ($driverOrder as $value) {
        $distance += getDistanceBetweenPoints($value->origin_lat, $value->origin_long, $value->destination_lat, $value->destination_long);
    }

    $results['distance'] = $distance;
    $results['accepted'] = $driverOrder->count();
    $orders = db('orders')->whereDate('created_at', $day)->getRecords()->count();
    if ($orders != 0)
        $results['percent'] = round(($results['accepted'] / $orders) * 100);
    else
        $results['percent'] = 0;
    $results['canceled'] = db('cancel_driver')->parent('drivers', $driver)->whereDate('created_at', $day)->getRecords()->count();
    if ($wallet != []) {
        foreach ($wallet as $value) {
            $results['price'] += $value->price;
        }
    }
    $dateClass = $day;
    $date['preview'] = $dateClass->format('Y/m/d');
    $date['time'] = '12:00:00';
    $date['main'] = '12';
    $date['year'] = $dateClass->format('Y');
    $date['month'] = $dateClass->format('m');
    $date['day'] = $dateClass->format('d');
    $date['dayOfWeek'] = $dateClass->dayOfWeek;
    $results['date'] = $date;
    return (object)$results;
}

function monthReport($driver, $startMonth, $endMonth)
{
    $results = array();
    $results['price'] = 0;
    $distance = 0;
    $wallet = db('wallet')->parent("drivers", $driver)->where('type', 1)->whereBetween('created_at', [$startMonth, $endMonth])->getRecords();
    $ordersDriver = db('orders')->where('driver', $driver)->whereBetween('created_at', [$startMonth, $endMonth])->getRecords();
    Storage::disk('file')->append('logApi.txt', db('orders')->where('driver', $driver)->getRecords());

    foreach ($ordersDriver as $value) {
        $distance += getDistanceBetweenPoints($value->origin_lat, $value->origin_long, $value->destination_lat, $value->destination_long);
    }
    $results['distance'] = $distance;
    $results['accepted'] = $ordersDriver->count();
    $orders = db('orders')->whereBetween('created_at', [$startMonth, $endMonth])->getRecords()->count();
    if ($orders != 0)
        $results['percent'] = round(($results['accepted'] / $orders) * 100);
    else
        $results['percent'] = 0;
    $results['canceled'] = db('cancel_driver')->parent('drivers', $driver)->whereBetween('created_at', [$startMonth, $endMonth])->getRecords()->count();
    if ($wallet != null) {
        foreach ($wallet as $value) {
            $results['price'] += $value->price;

        }
    }
//    else{
//    $dateClass = Jalalian::fromCarbon($startMonth);
    $date['preview'] = $startMonth->format('Y/m/d');
    $date['year'] = $startMonth->format('Y');
    $date['month'] = $startMonth->format('m');
    $date['day'] = $startMonth->format('d');
    $date['dayOfWeek'] = $startMonth->dayOfWeek;
    $results['date'] = $date;
//    }
    return (object)$results;
}

function distanceCalculate($start, $end)
{

    //$start, $end
    $orders = db('orders')->whereBetween('created_at', [$start, $end])->getRecords();
    $distance = array();
    if ($orders != [])
        foreach ($orders as $order) {
//        $paths=db('path_info')->parent("orders", $order->id)->getRecords();
//        foreach ($paths as $path){
            $distance = GeographicalCalculatorFacade::initCoordinates($order->origin_lat, $order->origin_long, $order->destination_lat, $order->destination_long, ['units' => ['km']])->getDistance();
//        }

//    }
            return $distance;
        }
}



function unremovable($userId)
{
    $walletInc = db('wallet')->parent("drivers", $userId)->where('type', 1)->latest()->take(5)->getRecords();
    $walletDec = db('wallet')->parent("drivers", $userId)->where('type', 2)->latest()->take(5)->getRecords();
    $priceInc = 0;
    $priceDec = 0;
    $price = 0;
    if ($walletInc != []) {
        foreach ($walletInc as $value) {
            $priceInc += $value->price;
        }
    }
    if ($walletDec != []) {
        foreach ($walletDec as $value) {
            $priceDec += $value->price;
        }
    }
    $price = $priceInc - $priceDec;

    return $price;
}

function calculatePrice($price, $percent)
{
    $p = 1 - ($percent / 100);
    $afterPrice = $p * $price;
    return $afterPrice;
}

function calculateMainPrice($price, $percent)
{
    $p = 1 - ($percent / 100);
    $beforPrice = $price / $p;
    return $beforPrice;
}

function calculateDisPrice($orderId)
{
    $order = db('orders')->findRecord($orderId);
    $gift = db('gift_cart')->where('service', $order->delivery_id->id)->whereDate('date', '>=', Carbon::today())->firstRecord();

    $price = $order->price;
    if ($gift) {
        $price = calculatePrice($order->price, $gift->percent);
        return $price;

    }
    return $price;
}

function checkFavorite($orderId, $userId)
{
    $order = db('orders')->findRecord($orderId);
    $favoriteOrigin = db('favorite_place')->where('user', $userId)->where('lat', $order->origin_lat)->where('long', $order->origin_long)->firstRecord();
    $favoriteDes = db('favorite_place')->where('user', $userId)->where('lat', $order->destination_lat)->where('long', $order->destination_long)->firstRecord();

    if ($favoriteOrigin != null && $favoriteDes != null) {
        $repetitive = db('repetitive_routes')->where('origin', $favoriteOrigin->id)->where('destination', $favoriteDes->id)->where('user', $userId)->firstRecord();
        if ($repetitive == null) {
            db('repetitive_routes')->storeRecord(['origin' => $favoriteOrigin->id, 'destination' => $favoriteDes->id, 'count' => 1, 'user' => $userId, 'delivery' => 8]);
        } else {
            $count = $repetitive->count;
            db('repetitive_routes')->where('id', $repetitive->id)->updateRecord(['count' => $count + 1]);
        }
    }
}


function calulateRate($deiverId)
{
    $sumRate = 0;
    $avg = 0;
    $orders = db('orders')->where('driver', $deiverId)->whereNotNull('driver_rate')->getRecords();
    if (count($orders) != 0) {
        $countOrders = count($orders);
        foreach ($orders as $order) {
            $sumRate += $order->driver_rate;
        }
        $avg = $sumRate / $countOrders;
        return round($avg, 2);
    } else {
        return 0;
    }
}

function createIntroCode()
{

}

function getDetailOrder($order)
{
        try {
    if ($order->delivery_id->type->id > 3) {
        $order->truckDetails = db('moving_order_details')->where('order_id', $order->id)->withRelations(['equipment_detail'])->firstRecord();
        $order->motorDetails = null;
    } elseif ($order->delivery_id->type->id == 2) {
        $order->motorDetails = db('order_motor_details')->where('order_id', $order->id)->firstRecord();
        $order->truckDetails = null;
    } else {
        $order->motorDetails = null;
        $order->truckDetails = null;
    }
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
}

function infoUser($infoUser)
{

    if ($infoUser->name != null && $infoUser->code_meli != null && $infoUser->type_activity != null) {

        $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_info_user' => true]);

    } else {

        $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_info_user' => false]);

    }

    if ($infoUser->documents != []) {
        foreach ($infoUser->documents as $value)
            if ($value->on_car_card != null && $value->back_car_card != null && $value->on_car_card != null)
                $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_documents' => true]);
//                            $infoUser->hasDocument = true;
            else
                $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_documents' => false]);
//                            $infoUser->hasDocument = false;
    } else {
        $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_documents' => false]);
    }


    if ($infoUser->car_details != []) {
        foreach ($infoUser->car_details as $value)
            if ($value->color != null && $value->car_tag != null && $value->fuel_type != null && $value->vin != null && $value->year_made != null && $value->model != null)
                $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_car_details' => true]);
            else
                $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_car_details' => false]);

    } else {
        $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_car_details' => false]);

    }

    if ($infoUser->certificate_validity != null && $infoUser->certificate_type != null && $infoUser->certificat_date != null && $infoUser->number_licence != null) {
        $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_profile' => true]);
    } else {
        $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_profile' => false]);
    }


    if ($infoUser->info_bank != []) {
        foreach ($infoUser->info_bank as $value)
            if ($value->cart_number != null && $value->shaba != null && $value->name != null && $value->bank != null)
                $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_info_bank' => true]);

            else
                $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_info_bank' => false]);


    } else
        $d = db('drivers')->where('id', $infoUser->id)->updateRecord(['has_info_bank' => false]);

    $driver = db('drivers')->withRelations(['documents', 'car_details', 'wallet', 'info_bank'])->findRecord($d->data->id);

    $driver->credit = driverCredit($infoUser->wallet);
    $driver->unremovable =removable($driver->id)- driverCredit($driver->wallet);
    $driver->removable = removable($infoUser->id);
    $driver->yesterday_statistics = dailyReport($infoUser->id, getDateDay(1));

    return $driver;
}

function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2)
{
    $theta = $lon1 - $lon2;
    $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) +
        (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
    $miles = acos($miles);
    $miles = rad2deg($miles);
    $miles = $miles * 60 * 1.1515;
    $kilometers = round($miles * 1.609344);
    return $kilometers;
}

function checkIntroCode($code)
{
    if ($code != null) {
        $introUser = Str::contains($code, 'c');
        $introDriver = Str::contains($code, 'p');
        if ($introUser == true) {
            $user = db('users')->where('code', $code)->firstRecord();
            if ($user != null)
                setRate(1, 'users', $user->id);
        } else {
            if ($introDriver == true) {
                $driver = db('drivers')->where('code', $code)->firstRecord();
                if ($driver != null)
                    setRate(2, 'drivers', $driver->id);
            }
        }
    }
}

function rateOrder($slug, $userId, $price)
{
    $condition_rate = db('condition_rate')->findRecord(1);
    $count = ($price / $condition_rate->price);
    $roundCount = round($count, 2);
    if ($roundCount >= 1) {
        if ($slug == 'users') {
            setRate(3, 'users', $userId, $roundCount);
            $user = db('users')->findRecord($userId);
            if ($user->intro_code != null) {
                $otherUser = db('users')->where('code', $user->intro_code)->firstRecord();
                if ($otherUser != null) {
                    setRate(5, 'users', $otherUser->id, $roundCount);
                }
            }

        } else if ($slug == 'drivers') {
            setRate(4, 'drivers', $userId, $roundCount);
            $driver = db('drivers')->findRecord($userId);
            if ($driver->intro_code != null) {
                $otherDriver = db('drivers')->where('code', $driver->intro_code)->firstRecord();
                if ($otherDriver != null) {
                    setRate(6, 'drivers', $otherDriver->id, $roundCount);
                }

            }
        }
    }
}

function setRate($rateId, $parentSlug, $userId, $count = null)
{
    $rate = db('rate')->findRecord($rateId);
    $user = db($parentSlug)->findRecord($userId);
    if ($count == null) {
        $setRate = db('rate_user')->parent($parentSlug, $userId)->storeRecord(['type' => 1, 'count' => $rate->rate, 'cost' => $rate->cost, 'order' => null]);
        sendNotification($user->fcm_token, 'update_rate', $setRate->data, 'success', true);

        $wallet = db('wallet')->parent($parentSlug, $userId)->storeRecord(['type' => 1, 'price' => $rate->cost, 'title' => __('تبدیل امتیاز به کیف پول')]);
        if ($wallet->status == true) {

            sendNotification($user->fcm_token, 'update_wallet', $wallet->data, 'success', true);
        }
    } else {
        $setRate = db('rate_user')->parent($parentSlug, $userId)->storeRecord(['type' => 1, 'count' => $count, 'cost' => $rate->cost, 'order' => null]);
        sendNotification($user->fcm_token, 'update_rate', $setRate->data, 'success', true);

        $price = $rate->cost * $count;
        $wallet = db('wallet')->parent($parentSlug, $userId)->storeRecord(['type' => 1, 'price' => $price, 'title' => __('تبدیل امتیاز به کیف پول')]);
        if ($wallet->status == true) {
            sendNotification($user->fcm_token, 'update_wallet', $wallet->data, 'success', true);
        }
    }
    return $setRate->data;
}

function calComisionAgency($order)
{
    $comis = 0;
    if ($order->agency != null) {
        $comis = calculateCashPrice($order->commission, $order->price);
    }
    return $comis;

}

function finalPriceDriver($order, $comision)
{
    $percent = $comision;
    $priceM = calculateCashPrice($comision, $order->price);
    $p1 = $order->price - $priceM;
    db('financial_report')->storeRecord(['order' => $order->id, 'price' => $p1]);
    if ($order->agency != null) {
        $percent += $order->agency->commission;
        $priceA = calculateCashPrice($order->agency->commission, $order->price);
        $p2 = $order->price - $priceA;
        db('financial_report_agency')->storeRecord(['admin' => $order->agency->id, 'order' => $order->id, 'price' => $p2]);
    }
    $p = calculateCashPrice($percent, $order->price);
    return $p;
}
function getDriverRelations($driverId)
{
    $driver=db('drivers')->withRelations(['car_details'])->findRecord($driverId);
    return $driver;
}