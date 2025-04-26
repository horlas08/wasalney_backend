<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyAdmin_Message extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_admin_message';
    }


}
