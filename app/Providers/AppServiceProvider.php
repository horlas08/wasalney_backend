<?php

namespace App\Providers;

use App\Enums\TypeField;
use App\Models\Field;
use App\Models\Language;
use App\Models\Record;
use App\Models\Relation;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'production' || env('APP_FORCE_HTTPS') === 'true') {
            if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
                \URL::forceScheme('https');
            }
        }
        if(!Response::hasMacro('api'))
            Response::macro('api', function ($data, $message=null, $statusCode=200) {
                return Response::json([
                    'status' => $statusCode < 300,
                    'message' => $message==null?getAlertSuccess():$message,
                    'data' => $data,
                ],$statusCode);
            });


        if(!Builder::hasMacro('parent'))
            Builder::macro('parent',function ($parentSlug=null,$parentId=null){
                $this->parent=['slug'=>$parentSlug,'id'=>$parentId];
                return $this->where('parent_slug',$parentSlug)->where('parent_id',$parentId);
            });

        if(!Builder::hasMacro('withRelations'))
            Builder::macro('withRelations',function ($array=[]){
                $this->relations=$array;
                return $this;
            });

        if(!Builder::hasMacro('getRecords'))
            Builder::macro('getRecords',function ($array=null){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                if ($this->orders==null)
                    $this->orderBy('sort');
                $records=$this->get();
                $fields=Field::where('category_slug',$slug);
                if ($array)
                    $fields=$fields->whereIn('name',$array);
                $fields=$fields->orderBy('sort', 'DESC')->get();
                $collection=collect();
                foreach($records as $record){
                    $myRecord=Record::getRecord($lang,$slug,$record->id,(array)$record,$fields,isset($this->relations)?$this->relations:[]);
                    $collection->push($myRecord);
                }
                return $collection;
            });

        if(!Builder::hasMacro('takeRecords'))
            Builder::macro('takeRecords',function ($paginate,$array=null){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                if ($this->orders==null)
                    $this->orderBy('sort');
                $pagination=$this->paginate($paginate);
                $fields=Field::where('category_slug',$slug);
                if ($array)
                    $fields=$fields->whereIn('name',$array);
                $fields=$fields->orderBy('sort', 'DESC')->get();
                $collection=collect();
                foreach($pagination->items() as $record){
                    $myRecord=Record::getRecord($lang,$slug,$record->id,(array)$record,$fields,isset($this->relations)?$this->relations:[]);
                    $collection->push($myRecord);
                }

                $pagination=new LengthAwarePaginator(
                    $collection,
                    $pagination->total(),
                    $pagination->perPage(),
                    $pagination->currentPage(), [
                        'path' => request()->url(),
                        'query' => [
                            'page' => $pagination->currentPage()
                        ]
                    ]
                );
                return $pagination;
            });


        if(!Builder::hasMacro('findRecord'))
            Builder::macro('findRecord',function ($id,$array=null){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                $fields=Field::where('category_slug',$slug);
                if ($array)
                    $fields=$fields->whereIn('name',$array);
                $fields=$fields->orderBy('sort', 'DESC')->get();
                $myRecord=Record::getRecord($lang,$slug,$id,null,$fields,isset($this->relations)?$this->relations:[]);
                return $myRecord;
            });

        if(!Builder::hasMacro('firstRecord'))
            Builder::macro('firstRecord',function ($array=null){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                $record=$this->first();
                if($record!=null){
                    $fields=Field::where('category_slug',$slug);
                    if ($array)
                        $fields=$fields->whereIn('name',$array);
                    $fields=$fields->orderBy('sort', 'DESC')->get();

                    $myRecord=Record::getRecord($lang,$slug,$record->id,(array)$record,$fields,isset($this->relations)?$this->relations:[]);
                    return $myRecord;
                }
                return null;
            });

        if(!Builder::hasMacro('loginUser'))
            Builder::macro('loginUser',function (){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                $record=$this->first();
                if($record!=null){
                    $user=User::where('category_slug',$slug)->where('record_id',$record->id)->first();
                    if($user!=null){
                        Auth::login($user);
                        $myRecord=Record::getRecord($lang,$slug,$record->id,(array)$record,null,isset($this->relations)?$this->relations:[]);
                        return $myRecord;
                    }
                }
                return null;
            });

        if(!Builder::hasMacro('getUserToken'))
            Builder::macro('getUserToken',function (){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                $record=$this->first();
                if($record!=null){
                    $user=User::where('category_slug',$slug)->where('record_id',$record->id)->first();
                    if($user!=null){
                        $token=$user->getToken();
                        $myRecord=Record::getRecord($lang,$slug,$record->id,(array)$record,null,isset($this->relations)?$this->relations:[]);
                        $myRecord->token=$token;
                        return $myRecord;
                    }
                }
                return null;
            });


        if(!Builder::hasMacro('storeRecord'))
            Builder::macro('storeRecord',function ($array=[],$hasSubRecord=false){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                $parentSlug=isset($this->parent)?$this->parent['slug']:null;
                $parentId=isset($this->parent)?$this->parent['id']:null;
                $request = request();
                $request->merge($array);
                $result=Record::storeRecord($request,$lang, $slug, $parentSlug, $parentId,$hasSubRecord);
                return $result;
            });


        if(!Builder::hasMacro('updateRecord'))
            Builder::macro('updateRecord',function ($array=[]){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                $keys=array_keys($array);
                $fields=Field::where('category_slug',$slug)->whereIn('name',$keys)->orderBy('sort', 'DESC')->get();
                $record=$this->first();
                $request = request();
                $request->merge($array);
                $result=Record::editRecord($request,$lang, $slug,$record->id,$record,$fields,isset($this->relations)?$this->relations:[]);
                return $result;
            });




        if(!Builder::hasMacro('deleteRecord'))
            Builder::macro('deleteRecord',function (){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                $record=$this->first();
                $result=Record::deleteRecord($lang,$slug, $record->id,true,$record);
                return $result;
            });


        if(!Builder::hasMacro('deleteRecords'))
            Builder::macro('deleteRecords',function (){
                $lang=app()->getLocale();
                $slug=Str::replaceFirst($lang.'_','',$this->from);
                $records=$this->get();
                $relations=Relation::where('src_cat_slug',$slug)->get();
                $usageFields=Field::where('options_cat_slug',$slug)->get();
                $specialFields=Field::where('category_slug',$slug)->whereIn('type',[TypeField::MULTI_SELECT,TypeField::UPLOAD,TypeField::UPLOAD_PV,TypeField::CHUNK_FILE,TypeField::CHUNK_FILE_PV])->get();
                $userRole=UserRole::where('category_slug',$slug)->first();
                $languages=Language::all();
                $successCollection=collect();
                $errorCollection=collect();
                foreach($records as $record){
                    $result=Record::deleteRecord($lang,$slug, $record->id,true,$record,$relations,$usageFields,$specialFields,$userRole,$languages);
                    if ($result->status)
                        $successCollection->push($result->data);
                    else
                        $errorCollection->push($result);
                }
                $finalResult=[
                    'succeed'=>$successCollection,
                    'failed'=>$errorCollection,
                ];
                return (object)$finalResult;
            });






    }
}
