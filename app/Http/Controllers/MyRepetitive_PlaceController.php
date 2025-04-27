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
use App\Models\MyRepetitive_Place;
use PDF;

class MyRepetitive_PlaceController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyRepetitive_Place::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_repetitive_place')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_repetitive_place')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

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

            $records=MyRepetitive_Place::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'repetitive_place',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-repetitive_place.export', $data);
            return $pdf->stream('repetitive_place.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request,$parentSlug=null,$parentId=null)
    {
        try {

            $records=MyRepetitive_Place::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('repetitive_place',$records), 'repetitive_place.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'repetitive_place',$parentSlug,$parentId), $file);

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

          return view('admin-panel.my-repetitive_place.index',compact('parentSlug','parentId'));

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
            Session::put('dataTableInfo',(object)['slug'=>'repetitive_place', 'parentSlug'=>$parentSlug,'parentId'=>$parentId,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["origin"]=\App\Models\MyFavorite_Place::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["destination"]=\App\Models\MyFavorite_Place::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["delivery"]=\App\Models\MyDeliveries::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyRepetitive_Place::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhereIn("origin", $selectIds["origin"]);
          $q->orWhereIn("destination", $selectIds["destination"]);
          $q->orWhereIn("delivery", $selectIds["delivery"]);
          $q->orWhere("title_origin", 'like', '%'.$search.'%');
          $q->orWhere("lat_origin", 'like', '%'.$search.'%');
          $q->orWhere("long_origin", 'like', '%'.$search.'%');
          $q->orWhere("lat_destination", 'like', '%'.$search.'%');
          $q->orWhere("long_destination", 'like', '%'.$search.'%');
          $q->orWhere("title_destination", 'like', '%'.$search.'%');
          $q->orWhere("address_origin", 'like', '%'.$search.'%');
          $q->orWhere("address_destination", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $repetitive_place){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-repetitive_place.table-data',["type"=>"datatable-counter","repetitive_place"=>$repetitive_place,"counter"=>$start+$counter+1])->render();
          $json["origin"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"origin","repetitive_place"=>$repetitive_place])->render();
          $json["destination"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"destination","repetitive_place"=>$repetitive_place])->render();
          $json["delivery"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"delivery","repetitive_place"=>$repetitive_place])->render();
          $json["title_origin"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"title_origin","repetitive_place"=>$repetitive_place])->render();
          $json["lat_origin"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"lat_origin","repetitive_place"=>$repetitive_place])->render();
          $json["long_origin"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"long_origin","repetitive_place"=>$repetitive_place])->render();
          $json["lat_destination"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"lat_destination","repetitive_place"=>$repetitive_place])->render();
          $json["long_destination"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"long_destination","repetitive_place"=>$repetitive_place])->render();
          $json["title_destination"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"title_destination","repetitive_place"=>$repetitive_place])->render();
          $json["address_origin"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"address_origin","repetitive_place"=>$repetitive_place])->render();
          $json["address_destination"]=view('admin-panel.my-repetitive_place.table-data',["type"=>"address_destination","repetitive_place"=>$repetitive_place])->render();
          $json['datatable-actions']=view('admin-panel.my-repetitive_place.table-data',["type"=>"datatable-actions","repetitive_place"=>$repetitive_place])->render();
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

          return view('admin-panel.my-repetitive_place.store',compact('parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request,$parentSlug=null,$parentId=null)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"repetitive_place",$parentSlug,$parentId);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $repetitive_place=MyRepetitive_Place::find($id);
          $parentSlug=$repetitive_place->parent_slug;
          $parentId=$repetitive_place->parent_id;
          return view('admin-panel.my-repetitive_place.edit',compact('repetitive_place','parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"repetitive_place",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"repetitive_place",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
