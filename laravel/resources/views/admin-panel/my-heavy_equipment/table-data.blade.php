@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$heavy_equipment->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="icon")
<div class="d-flex justify-content-center align-items-center">
@if($heavy_equipment->icon!=null)
<a href="{{'/files/'.$heavy_equipment->icon}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/files/'.$heavy_equipment->icon}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="name")
{{$heavy_equipment->name}}
@elseif($type=="description")
{{$heavy_equipment->description}}
@elseif($type=="price")
{{$heavy_equipment->price}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','heavy_equipment'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'heavy_equipment','id'=>$heavy_equipment->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','heavy_equipment'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'heavy_equipment','id'=>$heavy_equipment->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
