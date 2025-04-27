<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyDeliveries extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_deliveries';
    }


}