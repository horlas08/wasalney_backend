<?php

namespace App\Http\Controllers;

use App\Enums\TypeField;
use App\Models\Field;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Illuminate\Http\UploadedFile;
use function Symfony\Component\String\chunk;


class FileController extends Controller
{

    public function pvFile($catSlug,$fieldName,$fileName) {
        if(!Auth::guard('admin')->check() && !checkPvFile($catSlug,$fieldName,$fileName)){
            return Response::make(null, 403);
        }
        $path = storage_path('/files/'.$catSlug.'/'.$fieldName.'/'.$fileName);
        if (!File::exists($path)) {
            return Response::make(null, 404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        if($type=='image/svg')
            $type.='+xml';
        $response->header("Content-Type", $type);
        $response->header("Access-Control-Allow-Origin", '*');
        $response->header("Access-Control-Allow-Methods", '*');
        $response->header("Access-Control-Allow-Headers", '*');
        $response->header("Access-Control-Allow-Headers", '*');
        return $response;
    }


    public function upload(Request $request,$lang,$slug,$fieldName)
    {
        try {
            $field=Field::where('category_slug',$slug)->where('name',$fieldName)->first();
            if($field->validation!=null){
                if($request->has('resumableTotalSize')){
                    $request->merge(['myValidationTotalSize'=>(int)$request->resumableTotalSize/1000]);
                }
                if($request->has('resumableFilename')){
                    $request->merge(['myValidationMimeType'=>last(explode('.',$request->resumableFilename))]);
                }
                $sizeValidation='';
                $typeValidation='';

                foreach (explode('|',$field->validation) as $validation){
                    if(Str::startsWith($validation,'mimes'))
                        $typeValidation='|'.Str::replaceFirst('mimes','ends_with',$validation);
                    elseif (Str::startsWith($validation,'min') || Str::startsWith($validation,'max'))
                        $sizeValidation.='|'.$validation;

                }

                app()->setLocale($lang);
                $validator = Validator::make($request->all(), [
                    'myValidationTotalSize' => 'required|numeric'.$sizeValidation,
                    'myValidationMimeType' => 'required'.$typeValidation,
                ],[],['myValidationTotalSize'=>$field->name,'myValidationMimeType'=>$field->name]);

                if($validator->fails()){
                    return \response()->json([
                        'message' => $validator->messages()->first(),
                        'size'=>$request->myValidationTotalSize,
                        'type'=>$request->myValidationMimeType,
                        'status' => false,
                        'done' => 0,
                    ],400);
                }
            }

            $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

            if (!$receiver->isUploaded()) {
                throw new UploadMissingFileException();
            }

            $fileReceived = $receiver->receive(); // receive file
            if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
                $file = $fileReceived->getFile(); // get file



//                if($field!=null && (in_array($field->type,[TypeField::CHUNK_FILE,TypeField::CHUNK_FILE_PV])))
                    $disk=Str::endsWith($field->type,'pv')?'private_file':'public_file';

                $fileName = time() . "_" .$fileReceived->getClientOriginalName();
                $filePath = $slug.'/'.$fieldName;
                $file->move(Storage::disk($disk)->path($filePath), $fileName);

                $path=Str::endsWith($field->type,'pv')?'/pvfiles':'/files';

                return [
                    'address' => $path,
                    'path' => $filePath,
                    'fileName' => $fileName
                ];
            }

            // otherwise return percentage informatoin
            $handler = $fileReceived->handler();
            return [
                'done' => $handler->getPercentageDone(),
                'status' => true
            ];
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
//         delete chunked file
            unlink($file->getPathname());
        return [
            'done' => $handler->getPercentageDone(),
            'status' => false,
            'message' => getAlertError()
        ];
    }


    public function delete(Request $request,$slug,$fieldName,$id=null)
    {

        try {
            $field=Field::where('category_slug',$slug)->where('name',$fieldName)->first();
            if($field!=null){
                $disk=Str::endsWith($field->type,'pv')?'private_file':'public_file';
                $filePath = $slug.'/'.$fieldName.'/'.$request->fileName;
                if(Storage::disk($disk)->exists($filePath))
                    Storage::disk($disk)->delete($filePath);

//                if(Storage::disk($disk)->exists('preview/'.$filePath))
//                    Storage::disk($disk)->delete('preview/'.$filePath);

                if($id!=null){
                    $isMulti=Str::startsWith($field->type,'multi');
                    foreach (Language::all() as $language){
                        if ($isMulti){
                            $record=DB::table($language->abbr.'_'.$slug)->where('id',$id)->limit(1)->first();

                            $array=array_diff((array)json_decode($record->{$field->name}),[$filePath]);
                            DB::table($language->abbr.'_'.$slug)->where('id',$id)->limit(1)->update([$field->name=>json_encode($array)]);
                        }
                        else
                            DB::table($language->abbr.'_'.$slug)->where('id',$id)->where($field->name,$filePath)->limit(1)->update([$field->name=>null]);
                    }
                }

                return true;
            }


        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }

        return false;
    }







}
