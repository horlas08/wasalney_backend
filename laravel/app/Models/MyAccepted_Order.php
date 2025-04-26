<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyAccepted_Order extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_accepted_order';
    }


}
