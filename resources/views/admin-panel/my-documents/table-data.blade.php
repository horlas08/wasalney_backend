@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$documents->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="on_car_card")
<div class="d-flex justify-content-center align-items-center">
@if($documents->on_car_card!=null)
<a href="{{'/pvfiles/'.$documents->on_car_card}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/pvfiles/'.$documents->on_car_card}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="back_car_card")
<div class="d-flex justify-content-center align-items-center">
@if($documents->back_car_card!=null)
<a href="{{'/pvfiles/'.$documents->back_car_card}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/pvfiles/'.$documents->back_car_card}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="on_certificate")
<div class="d-flex justify-content-center align-items-center">
@if($documents->on_certificate!=null)
<a href="{{'/pvfiles/'.$documents->on_certificate}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/pvfiles/'.$documents->on_certificate}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@elseif($type=="additional_documents")
<div class="d-flex justify-content-center align-items-center">
@if($documents->additional_documents!=null)
<a href="{{'/pvfiles/'.$documents->additional_documents}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="{{'/pvfiles/'.$documents->additional_documents}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','documents'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'documents','id'=>$documents->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','documents'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'documents','id'=>$documents->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
