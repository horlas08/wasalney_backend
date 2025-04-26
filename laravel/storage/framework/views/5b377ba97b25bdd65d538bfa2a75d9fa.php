<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('admin.update',['id'=>$admin->id])); ?>"
          method="post"  enctype="multipart/form-data" novalidate>
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="widgets" data-index="1">
            <div class="row">
                <div class="col-12">
                    <div class="card" >

                        <div id="sticky-wrapper" class="sticky-wrapper" >
                            <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                                <h5 class="card-title mb-sm-0 me-2"><?php echo e(__('Edit Admin')); ?></h5>
                                <div class="action-btns">
                                    <a href="<?php echo e(route('admin.index')); ?>" class="btn btn-label-primary me-3">
                                        <span class="align-middle"> <?php echo e(__('Return')); ?></span>
                                    </a>
                                    <button type="submit" class="btn btn-primary "><?php echo e(__('Save')); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-lg-11 mx-auto">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="name"> <?php echo e(__('Name')); ?> </label>
                                            <input type="text" id="name" name="name" class="form-control" value="<?php echo e($admin->name); ?>"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="username"> <?php echo e(__('Username')); ?> </label>
                                            <input type="text" id="username" name="username" class="form-control" value="<?php echo e($admin->username); ?>"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="password"> <?php echo e(__('Password')); ?> </label>
                                            <input type="password" id="password" name="password" class="form-control" />
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="number"> <?php echo e(__('Phone')); ?> </label>
                                            <input type="text" id="number" name="number" class="form-control" value="<?php echo e($admin->number); ?>" />
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/plugins/select2/select2.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/plugins/select2/theme_default.css")); ?>>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src=<?php echo e(asset('admin-panel/plugins/jquery-sticky/jquery-sticky.js')); ?>></script>
    <script src=<?php echo e(asset('admin-panel/plugins/cleavejs/cleave.js')); ?>></script>
    <script src=<?php echo e(asset('admin-panel/plugins/cleavejs/cleave-phone.js')); ?>></script>
    <script src=<?php echo e(asset('admin-panel/plugins/select2/select2.js')); ?>></script>
    <script src=<?php echo e(asset('admin-panel/plugins/select2/i18n/fa.js')); ?>></script>

    <!-- Page JS -->
    <script src=<?php echo e(asset('admin-panel/scripts/form-layouts.js')); ?>></script>
    <script src=<?php echo e(asset('admin-panel/scripts/forms-selects.js')); ?>></script>
    <script>

        $('#v-admin-tab').addClass('DC_activeTab');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin-panel.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/qozeem/projects/web/wasalney/laravel/resources/views/admin-panel/admin/edit.blade.php ENDPATH**/ ?>