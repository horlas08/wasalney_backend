<?php $__env->startSection('title', __('Airline Travel Requests')); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('Airline Travel Requests')); ?></h3>
                </div>
                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Customer')); ?></th>
                                    <th><?php echo e(__('From')); ?></th>
                                    <th><?php echo e(__('To')); ?></th>
                                    <th><?php echo e(__('Travel Date')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Created At')); ?></th>
                                    <th><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($request->id); ?></td>
                                        <td><?php echo e($request->user->name ?? 'N/A'); ?></td>
                                        <td><?php echo e($request->departure_city); ?></td>
                                        <td><?php echo e($request->arrival_city); ?></td>
                                        <td><?php echo e($request->departure_date->format('Y-m-d')); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo e($request->status === 'COMPLETED' ? 'success' : ($request->status === 'PENDING' ? 'warning' : 'info')); ?>">
                                                <?php echo e(__($request->status)); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($request->created_at->format('Y-m-d H:i')); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.airline-travel.show', $request->id)); ?>" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> <?php echo e(__('View')); ?>

                                            </a>
                                            <?php if(Auth::user()->can('airline-travel,edit')): ?>
                                                <form action="<?php echo e(route('admin.airline-travel.update-status', $request->id)); ?>" method="POST" class="d-inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <input type="hidden" name="status" value="<?php echo e($request->status === 'PENDING' ? 'PROCESSING' : 'COMPLETED'); ?>">
                                                    <button type="submit" class="btn btn-sm btn-<?php echo e($request->status === 'PENDING' ? 'warning' : 'success'); ?>">
                                                        <i class="fas fa-check"></i> 
                                                        <?php echo e($request->status === 'PENDING' ? __('Process') : __('Complete')); ?>

                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center"><?php echo e(__('No requests found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php echo e($requests->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin-panel.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/qozeem/projects/web/wasalney/resources/views/admin-panel/airline-travel/index.blade.php ENDPATH**/ ?>