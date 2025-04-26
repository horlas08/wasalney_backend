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
use App\Models\MyGenerate_Code_Driver;
use PDF;

class MyGenerate_Code_DriverController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyGenerate_Code_Driver::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_generate_code_driver')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_generate_code_driver')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

            }
            return true;


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }

    


    function pdf(Request $request)
    {
        try {

            $records=MyGenerate_Code_Driver::orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'generate_code_driver',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-generate_code_driver.export', $data);
            return $pdf->stream('generate_code_driver.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            $records=MyGenerate_Code_Driver::orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('generate_code_driver',$records), 'generate_code_driver.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'generate_code_driver',null,null), $file);

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

          return view('admin-panel.my-generate_code_driver.index');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function pagination(Request $request){
        try {

          $search=$request->search['value'];
            $start=$request->start;
            $length=$request->length;
            $orderIndex=$request->order[0]['column'];
            $orderDir=$request->order[0]['dir'];
            $orderColumn=$request->columns[$orderIndex]['data'];
            Session::put('dataTableInfo',(object)['slug'=>'generate_code_driver', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $query=MyGenerate_Code_Driver::where(function ($q) use ($search) {
            if ($search!=''){
          $q->orWhere("count", 'like', '%'.$search.'%');
          $q->orWhere("price", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $generate_code_driver){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-generate_code_driver.table-data',["type"=>"datatable-counter","generate_code_driver"=>$generate_code_driver,"counter"=>$start+$counter+1])->render();
          $json["count"]=view('admin-panel.my-generate_code_driver.table-data',["type"=>"count","generate_code_driver"=>$generate_code_driver])->render();
          $json["price"]=view('admin-panel.my-generate_code_driver.table-data',["type"=>"price","generate_code_driver"=>$generate_code_driver])->render();
          $json['datatable-actions']=view('admin-panel.my-generate_code_driver.table-data',["type"=>"datatable-actions","generate_code_driver"=>$generate_code_driver])->render();
                $data[$counter]=$json;
                $counter++;
            }

            $result = array(
                "draw" => intval($request->draw),
                "recordsTotal" => intval($total),
                "recordsFiltered" => intval($total),
                "data" => $data
            );
            return response()->json($result,200);

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

          return view('admin-panel.my-generate_code_driver.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"generate_code_driver");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $generate_code_driver=MyGenerate_Code_Driver::find($id);
          return view('admin-panel.my-generate_code_driver.edit',compact('generate_code_driver'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"generate_code_driver",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"generate_code_driver",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
