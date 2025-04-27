@extends('admin-panel.layout.index')


@section('content')

    <div class="d-flex row justify-content-between align-items-center col-12 mb-3">

        <h4 class="py-3 breadcrumb-wrapper  col-4 ">

            {{__('Manage Accesses')}}

        </h4>



        <div class="d-flex row col-4 flex-nowrap justify-content-end">

            <a href="{{route('admin.index')}}" type="button" class="btn btn-outline-primary " style="width: auto!important;">
                <span class="tf-icons bx bx-share"></span>
                <span class="d-none d-sm-inline-block">{{__('Return')}}</span>
            </a>
            <div style="width: 25px"></div>

        </div>
    </div>
    <div class=" widgets" >
        <div class="row">
            <div class="card" id="table-box" >


                <div class="card-datatable table-responsive">
                    <table class="dt-responsive table table-bordered ">
                        <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Show')}}</th>
                            <th>{{__('Store')}}</th>
                            <th>{{__('Edit')}}</th>
                            <th>{{__('Delete')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php($Counter = 1)
                        @php($access=\App\Models\AdminAccess::where('admin_id',$adminId)->where('name','setting')->first())
                        @if($access==null)
                            @php($access=new \App\Models\AdminAccess())
                        @endif

                        <tr>
                            <td></td>
                            <td>{{$Counter}}</td>
                            <td>{{__('Setting')}}</td>
                            <td>
                                <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                    <input {{\App\Models\Admin::checkAccess('setting','show')?'':'disabled'}} {{$access->show==1?'checked':''}}
                                           onclick="onCheckbox(this,'{{route('admin-access.show',['adminId'=>$adminId,'name'=>'setting'])}}')"
                                           type="checkbox" class="form-check-input" id="showSetting" />
                                </div>
                            </td>
                            <td></td>
                            <td>

                                <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                    <input {{\App\Models\Admin::checkAccess('setting','edit')?'':'disabled'}} {{$access->edit==1?'checked':''}}
                                           onclick="onCheckbox(this,'{{route('admin-access.edit',['adminId'=>$adminId,'name'=>'setting'])}}')"
                                           type="checkbox" class="form-check-input" id="editSetting" />
                                </div>
                            </td>
                            <td></td>
                        </tr>

                        <?php
                        $Counter++;
                        ?>
                        @php($access=\App\Models\AdminAccess::where('admin_id',$adminId)->where('name','admin')->first())
                        @if($access==null)
                            @php($access=new \App\Models\AdminAccess())
                        @endif
                        <tr>
                            <td></td>
                            <td>{{$Counter}}</td>
                            <td>{{__('Admins')}}</td>
                            <td>
                                <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                    <input {{\App\Models\Admin::checkAccess('admin','show')?'':'disabled'}} {{$access->show==1?'checked':''}}
                                           onclick="onCheckbox(this,'{{route('admin-access.show',['adminId'=>$adminId,'name'=>'admin'])}}')"
                                           type="checkbox" class="form-check-input" id="showAdmins" />
                                </div>
                            </td>
                            <td>
                                <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                    <input {{\App\Models\Admin::checkAccess('admin','store')?'':'disabled'}} {{$access->store==1?'checked':''}}
                                           onclick="onCheckbox(this,'{{route('admin-access.store',['adminId'=>$adminId,'name'=>'admin'])}}')"
                                           type="checkbox" class="form-check-input" id="storeAdmins" />
                                </div>
                            </td>
                            <td>

                                <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                    <input {{\App\Models\Admin::checkAccess('admin','edit')?'':'disabled'}} {{$access->edit==1?'checked':''}}
                                           onclick="onCheckbox(this,'{{route('admin-access.edit',['adminId'=>$adminId,'name'=>'admin'])}}')"
                                           type="checkbox" class="form-check-input" id="editAdmins" />
                                </div>
                            </td>
                            <td>

                                <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                    <input {{\App\Models\Admin::checkAccess('admin','delete')?'':'disabled'}} {{$access->delete==1?'checked':''}}
                                           onclick="onCheckbox(this,'{{route('admin-access.delete',['adminId'=>$adminId,'name'=>'admin'])}}')"
                                           type="checkbox" class="form-check-input" id="deleteAdmins" />
                                </div>
                            </td>
                        </tr>

                        <?php
                        $Counter++;
                        ?>


                        @foreach(\App\Models\Category::where('is_menu',0)->get() as $category)

                            @if(\App\Models\Admin::checkAccess('record','show',$category->slug))
                            @php($access=\App\Models\AdminAccess::where('admin_id',$adminId)->where('name','record')->where('category_slug',$category->slug)->first())
                            @if($access==null)
                                @php($access=new \App\Models\AdminAccess())
                            @endif

                            <tr>
                                <td></td>
                                <td>{{$Counter}}</td>
                                <td>{{__("$category->title")}}</td>

                                <td>
                                    <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                        <input {{\App\Models\Admin::checkAccess('record','show',$category->slug)?'':'disabled'}} {{$access->show==1?'checked':''}}
                                               onclick="onCheckbox(this,'{{route('admin-access.show',['adminId'=>$adminId,'name'=>'record','catSlug'=>$category->slug])}}')"
                                               type="checkbox" class="form-check-input" id="showCategory{{$category->id}}" />
                                    </div>
                                </td>
                                <td>
                                    <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                        <input {{\App\Models\Admin::checkAccess('record','store',$category->slug)?'':'disabled'}} {{$access->store==1?'checked':''}}
                                               onclick="onCheckbox(this,'{{route('admin-access.store',['adminId'=>$adminId,'name'=>'record','catSlug'=>$category->slug])}}')"
                                               type="checkbox" class="form-check-input" id="storeCategory{{$category->id}}" />
                                    </div>
                                </td>
                                <td>

                                    <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                        <input {{\App\Models\Admin::checkAccess('record','edit',$category->slug)?'':'disabled'}} {{$access->edit==1?'checked':''}}
                                               onclick="onCheckbox(this,'{{route('admin-access.edit',['adminId'=>$adminId,'name'=>'record','catSlug'=>$category->slug])}}')"
                                               type="checkbox" class="form-check-input" id="editCategory{{$category->id}}" />
                                    </div>
                                </td>
                                <td>

                                    <div  class="d-flex justify-content-center align-items-center custom-control custom-checkbox mb-3 text-center">
                                        <input {{\App\Models\Admin::checkAccess('record','delete',$category->slug)?'':'disabled'}} {{$access->delete==1?'checked':''}}
                                               onclick="onCheckbox(this,'{{route('admin-access.delete',['adminId'=>$adminId,'name'=>'record','catSlug'=>$category->slug])}}')"
                                               type="checkbox" class="form-check-input" id="deleteCategory{{$category->id}}" />
                                    </div>
                                </td>
                            @endif
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
    {{--    <link href={{asset("admin-panel/icons/fontawesome.css")}} rel='stylesheet' >--}}

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

