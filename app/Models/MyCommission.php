<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCommission extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_commission';
    }


}
