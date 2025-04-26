<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class UserRole extends Authenticatable
{
    protected $table='user_roles';


    public function Category(){
        return $this->belongsTo(Category::class,'category_slug','slug');
    }

    public function Users(){
        return $this->hasMany(User::class,'role_id');
    }


    public function Routes(){
        return $this->hasMany(Route::class,'role_id');
    }


}
