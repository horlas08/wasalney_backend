@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$fuel_type->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="title")
{{$fuel_type->title}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','fuel_type'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'fuel_type','id'=>$fuel_type->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','fuel_type'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'fuel_type','id'=>$fuel_type->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
