<?php

namespace App\Http\Controllers;


use App\Enums\TypeField;
use App\Models\Category;
use App\Models\Field;
use App\Models\RecordLang;
use App\Models\Record;
use App\Models\Language;
use App\Models\General;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
class LanguageController extends Controller
{
    function change($abbr){
        Session::put('locale', $abbr);
        App::setLocale($abbr);
        return back();
    }

    function setDefault($id){
        try {
            $langs=Language::where('is_default',1)->get();
            foreach ($langs as $lang){
                $lang->is_default=0;
                $lang->save();
            }
            $defaultLang=Language::find($id);
            $defaultLang->is_default=1;
            $defaultLang->save();
            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }

    function index()
    {
        try {
            return view("admin-panel.language.index");

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        abort(500);
    }


    function storeForm()
    {
        try {
            return view("admin-panel.language.store");

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        abort(500);
    }

    function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'abbr' => 'required|unique:languages',
            ]);
            if($validator->fails()){
                return back()->withErrors($validator->messages()->all());
            }
            $defaultLang=Language::where('is_default',1)->first();
            $language = new Language();
            $language->title = $request->title;
            $language->abbr = $request->abbr;
            $language->direction = $request->direction;
            if ($defaultLang==null)
                $language->is_default=1;
            else{
                $statement="";
                foreach (Category::where('is_menu',0)->get() as $category){
                    $newTable=$language->abbr."_".$category->slug;
                    $oldTable=$defaultLang==null?'fa':$defaultLang->abbr."_".$category->slug;
                    if(!Schema::hasTable($newTable) && Schema::hasTable($oldTable)){
                        $statement.="CREATE TABLE ".$newTable." LIKE ".$oldTable.";";
                        $statement.="INSERT IGNORE INTO ".$newTable." SELECT * FROM ".$oldTable.";";
                        foreach (Field::where('category_slug',$category->slug)->where('type',TypeField::MULTI_SELECT)->get() as $field){
                            $newMultiTable=$language->abbr.'_'.$field->category_slug.'_'.$field->name.'_'.$field->options_cat_slug;
                            $oldMultiTable=$defaultLang==null?'fa':$defaultLang->abbr.'_'.$field->category_slug.'_'.$field->name.'_'.$field->options_cat_slug;
                            $statement.="CREATE TABLE ".$newMultiTable." LIKE ".$oldMultiTable.";";
                            $statement.="INSERT IGNORE INTO ".$newMultiTable." SELECT * FROM ".$oldMultiTable.";";
                        }
                    }
                }
                DB::unprepared($statement);
            }
            $language->save();
            return back();

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }

    function editForm($id)
    {
        try {
            $language = Language::find($id);
            return view("admin-panel.language.edit", compact('language'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        abort(500);
    }

    function edit(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
            ]);
            if($validator->fails()){
                return back()->withErrors($validator->messages()->all());
            }
            $language = Language::find($id);
            $language->title = $request->title;
            $language->direction = $request->direction;
            $language->save();
            return back();
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }


    function destroy($id)
    {
        try {
            $language = Language::find($id);
            if(!$language->is_default){

                $setting=Setting::where('lang_abbr',$language->abbr)->first();
                if ($setting!=null){
                    $setting->deleteIcons();
                    $setting->deleteLogo();
                    $setting->delete();
                }
                if(app()->getLocale()==$language->abbr){
                    $mylang=Language::where('is_default',1)->first();
                    Session::put('locale', $mylang->abbr);
                }
                foreach (Category::where('is_menu',0)->get() as $category){
                    Schema::dropIfExists($language->abbr.'_'.$category->slug);
                    foreach (Field::where('category_slug',$category->slug)->where('type',TypeField::MULTI_SELECT)->get() as $field){
                        Schema::dropIfExists($language->abbr.'_'.$field->category_slug.'_'.$field->name.'_'.$field->options_cat_slug);
                    }
                }

                $language->delete();
                return back();
            }
            else{
                return back()->withErrors('ابتدا زبان دیگری برای پیش فرض انتخاب کنید');
            }
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }

}
