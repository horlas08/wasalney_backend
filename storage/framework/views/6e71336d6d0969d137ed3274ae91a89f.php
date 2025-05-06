<?php if($type=="datatable-counter"): ?>
    <i class="sort-icon fa-solid fa-refresh m-1" sortId="<?php echo e($drivers->sort); ?>"
       style="color: #2e98c5;font-size: 20px;"></i>
    <?php echo e($counter); ?>

<?php elseif($type=="name"): ?>
    <?php echo e($drivers->name); ?>

<?php elseif($type=="mobile"): ?>
    <?php echo e($drivers->mobile); ?>

<?php elseif($type=="code_meli"): ?>
    <?php echo e($drivers->code_meli); ?>

<?php elseif($type=="gender"): ?>
    <?php if($deliveries=\App\Models\MyGender::find($drivers->gender)): ?>
        <?php echo e("$deliveries->title"); ?>

    <?php endif; ?>
<?php elseif($type=="rate"): ?>
    <?php echo e($drivers->rate); ?>


<?php elseif($type=="type_activity"): ?>
    <?php if($deliveries=\App\Models\MyDeliveries::find($drivers->type_activity)): ?>
        <?php echo e("$deliveries->title"); ?>

    <?php endif; ?>
<?php elseif($type=="state"): ?>
    <div class="custom-control custom-checkbox mb-3 text-center">
        <input <?php echo e(\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'); ?> <?php echo e($drivers->state?'checked':''); ?>

               onclick="onCheckbox(this,'<?php echo e(route('record.active',['slug'=>'drivers','fieldName'=>'state','id'=>$drivers->id])); ?>')"
               type="checkbox" class="form-check-input" id="customCheck<?php echo e('state_'.$drivers->id); ?>"/>
        <?php elseif($type=="state_approval"): ?>
            <?php if($state_completed=\App\Models\MyState_Completed::find($drivers->state_approval)): ?>
                <?php echo e("$state_completed->title"); ?>

            <?php endif; ?>
        <?php elseif($type=="image"): ?>
            <div class="d-flex justify-content-center align-items-center">
                <?php if($drivers->image!=null): ?>
                    <a href="<?php echo e('/files/'.$drivers->image); ?>" target="_blank"
                       style="background-color: #EEEEEE;text-align: center;width: fit-content">
                        <img src="<?php echo e('/files/'.$drivers->image); ?>" height="60"
                             width="60"
                             onerror="this.src='/admin-panel/images/file.png'">
                    </a>
                <?php endif; ?>
            </div>
        <?php elseif($type=="credit"): ?>
            <?php echo e($drivers->credit); ?>

        <?php elseif($type=="level"): ?>
            <?php if($level=\App\Models\MyLevel::find($drivers->level)): ?>
                <?php echo e("$level->title"); ?>

            <?php endif; ?>

        <?php elseif($type=="has_profile"): ?>
            <div class="custom-control custom-checkbox mb-3 text-center">
                <input <?php echo e(\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'); ?> <?php echo e($drivers->has_profile?'checked':''); ?>

                       onclick="onCheckbox(this,'<?php echo e(route('record.active',['slug'=>'drivers','fieldName'=>'has_profile','id'=>$drivers->id])); ?>')"
                       type="checkbox" class="form-check-input"
                       id="customCheck<?php echo e('state_'.$drivers->id); ?>"/>
                <?php elseif($type=="has_info_user"): ?>
                    <div class="custom-control custom-checkbox mb-3 text-center">
                        <input <?php echo e(\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'); ?> <?php echo e($drivers->has_info_user?'checked':''); ?>

                               onclick="onCheckbox(this,'<?php echo e(route('record.active',['slug'=>'drivers','fieldName'=>'has_info_user','id'=>$drivers->id])); ?>')"
                               type="checkbox" class="form-check-input"
                               id="customCheck<?php echo e('state_'.$drivers->id); ?>"/>
                        <?php elseif($type=="has_info_bank"): ?>
                            <div class="custom-control custom-checkbox mb-3 text-center">
                                <input <?php echo e(\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'); ?> <?php echo e($drivers->has_info_bank?'checked':''); ?>

                                       onclick="onCheckbox(this,'<?php echo e(route('record.active',['slug'=>'drivers','fieldName'=>'has_info_bank','id'=>$drivers->id])); ?>')"
                                       type="checkbox" class="form-check-input"
                                       id="customCheck<?php echo e('state_'.$drivers->id); ?>"/>
                                <?php elseif($type=="has_car_details"): ?>
                                    <div class="custom-control custom-checkbox mb-3 text-center">
                                        <input <?php echo e(\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'); ?> <?php echo e($drivers->has_car_details?'checked':''); ?>

                                               onclick="onCheckbox(this,'<?php echo e(route('record.active',['slug'=>'drivers','fieldName'=>'has_car_details','id'=>$drivers->id])); ?>')"
                                               type="checkbox" class="form-check-input"
                                               id="customCheck<?php echo e('state_'.$drivers->id); ?>"/>
                                        <?php elseif($type=="has_documents"): ?>
                                            <div class="custom-control custom-checkbox mb-3 text-center">
                                                <input <?php echo e(\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'); ?> <?php echo e($drivers->has_documents?'checked':''); ?>

                                                       onclick="onCheckbox(this,'<?php echo e(route('record.active',['slug'=>'drivers','fieldName'=>'has_documents','id'=>$drivers->id])); ?>')"
                                                       type="checkbox" class="form-check-input"
                                                       id="customCheck<?php echo e('state_'.$drivers->id); ?>"/>
                                                <?php elseif($type=="lat"): ?>
                                                    <?php echo e($drivers->lat); ?>

                                                <?php elseif($type=="long"): ?>
                                                    <?php echo e($drivers->long); ?>

                                                <?php elseif($type=="number_licence"): ?>
                                                    <?php echo e($drivers->number_licence); ?>

                                                <?php elseif($type=="certificate_type"): ?>
                                                    <?php if($certificates_types=\App\Models\MyCertificates_Types::find($drivers->certificate_type)): ?>
                                                        <?php echo e("$certificates_types->title"); ?>

                                                    <?php endif; ?>
                                                <?php elseif($type=="certificat_date"): ?>
                                                    <?php if($drivers->certificat_date): ?>
                                                        <?php if(getLang()=='fa'): ?>
                                                            <?php echo e(\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $drivers->certificat_date))->format('%A, %d %B %Y')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $drivers->certificat_date)->format('M d Y')); ?>

                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php elseif($type=="certificate_validity"): ?>
                                                    <?php echo e($drivers->certificate_validity); ?>

                                                <?php elseif($type=="car_model"): ?>
                                                    <?php if($car_models=\App\Models\MyCar_Models::find($drivers->car_model)): ?>
                                                        <?php echo e("$car_models->title"); ?>

                                                    <?php endif; ?>

                                                <?php elseif($type=="notif_token"): ?>
                                                    <?php echo e($drivers->notif_token); ?>

                                                <?php elseif($type=="car_tag"): ?>
                                                    <?php echo e($drivers->car_tag); ?>


                                                <?php elseif($type=="description"): ?>
                                                    <?php echo e($drivers->description); ?>


                                                <?php elseif($type=="code"): ?>
                                                    <?php echo e($drivers->code); ?>

                                                <?php elseif($type=="intro_code"): ?>
                                                    <?php echo e($drivers->intro_code); ?>

                                                <?php elseif($type=="family_number"): ?>
                                                    <?php echo e($drivers->family_number); ?>

                                                     <?php elseif($type=="fcm_token"): ?>
                                                    <?php echo e($drivers->fcm_token); ?>

                                                <?php else: ?>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                                class="btn btn-outline-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><?php echo e(__('Actions')); ?></button>
                                                        <ul class="dropdown-menu" style="">
                                                            <?php if(\App\Models\Admin::checkAccess('record','edit','drivers')): ?>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                       href="<?php echo e(route('record.editform',['slug'=>'drivers','id'=>$drivers->id])); ?>">
                                                                        <i class="bx bx-edit-alt me-1"></i> <?php echo e(__('Edit')); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if(\App\Models\Admin::checkAccess('record','delete','drivers')): ?>
                                                                <li>
                                                                    <a class="dropdown-item text-danger"
                                                                       data-bs-toggle="modal"
                                                                       data-bs-target="#basicModal"
                                                                       onclick="setModalRoute('<?php echo e(route('record.destroy',['slug'=>'drivers','id'=>$drivers->id])); ?>')">
                                                                        <i class="bx bx-trash me-1"></i><?php echo e(__('Delete')); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                                <?php if(\App\Models\Admin::checkAccess('record','show','rate_user')): ?>
                                                                    <li>
                                                                        <a href="<?php echo e(route('record.index',['slug'=>'rate_user','parentSlug'=>'drivers','parentId'=>$drivers->id])); ?>"
                                                                           type="button" class="dropdown-item"><?php echo e(__("امتیاز ها")); ?>

                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php if(\App\Models\Admin::checkAccess('record','show','car_details')): ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('record.index',['slug'=>'car_details','parentSlug'=>'drivers','parentId'=>$drivers->id])); ?>"
                                                                       type="button"
                                                                       class="dropdown-item"><?php echo e(__("مشخصات ماشین")); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if(\App\Models\Admin::checkAccess('record','show','documents')): ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('record.index',['slug'=>'documents','parentSlug'=>'drivers','parentId'=>$drivers->id])); ?>"
                                                                       type="button"
                                                                       class="dropdown-item"><?php echo e(__("مدارک")); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if(\App\Models\Admin::checkAccess('record','show','wallet')): ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('record.index',['slug'=>'wallet','parentSlug'=>'drivers','parentId'=>$drivers->id])); ?>"
                                                                       type="button"
                                                                       class="dropdown-item"><?php echo e(__("کیف پول")); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if(\App\Models\Admin::checkAccess('record','show','cancel_driver')): ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('record.index',['slug'=>'cancel_driver','parentSlug'=>'drivers','parentId'=>$drivers->id])); ?>"
                                                                       type="button"
                                                                       class="dropdown-item"><?php echo e(__("سفارشات لغو کرده")); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if(\App\Models\Admin::checkAccess('record','show','info_bank')): ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('record.index',['slug'=>'info_bank','parentSlug'=>'drivers','parentId'=>$drivers->id])); ?>"
                                                                       type="button"
                                                                       class="dropdown-item"><?php echo e(__("اطلاعات بانکی")); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
<?php endif; ?>
<?php /**PATH /home/qozeem/projects/web/wasalney/resources/views/admin-panel/my-drivers/table-data.blade.php ENDPATH**/ ?>