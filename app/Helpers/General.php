<?php


use App\Models\Record;
use App\Models\Field;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Services\FirebaseService;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

function db($slug){
    $locale=app()->getLocale();
    return DB::table($locale.'_'.$slug);
}



function saveBase64File($slug,$fieldName,$image){
    try {

        $field=Field::where('category_slug',$slug)->where('name',$fieldName)->first();
        if($field!=null){
            $disk = Str::endsWith($field->type, 'pv') ? 'private_file' : 'public_file';
            $file = base64_decode($image);
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $slug . '/' . $field->name . '/' . $filename;
            Storage::disk($disk)->put('main/'. $filePath, $file);
            return $filePath;
        }

    }catch (\Exception $e) {
        Storage::disk('file')->append('log.txt', 'base64 error in line >>>'.$e->getLine().'>>>'.$e->getMessage());
    }
    return null;
}


function getValue($field,$value){
    $locale=app()->getLocale();
    return Record::getValue($locale,$field,$value);
}


function getRecord($slug,$id){

    $locale=app()->getLocale();
    return Record::getRecord($locale,$slug,$id,null,null);
}


function getDBRecords($slug,$records){
    $locale=app()->getLocale();
    return Record::getDBRecords($locale, $slug,$records);
}

function getRecords($slug,$all=true,$parentSlug=null, $parentId=null ,  $reverse=false, $paginate=null, $pageNum=1){
    $locale=app()->getLocale();
    return Record::getRecords($locale, $slug,$all, $parentSlug, $parentId, $reverse, $paginate, $pageNum);
}

function pagination($slug ,$paginate,$pageNum,$all=true,$parentSlug=null, $parentId=null,$returnView=true){
    $locale=app()->getLocale();
    return Record::pagination($locale,$slug,$paginate,$pageNum,$all,$parentSlug, $parentId,$returnView);
}

function storeRecord(Request $request, $slug, $parentSlug=null, $parentId=null,$hasSubRecord=false){
    $locale=app()->getLocale();
    return Record::storeRecord($request,$locale, $slug, $parentSlug, $parentId,$hasSubRecord);
}
function editRecord(Request $request, $slug, $id){
    $locale=app()->getLocale();
    return Record::editRecord($request,$locale, $slug,  $id);
}

function deleteRecord ($slug, $id, $trash=true){
    $locale=app()->getLocale();
    return Record::deleteRecord($locale,$slug, $id, $trash);
}


function redirectEdit($slug,$id){
    if (\App\Models\Admin::checkAccess('record','edit',$slug)){
        $link=route('record.editform',['slug'=>$slug,'id'=>$id]);
        return '<div style="position:relative;z-index: 99999999999999999999">
            <a href="'.$link.'" target="_blank" style="position: absolute"><img src="/admin-panel/images/edit_link.svg" width="30" height="30" ></a>
        </div>';
    }
    else
        return null;
}

function getLangs(){
    $locale=app()->getLocale();
    return \App\Models\Language::getLangs($locale);
}

function getLang(){
    return app()->getLocale();
}

function getSetting(){
    $setting=\App\Models\Setting::where('lang_abbr',app()->getLocale())->first();
    return $setting;
}
function getThemeColor(){
    $setting=\App\Models\Setting::where('lang_abbr',app()->getLocale())->first();
    return $setting->theme_color;
}
function getLogo(){
    $lang=getLang();
    $setting=\App\Models\Setting::where('lang_abbr',$lang)->first();
    return $setting->logo;
}
function getName(){
    $lang=getLang();
    $setting=\App\Models\Setting::where('lang_abbr',$lang)->first();
    return $setting->name;
}
function getDescription(){
    $lang=getLang();
    $setting=\App\Models\Setting::where('lang_abbr',$lang)->first();
    return $setting->description;
}

function sendNotification($token, $type, $data, $message = null, $status = true, $isShowAlert = 0, $isAudioAlert = 0)
{
//    try {
        
        if($token!=null){
        $factory = (new Factory)->withServiceAccount(public_path() . '/okay-f7073.json');
        $messaging = $factory->createMessaging();
        // $valid=$messaging->verifyIdToken($token);
        // return $valid;
        $dataString = json_encode($data);
        $data2 = [
            'status' => $status,
            'message' => $message == null ? getAlertSuccess() : $message,
            'data' => $data->id!=null?$data->id:null,
            'token' => $token,
            'type' => $type,
            'is_show_alert' => $isShowAlert,
            'is_audio_alert' => $isAudioAlert,
        ];

        $message = CloudMessage::new()
            ->withNotification($data2)
            ->withData($data2)
            ->toToken($token);
        // ->toTopic('...')
        // ->toCondition('...');

        $messaging->send($message);
        return 'true';

        }
//    } catch (\Exception $e) {
//        Storage::disk('file')->append('log.txt', $e->getMessage());
//
//    }
//    $result = [
//        'status' => false,
//        'message' => [getAlertError()],
//        'data' => null,
//    ];
//    return $result;
}




function getUser(){
    $user=request()->user();
    if($user!=null){
        $locale=app()->getLocale();
        $userRole=$user->category_slug;
        $user=Record::getRecord($locale,$user->category_slug,$user->record_id);
        $user->user_role=$userRole;
    }
    return $user;
}



function getAlertSuccess(){

    return __('The operation accomplished.');
}
function getAlertError(){

    return __('The operation encountered an error!');
}
