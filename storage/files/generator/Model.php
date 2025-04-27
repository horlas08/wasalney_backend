<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_modelName';
    }


}
