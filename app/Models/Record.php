<?php

namespace App\Models;

use App\Enums\TypeField;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;
use Morilog\Jalali\Jalalian;

class Record extends Model
{




//************************************************************************************************************

    public static function getValue ($lang,$field,$value){

        if ($field->type==TypeField::Date){
            $data['main']= $value;
            if($value==null){
                $data['preview']= null;
                $data['year']= null;
                $data['month']= null;
                $data['day']= null;
                $data['dayOfWeek']= null;
                return (object)$data;
            }
            elseif($lang=='fa'){
                $dateClass=Jalalian::fromCarbon(Carbon::createFromFormat('Y-m-d', $value));
                $data['preview']= $dateClass->format('%A, %d %B %Y');
                $data['year']= (string)$dateClass->getYear();
                $data['month']= Str::padLeft($dateClass->getMonth(),2,'0');
                $data['day']= Str::padLeft($dateClass->getDay(),2,'0');
                $data['dayOfWeek']= $dateClass->getDayOfWeek();
            }
            else{
                $dateClass=Carbon::createFromFormat('Y-m-d', $value);
                $data['preview']= $dateClass->format('M d Y');
                $data['year']= (string)$dateClass->year;
                $data['month']= Str::padLeft($dateClass->month,2,'0');
                $data['day']= Str::padLeft($dateClass->day,2,'0');
                $data['dayOfWeek']= $dateClass->dayOfWeek;
            }


            return (object)$data;

        }
        elseif ($field->type==TypeField::CREATED_AT || $field->type==TypeField::UPDATED_AT){

            $data['main']= $value;

            if($value==null){
                $data['preview']= null;
                $data['date']= null;
                $data['time']= null;
                $data['year']= null;
                $data['month']= null;
                $data['day']= null;
                $data['dayOfWeek']= null;
                $data['hour']= null;
                $data['minute']= null;
                return (object)$data;
            }
            elseif($lang=='fa'){
                $dateClass=Jalalian::fromDateTime($value);
                $data['preview']= $dateClass->format('%A, %d %B %Y H:i');
                $data['date']= $dateClass->format('%d %B %Y');
                $data['time']= $dateClass->format('H:i');
                $data['year']= (string)$dateClass->getYear();
                $data['month']= Str::padLeft($dateClass->getMonth(),2,'0');
                $data['day']= Str::padLeft($dateClass->getDay(),2,'0');
                $data['dayOfWeek']= $dateClass->getDayOfWeek();
                $data['hour']= $dateClass->getHour();
                $data['minute']= $dateClass->getMinute();

            }
            else{
                $dateClass=Carbon::createFromFormat('Y-m-d H:i:s', $value);
                $data['preview']= $dateClass->format('M d Y H:i');
                $data['date']= $dateClass->format('M d Y');
                $data['time']= $dateClass->format('H:i');
                $data['year']= (string)$dateClass->year;
                $data['month']= Str::padLeft($dateClass->month,2,'0');
                $data['day']= Str::padLeft($dateClass->day,2,'0');
                $data['dayOfWeek']= $dateClass->dayOfWeek;
                $data['hour']= $dateClass->hour;
                $data['minute']= $dateClass->minute;
            }



            return (object)$data;

        }
        elseif ($field->type==TypeField::HTML){
            if($value==null){
                $data=[
                    'main'=>null,
                    'preview'=>null,
                ];
                return (object)$data;
            }

            $data['main']= $value;
            $str=strip_tags($value);
            $data['preview']= Str::limit($str, 50);


            return (object)$data;
        }
        elseif ($field->type==TypeField::CHECKBOX){

            return $value?true:false;

        }
        elseif ($value===null){
            return null;
        }
        elseif (in_array($field->type,[TypeField::UPLOAD,TypeField::UPLOAD_PV,TypeField::CHUNK_FILE,TypeField::CHUNK_FILE_PV,TypeField::MULTI_UPLOAD,TypeField::MULTI_UPLOAD_PV,TypeField::MULTI_CHUNK_FILE,TypeField::MULTI_CHUNK_FILE_PV])){
//            if($value==null){
//                $data=[
//                    'main'=>null,
//                    'preview'=>null,
//                ];
//                return (object)$data;
//            }
            $dir=Str::endsWith($field->type,'pv')?'/pvfiles/':'/files/';

            return $dir.$value;

//            $data['main']= $dir.'/main/'.$value;
//            if (
//                Str::endsWith($value,'.jpg')||
//                Str::endsWith($value,'.png')||
//                Str::endsWith($value,'.gif')||
//                Str::endsWith($value,'.webp')
//            )
//                $data['preview']= $dir.'/preview/'.$value;
//            else
//            $data['preview']=  $dir.'/main/'.$value;




//            return (object)$data;

        }
        elseif ($field->type==TypeField::NUMBER){
//            if($value==null){
//                $data=[
//                    'main'=>null,
//                    'preview'=>null,
//                ];
//                return (object)$data;
//            }
            $digitLength=strlen(substr(strrchr($value, "."), 1));

            if($digitLength==0)
                return (int)$value;
            else
                return (double)$value;


//            if($digitLength==0)
//                $data['main']= (int)$value;
//            else
//                $data['main']= (double)$value;

//            $data['preview']= number_format($value,$digitLength);


//            return (object)$data;
        }
        else if ($field->type==TypeField::MULTI_SELECT || $field->type==TypeField::SELECT){
            $optionString=$field->options_str_sample;
            if ($optionString!=null){
                $record=DB::table($lang.'_'.$field->options_cat_slug)->find($value);
                if($record==null)
                    return $value;
                foreach(Field::where('category_slug',$field->options_cat_slug)->get() as $optionField){
                    if($optionField->type==TypeField::TEXT || $optionField->type==TypeField::NUMBER || $optionField->type==TypeField::RANDOM)
                        $optionString=str_replace('{#'.$optionField->name.'#}',$record->{$optionField->name},$optionString);
                }
            }
            return $optionString;
        }
        elseif ($field->type==TypeField::ROUTE){
            $language=Language::where('abbr',$lang)->first();
            return url('/'.($language==null||$language->is_default?'':($lang.'/')).$value);
        }
        elseif ($field->type==TypeField::URL){
            $url=$value;
            if ($url[0]=='/'){
                $language=Language::where('abbr',$lang)->first();
                return url(($language==null||$language->is_default?'':('/'.$lang)).$url);
            }
            else
                return $url;

        }
        elseif ($field->type==TypeField::Json){

            return json_decode($value, true);

        }
        else
            return $value;

    }

//************************************************************************************************************

    public static function getRecord ($lang, $slug, $id,$record=null,$fields=null,$relations=[]){
        $tableName=$lang.'_'.$slug;
        if($record==null){
            $record=(array)DB::table($tableName)->find($id);
        }
        if($record==null){
            $trash=Trash::where('lang_abbr',$lang)->where('category_slug',$slug)->where('record_id',$id)->first();
            if($trash!=null)
                $record=(array)json_decode($trash->json, true);
        }
        if($record==null)
            return null;

        $results=array();
        $results['id']=(int)$id;
        if ($record['parent_id']!=null)
            $results['parent_id']=$record['parent_id'];
        if($fields==null){
            $fields=Field::where('category_slug',$slug)->where('json_show',1)->orderBy('sort', 'DESC')->get();
        }
        foreach ($fields as $field){
            if(!isset($record[$field->name]))
                $record[$field->name]=null;

            if (in_array($field->type,[TypeField::MULTI_UPLOAD,TypeField::MULTI_UPLOAD_PV,TypeField::MULTI_CHUNK_FILE,TypeField::MULTI_CHUNK_FILE_PV])){

                $results[$field->name]=[];
                if($record[$field->name]!=null){
                    foreach ((array)json_decode($record[$field->name]) as $file){
                        array_push($results[$field->name],self::getValue($lang,$field,$file));
                    }
                }

            }
            elseif ($field->type==TypeField::MULTI_SELECT){
                $multiTable=$lang.'_'.$field->category_slug.'_'.$field->name.'_'.$field->options_cat_slug;

                if($record[$field->name]==null){
                    $fieldValues=[];
                    foreach (DB::table($multiTable)->where($slug.'_id',$id)->get() as $multiRecord){
                        array_push($fieldValues,$multiRecord->{$field->options_cat_slug.'_id'});
                    }
                }
                else{
                    $fieldValues=$record[$field->name];
                }
                $results[$field->name]=[];
                foreach ($fieldValues as $selected){
                    array_push($results[$field->name],self::getRecord($lang,$field->options_cat_slug,$selected));
                }

            }
            elseif($field->type==TypeField::SELECT){
                $results[$field->name]=self::getRecord($lang,$field->options_cat_slug,$record[$field->name]);
            }
            elseif($field->type==TypeField::CREATED_AT){
                $results[$field->name]=self::getValue($lang,$field,$record['created_at']);
            }
            elseif($field->type==TypeField::UPDATED_AT){
                $results[$field->name]=self::getValue($lang,$field,$record['updated_at']);
            }
            elseif (in_array($field->type, [TypeField::CAPTCHA,TypeField::GOOGLE,TypeField::PASSWORD]))
                continue;
            else
                $results[$field->name]=self::getValue($lang,$field,$record[$field->name]);

        }

        if (count($relations)>0){

            foreach (Relation::where('src_cat_slug',$slug)->get() as $relation){
                if (array_key_exists($relation->sub_cat_slug,$relations)){
                    $results[$relation->sub_cat_slug]=$relations[$relation->sub_cat_slug];
                }
                elseif (in_array($relation->sub_cat_slug,$relations)){
                    $records=DB::table($lang.'_'.$relation->sub_cat_slug)->where('parent_slug',$slug)->where('parent_id',$id)->orderBy('sort')->get();
                    $array=array();
                    if (count($records)>0){
                        $fields=Field::where('category_slug',$relation->sub_cat_slug)->orderBy('sort', 'DESC')->get();
                        foreach($records as $record){
                            $subRecord=self::getRecord($lang,$relation->sub_cat_slug,$record->id,(array)$record,$fields);
                            array_push($array,$subRecord);
                        }
                    }
                    $results[$relation->sub_cat_slug]=$array;
                }
            }
        }



        return (object)$results;
    }

//************************************************************************************************************

    public static function getDBRecords ($lang,$slug,$records){
        $fields=Field::where('category_slug',$slug)->orderBy('sort', 'DESC')->get();
        $collection=collect();
        foreach($records as $record){
            $myRecord=self::getRecord($lang,$slug,$record->id,(array)$record,$fields);
            $collection->push($myRecord);
        }

        return $collection;

    }

//************************************************************************************************************


    public static function getRecords ($lang,$slug,$all=true,  $parentSlug=null, $parentId=null, $reverse=false, $paginate=null, $pageNum=1){

        $fields=Field::where('category_slug',$slug)->orderBy('sort', 'DESC')->get();
        $collection=collect();
        $records=DB::table($lang.'_'.$slug);
        if(!$all)
            $records->where('parent_slug',$parentSlug)->where('parent_id',$parentId);

        $reverse?$records->orderBy('sort','DESC')
            :$records->orderBy('sort');
        if ($paginate==null){
            $records=$records->get();
        }
        else{
            $pageNum=$pageNum==null?1:$pageNum;
            $records=$records->skip(($pageNum-1)*$paginate)->take($paginate)->get();

        }

        foreach($records as $record){
            $myRecord=self::getRecord($lang,$slug,$record->id,(array)$record,$fields);
            $collection->push($myRecord);
        }

        return $collection;

    }

//************************************************************************************************************

    public static function pagination($lang,$slug,$paginate,$pageNum,$all=true,  $parentSlug=null, $parentId=null,$returnView=true){
        $pageNum=$pageNum==null?1:$pageNum;

        $total=DB::table($lang.'_'.$slug);
        if(!$all)
            $total=$total->where('parent_slug',$parentSlug)->where('parent_id',$parentId);
        $total=$total->count();
        $array['total']=(int)($total/$paginate)+($total%$paginate!=0?1:0);
        $array['page']=$pageNum;
        $array['count']=$paginate;
        $result=(object)$array;
        if (!$returnView)
            return $result;
        else
            return view('admin-panel.record.pagination',compact('result'));
    }

//************************************************************************************************************

    public static function storeRecord (Request $request,$lang, $slug, $parentSlug=null, $parentId=null,$hasSubRecord=false,$fields=null,$userRole=null,$languages=null){
        try {
            $customResult=beforeValidationStore($request,$lang, $slug, $parentSlug, $parentId);
            if ($customResult->status){
                $request=$customResult->data;
            }
            else{
                return $customResult;
            }
            if ($fields==null)
                $fields=Field::where('category_slug',$slug)->orderBy('sort')->get();
            if($userRole==null)
                $userRole=UserRole::where('category_slug',$slug)->first();
            if ($languages==null)
                $languages=Language::all();
            $subError=false;
            $validator=self::validator($lang,$fields,$request,0,$userRole,null);
            if($validator->fails()){
                $result['status']=false;
                $result['message']=$validator->messages()->all();
                $result['data']=$request->toArray();
                return (object)$result;
            }

            $customResult=beforeStore($request,$lang, $slug, $parentSlug, $parentId);

            if ($customResult->status){
                $request=$customResult->data;
            }
            else{
                return $customResult;
            }
            $reportId= Report::store($request,'store',null,0, $slug);
            $now=Carbon::now();

            $data=['id'=>null,'parent_slug'=>$parentSlug,'parent_id'=>$parentId,'sort'=>$now->getPreciseTimestamp(9),'report_id'=>$reportId,'created_at'=>$now->format('Y-m-d H:i:s'),'updated_at'=>$now->format('Y-m-d H:i:s')];
            $multiFields=[];
            $multiData=[];
            $username=null;
            $password=null;
            foreach ($fields as $field) {

                if ($userRole != null) {
                    if ($field->id == $userRole->username_field_id)
                        $username = $request->input($field->name);
                    if ($field->id == $userRole->password_field_id) {
                        $password = $request->input($field->name);
                        continue;
                    }
                }

                if (in_array($field->type, [TypeField::CREATED_AT,TypeField::UPDATED_AT,TypeField::CAPTCHA,TypeField::GOOGLE,TypeField::PASSWORD])) {
                    continue;
                } elseif ($field->type == TypeField::RANDOM) {

                    if (!$request->has($field->name))
                        $data[$field->name] = uniqid();
                    else
                        $data[$field->name] = $request->input($field->name);

                } elseif ($field->type == TypeField::MULTI_SELECT) {
                    $multiData[$field->name] = $request->input($field->name) != null ? $request->input($field->name) : [];
                    array_push($multiFields, $field);

                }
//                elseif ($field->type==TypeField::Json){
//                    $data[$field->name]=json_encode($request->input($field->name));
//                }
                elseif (in_array($field->type, [TypeField::MULTI_UPLOAD, TypeField::MULTI_UPLOAD_PV, TypeField::MULTI_CHUNK_FILE, TypeField::MULTI_CHUNK_FILE_PV])){

                    $disk = Str::endsWith($field->type, 'pv') ? 'private_file' : 'public_file';
                    $array=[];
                    if ($request->file($field->name)!=null){

                        foreach ($request->file($field->name) as $upload){
                            $filename = time() . '_' . $upload->getClientOriginalName();
                            $filePath = $slug . '/' . $field->name . '/' . $filename;
                            Storage::disk($disk)->put($filePath, file_get_contents($upload));
                            array_push($array,$filePath);
                        }
                    }elseif ($request->has($field->name)){
                        foreach ($request->input($field->name) as $file){
                            $baseFile = base64_decode($file);
                            if (base64_encode($baseFile) === $file){
                                $f = finfo_open();
                                $mime_type =explode('/', finfo_buffer($f, $baseFile, FILEINFO_MIME_TYPE))[1] ;
                                $filename = time() . '.' .$mime_type;
                                $filePath = $slug . '/' . $field->name . '/' . $filename;
                                Storage::disk($disk)->put( $filePath, $baseFile);
                                array_push($array,$filePath);
                            }
                            else{
                                array_push($array,$file);
                            }
                        }
                    }
                    $data[$field->name]=json_encode($array);
                }
                elseif (in_array($field->type, [TypeField::UPLOAD, TypeField::UPLOAD_PV, TypeField::CHUNK_FILE, TypeField::CHUNK_FILE_PV])) {

                    $upload = $request->file($field->name);
                    $disk = Str::endsWith($field->type, 'pv') ? 'private_file' : 'public_file';
                    if ($upload != null && $upload->isFile()) {

                        $filename = time() . '_' . $upload->getClientOriginalName();
                        $filePath = $slug . '/' . $field->name . '/' . $filename;

                        Storage::disk($disk)->put($filePath, file_get_contents($upload));
                        $data[$field->name] = $filePath;
//                        $validator = Validator::make($request->all(), [
//                            $field->name => 'mimes:jpg,png,gif,webp'
//                        ]);
//                        if (!$validator->fails()) {
//                            Storage::disk($disk)->makeDirectory('preview/' . $slug . '/' . $field->name);
//                            self::saveSizedImage($disk, $filePath);
//                        }
                    }
                    elseif ($request->has($field->name)){

                        $file = base64_decode($request->input($field->name));
                        if (base64_encode($file) === $request->input($field->name)){
                            $f = finfo_open();
                            $mime_type =explode('/', finfo_buffer($f, $file, FILEINFO_MIME_TYPE))[1] ;
                            $filename = time() . '.' .$mime_type;
                            $filePath = $slug . '/' . $field->name . '/' . $filename;
                            Storage::disk($disk)->put( $filePath, $file);
                            $data[$field->name] = $filePath;

                        }
                        else{
                            //if (Storage::disk($disk)->exists($request->input($field->name))){
                            $data[$field->name] = $request->input($field->name);
//                            $validator = Validator::make($request->all(), [
//                                $field->name => 'ends_with:.jpg,.png,.gif,.webp',
//                            ]);
//                            if (!$validator->fails()) {
//                                Storage::disk($disk)->makeDirectory('preview/' . $slug . '/' . $field->name);
//                                self::saveSizedImage($disk, $request->input($field->name));
//                            }
//                        }
//                        else{
//                            $data[$field->name]=null;
//                        }
                        }
                    }
                    else
                        $data[$field->name] = null;


                } elseif ($field->type == TypeField::ROUTE) {
                    if ($request->input($field->name) != null) {
                        $array = explode('/', $request->input($field->name));
                        $address = $array[0];
                        unset($array[0]);
                        $str = str_replace(' ', '-', implode("-", $array));
                        $str = $address . '/' . $str;
                        $data[$field->name] = $str;
                    }
                    else
                        $data[$field->name] = null;
                } elseif ($field->type == TypeField::Date && $lang == 'fa') {

                    if ($request->input($field->name) != null)
                        $data[$field->name] = Jalalian::fromFormat('Y/m/d', $request->input($field->name))->toCarbon()->format('Y-m-d');
                    else
                        $data[$field->name] = null;
                }
                elseif ($field->type==TypeField::CHECKBOX){
                    $data[$field->name]=$request->input($field->name)?1:0;
                }
                else
                    $data[$field->name] = $request->input($field->name);



            }

            foreach ($languages as $language){

                $id=DB::table($language->abbr.'_'.$slug)->insertGetId($data);
                $data['id']=$id;
                foreach ($multiFields as $multiField){


                    foreach ($multiData[$multiField->name] as $value){
                        DB::table($language->abbr.'_'.$slug.'_'.$multiField->name.'_'.$multiField->options_cat_slug)->insert([$slug.'_id'=>$id,$multiField->options_cat_slug.'_id'=>$value]);
                    }

                }

            }
            $relations=[];
            if ($hasSubRecord){
                foreach (Relation::where('src_cat_slug',$slug)->get() as $relation){


                    if ($request->input($relation->sub_cat_slug)!=null){
                        $relations[$relation->sub_cat_slug]=[];
                        foreach ($request->input($relation->sub_cat_slug) as $subRecord){
                            $subRequest = new Request($subRecord);
                            $subResult=self::storeRecord($subRequest,$lang,$relation->sub_cat_slug,$slug,$id);

                            if (!$subResult->status){
                                $subError=true;
                                $result['status']=$subResult->status;
                                $result['message']=$subResult->message;
                                $result['data']=$subResult->data;

                                throw new \ErrorException('Error In Store Sub Records');
                            }
                            else{
                                array_push($relations[$relation->sub_cat_slug],$subResult->data);
                            }
                        }
                    }
                }
            }


            if ($userRole!=null){
                User::store($userRole,null,$id,$username,$password);
            }



            $record=self::getRecord($lang,$slug,$id,array_merge($data,$multiData),$fields,$relations);


            $customResult=afterStore($request,$lang, $slug, $parentSlug, $parentId,$record);

            return $customResult;


        }
        catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', 'store error in line >>>'.$e->getLine().'>>>'.$e->getMessage());
            if($subError)
                self::deleteRecord($lang,$slug,$id,false);
        }
        if (!$subError){
            $result['status']=false;
            $result['message']=[getAlertError()];
            $result['data']=null;
        }

        return (object)$result;
    }

//************************************************************************************************************

    public static function editRecord (Request $request,$lang, $slug,  $id,$record=null,$fields=null,$relations=[],$userRole=null,$languages=null)
    {
        try {
            $customResult=beforeValidationUpdate($request,$lang, $slug,  $id);
            if ($customResult->status){
                $request=$customResult->data;
            }
            else{
                return $customResult;
            }
            if ($record==null)
                $record=DB::table($lang.'_'.$slug)->find($id);
            if ($fields==null)
                $fields=Field::where('category_slug',$slug)->orderBy('sort')->get();
            if($userRole==null)
                $userRole=UserRole::where('category_slug',$slug)->first();
            $user=$userRole!=null?User::where('record_id',$id)->where('role_id',$userRole->id)->first():null;
            if ($languages==null)
                $languages=Language::all();
            $validator=self::validator($lang,$fields,$request,$id,$userRole,$user);

            if($validator->fails()){
                \Log::info("validator message" ,[$validator->errors() ,$validator->messages()->all()]);
                $result['status']=false;
                $result['message']=$validator->messages()->all();
                $result['data']=$request->toArray();
                return (object)$result;
            }

            $customResult=beforeUpdate($request,$lang, $slug,  $id);
            if ($customResult->status){
                $request=$customResult->data;
            }
            else{
                return $customResult;
            }

            $reportId= Report::store($request,'update',$lang,$record->report_id, $slug);

            $data= (array)$record;
            $data['report_id']=$reportId;
            $data['updated_at']=Carbon::now()->format('Y-m-d H:i:s');
            $multiData=[];
            $username=null;
            $password=null;
            foreach ($fields as $field){

                if($userRole!=null){
                    if($field->id==$userRole->username_field_id){
                        $username=$request->input($field->name);
                        if ($username!=$data[$field->name]){
                            foreach ($languages->where('abbr','!=',$lang) as $language) {
                                DB::table($language->abbr . '_' . $slug)->where('id',$record->id)->limit(1)->update([$field->name =>$username]);
                            }
                        }
                        $data[$field->name]=$username;
                        continue;
                    }
                    elseif ($field->id==$userRole->password_field_id){
                        $password=$request->input($field->name);
                        continue;
                    }
                }

                if($field->type==TypeField::MULTI_SELECT){

                    DB::table($lang.'_'.$slug.'_'.$field->name.'_'.$field->options_cat_slug)
                        ->where($slug.'_id',$id)->delete();

                    $multiData[$field->name]=$request->input($field->name)!=null?$request->input($field->name):[];
                    if($request[$field->name]!=null)
                        foreach ($request[$field->name] as $value){
                            DB::table($lang.'_'.$slug.'_'.$field->name.'_'.$field->options_cat_slug)->insert([$slug.'_id'=>$id,$field->options_cat_slug.'_id'=>$value]);
                        }


                }
//                elseif ($field->type==TypeField::Json){
//                    dd($request->input($field->name));
//                    $data[$field->name]=json_encode($request->input($field->name));
//                    dd($data[$field->name]);
//                }
                elseif (in_array($field->type, [TypeField::MULTI_UPLOAD, TypeField::MULTI_UPLOAD_PV, TypeField::MULTI_CHUNK_FILE, TypeField::MULTI_CHUNK_FILE_PV])){

                    $disk = Str::endsWith($field->type, 'pv') ? 'private_file' : 'public_file';
//                    $oldPaths=json_decode($data[$field->name]);
                    $newPaths=(array)json_decode($data[$field->name]);
                    if ($request->file($field->name)!=null){

                        foreach ($request->file($field->name) as $upload){
                            $filename = time() . '_' . $upload->getClientOriginalName();
                            $filePath = $slug . '/' . $field->name . '/' . $filename;
                            Storage::disk($disk)->put($filePath, file_get_contents($upload));
                            array_push($newPaths,$filePath);
                        }
                    }elseif ($request->has($field->name)){
                        foreach ($request->input($field->name) as $file){
                            $baseFile = base64_decode($file);
                            if (base64_encode($baseFile) === $file){
                                $f = finfo_open();
                                $mime_type =explode('/', finfo_buffer($f, $baseFile, FILEINFO_MIME_TYPE))[1] ;
                                $filename = time() . '.' .$mime_type;
                                $filePath = $slug . '/' . $field->name . '/' . $filename;
                                Storage::disk($disk)->put( $filePath, $baseFile);
                                array_push($newPaths,$filePath);
                            }
                            else{
                                array_push($newPaths,$file);
                            }

                        }
                    }

                    $data[$field->name]=json_encode(array_unique($newPaths));

//                    $diff=array_diff($oldPaths,$newPaths);
//                    if(count($diff)>0){
//
//                        foreach ($languages->where('abbr','!=',$lang) as $language) {
//
//                            if ($langRecord=DB::table($language->abbr . '_' . $slug)->where('id',$record->id)->first()!=null) {
//                                $diff=array_diff($diff,(array)json_decode($langRecord->{$field->name}));
//                            }
//
//                        }
//
//                        foreach ($diff as $file){
//                            self::deleteFile($disk,$file);
//                        }
//                    }


                }

                elseif (in_array($field->type,[TypeField::UPLOAD,TypeField::UPLOAD_PV,TypeField::CHUNK_FILE,TypeField::CHUNK_FILE_PV])){
                    $upload = $request->file($field->name);
                    $disk=Str::endsWith($field->type,'pv')?'private_file':'public_file';
                    $oldPath=$data[$field->name];
                    $filePath=null;
                    if ($upload != null && $upload->isFile()) {
                        $filename = time() . '_' . $upload->getClientOriginalName();
                        $filePath = $slug.'/'.$field->name.'/' . $filename;

                        Storage::disk($disk)->put($filePath, file_get_contents($upload));

                        $data[$field->name] = $filePath;
//                        $validator = Validator::make($request->all(), [
//                            $field->name => 'mimes:jpg,png,gif,webp'
//                        ]);
//                        if (!$validator->fails()){
//                            Storage::disk($disk)->makeDirectory('preview/'. $slug.'/'.$field->name);
//                            self::saveSizedImage($disk,$filePath);
//                        }
                    }

                    elseif ($request->has($field->name)){
                        $file = base64_decode($request->input($field->name),true);
                        if (base64_encode($file) === $request->input($field->name)){
                            $f = finfo_open();
                            $mime_type =explode('/', finfo_buffer($f, $file, FILEINFO_MIME_TYPE))[1] ;
                            $filename = time() . '.' .$mime_type;
                            $filePath = $slug . '/' . $field->name . '/' . $filename;
                            Storage::disk($disk)->put( $filePath, $file);
                            $data[$field->name] = $filePath;
                        }
                        else{
                            //                        if (Storage::disk($disk)->exists($request->input($field->name))){
                            $filePath=$request->input($field->name);
                            $data[$field->name]=$request->input($field->name);
//                            $validator = Validator::make($request->all(), [
//                                $field->name => 'ends_with:.jpg,.png,.gif,.webp',
//                            ]);
//                            if (!$validator->fails()){
//                                Storage::disk($disk)->makeDirectory('preview/'. $slug.'/'.$field->name);
//                                self::saveSizedImage($disk,$request->input($field->name));
//                            }
//                        }
//                        else{
//                            $filePath=null;
//                            $data[$field->name]=null;
//                        }
                        }


                    }
                    if($oldPath!=null && $filePath!=null && $oldPath!=$filePath){

                        $isDefaultLang=$languages->where('abbr',$lang)->where('is_default',1)->first()!=null;

                        if($isDefaultLang){
                            foreach ($languages->where('abbr','!=',$lang) as $language){
                                DB::table($language->abbr.'_'.$slug)->where('id',$record->id)->where($field->name,$oldPath)->limit(1)->update([$field->name=>$filePath]);

                            }
                            self::deleteFile($disk,$oldPath);
                        }
                        else{
                            $isUsedFile=false;
                            foreach ($languages->where('abbr','!=',$lang) as $language) {
                                if (DB::table($language->abbr . '_' . $slug)->where('id',$record->id)->where($field->name, $oldPath)->limit(1)->exists()) {
                                    $isUsedFile = true;
                                    break;
                                }
                            }
                            if(!$isUsedFile)
                                self::deleteFile($disk,$oldPath);

                        }
                    }
                    elseif ($oldPath==null && $filePath!=null){

                        foreach ($languages->where('abbr','!=',$lang) as $language){
                            DB::table($language->abbr.'_'.$slug)->where('id',$record->id)->where($field->name,null)->limit(1)->update([$field->name=>$filePath]);

                        }
                    }
                }
                elseif ($field->type==TypeField::RANDOM){
                    if(!$request->has($field->name) && $record->{$field->name}!=null)
                        $data[$field->name]=$record->{$field->name};
                    elseif (!$request->has($field->name) && $record->{$field->name}==null)
                        $data[$field->name]=uniqid();
                    else
                        $data[$field->name]=$request->input($field->name);
                }
                elseif ($field->type==TypeField::ROUTE ){
                    if($request->input($field->name) !=null){
                        $array=explode('/', $request->input($field->name));
                        $address=$array[0];
                        unset($array[0]);
                        $str=str_replace(' ','-',implode("-",$array));
                        $data[$field->name]=$address.'/'.$str;
                    }
                    else
                        $data[$field->name]=null;
                }
                elseif ($field->type==TypeField::Date && $request->input($field->name) !=null && $lang=='fa'){
                    $data[$field->name]=Jalalian::fromFormat('Y/m/d',$request->input($field->name))->toCarbon()->format('Y-m-d');
                }
                elseif ($field->type==TypeField::CHECKBOX ){
                    if ($request->has($field->name))
                        $data[$field->name]=$request->input($field->name)?1:0;
                }

                elseif(!in_array($field->type, [TypeField::CREATED_AT,TypeField::UPDATED_AT,TypeField::CAPTCHA,TypeField::GOOGLE,TypeField::PASSWORD])){
                    $data[$field->name]=$request->input($field->name);
                }
            }
            DB::table($lang.'_'.$slug)->where('id',$record->id)->limit(1)->update($data);

            if ($userRole!=null){
                User::store($userRole,$user,$record->id,$username,$password);
            }



            $record=self::getRecord($lang,$slug,$id,array_merge($data,$multiData),null,$relations);





            $customResult=afterUpdate($request,$lang, $slug,  $id,$record);

            return $customResult;

        } catch (\Exception $e) {

            Storage::disk('file')->append('log.txt', 'edit error in line >>>'.$e->getLine().'>>>'.$e->getMessage());
        }
        $result['status']=false;
        $result['message']=[getAlertError()];
        $result['data']=null;
        return (object)$result;
    }

//*****************************************************************************************************************

    public  static function deleteRecord ($lang,$slug, $id, $trash=true,$resultData=null,$relations=null,$usageFields=null,$specialFields=null,$userRole=null,$languages=null)
    {
        try {
            if ($trash){
                $customResult=beforeDelete($lang,$slug, $id);
                if(!$customResult->status)
                    return $customResult;
            }
            if($relations==null)
                $relations=Relation::where('src_cat_slug',$slug)->get();
            if($usageFields==null)
                $usageFields=Field::where('options_cat_slug',$slug)->get();
            if($specialFields==null)
                $specialFields=Field::where('category_slug',$slug)->whereIn('type',[TypeField::MULTI_SELECT,TypeField::UPLOAD,TypeField::UPLOAD_PV,TypeField::CHUNK_FILE,TypeField::CHUNK_FILE_PV,TypeField::MULTI_UPLOAD,TypeField::MULTI_UPLOAD_PV,TypeField::MULTI_CHUNK_FILE,TypeField::MULTI_CHUNK_FILE_PV])->get();
            if($userRole==null)
                $userRole=UserRole::where('category_slug',$slug)->first();
            if($languages==null)
                $languages=Language::all();

            foreach ($relations as $relation){

                foreach ($languages as $language){
                    $subRecords=DB::table($language->abbr.'_'.$relation->sub_cat_slug)->where('parent_slug',$slug)->where('parent_id',$id)->get();
                    foreach ($subRecords as $subRecord){
                        self::deleteRecord($lang,$relation->sub_cat_slug,$subRecord->id,$trash);
                    }
                }
            }


            $hasLogicUsage=false;
            foreach ($usageFields as $field){

                $isLogicDelete=Category::where('slug',$field->category_slug)->first()->logic_delete;

                if($isLogicDelete==0 || !$trash){
                    if ($field->type==TypeField::MULTI_SELECT){
                        foreach ($languages as $language){
                            DB::table($language->abbr.'_'.$field->category_slug.'_'.$field->name.'_'.$field->options_cat_slug)
                                ->where($field->options_cat_slug.'_id',$id)->delete();
                        }
                    }
                    else{

                        foreach ($languages as $language){
                            DB::table($language->abbr.'_'.$field->category_slug)->where($field->name,$id)->update([$field->name=>null]);
                        }
                    }
                }
                else
                    $hasLogicUsage=true;


            }
            $fileFields=[];
            foreach ($specialFields as $field){
                if($field->type==TypeField::MULTI_SELECT){
                    foreach ($languages as $language){
                        DB::table($language->abbr.'_'.$field->category_slug.'_'.$field->name.'_'.$field->options_cat_slug)
                            ->where($field->category_slug.'_id',$id)->delete();
                    }
                }
                else{

                    array_push($fileFields,$field);
                }
            }



            foreach ($languages as $language){

                if ($language->abbr!=$lang || $resultData==null)
                    $record=DB::table($language->abbr.'_'.$slug)->where('id',$id)->first();
                else
                    $record=$resultData;

                if(!$hasLogicUsage && count($fileFields)>0){
                    foreach ($fileFields as $field){
                        if ($record!=null){
                            $disk=Str::endsWith($field->type,'pv')?'private_file':'public_file';
                            $isMulti=Str::startsWith($field->type,'multi');
                            if($isMulti){
                                foreach ((array)json_decode($record->{$field->name}) as $file){
                                    self::deleteFile($disk,$file);
                                }
                            }
                            else if ($record->{$field->name}!=null)
                                self::deleteFile($disk,$record->{$field->name});
                        }
                    }
                }

                if($trash){
                    $reportId= Report::store(request(),'delete',$language->abbr,$record->report_id, $slug);
                    Trash::store($reportId,$language->abbr,$slug,$record->id,json_encode((array)$record),!$hasLogicUsage);
                }

                DB::table($language->abbr.'_'.$slug)->where('id',$id)->limit(1)->delete();

            }
            if ($userRole!=null){
                $user = User::where('role_id',$userRole->id)->where('record_id',$id)->first();
                if ($user!=null)
                    $user->delete();
            }


            if ($trash){
                $customResult=afterDelete($lang,$slug, $id,$resultData);
                return $customResult;
            }

            $result['status']=true;
            $result['message']=getAlertSuccess();
            $result['data']=$resultData;
            return (object)$result;


        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', 'delete error in line >>>'.$e->getLine().'>>>'.$e->getMessage());
        }
        $result['status']=false;
        $result['message']=[getAlertError()];
        $result['data']=null;
        return (object)$result;
    }

//*****************************************************************************************************************

    public static function validator ($lang,$fields,$request,$id,$userRole,$user){

        $rules=[];
        $names=[];


        foreach ($fields as $field){
            $names[$field->name]=__($field->title,[],$lang);
//            if ($field->type=='multiselect'){
//                $selectValidation='in:';
//                foreach (DB::table($lang.'_'.$field->options_cat_slug)->select('id')->get() as $option){
//                    $selectValidation=$selectValidation.($selectValidation!='in:'?','.$option->id:$option->id);
//                }
//
//                $rules[$field->name.'.*']=$selectValidation!='in:'?$selectValidation:'';
//                if ($field->validation!=null)
//                    $rules[$field->name]=$field->validation;
//
//            }
//            else if ($field->type=='select'){
//                $selectValidation='in:';
//                foreach (DB::table($lang.'_'.$field->options_cat_slug)->select('id')->get() as $option){
//                    $selectValidation=$selectValidation.($selectValidation!='in:'?','.$option->id:$option->id);
//                }
//                $rules[$field->name]=($selectValidation!='in:'?$selectValidation:'').($field->validation!=null?'|'.$field->validation:'');
//            }
//            else
            if ($field->type==TypeField::HTML){
                $rules[$field->name]='string|nullable'.($field->validation!=null?'|'.$field->validation:'');
            }
            elseif ($field->type==TypeField::NUMBER){
                $rules[$field->name]='numeric|nullable'.($field->validation!=null?'|'.$field->validation:'');
            }
            elseif ($field->type==TypeField::URL){

                if ($request->input($field->name)!=null && $request->input($field->name)[0]!='/' && $request->input($field->name)[0]!='#')
                    $rules[$field->name]='url|nullable'.($field->validation!=null?'|'.$field->validation:'');
                else if($field->validation!=null)
                    $rules[$field->name]=$field->validation;

            }

            elseif ($field->type==TypeField::ROUTE){
                $rules[$field->name]='unique:'.$lang.'_'.$field->category_slug.','.$field->name.','.$id.'|nullable'.($field->validation!=null?'|'.$field->validation:'');

            }
            elseif ($field->type==TypeField::CAPTCHA){
                if (!Auth::guard('admin')->check())
                    $rules[$field->name]='captcha|required'.($field->validation!=null?'|'.$field->validation:'');
            }
            elseif ($field->type==TypeField::GOOGLE){
                if (!Auth::guard('admin')->check())
                    $rules['g-recaptcha-response']='recaptcha|required'.($field->validation!=null?'|'.$field->validation:'');
            }
            elseif ($field->type==TypeField::PASSWORD){
                $rules[$field->name]=($user==null?'required':'nullable').($field->validation!=null?'|'.$field->validation:'');
            }
            else{
                if ($field->validation!=null)
                    $rules[$field->name]='nullable|'.$field->validation;
            }


            if ($userRole!=null && $field->id==$userRole->username_field_id){

                $rules[$field->name]=(isset($rules[$field->name])?$rules[$field->name].'|required':'required').'|unique:'.$lang.'_'.$field->category_slug.','.$field->name.($id!=0?','.$id:'');


            }
            else if($field->is_unique){

                $rules[$field->name]=(isset($rules[$field->name])?$rules[$field->name]:'nullable').'|unique:'.$lang.'_'.$field->category_slug.','.$field->name.($id!=0?','.$id:'');
            }



        }
        $validator=validator()->make($request->all(), $rules,[],$names);
        return $validator;
    }



//*****************************************************************************************************************


    private static function deleteFile($disk,$filePath)
    {
        try {

            if( Storage::disk($disk)->exists($filePath))
                Storage::disk($disk)->delete($filePath);

//            if( Storage::disk($disk)->exists('preview/'.$filePath))
//                Storage::disk($disk)->delete('preview/'.$filePath);

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', 'deleteFile error in line >>>'.$e->getLine().'>>>'.$e->getMessage());
        }
    }


//*****************************************************************************************************************


    private static function saveSizedImage($disk,$filePath)
    {
        $img = Image::make(Storage::disk($disk)->path( $filePath));
        $img->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save(Storage::disk($disk)->path('preview/'.$filePath));

    }




}
