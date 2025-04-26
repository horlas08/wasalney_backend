<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $table = "categories";


    public function Fields(){
        return $this->hasMany(Field::class,'category_slug','slug');
    }

    public function UserRole(){
        return $this->hasOne(UserRole::class,'category_id');
    }


    public function getParentsIds(){
        $result='';
        $parent=Category::find($this->parent_id);
        while($parent!=null){
            $result.= 'category_'.$parent->id.' ';
            $parent=Category::find($parent->parent_id);
        }
        return $result;
    }

    public function getSubMenus(){
        $result='';
        foreach(\App\Models\Category::where('parent_id',$this->id)->orderBy('sort', 'DESC')->get() as $sub){
            if(!$sub->is_menu && Admin::checkAccess('record','show',$sub->slug))
            $result.= '<li id="category_'.$sub->id.'"><a href="'.route('record.index',['slug'=>$sub->slug]).'" class="DC_text_li"><i class="'.$sub->icon.' DC_icon_title"></i>'.__($sub->title).'</a></li>' ;
            elseif ($sub->is_menu){
                $result.= ' <li  id="category_'.$sub->id.'"><div class="DC_headeer_acordian DC_text_box_li" id="category_'.$sub->id.'"><span class="DC_text_li"><i class="'.$sub->icon.' DC_icon_title"></i>'.__($sub->title).'</span>
                            <i class="  fa-solid fa-angle-left"></i>
                                <i class="   fa-solid fa-angle-right"></i>
                </div>
                            <ul class="DC_sub_list_box DC_ul '.$sub->getParentsIds(). '" data-name="category_'.$sub->id.'">
                              '.$sub->getSubMenus().'
                            </ul>
                         </li>';

            }
        }

        return $result;



    }


    public function deleteCategory(){
        try{

            $subCategories=Category::where('parent_id',$this->id)->get();
            $fields=Field::where('category_slug',$this->slug)->orWhere('options_cat_slug',$this->slug)->get();
            $relations=Relation::where('src_cat_slug',$this->slug)->orWhere('sub_cat_slug',$this->slug)->get();
            $userRole=UserRole::where('category_slug',$this->slug)->first();
            $languages=Language::all();


            foreach ($subCategories as $subCategory){

                if($subCategory->is_menu)
                    $subCategory->deleteCategory();
                else{
                    $subCategory->parent_id=null;
                    $subCategory->save();
                }
            }

            foreach ($fields as $field){

//                    foreach ($languages as $language){
//                        if ($field->type=='select' && $field->options_cat_slug==$this->slug ){
//                            Schema::table($field->category_slug.'_'.$language->abbr,function (Blueprint $table) use ($field){
//                                $table->dropColumn($field->name);
//                            });
//                        }
//                        elseif ($field->type=='multiselect'){
//
//                            Schema::drop($field->category_slug.'_'.$field->name.'_'.$field->options_cat_slug.'_'.$language->abbr);
//
//                        }
//
//                    }

                $field->deleteField();
            }


            foreach ($relations as $relation){
                if($relation->sub_cat_slug!=$this->slug){
                    foreach ($languages as $language){
                        $subRecords=DB::table($language->abbr.'_'.$relation->sub_cat_slug)->where('parent_slug',$this->slug)->get();
                        foreach ($subRecords as $subRecord){
                            Record::deleteRecord($language->abbr,$relation->sub_cat_slug,$subRecord->id,false);
                        }
                    }
                }
                $relation->delete();
            }


            if ($userRole!=null){
                foreach (User::where('role_id',$userRole->id)->get() as $user)
                    $user->delete();
                $userRole->delete();
            }
            if(!$this->is_menu){

                foreach ($languages as $language){
                    Schema::drop($language->abbr.'_'.$this->slug);
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
