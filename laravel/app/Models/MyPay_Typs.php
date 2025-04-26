<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyPay_Typs extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_pay_typs';
    }


}
