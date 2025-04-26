@extends('admin-panel.layout.index')



@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">جدول‌های داده /</span> پیشرفته
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>شناسه</th>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>تاریخ</th>
                        <th>حقوق</th>
                        <th>وضعیت</th>
                        <th>عمل</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="offcanvas offcanvas-end" id="add-new-record">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="exampleModalLabel">رکورد جدید</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                    <div class="col-sm-12">
                        <label class="form-label" for="basicFullname">نام کامل</label>
                        <div class="input-group input-group-merge">
                            <span id="basicFullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname"
                                   placeholder="جان اسنو" aria-label="John Doe" aria-describedby="basicFullname2">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicPost">شغل</label>
                        <div class="input-group input-group-merge">
                            <span id="basicPost2" class="input-group-text"><i class="bx bxs-briefcase"></i></span>
                            <input type="text" id="basicPost" name="basicPost" class="form-control dt-post"
                                   placeholder="توسعه دهنده وب" aria-label="Web Developer"
                                   aria-describedby="basicPost2">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicEmail">ایمیل</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="text" id="basicEmail" name="basicEmail"
                                   class="form-control dt-email text-start" dir="ltr" placeholder="john.doe@example.com"
                                   aria-label="john.doe@example.com">
                        </div>
                        <div class="form-text">می‌توانید از حروف، اعداد و نقطه استفاده کنید</div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicDate">تاریخ عضویت</label>
                        <div class="input-group input-group-merge">
                            <span id="basicDate2" class="input-group-text"><i class="bx bx-calendar"></i></span>
                            <input type="text" class="form-control dt-date" id="basicDate" name="basicDate"
                                   aria-describedby="basicDate2" placeholder="YYYY/MM/DD" aria-label="YYYY/MM/DD">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicSalary">حقوق</label>
                        <div class="input-group input-group-merge">
                            <span id="basicSalary2" class="input-group-text">تومان</span>
                            <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary"
                                   placeholder="12000" aria-label="12000" aria-describedby="basicSalary2">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">ثبت</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">انصراف
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!--/ DataTable with Buttons -->
    </div>
    <!-- / Content -->
@endsection

@section('style')





    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css">
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">
    <!-- Form Validation -->
    <link rel="stylesheet" href="/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css">




@endsection

@section('script')

    {{--                        <!-- Vendors JS -->--}}
    {{--                        <script src="/assets/vendor/libs/datatables/jquery.dataTables.js"></script>--}}
    {{--                        <script src="/assets/vendor/libs/datatables/i18n/fa.js"></script>--}}
    {{--                        <script src="/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>--}}
    {{--                        <script src="/assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>--}}
    {{--                        <script src="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>--}}
    {{--                        <!-- Flat Picker -->--}}
    {{--                        <script src="/assets/vendor/libs/moment/moment.js"></script>--}}
    {{--                        <script src="/assets/vendor/libs/jdate/jdate.js"></script>--}}
    {{--                        <script src="/assets/vendor/libs/flatpickr/flatpickr-jdate.js"></script>--}}
    {{--                        <script src="/assets/vendor/libs/flatpickr/l10n/fa-jdate.js"></script>--}}

    {{--                        <!-- Page JS -->--}}
    {{--                        <script src="/assets/js/tables-datatables-advanced.js"></script>--}}



    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="/assets/vendor/libs/datatables/i18n/fa.js"></script>
    <script src="/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="/assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <script src="/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js"></script>
    <script src="/assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
    <script src="/assets/vendor/libs/jszip/jszip.js"></script>
    <script src="/assets/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="/assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
    <script src="/assets/vendor/libs/datatables-buttons/buttons.print.js"></script>
    <!-- Flat Picker -->
    <script src="/assets/vendor/libs/moment/moment.js"></script>
    <script src="/assets/vendor/libs/jdate/jdate.js"></script>
    <script src="/assets/vendor/libs/flatpickr/flatpickr-jdate.js"></script>
    <script src="/assets/vendor/libs/flatpickr/l10n/fa-jdate.js"></script>
    <!-- Row Group JS -->
    <script src="/assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js"></script>
    <script src="/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js"></script>
    <!-- Form Validation -->
    <script src="/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>


    <!-- Page JS -->
    <script src="/assets/js/tables-datatables-basic.js"></script>
@endsection

