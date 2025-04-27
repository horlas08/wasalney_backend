
@extends('admin-panel.layout.index')


@section('content')

    <div class="statistics-boxes">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="ic-message"></i></div>
                    <div>
                        <strong>135</strong>
                        <span>پیام جدید</span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="ic-dark"></i></div>
                    <div>
                        <strong>135</strong>
                        <span>پیام جدید</span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="ic-plug"></i></div>
                    <div>
                        <strong>135</strong>
                        <span>پیام جدید</span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="ic-notify"></i></div>
                    <div>
                        <strong>135</strong>
                        <span>پیام جدید</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="infobox widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="main-chart widget-box">
                    <div class="widget-header">
                        <strong class="widget-title">آمار کلی</strong>
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="t-today-tab" data-bs-toggle="pill" data-bs-target="#t-today" type="button" role="tab" aria-controls="t-today" aria-selected="true">امروز</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="t-week-tab" data-bs-toggle="pill" data-bs-target="#t-week" type="button" role="tab" aria-controls="t-week" aria-selected="false">هفته</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="t-month-tab" data-bs-toggle="pill" data-bs-target="#t-month" type="button" role="tab" aria-controls="t-month" aria-selected="false">ماه</button>
                            </li>
                        </ul>

                    </div>
                    <div class="widget-content">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="t-today" role="tabpanel" aria-labelledby="t-today-tab" tabindex="0">
                                <div class="empty-chart">
                                    <div class="ec-message">
                                        <strong>درحال حاظر آمار در دسترس نمیباشد !</strong>
                                        <span>ابزارک چت هنوز به وبسایت شما اضافه نشده است ...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="t-week" role="tabpanel" aria-labelledby="t-week-tab" tabindex="0">
                                <div id="bar">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="t-month" role="tabpanel" aria-labelledby="t-month-tab" tabindex="0">
                                <div class="empty-chart">
                                    <div class="ec-message">
                                        <strong>درحال حاظر آمار در دسترس نمیباشد !</strong>
                                        <span>ابزارک چت هنوز به وبسایت شما اضافه نشده است ...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6 col-xxl-4">
                <div class="widget-box">
                    <div class="widget-header">
                        <strong class="widget-title">وضعیت حساب کاربری</strong>
                        <button class="widget-arrwo-btn"><i class="ic-down"></i></button>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-8">
                                <ul class="account-todolist">
                                    <li class="done">تایید شماره موبایل و ایمیل</li>
                                    <li class="done">ثبت وبسایت و افزودن ابزارک چت</li>
                                    <li class="done">تنظیم اپراتورها و تیم ها</li>
                                    <li class="inprog">نصب اپلیکیشن</li>
                                    <li>ارتقاء به پلن های حرفه ای</li>
                                </ul>
                                <a href="#" class="link-primary mt-30">اپلیکیشن را نصب کنید</a>
                            </div>
                            <div class="col-4">
                                <div class="account-progress circlechart" data-percentage="30">3 از 5</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6 col-xxl-4">
                <div class="widget-box">
                    <div class="widget-header">
                        <strong class="widget-title">نصب اپلیکیشن</strong>
                        <button class="widget-arrwo-btn"><i class="ic-down"></i></button>
                    </div>
                    <div class="widget-content">
                        <p>با دانلود و نصب اپلیکیشن به راحتی میتوانید به چت ها در موبایلتان دسترسی داشته باشید و به مشتریانتان پاسخ دهید !</p>
                        <a href="#" class="link-primary mt-10 link-icon">
                            <i class="ic-playstore"></i>
                            نسخه اندروید
                        </a>
                        <a href="#" class="link-accent mt-10  link-icon">
                            <i class="ic-apple"></i>
                            نسخه آی او اس
                        </a>
                        <a href="#" class="link-simple d-block mt-30">
                            <i class="ic-question"></i>
                            راهنمای نصب اپلیکیشن
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6 col-xxl-4">
                <div class="widget-box">
                    <div class="widget-header">
                        <strong class="widget-title">وضعیت کاربران</strong>
                        <button class="widget-arrwo-btn"><i class="ic-down"></i></button>
                    </div>
                    <div class="widget-content">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#iconpicker">
                            انتخاب آیکون
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filepicker">
                            انتخاب فایل
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('styles')
    <!-- Plugins -->
    <link rel="stylesheet" href={{asset("admin-panel/plugins/progresscircle/progresscircle.css")}}>
@endsection

@section('scripts')

    <script src={{asset("admin-panel/plugins/progresscircle/progresscircle.js")}}></script>
    <script src={{asset("admin-panel/plugins/apexcharts/apexcharts.min.js")}}></script>
    <script src={{asset("admin-panel/scripts/chart.js")}}></script>
    <script>
        $('.account-progress').circlechart();
        $('#v-home-tab').addClass('DC_activeTab');
    </script>
@endsection
