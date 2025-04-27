<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyType_Parcel extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_type_parcel';
    }


}
