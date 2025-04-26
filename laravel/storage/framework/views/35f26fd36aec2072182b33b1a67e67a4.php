<?php $__env->startSection('content'); ?>

    <div class="d-flex row justify-content-between align-items-center col-12 mb-3">
        <h4 class="py-3 breadcrumb-wrapper  col-4 ">
                <?php echo e(__('Manage Routes')); ?>


        </h4>



        <div class="d-flex row col-4 flex-nowrap justify-content-end">

            <a href="<?php echo e(route('admin.dashboard')); ?>" type="button" class="btn btn-outline-primary " style="width: auto!important;">
                <span class="tf-icons bx bx-share"></span>
                <span class="d-none d-sm-inline-block"><?php echo e(__('Return')); ?></span>
            </a>
            <div style="width: 25px"></div>


            <a href="<?php echo e(route('route.storeform')); ?>" class="" tabindex="0" aria-controls="DataTables_Table_0" type="button" style="width: auto!important;">
                <div class="btnDataTable-box ">
                    <div class="btnDataTable dt-button create-new btn btn-primary ">
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block"><?php echo e(__('Store')); ?></span>
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
                            <th><?php echo e(__('Title')); ?></th>
                            <th><?php echo e(__('Address')); ?></th>
                            <th><?php echo e(__('View')); ?></th>
                            <th><?php echo e(__('Actions')); ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $Counter = 1;
                        ?>
                        <?php $__currentLoopData = \App\Models\Route::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                            <td></td>
                                <td><?php echo e($Counter); ?></td>
                                <td><?php echo e($route->title); ?></td>
                                <td>
                                    <a href="<?php echo e(url('/'.$route->address)); ?>" target="_blank">
                                        <?php echo e(url('/'.$route->address)); ?>

                                    </a>
                                </td>
                                <td><?php echo e($route->view); ?></td>


                                <td >
                                    <div class=" d-flex justify-content-center align-items-center flex-wrap gap-1">

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo e(__('Actions')); ?>

                                            </button>
                                            <ul class="dropdown-menu" style="">
                                                <li><a class="dropdown-item"
                                                       href="<?php echo e(route('route.editform',['id'=>$route->id])); ?>">
                                                        <i class="bx bx-edit-alt me-1"></i> <?php echo e(__('Edit')); ?></a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                       data-bs-target="#basicModal"
                                                       onclick="setModalRoute('<?php echo e(route('route.destroy',['id'=>$route->id])); ?>')">
                                                        <i class="bx bx-trash me-1"></i>
                                                        <?php echo e(__('Delete')); ?>

                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>


                        </tr>
                        <?php ($Counter++); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

    <!--    datatable-->
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/plugins/datatable/datatables-bs5/datatables.bootstrap5.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/plugins/datatable/datatables-responsive-bs5/responsive.bootstrap5.css")); ?>>
    <!--    icon-->
    <link href=<?php echo e(asset("admin-panel/styles/font-icon.css")); ?> rel='stylesheet'>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables/jquery.dataTables.js")); ?>></script>
    <?php if(getLang()=='fa'): ?>
        <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables/i18n/fa.js")); ?>></script>
    <?php endif; ?>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables-bs5/datatables-bootstrap5.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables-responsive/datatables.responsive.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables-responsive-bs5/responsive.bootstrap5.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/tables-datatables-advanced.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatableEN.js")); ?>></script>


    <script>

        $('#v-route-tab').addClass('DC_activeTab');

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin-panel.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/qozeem/projects/web/wasalney/laravel/resources/views/admin-panel/route/index.blade.php ENDPATH**/ ?>