<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];




    public static function checkAccess($accessCategory, $accessType=null, $catSlug=null)
    {
        if (Auth::guard('admin')->check()){
        $currentUser=Auth::guard('admin')->user();
        if ($currentUser->level == 1) {
            return true;
        }elseif($accessCategory=='developer')
            return false;
        $access = AdminAccess::where('name', $accessCategory)->where('admin_id', $currentUser->id)->where('category_slug',$catSlug)->first();
        if ($access != null) {
            if ($accessType == 'show' && $access->show == 1) {
                return true;
            }elseif ($accessType == 'store' && $access->store == 1) {
                return true;
            }elseif ($accessType == 'edit' && $access->edit == 1) {
                return true;
            }elseif ($accessType == 'delete' && $access->delete == 1) {
                return true;
            }

        }
        }

        return false;
    }


}
