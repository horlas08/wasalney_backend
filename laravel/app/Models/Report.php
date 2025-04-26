<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Report extends Model
{

    protected $table = 'reports';



    public static function store(Request $request,$type,$lang,$parentId,$catSlug)
    {
        $userId=null;
        $userSlug=null;
        if ($user=$request->user('admin')){
            if ($user->level == 1 && ($type=='store' || ($type=='update' && $parentId==0))) {
                return 0;
            }
            else
                $userId=$user->id;
        }
        else {
            $user=$request->user();
            if ($user!=null){
                $userId=$user->record_id;
                $userSlug=$user->category_slug;
            }
        }

        $report=new Report();
        $report->user_id=$userId;
        $report->user_slug=$userSlug;
        $report->type=$type;
        $report->lang_abbr=$lang;
        $report->parent_id=$parentId;
        $report->category_slug=$catSlug;
        $report->save();
        return $report->id;
    }

}
