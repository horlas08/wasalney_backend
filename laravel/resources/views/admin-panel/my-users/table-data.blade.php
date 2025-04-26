@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$users->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="email")
{{$users->email}}
@elseif($type=="name")
{{$users->name}}
@elseif($type=="address")
{{$users->address}}
@elseif($type=="mobile")
{{$users->mobile}}
@elseif($type=="image")
<div class="d-flex justify-content-center align-items-center">
@if($users->image!=null)
<a href="{{'/files/'.$users->image}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content">
<img src="{{'/files/'.$users->image}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="birth_date")
@if($users->birth_date)
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $users->birth_date))->format('%A, %d %B %Y')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $users->birth_date)->format('M d Y')}}
@endif
@endif
@elseif($type=="code")
{{$users->code}}
@elseif($type=="intro_code")
{{$users->intro_code}}
@elseif($type=="credit")
{{$users->credit}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','users'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'users','id'=>$users->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','users'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'users','id'=>$users->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
    @if(\App\Models\Admin::checkAccess('record','show','rate_user'))
        <li>
            <a href="{{route('record.index',['slug'=>'rate_user','parentSlug'=>'users','parentId'=>$users->id])}}"
               type="button" class="dropdown-item">{{__("امتیاز ها")}}
            </a>
        </li>
    @endif
    @if(\App\Models\Admin::checkAccess('record','show','wallet'))
           <li>
                <a href="{{route('record.index',['slug'=>'wallet','parentSlug'=>'users','parentId'=>$users->id])}}"
                type="button" class="dropdown-item" >{{__("کیف پول")}}
                </a>
                </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','repetitive_place'))
           <li>
                <a href="{{route('record.index',['slug'=>'repetitive_place','parentSlug'=>'users','parentId'=>$users->id])}}"
                type="button" class="dropdown-item" >{{__("مسیرهای پرتکرار")}}
                </a>
                </li>
@endif
</ul>
</div>
@endif
