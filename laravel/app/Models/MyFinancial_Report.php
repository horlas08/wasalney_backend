<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyFinancial_Report extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_financial_report';
    }

    static  function calulateWalllet()
    {
        $sum=0;
        $orders = db('financial_report')->getRecords();
        if (count($orders) != 0) {
            foreach ($orders as $order) {
                $sum += $order->price;
            }
            return $sum;
        } else {
            return 0;
        }
    }

}
