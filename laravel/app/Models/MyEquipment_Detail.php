<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyEquipment_Detail extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_equipment_detail';
    }


}
