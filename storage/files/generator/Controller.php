<?php

namespace App\Http\Controllers;



use App\Models\Category;
use App\Excels\RecordExport;
use App\Excels\RecordImport;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use App\Models\Language;
use App\Models\ModelName;
use PDF;

class ControllerName extends Controller
{

    function sort(Request $request){
        try {

            //Sort


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }

    //Active


    function pdf(Request $request)
    {
        try {

            //PDF

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            //Export

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    public function import(Request $request)
    {
        try {
            $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

            if (!$receiver->isUploaded()) {
                throw new UploadMissingFileException();
            }

            $fileReceived = $receiver->receive(); // receive file
            if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
                $file = $fileReceived->getFile(); // get file


                //Import

//                Artisan::call('queue:work --stop-when-empty', []);

                unlink($file->getPathname());
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


        return [
            'done' => 0,
            'status' => false
        ];
    }


    function index()
    {
        try {

          //Index

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function pagination(Request $request){
        try {

          //Pagination

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        $result = array(
            "draw" => intval($request->draw),
            "recordsTotal" => intval(0),
            "recordsFiltered" => intval(0),
            "data" => []
        );
        return response()->json($result,400);

    }



    function storeForm()
    {
        try {

          //StoreForm

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        //Store

    }

    function editForm($id)
    {
        try {

          //EditForm

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        //Edit
    }


    function destroy($id)
    {
        //Destroy

    }



}
