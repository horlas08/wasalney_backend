@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$floor_detail->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="count")
{{$floor_detail->count}}
@elseif($type=="price")
{{$floor_detail->price}}
@elseif($type=="elevator")
<div class="custom-control custom-checkbox mb-3 text-center">
<input {{\App\Models\Admin::checkAccess('record','edit','floor_detail')?'':'disabled'}} {{$floor_detail->elevator?'checked':''}}
onclick="onCheckbox(this,'{{route('record.active',['slug'=>'floor_detail','fieldName'=>'elevator','id'=>$floor_detail->id])}}')"
type="checkbox" class="form-check-input" id="customCheck{{'elevator_'.$floor_detail->id}}"/>
@elseif($type=="place")
{{$floor_detail->place}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','floor_detail'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'floor_detail','id'=>$floor_detail->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','floor_detail'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'floor_detail','id'=>$floor_detail->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
