



<?php $__env->startSection('content'); ?>

    <div class="statistics-boxes">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="fa-solid fa-eye"></i></div>
                    <div>
                        <strong><?php echo e(db('orders')->where('cancel_status',null)->getRecords()->count()); ?></strong>
                        <span><?php echo e(__('count orders')); ?></span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="fa-solid fa-user"></i></div>
                    <div>
                        <strong><?php echo e(db('orders')->where('cancel_status','!=',null)->getRecords()->count()); ?></strong>
                        <span><?php echo e(__('count cancel orders')); ?></span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="fa-solid fa-moon"></i></div>
                    <div>
                        <strong><?php echo e(db('drivers')->where('state_approval',1)->getRecords()->count()); ?></strong>
                        <span><?php echo e(__('driver dont accept')); ?></span>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <a class="statistics-box widget-box" href="#">
                    <div class="icon"><i class="fa-solid fa-users"></i></div>
                    <div>
                        <strong><?php echo e(db('users')->getRecords()->count()); ?></strong>
                        <span><?php echo e(__('count user')); ?></span>
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
                        <strong class="widget-title"><?php echo e(__('Week Visits')); ?></strong>












                    </div>
                    <div class="widget-content">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="dashboard-line-chart chart">
                                <canvas id="viewChart"></canvas>
                            </div>




















                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('styles'); ?>
    <!-- Plugins -->
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/plugins/progresscircle/progresscircle.css")); ?>>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script src=<?php echo e(asset("admin-panel/plugins/progresscircle/progresscircle.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/plugins/chart/Chart.bundle.min.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/scripts/chart.js")); ?>></script>
    <script>
        $('.account-progress').circlechart();
        $('#v-home-tab').addClass('DC_activeTab');
        var days=[];
        var counts=[];
        <?php ($weekResult=\App\Models\Visit::week()); ?>
        <?php for($i=0;$i<7;$i++): ?>
        days.push('<?php echo e($weekResult['days'][$i]); ?>');
        counts.push(<?php echo e($weekResult['counts'][$i]); ?>);
            <?php endfor; ?>


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
                        }, ticks: {beginAtZero: !0, stepSize: <?php echo e((int)($weekResult['max']/5)); ?>, min: 0, max: <?php echo e($weekResult['max']); ?>, padding: 0}
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin-panel.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/qozeem/projects/web/wasalney/laravel/resources/views/admin-panel/dashboard/index.blade.php ENDPATH**/ ?>