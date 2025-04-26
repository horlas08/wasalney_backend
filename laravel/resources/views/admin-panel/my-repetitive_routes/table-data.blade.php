@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$repetitive_routes->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="origin")
@if($favorite_place=\App\Models\MyFavorite_Place::find($repetitive_routes->origin))
{{"$favorite_place->title"}}
@endif
@elseif($type=="destination")
@if($favorite_place=\App\Models\MyFavorite_Place::find($repetitive_routes->destination))
{{"$favorite_place->title"}}
@endif
@elseif($type=="count")
{{$repetitive_routes->count}}
@elseif($type=="delivery")
@if($deliveries=\App\Models\MyDeliveries::find($repetitive_routes->delivery))
{{"$deliveries->title"}}
@endif
@elseif($type=="user")
@if($users=\App\Models\MyUsers::find($repetitive_routes->user))
{{"($users->mobile)$users->name"}}
@endif
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','repetitive_routes'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'repetitive_routes','id'=>$repetitive_routes->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','repetitive_routes'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'repetitive_routes','id'=>$repetitive_routes->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
