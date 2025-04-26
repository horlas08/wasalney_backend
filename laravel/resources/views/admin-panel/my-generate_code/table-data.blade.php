@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$generate_code->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="count")
{{$generate_code->count}}
@elseif($type=="price")
{{$generate_code->price}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','generate_code'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'generate_code','id'=>$generate_code->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','generate_code'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'generate_code','id'=>$generate_code->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','info_code'))
           <li>
                <a href="{{route('record.index',['slug'=>'info_code','parentSlug'=>'generate_code','parentId'=>$generate_code->id])}}"
                type="button" class="dropdown-item" >{{__("کد های شارژ")}}
                </a>
                </li>
@endif
</ul>
</div>
@endif
