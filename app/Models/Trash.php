<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{

    protected $table = 'trashes';


    public static function store($reportId,$lang,$catSlug,$recordId,$json,$deletable=1)
    {

        $trash=new Trash();
        $trash->report_id=$reportId;
        $trash->lang_abbr=$lang;
        $trash->category_slug=$catSlug;
        $trash->record_id=$recordId;
        $trash->json=$json;
        $trash->deletable=$deletable;
        $trash->save();
        return $trash->id;
    }

}
