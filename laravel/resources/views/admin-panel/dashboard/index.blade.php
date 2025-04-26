
@extends('admin-panel.layout.index')


@section('content')

    <div class="statistics-boxes">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="fa-solid fa-eye"></i></div>
                    <div>
                        <strong>{{db('orders')->where('cancel_status',null)->getRecords()->count()}}</strong>
                        <span>{{__('count orders')}}</span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="fa-solid fa-user"></i></div>
                    <div>
                        <strong>{{db('orders')->where('cancel_status','!=',null)->getRecords()->count()}}</strong>
                        <span>{{__('count cancel orders')}}</span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="fa-solid fa-moon"></i></div>
                    <div>
                        <strong>{{db('drivers')->where('state_approval',1)->getRecords()->count()}}</strong>
                        <span>{{__('driver dont accept')}}</span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="fa-solid fa-users"></i></div>
                    <div>
                        <strong>{{db('users')->getRecords()->count()}}</strong>
                        <span>{{__('count user')}}</span>
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
                        <strong class="widget-title">{{__('Week Visits')}}</strong>
{{--                        <ul class="nav nav-pills" role="tablist">--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <button class="nav-link active" id="t-today-tab" data-bs-toggle="pill" data-bs-target="#t-today" type="button" role="tab" aria-controls="t-today" aria-selected="true">امروز</button>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <button class="nav-link" id="t-week-tab" data-bs-toggle="pill" data-bs-target="#t-week" type="button" role="tab" aria-controls="t-week" aria-selected="false">هفته</button>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <button class="nav-link" id="t-month-tab" data-bs-toggle="pill" data-bs-target="#t-month" type="button" role="tab" aria-controls="t-month" aria-selected="false">ماه</button>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

                    </div>
                    <div class="widget-content">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="dashboard-line-chart chart">
                                <canvas id="viewChart"></canvas>
                            </div>
{{--                            <div class="tab-pane fade show active" id="t-today" role="tabpanel" aria-labelledby="t-today-tab" tabindex="0">--}}
{{--                                <div class="empty-chart">--}}
{{--                                    <div class="ec-message">--}}
{{--                                        <strong>درحال حاظر آمار در دسترس نمیباشد !</strong>--}}
{{--                                        <span>ابزارک چت هنوز به وبسایت شما اضافه نشده است ...</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="t-week" role="tabpanel" aria-labelledby="t-week-tab" tabindex="0">--}}
{{--                                <div id="bar">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="t-month" role="tabpanel" aria-labelledby="t-month-tab" tabindex="0">--}}
{{--                                <div class="empty-chart">--}}
{{--                                    <div class="ec-message">--}}
{{--                                        <strong>درحال حاظر آمار در دسترس نمیباشد !</strong>--}}
{{--                                        <span>ابزارک چت هنوز به وبسایت شما اضافه نشده است ...</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
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
    <script src={{asset("admin-panel/plugins/chart/Chart.bundle.min.js")}}></script>
    <script src={{asset("admin-panel/scripts/chart.js")}}></script>
    <script>
        $('.account-progress').circlechart();
        $('#v-home-tab').addClass('DC_activeTab');
        var days=[];
        var counts=[];
        @php($weekResult=\App\Models\Visit::week())
        @for($i=0;$i<7;$i++)
        days.push('{{$weekResult['days'][$i]}}');
        counts.push({{$weekResult['counts'][$i]}});
            @endfor


        var viewChart = document.getElementById("viewChart").getContext("2d");
        var colorArray=["#ff6384","#ff9f40","#4bc0c0"]
        new Chart(viewChart, {
            type: "line",
            options: {
                plugins: {datalabels: {display: !1}},
                responsive: !0,
                maintainAspectRatio: !1,
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: !0,
                            lineWidth: 1,
                            color: "rgba(0,0,0,0.1)",
                            drawBorder: !1
                        }, ticks: {beginAtZero: !0, stepSize: {{(int)($weekResult['max']/5)}}, min: 0, max: {{$weekResult['max']}}, padding: 0}
                    }], xAxes: [{gridLines: {display: !1}}]
                },
                legend: {display: !1},
                tooltips: {
                    backgroundColor: 'white',
                    titleFontColor: 'black',
                    borderColor: 'grey',
                    borderWidth: .5,
                    bodyFontColor: 'black',
                    bodySpacing: 10,
                    xPadding: 15,
                    yPadding: 15,
                    cornerRadius: .15,
                    displayColors: !1
                }
            },
            data: {
                labels: days,
                datasets: [{
                    label: "",
                    data: counts,
                    borderColor: colorArray[1],
                    pointBackgroundColor: 'white',
                    pointBorderColor: 'black',
                    pointHoverBackgroundColor: '#003658',
                    pointHoverBorderColor: 'white',
                    pointRadius: 6,
                    pointBorderWidth: 2,
                    pointHoverRadius: 8,
                    fill: !0,
                    borderWidth: 3,
                    backgroundColor: 'transparent'
                }]
            }
        })


    </script>
@endsection
