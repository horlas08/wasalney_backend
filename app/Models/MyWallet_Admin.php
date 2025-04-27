<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyWallet_Admin extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_wallet_admin';
    }


}
