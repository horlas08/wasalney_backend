@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$repetitive_place->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="origin")
@if($favorite_place=\App\Models\MyFavorite_Place::find($repetitive_place->origin))
{{"$favorite_place->title"}}
@endif
@elseif($type=="destination")
@if($favorite_place=\App\Models\MyFavorite_Place::find($repetitive_place->destination))
{{"$favorite_place->title"}}
@endif
@elseif($type=="delivery")
@if($deliveries=\App\Models\MyDeliveries::find($repetitive_place->delivery))
{{"$deliveries->title"}}
@endif
@elseif($type=="title_origin")
{{$repetitive_place->title_origin}}
@elseif($type=="lat_origin")
{{$repetitive_place->lat_origin}}
@elseif($type=="long_origin")
{{$repetitive_place->long_origin}}
@elseif($type=="lat_destination")
{{$repetitive_place->lat_destination}}
@elseif($type=="long_destination")
{{$repetitive_place->long_destination}}
@elseif($type=="title_destination")
{{$repetitive_place->title_destination}}
@elseif($type=="address_origin")
{{$repetitive_place->address_origin}}
@elseif($type=="address_destination")
{{$repetitive_place->address_destination}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','repetitive_place'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'repetitive_place','id'=>$repetitive_place->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','repetitive_place'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'repetitive_place','id'=>$repetitive_place->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
