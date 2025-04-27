<?php

namespace App\Models;

use App\Enums\TypeField;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Field extends Model
{
    protected $table = "fields";

    public function Category(){
        return $this->belongsTo(Category::class,'category_slug','slug');
    }



    public function Routes(){
        return $this->hasMany(Route::class,'field_id');
    }


    public function FirstRoute(){
        return $this->hasOne(Route::class,'field_id')->oldestOfMany();
    }


    public function deleteField(){
        try {

            $routes=$this->Routes;
            if($routes!=null && $routes->count()!=0){
                foreach ($routes as $route){
                    $route->field_id=null;
                    $route->save();
                }
            }
            $selectUsages=Field::where('options_cat_slug',$this->category_slug)->where('options_str_sample','like','%{#'.$this->name.'#}%')->get();
            foreach ($selectUsages as $usage){
                $usage->options_str_sample=str_replace('{#'.$this->name.'#}','',$usage->options_str_sample);
                $usage->save();
            }

            foreach (RelationCondition::where('field_id',$this->id)->get() as $condition){
                $condition->delete();
            }

            if (in_array($this->type,[TypeField::UPLOAD,TypeField::UPLOAD_PV,TypeField::CHUNK_FILE,TypeField::CHUNK_FILE_PV,TypeField::MULTI_UPLOAD,TypeField::MULTI_UPLOAD_PV,TypeField::MULTI_CHUNK_FILE,TypeField::MULTI_CHUNK_FILE_PV])){
                $disk = Str::endsWith($this->type, 'pv') ? 'private_file' : 'public_file';
                Storage::disk($disk)->deleteDirectory($this->category_slug.'/'.$this->name);
            }

            foreach (Language::all() as $language){
                if($this->type==TypeField::MULTI_SELECT && Schema::hasTable($language->abbr.'_'.$this->category_slug.'_'.$this->name.'_'.$this->options_cat_slug))
                    Schema::drop($language->abbr.'_'.$this->category_slug.'_'.$this->name.'_'.$this->options_cat_slug);
                elseif(Schema::hasColumn($language->abbr.'_'.$this->category_slug,$this->name)){
                    $fieldName=$this->name;
                    Schema::table($language->abbr.'_'.$this->category_slug,function (Blueprint $table) use ($fieldName){
                        $table->dropColumn($fieldName);
                    });
                }

            }

            $this->delete();
            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }



}
