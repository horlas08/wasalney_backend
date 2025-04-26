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
use App\Models\MyCar_Details;
use PDF;

class MyCar_DetailsController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyCar_Details::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_car_details')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_car_details')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

            }
            return true;


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }

    


    function pdf(Request $request,$parentSlug=null,$parentId=null)
    {
        try {

            $records=MyCar_Details::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'car_details',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-car_details.export', $data);
            return $pdf->stream('car_details.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request,$parentSlug=null,$parentId=null)
    {
        try {

            $records=MyCar_Details::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('car_details',$records), 'car_details.xlsx');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    public function import(Request $request,$parentSlug=null,$parentId=null)
    {
        try {
            $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

            if (!$receiver->isUploaded()) {
                throw new UploadMissingFileException();
            }

            $fileReceived = $receiver->receive(); // receive file
            if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
                $file = $fileReceived->getFile(); // get file


                Excel::import(new RecordImport($request->user('admin'),getLang(),'car_details',$parentSlug,$parentId), $file);

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


    function index($parentSlug=null,$parentId=null)
    {
        try {

          return view('admin-panel.my-car_details.index',compact('parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function pagination(Request $request,$parentSlug=null,$parentId=null){
        try {

          $search=$request->search['value'];
            $start=$request->start;
            $length=$request->length;
            $orderIndex=$request->order[0]['column'];
            $orderDir=$request->order[0]['dir'];
            $orderColumn=$request->columns[$orderIndex]['data'];
            Session::put('dataTableInfo',(object)['slug'=>'car_details', 'parentSlug'=>$parentSlug,'parentId'=>$parentId,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["fuel_type"]=\App\Models\MyFuel_Type::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyCar_Details::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhere("color", 'like', '%'.$search.'%');
          $q->orWhere("car_tag", 'like', '%'.$search.'%');
          $q->orWhereIn("fuel_type", $selectIds["fuel_type"]);
          $q->orWhere("vin", 'like', '%'.$search.'%');
          $q->orWhere("year_made", 'like', '%'.$search.'%');
          $q->orWhere("model", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $car_details){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-car_details.table-data',["type"=>"datatable-counter","car_details"=>$car_details,"counter"=>$start+$counter+1])->render();
          $json["color"]=view('admin-panel.my-car_details.table-data',["type"=>"color","car_details"=>$car_details])->render();
          $json["car_tag"]=view('admin-panel.my-car_details.table-data',["type"=>"car_tag","car_details"=>$car_details])->render();
          $json["fuel_type"]=view('admin-panel.my-car_details.table-data',["type"=>"fuel_type","car_details"=>$car_details])->render();
          $json["year_made"]=view('admin-panel.my-car_details.table-data',["type"=>"year_made","car_details"=>$car_details])->render();
          $json["model"]=view('admin-panel.my-car_details.table-data',["type"=>"model","car_details"=>$car_details])->render();
          $json['datatable-actions']=view('admin-panel.my-car_details.table-data',["type"=>"datatable-actions","car_details"=>$car_details])->render();
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



    function storeform($parentSlug=null,$parentId=null)
    {
        try {

          return view('admin-panel.my-car_details.store',compact('parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request,$parentSlug=null,$parentId=null)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"car_details",$parentSlug,$parentId);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $car_details=MyCar_Details::find($id);
          $parentSlug=$car_details->parent_slug;
          $parentId=$car_details->parent_id;
          return view('admin-panel.my-car_details.edit',compact('car_details','parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"car_details",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"car_details",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
