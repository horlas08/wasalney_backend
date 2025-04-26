<?php if($type=="datatable-counter"): ?>
<i class="sort-icon fa-solid fa-refresh m-1" sortId="<?php echo e($service_place_repitive->sort); ?>" style="color: #2e98c5;font-size: 20px;"></i>
<?php echo e($counter); ?>

<?php elseif($type=="service"): ?>
<?php if($deliveries=\App\Models\MyDeliveries::find($service_place_repitive->service)): ?>
<?php echo e("$deliveries->title"); ?>

<?php endif; ?>
<?php else: ?>
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?php echo e(__('Actions')); ?></button>
<ul class="dropdown-menu" style="">
<?php if(\App\Models\Admin::checkAccess('record','edit','service_place_repitive')): ?>
       <li>
            <a class="dropdown-item" href="<?php echo e(route('record.editform',['slug'=>'service_place_repitive','id'=>$service_place_repitive->id])); ?>">
                <i class="bx bx-edit-alt me-1"></i> <?php echo e(__('Edit')); ?>

            </a>
       </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','delete','service_place_repitive')): ?>
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('<?php echo e(route('record.destroy',['slug'=>'service_place_repitive','id'=>$service_place_repitive->id])); ?>')">
                <i class="bx bx-trash me-1"></i><?php echo e(__('Delete')); ?>

            </a>
       </li>
<?php endif; ?>
</ul>
</div>
<?php endif; ?>
<?php /**PATH /home/qozeem/projects/web/wasalney/laravel/resources/views/admin-panel/my-service_place_repitive/table-data.blade.php ENDPATH**/ ?>