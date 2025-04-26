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
use App\Models\MyDeliveries;
use PDF;

class MyDeliveriesController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyDeliveries::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_deliveries')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_deliveries')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

            }
            return true;


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }

    function showActive($id){
        try {
            $deliveries=MyDeliveries::find($id);
            if($deliveries->show)
                $deliveries->show=0;
            else
                $deliveries->show=1;
            $deliveries->save();

            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }function have_economicActive($id){
        try {
            $deliveries=MyDeliveries::find($id);
            if($deliveries->have_economic)
                $deliveries->have_economic=0;
            else
                $deliveries->have_economic=1;
            $deliveries->save();

            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }


    function pdf(Request $request)
    {
        try {

            $records=MyDeliveries::orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'deliveries',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-deliveries.export', $data);
            return $pdf->stream('deliveries.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            $records=MyDeliveries::orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('deliveries',$records), 'deliveries.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'deliveries',null,null), $file);

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

          return view('admin-panel.my-deliveries.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'deliveries', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["type"]=\App\Models\MyServices_Type::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["service"]=\App\Models\MyDeliveries::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyDeliveries::where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhere("image", 'like', '%'.$search.'%');
          $q->orWhere("title", 'like', '%'.$search.'%');
          $q->orWhere("base_price", 'like', '%'.$search.'%');
          $q->orWhere("price", 'like', '%'.$search.'%');
          $q->orWhere("hurry_price", 'like', '%'.$search.'%');
          $q->orWhere("image_waiting", 'like', '%'.$search.'%');
          $q->orWhere("title_waiting", 'like', '%'.$search.'%');
          $q->orWhere("description_waiting", 'like', '%'.$search.'%');
          $q->orWhere("back_price", 'like', '%'.$search.'%');
          $q->orWhere("token", 'like', '%'.$search.'%');
          $q->orWhereIn("type", $selectIds["type"]);
          $q->orWhere("decrease_percent", 'like', '%'.$search.'%');
          $q->orWhere("economic_icon", 'like', '%'.$search.'%');
          $q->orWhere("time_price", 'like', '%'.$search.'%');
          $q->orWhereIn("service", $selectIds["service"]);
          $q->orWhere("show", 'like', '%'.$search.'%');
          $q->orWhere("have_economic", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $deliveries){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-deliveries.table-data',["type"=>"datatable-counter","deliveries"=>$deliveries,"counter"=>$start+$counter+1])->render();
          $json["image"]=view('admin-panel.my-deliveries.table-data',["type"=>"image","deliveries"=>$deliveries])->render();
          $json["title"]=view('admin-panel.my-deliveries.table-data',["type"=>"title","deliveries"=>$deliveries])->render();
          $json["base_price"]=view('admin-panel.my-deliveries.table-data',["type"=>"base_price","deliveries"=>$deliveries])->render();
          $json["price"]=view('admin-panel.my-deliveries.table-data',["type"=>"price","deliveries"=>$deliveries])->render();
          $json["hurry_price"]=view('admin-panel.my-deliveries.table-data',["type"=>"hurry_price","deliveries"=>$deliveries])->render();
          $json["image_waiting"]=view('admin-panel.my-deliveries.table-data',["type"=>"image_waiting","deliveries"=>$deliveries])->render();
          $json["title_waiting"]=view('admin-panel.my-deliveries.table-data',["type"=>"title_waiting","deliveries"=>$deliveries])->render();
          $json["description_waiting"]=view('admin-panel.my-deliveries.table-data',["type"=>"description_waiting","deliveries"=>$deliveries])->render();
          $json["back_price"]=view('admin-panel.my-deliveries.table-data',["type"=>"back_price","deliveries"=>$deliveries])->render();
          $json["type"]=view('admin-panel.my-deliveries.table-data',["type"=>"type","deliveries"=>$deliveries])->render();
          $json["decrease_percent"]=view('admin-panel.my-deliveries.table-data',["type"=>"decrease_percent","deliveries"=>$deliveries])->render();
          $json["economic_icon"]=view('admin-panel.my-deliveries.table-data',["type"=>"economic_icon","deliveries"=>$deliveries])->render();
          $json["time_price"]=view('admin-panel.my-deliveries.table-data',["type"=>"time_price","deliveries"=>$deliveries])->render();
          $json["service"]=view('admin-panel.my-deliveries.table-data',["type"=>"service","deliveries"=>$deliveries])->render();
          $json["show"]=view('admin-panel.my-deliveries.table-data',["type"=>"show","deliveries"=>$deliveries])->render();
          $json["have_economic"]=view('admin-panel.my-deliveries.table-data',["type"=>"have_economic","deliveries"=>$deliveries])->render();
          $json['datatable-actions']=view('admin-panel.my-deliveries.table-data',["type"=>"datatable-actions","deliveries"=>$deliveries])->render();
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

          return view('admin-panel.my-deliveries.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"deliveries");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $deliveries=MyDeliveries::find($id);
          return view('admin-panel.my-deliveries.edit',compact('deliveries'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"deliveries",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"deliveries",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
