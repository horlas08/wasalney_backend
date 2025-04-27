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
use App\Models\MyAgency_Admin;
use PDF;

class MyAgency_AdminController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyAgency_Admin::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_agency_admin')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_agency_admin')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

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

            $records=MyAgency_Admin::orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'agency_admin',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-agency_admin.export', $data);
            return $pdf->stream('agency_admin.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            $records=MyAgency_Admin::orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('agency_admin',$records), 'agency_admin.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'agency_admin',null,null), $file);

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

          return view('admin-panel.my-agency_admin.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'agency_admin', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["services"]=\App\Models\MyDeliveries::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["services"]=\App\Models\MyAgency_AdminDeliveries::whereIn("deliveries_id",$selectIds["services"])
                    ->pluck("agency_admin_id")->toArray();
          }
          $query=MyAgency_Admin::where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhere("username", 'like', '%'.$search.'%');
          $q->orWhere("password", 'like', '%'.$search.'%');
          $q->orWhere("name", 'like', '%'.$search.'%');
          $q->orWhere("email", 'like', '%'.$search.'%');
          $q->orWhere("level", 'like', '%'.$search.'%');
          $q->orWhere("notif_token", 'like', '%'.$search.'%');
          $q->orWhere("number", 'like', '%'.$search.'%');
          $q->orWhereIn("id", $selectIds["services"]);
          $q->orWhere("commission", 'like', '%'.$search.'%');
          $q->orWhere("address", 'like', '%'.$search.'%');
          $q->orWhere("title", 'like', '%'.$search.'%');
          $q->orWhere("image", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $agency_admin){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-agency_admin.table-data',["type"=>"datatable-counter","agency_admin"=>$agency_admin,"counter"=>$start+$counter+1])->render();
          $json["username"]=view('admin-panel.my-agency_admin.table-data',["type"=>"username","agency_admin"=>$agency_admin])->render();
          $json["name"]=view('admin-panel.my-agency_admin.table-data',["type"=>"name","agency_admin"=>$agency_admin])->render();
          $json["services"]=view('admin-panel.my-agency_admin.table-data',["type"=>"services","agency_admin"=>$agency_admin])->render();
          $json["commission"]=view('admin-panel.my-agency_admin.table-data',["type"=>"commission","agency_admin"=>$agency_admin])->render();
          $json["address"]=view('admin-panel.my-agency_admin.table-data',["type"=>"address","agency_admin"=>$agency_admin])->render();
          $json["title"]=view('admin-panel.my-agency_admin.table-data',["type"=>"title","agency_admin"=>$agency_admin])->render();
          $json["image"]=view('admin-panel.my-agency_admin.table-data',["type"=>"image","agency_admin"=>$agency_admin])->render();
          $json['datatable-actions']=view('admin-panel.my-agency_admin.table-data',["type"=>"datatable-actions","agency_admin"=>$agency_admin])->render();
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

          return view('admin-panel.my-agency_admin.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"agency_admin");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $agency_admin=MyAgency_Admin::find($id);
          return view('admin-panel.my-agency_admin.edit',compact('agency_admin'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"agency_admin",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"agency_admin",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
