@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$deliveries->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="image")
<div class="d-flex justify-content-center align-items-center">
@if($deliveries->image!=null)
<a href="{{'/files/'.$deliveries->image}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/files/'.$deliveries->image}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="title")
{{$deliveries->title}}
@elseif($type=="base_price")
{{$deliveries->base_price}}
@elseif($type=="price")
{{$deliveries->price}}
@elseif($type=="hurry_price")
{{$deliveries->hurry_price}}
@elseif($type=="image_waiting")
<div class="d-flex justify-content-center align-items-center">
@if($deliveries->image_waiting!=null)
<a href="{{'/files/'.$deliveries->image_waiting}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/files/'.$deliveries->image_waiting}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="title_waiting")
{{$deliveries->title_waiting}}
@elseif($type=="description_waiting")
{{$deliveries->description_waiting}}
@elseif($type=="back_price")
{{$deliveries->back_price}}
@elseif($type=="type")
@if($services_type=\App\Models\MyServices_Type::find($deliveries->type))
{{"$services_type->title"}}
@endif
@elseif($type=="decrease_percent")
{{$deliveries->decrease_percent}}
@elseif($type=="economic_icon")
<div class="d-flex justify-content-center align-items-center">
@if($deliveries->economic_icon!=null)
<a href="{{'/files/'.$deliveries->economic_icon}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/files/'.$deliveries->economic_icon}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="time_price")
{{$deliveries->time_price}}
@elseif($type=="service")
@if($deliveries=\App\Models\MyDeliveries::find($deliveries->service))
{{"$deliveries->title"}}
@endif
@elseif($type=="show")
<div class="custom-control custom-checkbox mb-3 text-center">
<input {{\App\Models\Admin::checkAccess('record','edit','deliveries')?'':'disabled'}} {{$deliveries->show?'checked':''}}
onclick="onCheckbox(this,'{{route('record.active',['slug'=>'deliveries','fieldName'=>'show','id'=>$deliveries->id])}}')"
type="checkbox" class="form-check-input" id="customCheck{{'show_'.$deliveries->id}}"/>
@elseif($type=="have_economic")
<div class="custom-control custom-checkbox mb-3 text-center">
<input {{\App\Models\Admin::checkAccess('record','edit','deliveries')?'':'disabled'}} {{$deliveries->have_economic?'checked':''}}
onclick="onCheckbox(this,'{{route('record.active',['slug'=>'deliveries','fieldName'=>'have_economic','id'=>$deliveries->id])}}')"
type="checkbox" class="form-check-input" id="customCheck{{'have_economic_'.$deliveries->id}}"/>
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','deliveries'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'deliveries','id'=>$deliveries->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','deliveries'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'deliveries','id'=>$deliveries->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','stop_on_way'))
           <li>
                <a href="{{route('record.index',['slug'=>'stop_on_way','parentSlug'=>'deliveries','parentId'=>$deliveries->id])}}"
                type="button" class="dropdown-item" >{{__("توقف در مسیر")}}
                </a>
                </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','heavy_equipment'))
           <li>
                <a href="{{route('record.index',['slug'=>'heavy_equipment','parentSlug'=>'deliveries','parentId'=>$deliveries->id])}}"
                type="button" class="dropdown-item" >{{__("وسایل سنگین")}}
                </a>
                </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','worker_price'))
           <li>
                <a href="{{route('record.index',['slug'=>'worker_price','parentSlug'=>'deliveries','parentId'=>$deliveries->id])}}"
                type="button" class="dropdown-item" >{{__("تعیین قیمت کارگر")}}
                </a>
                </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','price_floors'))
           <li>
                <a href="{{route('record.index',['slug'=>'price_floors','parentSlug'=>'deliveries','parentId'=>$deliveries->id])}}"
                type="button" class="dropdown-item" >{{__("تحديد سعر الطوابق")}}
                </a>
                </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','cancel_trip'))
           <li>
                <a href="{{route('record.index',['slug'=>'cancel_trip','parentSlug'=>'deliveries','parentId'=>$deliveries->id])}}"
                type="button" class="dropdown-item" >{{__("دلایل لغو پس از قبول راننده")}}
                </a>
                </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','cancel_request'))
           <li>
                <a href="{{route('record.index',['slug'=>'cancel_request','parentSlug'=>'deliveries','parentId'=>$deliveries->id])}}"
                type="button" class="dropdown-item" >{{__("دلایل لغو پیش از قبول راننده")}}
                </a>
                </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','commission'))
           <li>
                <a href="{{route('record.index',['slug'=>'commission','parentSlug'=>'deliveries','parentId'=>$deliveries->id])}}"
                type="button" class="dropdown-item" >{{__("کمیسیون")}}
                </a>
                </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','taxi_options'))
           <li>
                <a href="{{route('record.index',['slug'=>'taxi_options','parentSlug'=>'deliveries','parentId'=>$deliveries->id])}}"
                type="button" class="dropdown-item" >{{__("آپشن های سواری")}}
                </a>
                </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','stop_without_driver'))
           <li>
                <a href="{{route('record.index',['slug'=>'stop_without_driver','parentSlug'=>'deliveries','parentId'=>$deliveries->id])}}"
                type="button" class="dropdown-item" >{{__("زمان توقف بدون راننده")}}
                </a>
                </li>
@endif
</ul>
</div>
@endif
