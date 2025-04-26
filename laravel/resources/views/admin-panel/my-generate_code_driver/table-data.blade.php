@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$generate_code_driver->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="count")
{{$generate_code_driver->count}}
@elseif($type=="price")
{{$generate_code_driver->price}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','generate_code_driver'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'generate_code_driver','id'=>$generate_code_driver->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','generate_code_driver'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'generate_code_driver','id'=>$generate_code_driver->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','info_code_driver'))
           <li>
                <a href="{{route('record.index',['slug'=>'info_code_driver','parentSlug'=>'generate_code_driver','parentId'=>$generate_code_driver->id])}}"
                type="button" class="dropdown-item" >{{__("معلومات رمز الرصید السائق")}}
                </a>
                </li>
@endif
</ul>
</div>
@endif
