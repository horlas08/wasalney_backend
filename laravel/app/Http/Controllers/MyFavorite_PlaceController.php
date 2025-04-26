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
use App\Models\MyFavorite_Place;
use PDF;

class MyFavorite_PlaceController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyFavorite_Place::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_favorite_place')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_favorite_place')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

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

            $records=MyFavorite_Place::orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'favorite_place',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-favorite_place.export', $data);
            return $pdf->stream('favorite_place.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            $records=MyFavorite_Place::orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('favorite_place',$records), 'favorite_place.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'favorite_place',null,null), $file);

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

          return view('admin-panel.my-favorite_place.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'favorite_place', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["user"]=\App\Models\MyUsers::where(function($q) use ($search){
          $q->orWhere("name","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyFavorite_Place::where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhere("title", 'like', '%'.$search.'%');
          $q->orWhere("lat", 'like', '%'.$search.'%');
          $q->orWhere("long", 'like', '%'.$search.'%');
          $q->orWhere("address", 'like', '%'.$search.'%');
          $q->orWhereIn("user", $selectIds["user"]);
          $q->orWhere("count", 'like', '%'.$search.'%');
          $q->orWhere("name", 'like', '%'.$search.'%');
          $q->orWhere("phone", 'like', '%'.$search.'%');
          $q->orWhere("plack", 'like', '%'.$search.'%');
          $q->orWhere("unit", 'like', '%'.$search.'%');
          $q->orWhere("description", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $favorite_place){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-favorite_place.table-data',["type"=>"datatable-counter","favorite_place"=>$favorite_place,"counter"=>$start+$counter+1])->render();
          $json["title"]=view('admin-panel.my-favorite_place.table-data',["type"=>"title","favorite_place"=>$favorite_place])->render();
          $json["lat"]=view('admin-panel.my-favorite_place.table-data',["type"=>"lat","favorite_place"=>$favorite_place])->render();
          $json["long"]=view('admin-panel.my-favorite_place.table-data',["type"=>"long","favorite_place"=>$favorite_place])->render();
          $json["address"]=view('admin-panel.my-favorite_place.table-data',["type"=>"address","favorite_place"=>$favorite_place])->render();
          $json["user"]=view('admin-panel.my-favorite_place.table-data',["type"=>"user","favorite_place"=>$favorite_place])->render();
          $json["name"]=view('admin-panel.my-favorite_place.table-data',["type"=>"name","favorite_place"=>$favorite_place])->render();
          $json["phone"]=view('admin-panel.my-favorite_place.table-data',["type"=>"phone","favorite_place"=>$favorite_place])->render();
          $json["plack"]=view('admin-panel.my-favorite_place.table-data',["type"=>"plack","favorite_place"=>$favorite_place])->render();
          $json["unit"]=view('admin-panel.my-favorite_place.table-data',["type"=>"unit","favorite_place"=>$favorite_place])->render();
          $json["description"]=view('admin-panel.my-favorite_place.table-data',["type"=>"description","favorite_place"=>$favorite_place])->render();
          $json['datatable-actions']=view('admin-panel.my-favorite_place.table-data',["type"=>"datatable-actions","favorite_place"=>$favorite_place])->render();
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

          return view('admin-panel.my-favorite_place.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"favorite_place");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $favorite_place=MyFavorite_Place::find($id);
          return view('admin-panel.my-favorite_place.edit',compact('favorite_place'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"favorite_place",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"favorite_place",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
