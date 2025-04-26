<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCancel_Request extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_cancel_request';
    }


}
