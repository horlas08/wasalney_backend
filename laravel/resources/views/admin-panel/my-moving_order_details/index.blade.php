@extends('admin-panel.layout.index')


@section('content')

    <div class="d-flex row justify-content-between align-items-center col-12 mb-3">
    {{__("جزئیات سفارشات اثاث کشی")}}


        <div class="d-flex row col-4 flex-nowrap justify-content-end">

            <a href="{{route('admin.dashboard')}}" type="button" class="btn btn-outline-primary " style="width: auto!important;">
                <span class="tf-icons bx bx-share"></span>
                <span class="d-none d-sm-inline-block">{{ __('Return') }}</span>
            </a>

            <div class="btn-group" style="width: auto;">
                <button type="button" class="btn btn-primary dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="true">
                    {{ __('Actions') }}
                </button>
                <ul class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 38px);" data-popper-placement="bottom-start">
                    @if(\App\Models\Admin::checkAccess('record','store',"moving_order_details"))
                        <li>
                            <a  href="{{route('record.storeform',['slug'=>'moving_order_details'])}}"  type="button" class="dropdown-item btn ">
                                <i class="fa-solid fa-add me-1"></i>
                                {{ __('Store') }}

                            </a>
                        </li>

                    @endif
                    <li>
                        <a href="{{route('record.export',['slug'=>'moving_order_details'])}}"  type="button" class="dropdown-item btn ">
                            <i class="fa-solid fa-file-excel me-1"></i>
                            {{ __('Excel Export') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('record.pdf',['slug'=>'moving_order_details'])}}"  type="button" class="dropdown-item btn ">
                            <i class="fa-solid fa-file-pdf me-1"></i>
                            {{ __('PDF Export') }}
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class=" widgets" >
        <div class="row">
            <div class="card" id="table-box" >
                {{--start--}}
                <form method="get" action="{{route('record.index',['slug'=>'moving_order_details'])}}"
                      class="w-100 d-flex justify-content-center align-items-end">

                    <div class="m-2">
                        <label class="form-label" for="from">{{__('date of')}}</label>
                        <input  name="from" type="date" id="from" class="form-control" value="{{app('request')->input('from')}}">
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="to">{{__('date to')}}</label>
                        <input  name="to" type="date" id="to" class="form-control" value="{{app('request')->input('to')}}">
                    </div>


                    <div class="m-2">
                        <button type="submit" class="btn btn-primary ">{{__('apply filter')}} </button>
                    </div>
                </form>
                {{--end--}}

                <div class="card-datatable table-responsive">
                    <table id="ajax_table" class="table table-bordered " sortLink="{{route('record.sort',['slug'=>'moving_order_details'])}}">
                        <thead>
                        <tr>
                            <th>#</th>

                            <th>{{__("سفارش")}}</th>
                            <th>{{__("تعداد کارگر")}}</th>
                            <th>{{__("قیمت هر کارگر")}}</th>
                            <th>{{__("تعداد طبقات مبدا")}}</th>
                            <th>{{__("تعداد طبقات مقصد")}}</th>
                            <th>{{__("جابجایی با آسانسور مبدا")}}</th>
                            <th>{{__("جابجایی با آسانسور در مقصد")}}</th>
                            <th>{{__("تاریخ اسباب کشی")}}</th>
                            <th>{{__("ساعت")}}</th>


                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>

                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')

    <!--    datatable-->
    <link rel="stylesheet" href={{asset("admin-panel/plugins/datatable/datatables-bs5/datatables.bootstrap5.css")}}>
    <link rel="stylesheet" href={{asset("admin-panel/plugins/datatable/datatables-responsive-bs5/responsive.bootstrap5.css")}}>
    <!--    icon-->
    <link href={{asset("admin-panel/styles/font-icon.css")}} rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{--start--}}
    <link rel="stylesheet" href="{{asset("admin-panel/plugins/jalalidatepicker/jalalidatepicker.css")}}">
    {{--end--}}
    <style>
        .sort-mode tr:hover{
            background-color: whitesmoke ;
            cursor: pointer;
        }
        .sort-mode tr{
            background-color: grey ;

        }

        .sort-icon{
            cursor: pointer;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src={{asset("admin-panel/plugins/datatable/datatables/jquery.dataTables.js")}}></script>
    @if(getLang()=='fa')
        <script src={{asset("admin-panel/plugins/datatable/datatables/i18n/fa.js")}}></script>
    @endif

    <script src={{asset("admin-panel/plugins/datatable/datatables-bs5/datatables-bootstrap5.js")}}></script>
    <script src={{asset("admin-panel/plugins/datatable/datatables-responsive/datatables.responsive.js")}}></script>
    <script src={{asset("admin-panel/plugins/datatable/datatables-responsive-bs5/responsive.bootstrap5.js")}}></script>
    <script src={{asset("admin-panel/plugins/datatable/tables-datatables-advanced.js")}}></script>
    <script src={{asset("admin-panel/plugins/datatable/datatableEN.js")}}></script>
    <script src="{{ asset('admin-panel/plugins/chunk/resumable.min.js') }}"></script>
    <script src="{{ asset('admin-panel/scripts/chunk.js') }}"></script>
    {{--start--}}
    <script src="{{asset('admin-panel/plugins/jalalidatepicker/jalalidatepicker.js')}}"></script>
    {{--end--}}

    <script>

        @php($tableInfo=session()->get('dataTableInfo'))
        $('#ajax_table').DataTable({
            "ajax":"{{route('record.pagination',['slug'=>'moving_order_details'])}}",
            "columns":[
                {data: 'datatable-counter'},
                    { data : "order_id"},
                    { data : "count_worker"},
                    { data : "price_worker"},
                    { data : "count_floors_origin"},
                    { data : "count_floors_destination"},
                    { data : "elevator_origin"},
                    { data : "elevator_destination"},
                    { data : "date"},
                    { data : "time"},

                {data: 'datatable-actions',"orderable": false},
            ],
            "ordering":true,
            "order": [0, 'desc'],
            "responsive": true,
            "processing": true,
            "serverSide": true,
            @if($tableInfo!=null && $tableInfo->slug=="moving_order_details" && $tableInfo->parentSlug==null && $tableInfo->parentId==null)
            "displayStart": {{$tableInfo->start}},
            "search": {
                "search": "{{$tableInfo->search}}"
            },
            "pageLength": {{$tableInfo->length}}
            @endif
        });

        @php($lastCategory=\App\Models\Category::where("slug",'moving_order_details')->first())
        @while($lastCategory!=null)
        document.getElementById('category_{{$lastCategory->id}}').classList.add('menuActive');
        @php($lastCategory=\App\Models\Category::find($lastCategory->parent_id))
        @endwhile

        $('#main-content').addClass('menu-opened');
        $('.DC_sidbar_box ').addClass('DC_isOpen');
        $(".sidebar-main-box").addClass("open-side")
        $('#chart_box').addClass('DC_activeBoxBody');
        $('#v-dynamic').addClass('show active');
        $('#v-dynamic-tab').addClass('DC_activeTab');

        $(document).on('click','.sort-icon',function (){
            if ($(this).closest('table').attr('sortSourceId')==null){
                let sourceId=$(this).attr('sortId');
                $(this).closest('table').attr('sortSourceId',sourceId);
                $(this).closest('tbody').addClass('sort-mode');
                $(this).removeClass('fa-refresh');
                $(this).closest('tr').attr('style', 'background: transparent !important');
            }


        });


        $(document).on('click','tbody.sort-mode tr',function (){
            url=$(this).closest('table').attr('sortLink');
            let sourceId=$(this).closest('table').attr('sortSourceId');
            let targetId=$(this).find('.sort-icon').attr('sortId');
            $.ajax({url: url+'?sourceId='+sourceId+'&targetId='+targetId,success: function(result){
                    if(result!=true){
                        $('body').append(result);
                        setTimeout(function(){$('.alert').remove();}, 5000);
                    }
                    else
                        location.reload();

                }});
        });

        {{--start--}}
        $(document).ready(function(){
            jalaliDatepicker.startWatch();
        });
        {{--end--}}
    </script>
@endsection

