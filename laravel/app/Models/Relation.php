<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Relation extends Model
{
    protected $table = "relations";

    public function SourceCategory(){
        return $this->belongsTo(Category::class,'src_cat_slug','slug');
    }

    public function SubCategory(){
        return $this->belongsTo(Category::class,'sub_cat_slug','slug');
    }


    public function Conditions(){
        return $this->hasMany(RelationCondition::class,'relation_id');
    }




}
