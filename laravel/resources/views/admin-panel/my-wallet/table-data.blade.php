@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$wallet->sort}}"
           style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="type")
@if($transaction_types=\App\Models\MyTransaction_Types::find($wallet->type))
{{"$transaction_types->title"}}
@endif
@elseif($type=="price")
{{$wallet->price}}
@elseif($type=="description")
{{$wallet->description}}
@elseif($type=="title")
{{$wallet->title}}
@elseif($type=="date")
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($wallet->created_at)->format('%d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $wallet->created_at)->format('M d Y H:i')}}
@endif
@elseif($type=="order")
@if($orders=\App\Models\MyOrders::find($wallet->order))
{{"$orders->price"}}
@endif
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __('Actions') }}
            </button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','wallet'))
                    <li>
                        <a class="dropdown-item" href="{{route('record.editform',['slug'=>'wallet','id'=>$wallet->id])}}">
                            <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
                        </a>
                    </li>
                    @endif
@if(\App\Models\Admin::checkAccess('record','delete','wallet'))
                        <li>
                            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
                            onclick="setModalRoute('{{route('record.destroy',['slug'=>'wallet','id'=>$wallet->id])}}')">
                                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
                            </a>
                        </li>
                    @endif
</ul>
</div>
@endif
