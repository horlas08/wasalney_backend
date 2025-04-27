@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$path_info->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="name")
{{$path_info->name}}
@elseif($type=="lat")
{{$path_info->lat}}
@elseif($type=="long")
{{$path_info->long}}
@elseif($type=="address")
{{$path_info->address}}
@elseif($type=="description")
{{$path_info->description}}
@elseif($type=="phone")
{{$path_info->phone}}
@elseif($type=="house_number")
{{$path_info->house_number}}
@elseif($type=="unit")
{{$path_info->unit}}
@elseif($type=="type")
{{$path_info->type}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','path_info'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'path_info','id'=>$path_info->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','path_info'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'path_info','id'=>$path_info->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
