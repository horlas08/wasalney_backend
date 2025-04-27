<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyWorker_Price extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_worker_price';
    }


}
