<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    function storeCart($id)
    {
        storeSession('product',$id,'order',1);
        return redirect('/cart');
    }
    function updateCart($id,$count=1){
        $orders = editSession('product', 'order', $id, $count);
        $result['cartItem'] = view('theme.order.cartItem', compact('orders'))->render();
        $result['priceCart'] = view('theme.order.priceCart', compact('orders'))->render();
        return response()->json($result, 200);
    }
    function delete($id){
        deleteSession('order','product', $id);
        return back();
//    $result = array();
//    $result['cartItem'] = view('theme.order.cartItem', compact('orders'))->render();
//    $result['priceCart'] = view('theme.order.priceCart', compact('orders'))->render();
//    return response()->json($result, 200);

    }

    function storeOrder()
    {
        try {
            $request = new Request();
            $addressId = getSession('address');
            $user = getUser();
            $orders = getSession('order');
            $giftCode = getSession('gift');
            $post=getSession('post');
            $delivery=getRecord('productdelivery',$post);
            $address = getRecords('address')->where('id', $addressId)->first();
            $gift =checkGift($giftCode);
            if ($gift != null) {
                $price = calculatePriceGift(finalPrice($orders), $gift->discount);
            } else {
//            alert('کد تخفیف وارد شده معتبر نیست');
                $price = finalPrice($orders);
            }

            $name = $address->first_name . ' ' . $address->last_name;
            $details = [];
            foreach ($orders as $order) {
                $product = $order['product'];

                array_push($details, ['product' => $product->title, 'price_product' => $product->price,'image'=>$product->image,'discount'=>$product->discount,'count' => $order['qty']]);
            }
            if ($gift != null)
                $request->merge(['username' => $user->id, 'name' => $name, 'percent_discount' => $gift->discount,'status'=>1 ,'code' => $giftCode, 'mobile' => $address->mobile, 'price' => $price,'shipping_price'=>$delivery->price->main,'shipping_title'=>$delivery->title, 'telephone' => $address->telephone, 'address' => $address->address, 'postal_code' => $address->postal_code, 'order_detail' => $details]);
            else
                $request->merge(['username' => $user->id, 'name' => $name,'mobile' => $address->mobile, 'price' => $price,'status'=>1, 'telephone' => $address->telephone, 'address' => $address->address,'shipping_price'=>$delivery->price->main,'shipping_title'=>$delivery->title, 'postal_code' => $address->postal_code, 'order_detail' => $details]);

            $result = storeRecord($request, 'orders', null, null, true);

            forgetSession('order');
            forgetSession('gift');
            forgetSession('postPrice');

            return $result;
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getTraceAsString());
        }
        return back()->withErrors(getAlertError());
    }

    function gift(Request $request){
        setSessionOneItem('gift', $request->code);
        if (checkGift($request->code)!=null){

            $orders=getSession('order');
//            if ($request->code!=getSession('gift')){
                $array=[];
                $array['priceCart']=view('theme.order.priceCart', compact('orders'))->render();
//              return view('theme.order.priceCart', compact('orders'));
//              return number_format($finalPrice);
                return response()->json($array ,status: 200);
//            }
//            else{
//                return response()->json('کد وارد شده تکراری است.',400);
//            }
        }
        else
            return response()->json('کد وارد شده معتبر نیست',400);
    }

    function deleteGift(){
        $orders=getSession('order');
        if (!empty(getSession('gift'))){
            forgetSession('gift');
        }
        return view('theme.order.priceCart', compact('orders'));
    }

    function post($id)
    {

       Session::put('post',$id);

        $orders=getSession('order');
        return view('theme.order.price', compact('orders'));
    }
}
