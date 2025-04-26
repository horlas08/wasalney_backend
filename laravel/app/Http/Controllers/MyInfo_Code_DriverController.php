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
use App\Models\MyInfo_Code_Driver;
use PDF;

class MyInfo_Code_DriverController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyInfo_Code_Driver::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_info_code_driver')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_info_code_driver')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

            }
            return true;


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }

    function usedActive($id){
        try {
            $info_code_driver=MyInfo_Code_Driver::find($id);
            if($info_code_driver->used)
                $info_code_driver->used=0;
            else
                $info_code_driver->used=1;
            $info_code_driver->save();

            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }


    function pdf(Request $request,$parentSlug=null,$parentId=null)
    {
        try {

            $records=MyInfo_Code_Driver::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'info_code_driver',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-info_code_driver.export', $data);
            return $pdf->stream('info_code_driver.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request,$parentSlug=null,$parentId=null)
    {
        try {

            $records=MyInfo_Code_Driver::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('info_code_driver',$records), 'info_code_driver.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'info_code_driver',$parentSlug,$parentId), $file);

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

          return view('admin-panel.my-info_code_driver.index',compact('parentSlug','parentId'));

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
            Session::put('dataTableInfo',(object)['slug'=>'info_code_driver', 'parentSlug'=>$parentSlug,'parentId'=>$parentId,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["driver"]=\App\Models\MyDrivers::where(function($q) use ($search){
          $q->orWhere("name","like", "%".$search."%");
          $q->orWhere("mobile","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyInfo_Code_Driver::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhere("code", 'like', '%'.$search.'%');
          $q->orWhere("price", 'like', '%'.$search.'%');
          $q->orWhere("used", 'like', '%'.$search.'%');
          $q->orWhereIn("driver", $selectIds["driver"]);
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $info_code_driver){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-info_code_driver.table-data',["type"=>"datatable-counter","info_code_driver"=>$info_code_driver,"counter"=>$start+$counter+1])->render();
          $json["code"]=view('admin-panel.my-info_code_driver.table-data',["type"=>"code","info_code_driver"=>$info_code_driver])->render();
          $json["price"]=view('admin-panel.my-info_code_driver.table-data',["type"=>"price","info_code_driver"=>$info_code_driver])->render();
          $json["used"]=view('admin-panel.my-info_code_driver.table-data',["type"=>"used","info_code_driver"=>$info_code_driver])->render();
          $json["driver"]=view('admin-panel.my-info_code_driver.table-data',["type"=>"driver","info_code_driver"=>$info_code_driver])->render();
          $json['datatable-actions']=view('admin-panel.my-info_code_driver.table-data',["type"=>"datatable-actions","info_code_driver"=>$info_code_driver])->render();
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

          return view('admin-panel.my-info_code_driver.store',compact('parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request,$parentSlug=null,$parentId=null)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"info_code_driver",$parentSlug,$parentId);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $info_code_driver=MyInfo_Code_Driver::find($id);
          $parentSlug=$info_code_driver->parent_slug;
          $parentId=$info_code_driver->parent_id;
          return view('admin-panel.my-info_code_driver.edit',compact('info_code_driver','parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"info_code_driver",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"info_code_driver",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
