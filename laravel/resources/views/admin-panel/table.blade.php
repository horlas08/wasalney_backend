@extends('admin-panel.layout.index')




@section('content')
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="d-flex row justify-content-between align-items-center col-12">
                        <h4 class="py-3 breadcrumb-wrapper mb-4 col-4">
                            <span class="text-muted fw-light">جدول‌های داده /</span> پیشرفته
                        </h4>
                        <div class="d-flex row col-4 flex-nowrap justify-content-end">
                            <button type="button" class="btn btn-outline-primary " style="width: auto!important;">
                                <span class="tf-icons bx bx-share"></span>
                                <span class="d-none d-sm-inline-block">بازگشت</span>
                            </button>
                            <div style="width: 25px"></div>
                            <button class="dt-button create-new btn btn-primary " tabindex="0" aria-controls="DataTables_Table_0" type="button" style="width: auto!important;"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن</span></span></button>
                        </div>
                    </div>
                    <!-- Responsive Datatable -->
                    <div class="card">
                            <h5 class="card-header col-4">جدول‌داده واکنش‌گرا</h5>

                        <div class="card-datatable table-responsive">
                            <table class="dt-responsive table table-bordered">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>شغل</th>
                                    <th>شهر</th>
                                    <th>تاریخ</th>
                                    <th>حقوق</th>
                                    <th>سن</th>
                                    <th>تجربه</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @for($i=1;$i<20;$i++)
                                <tr>
                                    <td></td>
                                    <td>{{$i}}</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                عملیات
                                            </button>
                                            <ul class="dropdown-menu" style="">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> ویرایش</a></li>
                                                <li><button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
                                                            onclick="setModalRoute('{{route('delete',['id'=>$i])}}')">
                                                        <i class="bx bx-trash me-1"></i>
                                                        حذف
                                                    </button></li>
                                            </ul>
                                        </div>
                                    </td>


                                </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Responsive Datatable -->
                </div>
                <!-- / Content -->
@endsection

@section('style')

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css">

@endsection

@section('script')

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="/assets/vendor/libs/datatables/i18n/fa.js"></script>
    <script src="/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="/assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <!-- Flat Picker -->
    <script src="/assets/vendor/libs/moment/moment.js"></script>
    <script src="/assets/vendor/libs/jdate/jdate.js"></script>
    <script src="/assets/vendor/libs/flatpickr/flatpickr-jdate.js"></script>
    <script src="/assets/vendor/libs/flatpickr/l10n/fa-jdate.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/tables-datatables-advanced.js"></script>
@endsection

</body>
</html>
