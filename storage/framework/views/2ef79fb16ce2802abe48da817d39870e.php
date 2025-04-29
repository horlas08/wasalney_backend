<?php if($type=="datatable-counter"): ?>
<i class="sort-icon fa-solid fa-refresh m-1" sortId="<?php echo e($deliveries->sort); ?>" style="color: #2e98c5;font-size: 20px;"></i>
<?php echo e($counter); ?>

<?php elseif($type=="image"): ?>
<div class="d-flex justify-content-center align-items-center">
<?php if($deliveries->image!=null): ?>
<a href="<?php echo e('/files/'.$deliveries->image); ?>" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="<?php echo e('/files/'.$deliveries->image); ?>" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
<?php endif; ?>
</div>
<?php elseif($type=="title"): ?>
<?php echo e($deliveries->title); ?>

<?php elseif($type=="base_price"): ?>
<?php echo e($deliveries->base_price); ?>

<?php elseif($type=="price"): ?>
<?php echo e($deliveries->price); ?>

<?php elseif($type=="hurry_price"): ?>
<?php echo e($deliveries->hurry_price); ?>

<?php elseif($type=="image_waiting"): ?>
<div class="d-flex justify-content-center align-items-center">
<?php if($deliveries->image_waiting!=null): ?>
<a href="<?php echo e('/files/'.$deliveries->image_waiting); ?>" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="<?php echo e('/files/'.$deliveries->image_waiting); ?>" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
<?php endif; ?>
</div>
<?php elseif($type=="title_waiting"): ?>
<?php echo e($deliveries->title_waiting); ?>

<?php elseif($type=="description_waiting"): ?>
<?php echo e($deliveries->description_waiting); ?>

<?php elseif($type=="back_price"): ?>
<?php echo e($deliveries->back_price); ?>

<?php elseif($type=="type"): ?>
<?php if($services_type=\App\Models\MyServices_Type::find($deliveries->type)): ?>
<?php echo e("$services_type->title"); ?>

<?php endif; ?>
<?php elseif($type=="decrease_percent"): ?>
<?php echo e($deliveries->decrease_percent); ?>

<?php elseif($type=="economic_icon"): ?>
<div class="d-flex justify-content-center align-items-center">
<?php if($deliveries->economic_icon!=null): ?>
<a href="<?php echo e('/files/'.$deliveries->economic_icon); ?>" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content;margin: 5px">
<img src="<?php echo e('/files/'.$deliveries->economic_icon); ?>" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
<?php endif; ?>
</div>
<?php elseif($type=="time_price"): ?>
<?php echo e($deliveries->time_price); ?>

<?php elseif($type=="service"): ?>
<?php if($deliveries=\App\Models\MyDeliveries::find($deliveries->service)): ?>
<?php echo e("$deliveries->title"); ?>

<?php endif; ?>
<?php elseif($type=="show"): ?>
<div class="custom-control custom-checkbox mb-3 text-center">
<input <?php echo e(\App\Models\Admin::checkAccess('record','edit','deliveries')?'':'disabled'); ?> <?php echo e($deliveries->show?'checked':''); ?>

onclick="onCheckbox(this,'<?php echo e(route('record.active',['slug'=>'deliveries','fieldName'=>'show','id'=>$deliveries->id])); ?>')"
type="checkbox" class="form-check-input" id="customCheck<?php echo e('show_'.$deliveries->id); ?>"/>
<?php elseif($type=="have_economic"): ?>
<div class="custom-control custom-checkbox mb-3 text-center">
<input <?php echo e(\App\Models\Admin::checkAccess('record','edit','deliveries')?'':'disabled'); ?> <?php echo e($deliveries->have_economic?'checked':''); ?>

onclick="onCheckbox(this,'<?php echo e(route('record.active',['slug'=>'deliveries','fieldName'=>'have_economic','id'=>$deliveries->id])); ?>')"
type="checkbox" class="form-check-input" id="customCheck<?php echo e('have_economic_'.$deliveries->id); ?>"/>
<?php else: ?>
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?php echo e(__('Actions')); ?></button>
<ul class="dropdown-menu" style="">
<?php if(\App\Models\Admin::checkAccess('record','edit','deliveries')): ?>
       <li>
            <a class="dropdown-item" href="<?php echo e(route('record.editform',['slug'=>'deliveries','id'=>$deliveries->id])); ?>">
                <i class="bx bx-edit-alt me-1"></i> <?php echo e(__('Edit')); ?>

            </a>
       </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','delete','deliveries')): ?>
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('<?php echo e(route('record.destroy',['slug'=>'deliveries','id'=>$deliveries->id])); ?>')">
                <i class="bx bx-trash me-1"></i><?php echo e(__('Delete')); ?>

            </a>
       </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','show','stop_on_way')): ?>
           <li>
                <a href="<?php echo e(route('record.index',['slug'=>'stop_on_way','parentSlug'=>'deliveries','parentId'=>$deliveries->id])); ?>"
                type="button" class="dropdown-item" ><?php echo e(__("توقف در مسیر")); ?>

                </a>
                </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','show','heavy_equipment')): ?>
           <li>
                <a href="<?php echo e(route('record.index',['slug'=>'heavy_equipment','parentSlug'=>'deliveries','parentId'=>$deliveries->id])); ?>"
                type="button" class="dropdown-item" ><?php echo e(__("وسایل سنگین")); ?>

                </a>
                </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','show','worker_price')): ?>
           <li>
                <a href="<?php echo e(route('record.index',['slug'=>'worker_price','parentSlug'=>'deliveries','parentId'=>$deliveries->id])); ?>"
                type="button" class="dropdown-item" ><?php echo e(__("تعیین قیمت کارگر")); ?>

                </a>
                </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','show','price_floors')): ?>
           <li>
                <a href="<?php echo e(route('record.index',['slug'=>'price_floors','parentSlug'=>'deliveries','parentId'=>$deliveries->id])); ?>"
                type="button" class="dropdown-item" ><?php echo e(__("تحديد سعر الطوابق")); ?>

                </a>
                </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','show','cancel_trip')): ?>
           <li>
                <a href="<?php echo e(route('record.index',['slug'=>'cancel_trip','parentSlug'=>'deliveries','parentId'=>$deliveries->id])); ?>"
                type="button" class="dropdown-item" ><?php echo e(__("دلایل لغو پس از قبول راننده")); ?>

                </a>
                </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','show','cancel_request')): ?>
           <li>
                <a href="<?php echo e(route('record.index',['slug'=>'cancel_request','parentSlug'=>'deliveries','parentId'=>$deliveries->id])); ?>"
                type="button" class="dropdown-item" ><?php echo e(__("دلایل لغو پیش از قبول راننده")); ?>

                </a>
                </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','show','commission')): ?>
           <li>
                <a href="<?php echo e(route('record.index',['slug'=>'commission','parentSlug'=>'deliveries','parentId'=>$deliveries->id])); ?>"
                type="button" class="dropdown-item" ><?php echo e(__("کمیسیون")); ?>

                </a>
                </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','show','taxi_options')): ?>
           <li>
                <a href="<?php echo e(route('record.index',['slug'=>'taxi_options','parentSlug'=>'deliveries','parentId'=>$deliveries->id])); ?>"
                type="button" class="dropdown-item" ><?php echo e(__("آپشن های سواری")); ?>

                </a>
                </li>
<?php endif; ?>
<?php if(\App\Models\Admin::checkAccess('record','show','stop_without_driver')): ?>
           <li>
                <a href="<?php echo e(route('record.index',['slug'=>'stop_without_driver','parentSlug'=>'deliveries','parentId'=>$deliveries->id])); ?>"
                type="button" class="dropdown-item" ><?php echo e(__("زمان توقف بدون راننده")); ?>

                </a>
                </li>
<?php endif; ?>
</ul>
</div>
<?php endif; ?>
<?php /**PATH /home/qozeem/projects/web/wasalney/resources/views/admin-panel/my-deliveries/table-data.blade.php ENDPATH**/ ?>