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
use App\Models\MyVoip;
use PDF;

class MyVoipController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyVoip::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_voip')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_voip')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

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

            $records=MyVoip::orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'voip',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-voip.export', $data);
            return $pdf->stream('voip.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            $records=MyVoip::orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('voip',$records), 'voip.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'voip',null,null), $file);

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

          return view('admin-panel.my-voip.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'voip', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $query=MyVoip::where(function ($q) use ($search) {
            if ($search!=''){
          $q->orWhere("ip", 'like', '%'.$search.'%');
          $q->orWhere("user_name", 'like', '%'.$search.'%');
          $q->orWhere("pass", 'like', '%'.$search.'%');
          $q->orWhere("trank", 'like', '%'.$search.'%');
          $q->orWhere("gateway", 'like', '%'.$search.'%');
          $q->orWhere("pre_trank", 'like', '%'.$search.'%');
          $q->orWhere("port", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $voip){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-voip.table-data',["type"=>"datatable-counter","voip"=>$voip,"counter"=>$start+$counter+1])->render();
          $json["ip"]=view('admin-panel.my-voip.table-data',["type"=>"ip","voip"=>$voip])->render();
          $json["user_name"]=view('admin-panel.my-voip.table-data',["type"=>"user_name","voip"=>$voip])->render();
          $json["pass"]=view('admin-panel.my-voip.table-data',["type"=>"pass","voip"=>$voip])->render();
          $json["trank"]=view('admin-panel.my-voip.table-data',["type"=>"trank","voip"=>$voip])->render();
          $json["gateway"]=view('admin-panel.my-voip.table-data',["type"=>"gateway","voip"=>$voip])->render();
          $json["pre_trank"]=view('admin-panel.my-voip.table-data',["type"=>"pre_trank","voip"=>$voip])->render();
          $json["port"]=view('admin-panel.my-voip.table-data',["type"=>"port","voip"=>$voip])->render();
          $json['datatable-actions']=view('admin-panel.my-voip.table-data',["type"=>"datatable-actions","voip"=>$voip])->render();
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

          return view('admin-panel.my-voip.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"voip");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $voip=MyVoip::find($id);
          return view('admin-panel.my-voip.edit',compact('voip'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"voip",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"voip",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
