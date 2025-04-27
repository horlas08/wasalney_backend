@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$price_detail->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="base_price")
{{$price_detail->base_price}}
@elseif($type=="multiply_price")
{{$price_detail->multiply_price}}
@elseif($type=="hurry_percent")
{{$price_detail->hurry_percent}}
@elseif($type=="back_price")
{{$price_detail->back_price}}
@elseif($type=="decrease_percent")
{{$price_detail->decrease_percent}}
@elseif($type=="final_price")
{{$price_detail->final_price}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','price_detail'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'price_detail','id'=>$price_detail->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','price_detail'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'price_detail','id'=>$price_detail->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
