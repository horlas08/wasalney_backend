<?php if($type=="datatable-counter"): ?>
<i class="sort-icon fa-solid fa-refresh m-1" sortId="<?php echo e($admin_message->sort); ?>" style="color: #2e98c5;font-size: 20px;"></i>
<?php echo e($counter); ?>

<?php elseif($type=="driver"): ?>
<?php ($multiValues=\App\Models\MyAdmin_MessageDrivers::where('admin_message_id',$admin_message->id)->get()); ?>
<?php $__currentLoopData = $multiValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($drivers=\App\Models\MyDrivers::find($value->drivers_id)); ?>
<div style="text-align: center"><?php echo e("($drivers->mobile) $drivers->name"); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php elseif($type=="message"): ?>
<?php echo e($admin_message->message); ?>

<?php elseif($type=="date"): ?>
<?php if(getLang()=='fa'): ?>
<?php echo e(\Morilog\Jalali\Jalalian::fromDateTime($admin_message->created_at)->format('%A, %d %B %Y H:i')); ?>

<?php else: ?>
<?php echo e(\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $admin_message->created_at)->format('M d Y H:i')); ?>

<?php endif; ?>
<?php else: ?>
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?php echo e(__('Actions')); ?></button>
<ul class="dropdown-menu" style="">
<?php if(\App\Models\Admin::checkAccess('record','edit','admin_message')): ?>
       <li>
            <a class="dropdown-item" href="<?php echo e(route('record.editform',['slug'=>'admin_message','id'=>$admin_message->id])); ?>">
                <i class="bx bx-edit-alt me-1"></i> <?php echo e(__('Edit')); ?>

            </a>
       </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','delete','admin_message')): ?>
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('<?php echo e(route('record.destroy',['slug'=>'admin_message','id'=>$admin_message->id])); ?>')">
                <i class="bx bx-trash me-1"></i><?php echo e(__('Delete')); ?>

            </a>
       </li>
<?php endif; ?>
</ul>
</div>
<?php endif; ?>
<?php /**PATH /home/qozeem/projects/web/wasalney/laravel/resources/views/admin-panel/my-admin_message/table-data.blade.php ENDPATH**/ ?>