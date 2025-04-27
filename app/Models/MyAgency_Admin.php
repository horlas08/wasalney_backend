<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyAgency_Admin extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_agency_admin';
    }


}
