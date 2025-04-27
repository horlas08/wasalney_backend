<?php

namespace App\Excels;

use App\Enums\TypeField;
use App\Models\Field;
use App\Models\Language;
use App\Models\Record;
use App\Models\Route;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\ChunkReader;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use \App\Models\Model;

class RecordImport implements ToCollection,WithHeadingRow,WithChunkReading, ShouldQueue
{
    private $user;
    private $lang;
    private $slug;
    private $parentSlug;
    private $parentId;

    public function __construct($user,$lang,$slug,$parentSlug=null,$parentId=null)
    {
        $this->user = $user;
        $this->lang = $lang;
        $this->slug = $slug;
        $this->parentSlug = $parentSlug;
        $this->parentId = $parentId;
    }

    public function collection(Collection $rows)
    {
        try {

            $errors=[];
            $counter=1;
            $fields=Field::where('category_slug', $this->slug)->with('FirstRoute')->orderBy('sort')->get();
            $importFields=$fields->where('excel_import', 1);
            $userRole=UserRole::where('category_slug',$this->slug)->first();
            $user=$this->user;
            $languages=Language::all();
            foreach ($rows as $row) {
                $req = new Request();
                $req->setUserResolver(function () use ($user) {
                    return $user;
                });
                $isUpdate=false;
                $id=0;
                $fieldError=false;
                foreach ($importFields as $field) {
                    try {
                        if($field->type==TypeField::ROUTE){
                            $row[__($field->title,[],$this->lang)]=$field->FirstRoute->address.'/'.$row[__($field->title,[],$this->lang)];
                        }
                        elseif (in_array($field->type,[TypeField::UPLOAD,TypeField::UPLOAD_PV,TypeField::CHUNK_FILE,TypeField::CHUNK_FILE_PV]))
                            $row[__($field->title,[],$this->lang)]=$field->category_slug.'/'.$field->name.'/'.$row[__($field->title,[],$this->lang)];



                        $req->merge([$field->name => changeFieldImport($this->lang,$this->slug,$field,$row)]);

                        if(!$isUpdate && $field->is_unique && $req->input($field->name)!=null ){
                            $record=DB::table($this->lang.'_'. $this->slug)->where($field->name,$req->input($field->name))->first();
                            if($record!=null){
                                $isUpdate=true;
                                $id=$record->id;
                            }
                        }


                    } catch (\Exception $e) {
                        Storage::disk('file')->append('log.txt', 'errorInRow>>>'.$counter.'Field>>>'.$field->name.'>>>>'.$e->getMessage());

                        $fieldError=true;
                    }
                }
                if(!$fieldError){

                    $req->replace(changeRequestImport($this->lang,$this->slug,$fields,$req->toArray()));

                    if($isUpdate){
                        $editFields=$fields->whereIn('name', array_keys($req->toArray()));
                        $result=Record::editRecord($req,$this->lang, $this->slug, $id,null,$editFields,[],$userRole,$languages);
                    }
                    else{
                        $result=Record::storeRecord($req,$this->lang, $this->slug, $this->parentSlug, $this->parentId,false,$fields,$userRole,$languages);
                    }





                    if(!$result->status){
                        if(is_string($result->message)){
                            Storage::disk('file')->append('log.txt', 'errorRecord_'.$counter.'>>>>'.$result->message);
                            array_push($errors,$result->message.'('.__("Error in row").' '.$counter.') ');
                        }
                        else{
                            foreach ($result->message as $message){
                                Storage::disk('file')->append('log.txt', 'errorRecord_'.$counter.'>>>>'.$message);
                                array_push($errors,$message.'('.__("Error in row").' '.$counter.') ');
                            }
                        }
                    }
                }


                $counter++;

            }
//        if(count($errors)==0)
//            return back();
//        else
//            return back()->withErrors($errors);
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
    }



    public function chunkSize(): int
    {
        return 1000;
    }


}
