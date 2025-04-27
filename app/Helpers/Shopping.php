<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;

use Illuminate\Http\Request;

//سود خرید
function profitCart($orders,$orderDetail=false)
{
    $profit = 0;
    if ($orderDetail == false) {
        foreach ($orders as $order) {
            $profit += (profit($order['product']->price, $order['product']->discount, $order['qty']));
        }
    } else{
        foreach ($orders as $order) {

            $profit += (profit($order->price_product->main, $order->discount->main, $order->count->main));
        }
}
    return $profit;
}

//جمع کل سبد با قیمت اصلی
function totalPrice($orders,$orderDetails=false)
{
    $price = 0;
    if($orderDetails==false){
        foreach ((array)$orders as $order) {

            $price += ($order['product']->price * $order['qty']);
    }}
        else{
            foreach ($orders as $order) {
                $price += ($order->price_product->main * $order->count->main);

            }
        }



    return $price;
}

//هزینه قابل پرداخت
function finalPrice($orders,$orderDetails=false)
{
    $final = totalPrice($orders,$orderDetails) - profitCart($orders,$orderDetails);
    $code = getSession('gift');
//    if (checkGift($code) == null) {
        return $final;
//    } else {
//        return calculatePriceGift($final, checkGift($code)->discount);
//    }
}
function totalSums($orders,$orderDetails=false)
{
    $total = 0;
    if ($orderDetails == false) {
        foreach ($orders as $order) {
            $total += ($order['product']->price);

        }}
        else {
            foreach ($orders as $order) {

                $total += ($order->price_product->main);
            }
        }

    return $total;

}

function setSessionOneItem($sessionName, $value)
{
    Session::put($sessionName, $value);
}

function setSessionAddressId($id)
{
    Session::put('address', $id);
}

function checkGift($code)
{
    $today = Carbon::now()->format('Y-m-d');
    if ($code != null) {
        $gift = DB::table(app()->getLocale() . '_discount_code')->where('code', $code)->whereDate('expire_date', '>=', $today)->first();
        if ($gift != null) {
            return $gift;
        } else {
            return null;
        }
    } else {
        return null;
    }

}

function getErroGift()
{

    return 'این کد تخفیف قبلا استفاده شده است.';
}

////نمایش تعداد کل  محصولات در هدر///
function cartCount()
{

    $count = 0;
    $orders = getSession('order');
    if ($orders != null) {
        foreach ($orders as $order) {

            $count += $order['qty'];
        }
    }
    return $count;


}




function profit($price, $percent, $count = 1)

{
    $giftPrice = calculatePriceGift($price, $percent, $count);
    $finalPrice = ($price - $giftPrice);
    return $finalPrice * $count;
}



function storeSession($slug, $itemId, $sessionName, $itemCount)
{
    $product = DB::table(app()->getLocale() . '_' . $slug)->find($itemId);
    if (Session::has($sessionName)) {
        $dataArray = Session::get($sessionName);
        if (isset($dataArray[$product->id])) {
            $dataArray[$product->id] = array(
                "product" => $product,
                "qty" => $dataArray[$product->id]['qty'] + 1
            );
        } else {
            $dataArray[$product->id] = array('product' => $product, 'qty' => $itemCount);
        }
        Session::put($sessionName, $dataArray);
    } else {
        $dataArray = Session::get($sessionName);
        $dataArray[$product->id] = array('product' => $product, 'qty' => $itemCount);
        Session::put($sessionName, $dataArray);
    }
    
}

function storeProductSession($slug, $itemId, $sessionName, $itemCount)
{
    try {
        $product = DB::table(app()->getLocale() . '_' . $slug)->find($itemId);
        if (Session::has($sessionName)) {
            $dataArray = Session::get($sessionName);
            if (isset($dataArray[$product->id])) {
                $dataArray[$product->id] = array(
                    "product" => $product,
                    "qty" => $dataArray[$product->id]['qty'] + 1
                );
            } else {
                $dataArray[$product->id] = array('product' => $product, 'qty' => $itemCount);
            }
            Session::put($sessionName, $dataArray);
        } else {
            $dataArray = Session::get($sessionName);
            $dataArray[$product->id] = array('product' => $product, 'qty' => $itemCount);
            Session::put($sessionName, $dataArray);
        }
        return back();
    } catch (\Exception $e) {
        Storage::disk('file')->append('log.txt', $e->getMessage());
    }
    return back()->withErrors(getAlertError());
}


function calculatePriceGift($price, $percent)
{
    $finalPrice = ($price) - ($price * ($percent / 100));
//    $finalPrice= $p * $count;
    return $finalPrice;
}
