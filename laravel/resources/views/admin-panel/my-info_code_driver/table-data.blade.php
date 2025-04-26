@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$info_code_driver->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="code")
{{$info_code_driver->code}}
@elseif($type=="price")
{{$info_code_driver->price}}
@elseif($type=="used")
<div class="custom-control custom-checkbox mb-3 text-center">
<input {{\App\Models\Admin::checkAccess('record','edit','info_code_driver')?'':'disabled'}} {{$info_code_driver->used?'checked':''}}
onclick="onCheckbox(this,'{{route('record.active',['slug'=>'info_code_driver','fieldName'=>'used','id'=>$info_code_driver->id])}}')"
type="checkbox" class="form-check-input" id="customCheck{{'used_'.$info_code_driver->id}}"/>
@elseif($type=="driver")
@if($drivers=\App\Models\MyDrivers::find($info_code_driver->driver))
{{"$drivers->name $drivers->mobile"}}
@endif
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','info_code_driver'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'info_code_driver','id'=>$info_code_driver->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','info_code_driver'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'info_code_driver','id'=>$info_code_driver->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
