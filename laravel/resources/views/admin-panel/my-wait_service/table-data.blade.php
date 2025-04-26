@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$wait_service->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="image")
<div class="d-flex justify-content-center align-items-center">
@if($wait_service->image!=null)
<a href="{{'/files/'.$wait_service->image}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/files/'.$wait_service->image}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="description")
{{$wait_service->description}}
@elseif($type=="name")
{{$wait_service->name}}
@elseif($type=="image_waiting")
<div class="d-flex justify-content-center align-items-center">
@if($wait_service->image_waiting!=null)
<a href="{{'/files/'.$wait_service->image_waiting}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/files/'.$wait_service->image_waiting}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="description_waiting")
{{$wait_service->description_waiting}}
@elseif($type=="title_waiting")
{{$wait_service->title_waiting}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','wait_service'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'wait_service','id'=>$wait_service->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','wait_service'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'wait_service','id'=>$wait_service->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
