@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$car_details->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="color")
{{$car_details->color}}
@elseif($type=="car_tag")
{{$car_details->car_tag}}
@elseif($type=="fuel_type")
@if($fuel_type=\App\Models\MyFuel_Type::find($car_details->fuel_type))
{{"$fuel_type->title"}}
@endif
@elseif($type=="year_made")
{{$car_details->year_made}}
@elseif($type=="model")
{{$car_details->model}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','car_details'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'car_details','id'=>$car_details->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','car_details'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'car_details','id'=>$car_details->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
