<?php

namespace App\Http\Controllers;


use App\Models\File;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\DetailLang;
use Illuminate\Support\Str;
use Image;


class SettingController extends Controller
{

    function sitemap(){
        return response()->view('seo.sitemap')->header('Content-Type','text/xml');
    }


    function index()
    {
        try {
            $lang=app()->getLocale();
            $setting=Setting::where('lang_abbr',$lang)->first();
            if ($setting==null){
                $setting=new Setting();
            }

            return view("admin-panel.setting.index",compact('setting','lang'));
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        abort(500);
    }

    function edit(Request $request,$lang)
    {

        try {
            $setting=Setting::where('lang_abbr',$lang)->first();
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'short_name' => 'required',
                'background_color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
                'theme_color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
                'favicon' => 'nullable|image|mimes:png'.(($setting==null || $setting->favicon==null)?'|required':''),
                'logo' => 'nullable|image'.(($setting==null || $setting->logo==null)?'|required':''),
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator->messages()->all());
            }
            $language=Language::where('abbr',$lang)->first();
            if($language==null)
                return back()->withErrors(__('First set a language'));
            if ($setting==null)
                $setting=new Setting();
            $setting->lang_abbr = $lang;
            $setting->name = $request->name;
            $setting->short_name = $request->short_name;
            $setting->background_color = $request->background_color;
            $setting->theme_color = $request->theme_color;
            $setting->description = $request->description;
            $setting->keywords = $request->keywords;
            $array=[];
            $icon = $request->file('favicon');
            if ($icon!=null && $icon->isFile()){
                $iconname = 'icon' . time() . '.' . $icon->getClientOriginalExtension();
                $iconPath =  $lang.'/'.$iconname;
                $setting->deleteIcons();
                Storage::disk('setting')->put($iconPath, file_get_contents($icon));
                $setting->favicon = $iconname;
                array_push($array, $this->saveSizedIcon($iconname, 16));
                array_push($array, $this->saveSizedIcon($iconname, 24));
                array_push($array, $this->saveSizedIcon($iconname, 32));
                array_push($array, $this->saveSizedIcon($iconname, 36));
                array_push($array, $this->saveSizedIcon($iconname, 48));
                array_push($array, $this->saveSizedIcon($iconname, 64));
                array_push($array, $this->saveSizedIcon($iconname, 72));
                array_push($array, $this->saveSizedIcon($iconname, 96));
                array_push($array, $this->saveSizedIcon($iconname, 144));
                array_push($array, $this->saveSizedIcon($iconname, 168));
                array_push($array, $this->saveSizedIcon($iconname, 192));
                array_push($array, $this->saveSizedIcon($iconname, 256));
                array_push($array, $this->saveSizedIcon($iconname, 512));

                $this->saveSizedIcon($iconname, 57);
                $this->saveSizedIcon($iconname, 60);
                $this->saveSizedIcon($iconname, 76);
                $this->saveSizedIcon($iconname, 114);
                $this->saveSizedIcon($iconname, 120);
                $this->saveSizedIcon($iconname, 152);
                $this->saveSizedIcon($iconname, 180);
            }

            $logo = $request->file('logo');
            if ($logo!=null && $logo->isFile()){
                $logoname = $lang .'_'. time() . '.' . $logo->getClientOriginalExtension();
                $setting->deleteLogo();
                Storage::disk('setting')->put('logo/' .$logoname, file_get_contents($logo));
                $setting->logo = '/setting/logo/'.$logoname;
            }
            $jsonString = file_get_contents('manifest.json');
            $data = json_decode($jsonString, true);
            $data['name'] = $setting->name;
            $data['short_name'] = $setting->short_name;
            $data['dir'] = $language->direction;
            $data['lang'] = $lang;
            $data['background_color'] = $setting->background_color;
            $data['theme_color'] = $setting->theme_color;
            $data['description'] = $setting->description;
            if (count($array)!=0){
                $data['icons'] = $array;
            }
            $encoded = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            $encoded=Str::replace(',',','.chr(10),$encoded);
            $encoded=Str::replace('{','{'.chr(10),$encoded);
            $encoded=Str::replace('}',chr(10).'}'.chr(10),$encoded);
            Storage::disk('setting')->makeDirectory($lang);
            file_put_contents(Storage::disk('setting')->path( $lang .'/manifest.json'), $encoded);

            $setting->save();


            return back();
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }

    private function saveSizedIcon($filename, $size)
    {
        $lang=app()->getLocale();
        $img = Image::make(Storage::disk('setting')->path( $lang .'/'.$filename));
        $resize = $img->resize($size, $size);
        Storage::disk('setting')->makeDirectory($lang .'/'. $size);
        $resize->save(Storage::disk('setting')->path($lang.'/'.$size.'/'.$filename));
        $array["src"]='/setting/' .$lang.'/'.$size.'/'.$filename;
        $array["sizes"]=$size.'x'.$size;
        $array["type"]="image/png";
        return $array;
    }




}

