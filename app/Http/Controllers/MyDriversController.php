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
use App\Models\MyDrivers;
use PDF;

class MyDriversController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyDrivers::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_drivers')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_drivers')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

            }
            return true;


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }

    function stateActive($id){
        try {
            $drivers=MyDrivers::find($id);
            if($drivers->state)
                $drivers->state=0;
            else
                $drivers->state=1;
            $drivers->save();

            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }


    function pdf(Request $request)
    {
        try {

            //start
            $filter=Session::get('filterDrivers');
            $records=MyDrivers::orderBy('sort','DESC')->where(function ($q) use ($filter) {

                if ($filter->from != null) {
                    $q->where('credit', '>=', $filter->from);
                }
                if ($filter->to != null) {
                    $q->where('credit', '<=', $filter->to);
                }

            }
            )->get();
            //end
            $data = [
                'slug' => 'drivers',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-drivers.export', $data);
            return $pdf->stream('drivers.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {
            //start
            $filter=Session::get('filterDrivers');
            $records=MyDrivers::orderBy('sort','DESC')->where(function ($q) use ($filter) {

                if ($filter->from != null) {
                    $q->where('credit', '>=', $filter->from);
                }
                if ($filter->to != null) {
                    $q->where('credit', '<=', $filter->to);
                }

            }
            )->get();
            //end
            return Excel::download(new RecordExport('drivers',$records), 'drivers.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'drivers',null,null), $file);

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


    function index(Request $request)
    {
        try {
            //start
            Session::put('filterDrivers',(object)['from'=>$request->from, 'to'=>$request->to]);
            //end
          return view('admin-panel.my-drivers.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'drivers', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["certificate_type"]=\App\Models\MyCertificates_Types::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["type_activity"]=\App\Models\MyDeliveries::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["level"]=\App\Models\MyLevel::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();

          $selectIds["car_model"]=\App\Models\MyCar_Models::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyDrivers::where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhere("name", 'like', '%'.$search.'%');
          $q->orWhere("mobile", 'like', '%'.$search.'%');
          $q->orWhere("code_meli", 'like', '%'.$search.'%');
          $q->orWhere("gender", 'like', '%'.$search.'%');
          $q->orWhere("verify_code", 'like', '%'.$search.'%');
          $q->orWhere("lat", 'like', '%'.$search.'%');
          $q->orWhere("long", 'like', '%'.$search.'%');
          $q->orWhere("number_licence", 'like', '%'.$search.'%');
          $q->orWhereIn("certificate_type", $selectIds["certificate_type"]);
          $q->orWhereIn("type_activity", $selectIds["type_activity"]);
          $q->orWhere("state", 'like', '%'.$search.'%');
          $q->orWhere("image", 'like', '%'.$search.'%');
          $q->orWhere("certificat_date", 'like', '%'.$search.'%');
          $q->orWhere("certificate_validity", 'like', '%'.$search.'%');
          $q->orWhereIn("level", $selectIds["level"]);
          $q->orWhere("credit", 'like', '%'.$search.'%');
          $q->orWhere("notif_token", 'like', '%'.$search.'%');
          $q->orWhere("car_tag", 'like', '%'.$search.'%');
          $q->orWhereIn("car_model", $selectIds["car_model"]);
          $q->orWhere("code", 'like', '%'.$search.'%');
          $q->orWhere("intro_code", 'like', '%'.$search.'%');
          }});
            //start
            $query->where(function ($q) {
                $filter=Session::get('filterDrivers');

                if ($filter->from != null) {
                    $q->where('credit', '>=', $filter->from);
                }
                if ($filter->to != null) {
                    $q->where('credit', '<=', $filter->to);
                }

            });
            //end
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $drivers){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-drivers.table-data',["type"=>"datatable-counter","drivers"=>$drivers,"counter"=>$start+$counter+1])->render();
          $json["name"]=view('admin-panel.my-drivers.table-data',["type"=>"name","drivers"=>$drivers])->render();
          $json["mobile"]=view('admin-panel.my-drivers.table-data',["type"=>"mobile","drivers"=>$drivers])->render();
          $json["code_meli"]=view('admin-panel.my-drivers.table-data',["type"=>"code_meli","drivers"=>$drivers])->render();
          $json["gender"]=view('admin-panel.my-drivers.table-data',["type"=>"gender","drivers"=>$drivers])->render();
          $json["car_detail"]=view('admin-panel.my-drivers.table-data',["type"=>"car_detail","drivers"=>$drivers])->render();

          $json["family_number"]=view('admin-panel.my-drivers.table-data',["type"=>"family_number","drivers"=>$drivers])->render();
          $json["fcm_token"]=view('admin-panel.my-drivers.table-data',["type"=>"fcm_token","drivers"=>$drivers])->render();

          $json["rate"] = view('admin-panel.my-drivers.table-data', ["type" => "rate", "drivers" => $drivers])->render();
          $json["state_approval"] = view('admin-panel.my-drivers.table-data', ["type" => "state_approval", "drivers" => $drivers])->render();
          $json["lat"]=view('admin-panel.my-drivers.table-data',["type"=>"lat","drivers"=>$drivers])->render();
          $json["long"]=view('admin-panel.my-drivers.table-data',["type"=>"long","drivers"=>$drivers])->render();
          $json["number_licence"]=view('admin-panel.my-drivers.table-data',["type"=>"number_licence","drivers"=>$drivers])->render();
          $json["certificate_type"]=view('admin-panel.my-drivers.table-data',["type"=>"certificate_type","drivers"=>$drivers])->render();
          $json["type_activity"]=view('admin-panel.my-drivers.table-data',["type"=>"type_activity","drivers"=>$drivers])->render();
          $json["state"]=view('admin-panel.my-drivers.table-data',["type"=>"state","drivers"=>$drivers])->render();
          $json["image"]=view('admin-panel.my-drivers.table-data',["type"=>"image","drivers"=>$drivers])->render();
          $json["certificat_date"]=view('admin-panel.my-drivers.table-data',["type"=>"certificat_date","drivers"=>$drivers])->render();
          $json["certificate_validity"]=view('admin-panel.my-drivers.table-data',["type"=>"certificate_validity","drivers"=>$drivers])->render();
          $json["level"]=view('admin-panel.my-drivers.table-data',["type"=>"level","drivers"=>$drivers])->render();
          $json["credit"]=view('admin-panel.my-drivers.table-data',["type"=>"credit","drivers"=>$drivers])->render();
          $json["notif_token"]=view('admin-panel.my-drivers.table-data',["type"=>"notif_token","drivers"=>$drivers])->render();
          $json["car_tag"]=view('admin-panel.my-drivers.table-data',["type"=>"car_tag","drivers"=>$drivers])->render();

          $json["description"]=view('admin-panel.my-drivers.table-data',["type"=>"description","drivers"=>$drivers])->render();
          $json["car_model"]=view('admin-panel.my-drivers.table-data',["type"=>"car_model","drivers"=>$drivers])->render();
          $json["code"]=view('admin-panel.my-drivers.table-data',["type"=>"code","drivers"=>$drivers])->render();
          $json["intro_code"]=view('admin-panel.my-drivers.table-data',["type"=>"intro_code","drivers"=>$drivers])->render();
          $json["has_profile"]=view('admin-panel.my-drivers.table-data',["type"=>"has_profile","drivers"=>$drivers])->render();
          $json["has_info_user"]=view('admin-panel.my-drivers.table-data',["type"=>"has_info_user","drivers"=>$drivers])->render();
          $json["has_info_bank"]=view('admin-panel.my-drivers.table-data',["type"=>"has_info_bank","drivers"=>$drivers])->render();
          $json["has_car_details"]=view('admin-panel.my-drivers.table-data',["type"=>"has_car_details","drivers"=>$drivers])->render();
          $json["has_documents"]=view('admin-panel.my-drivers.table-data',["type"=>"has_documents","drivers"=>$drivers])->render();
          $json['datatable-actions']=view('admin-panel.my-drivers.table-data',["type"=>"datatable-actions","drivers"=>$drivers])->render();
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

          return view('admin-panel.my-drivers.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"drivers");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $drivers=MyDrivers::find($id);
          return view('admin-panel.my-drivers.edit',compact('drivers'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"drivers",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"drivers",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
