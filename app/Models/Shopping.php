<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Shopping
{

    public static function addProduct($code, $name, $count, $price, $disprice, $data)
    {
        $products = Session::get("products");
        $products[$code] = array(
            "code" => $code,
            "name" => $name,
            "data" => $data,
            "price" => $price,
            "disprice" => $disprice,
            "description" => '',
            "qty" => $count
        );
        Session::put("products", $products);
    }

    public static function getCountQty()
    {

        $sum = 0;
        $products = Session::get("products");
        if ($products != null) {
            foreach ($products as $product) {
                $sum += ($product['qty']);
            }
        }
        return $sum;
    }

    public static function getCount()
    {

        $sum = 0;
        $products = Session::get("products");
        if ($products != null) {
            $sum += count($products);
        }
        return $sum;
    }

    public function getBascket()
    {
        return Session::get("products");
    }
    public function deleteAll()
    {
        Session::forget("products");
    }

    public function deleteProduct($code)
    {
        $products = Session::get("products");
        unset($products[$code]);
        Session::put("products", $products);
    }
}
