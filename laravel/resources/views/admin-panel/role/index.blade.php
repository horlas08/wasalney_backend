@extends('admin-panel.layout.index')


@section('content')

    <div class="d-flex row justify-content-between align-items-center col-12 my-3">
        <h4 class="py-3 breadcrumb-wrapper  col-4 ">
                {{__('Manage User Roles')}}

        </h4>



        <div class="d-flex row col-4 flex-nowrap justify-content-end">

            <a href="{{route('admin.dashboard')}}" type="button" class="btn btn-outline-primary " style="width: auto!important;">
                <span class="tf-icons bx bx-share"></span>
                <span class="d-none d-sm-inline-block">{{__('Return')}}</span>
            </a>
            <div style="width: 25px"></div>


            <a href="{{route('role.storeform')}}" class="" tabindex="0" aria-controls="DataTables_Table_0" type="button" style="width: auto!important;">
                <div class="btnDataTable-box ">
                    <div class="btnDataTable dt-button create-new btn btn-primary ">
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">{{__('Store')}}</span>
                    </div>
                </div>

            </a>
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
                            <th>{{__('Title')}}</th>
                            <th>{{__('Category')}}</th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $Counter = 1;
                        ?>
                        @foreach(\App\Models\UserRole::all() as $role)

                            <tr>
                            <td></td>
                                <td>{{$Counter}}</td>
                                <td>{{$role->title}}</td>
                                <td>{{\App\Models\Category::where('slug',$role->category_slug)->first()->title}}</td>


                                <td >
                                    <div class=" d-flex justify-content-center align-items-center flex-wrap gap-1">

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('Actions')}}
                                            </button>
                                            <ul class="dropdown-menu" style="">
                                                <li><a class="dropdown-item"
                                                       href="{{route('role.editform',['id'=>$role->id])}}">
                                                        <i class="bx bx-edit-alt me-1"></i> {{__('Edit')}}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                       data-bs-target="#basicModal"
                                                       onclick="setModalRoute('{{route('role.destroy',['id'=>$role->id])}}')">
                                                        <i class="bx bx-trash me-1"></i>
                                                        {{__('Delete')}}
                                                    </a>
                                                </li>
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

        $('#v-role-tab').addClass('DC_activeTab');

    </script>
@endsection

