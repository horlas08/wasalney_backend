<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyTransaction_Types extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_transaction_types';
    }


}
