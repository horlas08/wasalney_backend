<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCertificates_Types extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_certificates_types';
    }


}
