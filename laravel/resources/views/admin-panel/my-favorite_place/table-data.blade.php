@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$favorite_place->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="title")
{{$favorite_place->title}}
@elseif($type=="lat")
{{$favorite_place->lat}}
@elseif($type=="long")
{{$favorite_place->long}}
@elseif($type=="address")
{{$favorite_place->address}}
@elseif($type=="user")
@if($users=\App\Models\MyUsers::find($favorite_place->user))
{{"$users->name"}}
@endif
@elseif($type=="name")
{{$favorite_place->name}}
@elseif($type=="phone")
{{$favorite_place->phone}}
@elseif($type=="plack")
{{$favorite_place->plack}}
@elseif($type=="unit")
{{$favorite_place->unit}}
@elseif($type=="description")
{{$favorite_place->description}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','favorite_place'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'favorite_place','id'=>$favorite_place->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','favorite_place'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'favorite_place','id'=>$favorite_place->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
