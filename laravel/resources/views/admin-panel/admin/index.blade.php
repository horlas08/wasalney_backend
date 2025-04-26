@extends('admin-panel.layout.index')


@section('content')

    <div class="d-flex row justify-content-between align-items-center col-12 mb-3">
        <h4 class="py-3 breadcrumb-wrapper  col-4 ">
                {{__('Manage Admins')}}

        </h4>



        <div class="d-flex row col-4 flex-nowrap justify-content-end">

            <a href="{{route('admin.dashboard')}}" type="button" class="btn btn-outline-primary " style="width: auto!important;">
                <span class="tf-icons bx bx-share"></span>
                <span class="d-none d-sm-inline-block">{{__('Return')}}</span>
            </a>


            @if(\App\Models\Admin::checkAccess('admin','store'))
            <a href="{{route('admin.storeform')}}" class="" tabindex="0" aria-controls="DataTables_Table_0" type="button" style="width: auto!important;">
                <div class="btnDataTable-box ">
                    <div class="btnDataTable dt-button create-new btn btn-primary ">
                        <i class="bx bx-plus "></i>
                        <span class="d-none d-sm-inline-block">{{__('Store')}}</span>
                    </div>
                </div>

            </a>
            @endif
        </div>
    </div>
    <div class=" widgets" >
        <div class="row">
            <div class="card" id="table-box" >


                <div class="card-datatable table-responsive">
                    <table class="dt-responsive table table-bordered " >
                        <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Username')}}</th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $Counter = 1;
                        $user=\Illuminate\Support\Facades\Auth::guard('admin')->user();
                        ?>
                        <tr>
                            <td></td>
                            <td>{{$Counter}}</td>
                            <td>{{$user->name}}</td>

                            <td>{{$user->username}}</td>

                            <td >
                                <div class=" d-flex justify-content-center align-items-center flex-wrap gap-1">

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            {{__('Actions')}}
                                        </button>
                                        <ul class="dropdown-menu" style="">
{{--                                            <li><a class="dropdown-item"--}}
{{--                                                   href="{{route('report.index',['adminId'=>$user->id])}}">--}}
{{--                                                    <i class="bx bx-edit-alt me-1"></i> {{__('Reports')}}</a></li>--}}
{{--                                            <li>--}}
                                                <li><a class="dropdown-item"
                                                       href="{{route('admin.editform',['id'=>$user->id])}}">
                                                        <i class="bx bx-edit-alt me-1"></i> {{__('Edit')}}</a></li>
                                                <li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $Counter++;
                        ?>

                        @foreach(\App\Models\Admin::where('level','>',$user->level)->get() as $admin)

                            <tr>
                            <td></td>
                                <td>{{$Counter}}</td>
                                <td>{{$admin->name}}</td>

                                <td>{{$admin->username}}</td>


                                <td >
                                    <div class=" d-flex justify-content-center align-items-center flex-wrap gap-1">

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('Actions')}}
                                            </button>
                                            <ul class="dropdown-menu" style="">
{{--                                                <li><a class="dropdown-item"--}}
{{--                                                       href="{{route('report.index',['adminId'=>$admin->id])}}">--}}
{{--                                                        <i class="bx bx-edit-alt me-1"></i> {{__('Reports')}}</a>--}}
{{--                                                </li>--}}
                                                @if(\App\Models\Admin::checkAccess('admin','edit'))
                                                <li><a class="dropdown-item"
                                                       href="{{route('admin-access.index',['adminId'=>$admin->id])}}">
                                                        <i class="bx bx-edit-alt me-1"></i>{{__('Accesses')}}</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                       href="{{route('admin.editform',['id'=>$admin->id])}}">
                                                        <i class="bx bx-edit-alt me-1"></i> {{__('Edit')}}</a>
                                                </li>

                                                @endif
                                                @if(\App\Models\Admin::checkAccess('admin','delete'))
                                                <li>
                                                    <a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                       data-bs-target="#basicModal"
                                                       onclick="setModalRoute('{{route('admin.destroy',['id'=>$admin->id])}}')">
                                                        <i class="bx bx-trash me-1"></i>
                                                        {{__('Delete')}}
                                                    </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </td>


                        </tr>
                        @php($Counter++)
                        @endforeach
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


    <script>

        $('#v-admin-tab').addClass('DC_activeTab');

    </script>
@endsection

