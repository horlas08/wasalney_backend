@extends('admin-panel.layout.index')


@section('content')

    <div class="d-flex row justify-content-between align-items-center col-12 mb-3">
        {{__("سفارشات")}}


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
                    @if(\App\Models\Admin::checkAccess('record','store',"orders"))
                        <li>
                            <a  href="{{route('record.storeform',['slug'=>'orders'])}}"  type="button" class="dropdown-item btn ">
                                <i class="fa-solid fa-add me-1"></i>
                                {{ __('Store') }}

                            </a>
                        </li>

                    @endif
                    <li>
                        <a href="{{route('record.export',['slug'=>'orders'])}}"  type="button" class="dropdown-item btn ">
                            <i class="fa-solid fa-file-excel me-1"></i>
                            {{ __('Excel Export') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('record.pdf',['slug'=>'orders'])}}"  type="button" class="dropdown-item btn ">
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
                <form method="get" action="{{route('record.index',['slug'=>'orders'])}}"
                      class="w-100 d-flex justify-content-center align-items-end flex-wrap">

                    <div class="m-2">
                        <label class="form-label" for="from">{{__('date of')}}</label>
                        <input type="date" name="from" type="text" id="from" class="form-control" value="{{app('request')->input('from')}}">
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="to">{{__('date to')}}</label>
                        <input type="date" name="to" type="text" id="to" class="form-control" value="{{app('request')->input('to')}}">
                    </div>

                    <div class="m-2" >
                        <label for="statuses" class="form-label">{{__('وضعیت سفارش')}}</label>
                        <select id="statuses" name="statuses" class="select2 form-select form-select-lg">
                            <option value="0">{{__('choose')}}</option>
                            @foreach(db('statuses')->getRecords() as $statuses)
                                <option {{app('request')->input('statuses')==$statuses->id?'selected="selected"':''}} value="{{$statuses->id}}">{{$statuses->title}}</option>
                            @endforeach</select>
                    </div>
                    <div class="m-2" >
                        <label for="comeback" class="form-label">{{__('نوع بازگشت')}} </label>
                        <select id="comeback" name="comeback" class="select2 form-select form-select-lg">
                            <option value=" ">{{__('انتخاب')}}</option>
                            <option {{app('request')->input('comeback')==='0'?'selected="selected"':''}} value="0">{{__('بدون بازگشت')}}</option>
                            <option {{app('request')->input('comeback')==1?'selected="selected"':''}} value="1">{{__('با بازگشت')}}</option>
                        </select>
                    </div>

                    <div class="m-2" >
                        <label for="stop_time" class="form-label">{{__('حداقل زمان توقف')}} </label>
                        <input type="number" id="stop_time" name="stop_time"  class="form-control" value="{{app('request')->input('stop_time')}}">
                    </div>

                    <div class="m-2" >
                        <label for="pay_type" class="form-label">{{__('نوع پرداخت')}} </label>
                        <select id="pay_type" name="pay_type" class="select2 form-select form-select-lg">
                            <option value="0">{{__('choose')}}</option>
                            @foreach(db('pay_typs')->getRecords() as $type)
                                <option {{app('request')->input('pay_type')==$type->id?'selected="selected"':''}} value="{{$type->id}}">{{$type->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="m-2">
                        <label for="role" class="form-label">{{__('role')}} </label>
                        <select id="role" name="role" class="form-select">
                            <option {{app('request')->input('role')==0?'selected="selected"':''}} value="0">{{__('all')}}</option>
                            <option {{app('request')->input('role')==1?'selected="selected"':''}} value="1">{{__('user')}}</option>
                            <option {{app('request')->input('role')==2?'selected="selected"':''}} value="2">{{__('driver')}}</option>
                            <option {{app('request')->input('role')==3?'selected="selected"':''}} value="3">{{__('type')}}</option>

                        </select>
                    </div>
                    <div id="user_box" class="m-2 rol_box" style="display: {{app('request')->input('role')==1?'block':'none'}}">
                        <label for="user" class="form-label">{{__('user')}} </label>
                        <select id="user" name="user" class="select2 form-select form-select-lg">
                            <option value="0">{{__('choose')}}</option>
                            @php($users=db('users')->getRecords())
                            @foreach($users as $user)
                                <option {{app('request')->input('user')==$user->id?'selected="selected"':''}} value="{{$user->id}}">{{$user->name .' ('.$user->mobile.')'}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="provider_box" class="m-2 rol_box" style="display: {{app('request')->input('role')==2?'block':'none'}}">
                        <label for="provider" class="form-label">{{__('driver')}} </label>
                        <select id="provider" name="provider" class="select2 form-select form-select-lg">
                            <option value="0">{{__('choose')}}</option>
                            @php($providers=db('drivers')->getRecords())
                            @foreach($providers as $provider)
                                <option {{app('request')->input('provider')==$provider->id?'selected="selected"':''}} value="{{$provider->id}}">{{$provider->name .' ('.$provider->mobile.')'}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="service_box" class="m-2 rol_box" style="display: {{app('request')->input('role')==3?'block':'none'}}">
                        <label for="service" class="form-label">{{__('type')}} </label>
                        <select id="service" name="service" class="select2 form-select form-select-lg">
                            <option value="0">{{__('choose')}}</option>
                            @php($services=db('deliveries')->getRecords())
                            @foreach($services as $service)
                                <option {{app('request')->input('service')==$service->id?'selected="selected"':''}} value="{{$service->id}}">{{$service->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="agency_box" class="m-2 rol_box" style="display: {{app('request')->input('role')==3?'block':'none'}}">
                        <label for="agency" class="form-label">آژانس </label>
                        <select id="agency" name="agency" class="select2 form-select form-select-lg">
                            <option value="0">{{__('choose')}}</option>
                            @php($services=db('agency_admin')->getRecords())
                            @foreach($services as $service)
                                <option {{app('request')->input('agency')==$service->id?'selected="selected"':''}} value="{{$service->id}}">{{$service->title }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="m-2">
                        <button type="submit" class="btn btn-primary ">{{__('apply filter')}} </button>
                    </div>
                </form>
                {{--end--}}
                <div class="card-datatable table-responsive">
                    <table id="ajax_table" class="table table-bordered " sortLink="{{route('record.sort',['slug'=>'orders'])}}">
                        <thead>
                        <tr>
                            <th>#</th>

                            <th>{{__("اطلاعات ثبت کننده سفارش")}}</th>
                            <th>{{__("کد رهگیری")}}</th>
{{--                            <th>{{__("جنسیت انتخابی راننده")}}</th>--}}
                            <th>{{__("نام راننده")}}</th>
                            {{--                            <th>{{__("lat")}}</th>--}}
                            {{--                            <th>{{__("long")}}</th>--}}
                            <th>{{__("قیمت")}}</th>
                            <th>{{__("سرویس رزروی")}}</th>
                            <th>{{__("بازگشت")}}</th>
                            <th>{{__("دربستی")}}</th>
                            <th>{{__("عجله دارم")}}</th>
                            <th>{{__("زمان توقف")}}</th>
                            <th>{{__("زمان توقف بدون راننده")}}</th>
                            {{--                            <th>{{__("دقیقه توقف در محل")}}</th>--}}
                            <th>{{__("آدرس مبدا")}}</th>
                            <th>{{__("آدرس مقصد")}}</th>
                            <th>{{__("نوع پرداخت")}}</th>
                            <th>{{__("امتیاز")}}</th>
                            <th>{{__("وضعیت لغو")}}</th>
                            <th>{{__("تاریخ وساعت")}}</th>
                            <th>{{__("طرف پرداخت")}}</th>
                            <th>{{__("نوع تحویل")}}</th>
                            <th>{{__("نام")}}</th>
                            <th>{{__("موبایل")}}</th>
                            <th>{{__("لغو شده توسط")}}</th>
                            <th>{{__("امتیاز راننده")}}</th>
                            <th>{{__("رضایت راننده از کاربر")}}</th>
                            <th>{{__("درصد عجله دارم")}}</th>
                            <th>{{__("دلیل لغو")}}</th>
                            <th>{{__("خالص دریافتی راننده")}}</th>
                            <th>{{__("درصد تخفیف")}}</th>
                            <th>{{__("کد تخفیف")}}</th>
                            <th>{{__("قیمت با تخفیف")}}</th>
                            <th>{{__("اقتصادی")}}</th>
                            <th>{{__("وضعیت")}}</th>
                            <th>{{__("تاریخ رزرو")}}</th>
                            <th>{{__("ساعت رزرو")}}</th>
                            <th>{{__("همیار")}}</th>
                            <th>{{__("کولر")}}</th>



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
    <link rel="stylesheet" href={{asset("admin-panel/plugins/select2/select2.css")}}>
    <link rel="stylesheet" href={{asset("admin-panel/plugins/select2/theme_default.css")}}>
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
    <script src={{asset('admin-panel/plugins/select2/select2.js')}}></script>
    <script src={{asset('admin-panel/plugins/select2/i18n/fa.js')}}></script>
    <script src={{asset('admin-panel/scripts/form-layouts.js')}}></script>
    <script src={{asset('admin-panel/scripts/forms-selects.js')}}></script>
    <script src="{{asset('admin-panel/plugins/jalalidatepicker/jalalidatepicker.js')}}"></script>
    {{--end--}}

    <script>

        @php($tableInfo=session()->get('dataTableInfo'))
        $('#ajax_table').DataTable({
            "ajax":"{{route('record.pagination',['slug'=>'orders'])}}",
            "columns":[
                {data: 'datatable-counter'},
                {data: "user"},
                {data: "code"},
                {data: "driver"},
                // { data : "origin_lat"},
                // { data : "origin_long"},
                {data: "price"},
                {data: "reserve"},
                {data: "comeback"},
                {data: "private"},
                {data: "hurry"},
                {data: "stop_time"},
                {data: "stop_time2"},
                // { data : "stop_minutes"},
                {data: "origin_address"},
                {data: "destination_address"},
                {data: "pay_type"},
                {data: "rate"},
                {data: "cancel_status"},
                {data: "created_at"},
                {data: "pay_side"},
                {data: "delivery_id"},
                {data: "name"},
                {data: "mobile"},
                {data: "canceled_by"},
                {data: "driver_rate"},
                {data: "user_rate"},
                {data: "hurry_percent"},
                {data: "cancel_reason"},
                {data: "net_price"},
                {data: "percent_discount"},
                {data: "percent_code"},
                {data: "discounted_price"},
                {data: "economic"},
                {data: "state"},
                {data: "date_reserve"},
                {data: "time_reserve"},
                {data: "helper"},
                {data: "cooler"},

                {data: 'datatable-actions',"orderable": false},
            ],
            "ordering":true,
            "order": [0, 'desc'],
            "responsive": true,
            "processing": true,
            "serverSide": true,
            @if($tableInfo!=null && $tableInfo->slug=="orders" && $tableInfo->parentSlug==null && $tableInfo->parentId==null)
            "displayStart": {{$tableInfo->start}},
            "search": {
                "search": "{{$tableInfo->search}}"
            },
            "pageLength": {{$tableInfo->length}}
                    @endif
        });

        @php($lastCategory=\App\Models\Category::where("slug",'orders')->first())
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
        $(document).on('change', '#role', function () {
            let val = $(this).val();
            if (val == 0) {
                $('.rol_box').hide();
            } else if (val == 1) {
                $('.rol_box').hide();
                $('#user_box').show();
            } else if (val == 2) {
                $('.rol_box').hide();
                $('#provider_box').show();
            } else if (val == 3) {
                $('.rol_box').hide();
                $('#service_box').show();
            }
        });
        $(document).ready(function(){
            jalaliDatepicker.startWatch();
        });
        {{--end--}}

    </script>
@endsection

