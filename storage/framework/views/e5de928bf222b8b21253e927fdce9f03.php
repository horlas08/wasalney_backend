














































































































































<div class="sidebar-main-box close-side" >
    <div class="nav flex-column nav-pills DC_menu-bar" id="menu-bar" role="tablist" aria-orientation="vertical" >
        <button class="DC_open_btn  " id="menu-btn" >
            <div class="DC_menu-bars">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <div class="DC_items">

            <a id="v-home-tab" href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link DC_item_tabBox DC_link_item "   >
                <i class="fa-solid fa-chart-simple"></i>
                <span class="DC_tooltip_text"><?php echo e(__('Dashboard')); ?></span>
            </a>
            <button id="v-dynamic-tab" class="nav-link DC_item_tabBox DC_list_item " data_id="chart_box"  type="button"   >
                <i class="fa-solid fa-house"></i>
                <span class="DC_tooltip_text"><?php echo e(__('Main Menu')); ?></span>
            </button>
            
            
            
            
            <?php if(\App\Models\Admin::checkAccess('developer')): ?>
                <a id="v-menu-tab" href="<?php echo e(route('category.index',['type'=>'menu','parentId'=>0])); ?>" class="nav-link DC_item_tabBox DC_link_item" >
                    <i class="fa-solid fa-list"></i>
                    <span class="DC_tooltip_text"><?php echo e(__('Manage Menus')); ?></span>
                </a>
                <a id="v-table-tab" href="<?php echo e(route('category.index',['type'=>'table'])); ?>" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-table"></i>
                    <span class="DC_tooltip_text"><?php echo e(__('Manage Tables')); ?></span>
                </a>
                <a id="v-language-tab" href="<?php echo e(route('language.index')); ?>" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-language"></i>
                    <span class="DC_tooltip_text"><?php echo e(__('Manage Languages')); ?></span>
                </a>
                <a id="v-route-tab" href="<?php echo e(route('route.index')); ?>" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-link"></i>
                    <span class="DC_tooltip_text"><?php echo e(__('Manage Routes')); ?></span>
                </a>
                <a id="v-role-tab" href="<?php echo e(route('role.index')); ?>" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-users"></i>
                    <span class="DC_tooltip_text"><?php echo e(__('Manage User Roles')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(\App\Models\Admin::checkAccess('admin','show')): ?>
                <a id="v-admin-tab" href="<?php echo e(route('admin.index')); ?>" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-user"></i>
                    <span class="DC_tooltip_text"><?php echo e(__('Manage Admins')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(\App\Models\Admin::checkAccess('setting','show')): ?>
                <a id="v-setting-tab" href="<?php echo e(route('setting.index')); ?>" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-gear"></i>
                    <span class="DC_tooltip_text"><?php echo e(__('Setting')); ?></span>
                </a>
            <?php endif; ?>

            <?php if(\App\Models\Admin::checkAccess('airport','show')): ?>
                <a id="v-airport-bookings-tab" href="<?php echo e(route('admin.airport.bookings.index')); ?>" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-plane"></i>
                    <span class="DC_tooltip_text"><?php echo e(__('Airport Bookings')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(\App\Models\Admin::checkAccess('airport-service','show')): ?>
                <a id="v-airport-services-tab" href="<?php echo e(route('admin.airport.service-types.index')); ?>" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-taxi"></i>
                    <span class="DC_tooltip_text"><?php echo e(__('Airport Services')); ?></span>
                </a>
            <?php endif; ?>

        </div>
        <div class="DC_bottom-bar ">
            <button class="DC_item_tabBox DC_theme_btn" onclick="changeStyle()">
                <i class="fa-solid fa-moon"></i>
                <span class="DC_tooltip_text">Theme</span>
            </button>
            <a href="#" class="DC_item_tabBox">
                <i class="fa-solid fa-circle-question"></i>
                <span class="DC_tooltip_text">Question</span>
            </a>
        </div>
    </div>
    
    <div class="DC_sidbar_box main-sidebar" id="sidbar">
        <div class="DC_sidebar-logo">
            <a href="#">
                <img class="d-dark-none" src="http://127.0.0.1:8000/admin-panel/images/logo.png" alt="">
                <img class="d-light-none" src="http://127.0.0.1:8000/admin-panel/images/logo-light.png" alt="">
            </a>
        </div>
        <?php ($mainCategories=\App\Models\Category::where('parent_id','0')->orderBy('sort', 'DESC')->get()); ?>
        <div class="Dc_sidbar_body">
            <div class="DC_item_acordian" id="chart_box">
                <ul class="DC_acordian_list">
                    <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$category->is_menu): ?>
                            <?php if(\App\Models\Admin::checkAccess('record','show',$category->slug)): ?>
                                <li id="category_<?php echo e($category->id); ?>" class=""><a href="<?php echo e(route('record.index',['slug'=>$category->slug])); ?>" class="DC_text_li"><i class="<?php echo e($category->icon); ?> DC_icon_title"></i><?php echo e(__($category->title)); ?></a></li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li id="category_<?php echo e($category->id); ?>">
                                <div class="DC_headeer_acordian DC_text_box_li DC_headeer_acordian1 " id="category_<?php echo e($category->id); ?>">
                                    <span class="DC_text_li"><i class="<?php echo e($category->icon); ?> DC_icon_title"></i><?php echo e(__($category->title)); ?></span>
                                    <i class=" DC_angel_icon fa-solid fa-angle-left"></i>
                                    <i class="  DC_angel_icon fa-solid fa-angle-right"></i>
                                </div>
                                <ul class="DC_sub_list DC_ul " data-name="category_<?php echo e($category->id); ?>">
                                    <?php $__currentLoopData = \App\Models\Category::where('parent_id',$category->id)->orderBy('sort', 'DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!$sub->is_menu): ?>
                                            <?php if(\App\Models\Admin::checkAccess('record','show',$sub->slug)): ?>
                                                <li id="category_<?php echo e($sub->id); ?>" class=""><a  href="<?php echo e(route('record.index',['slug'=>$sub->slug])); ?>" class="DC_text_li"><i class="<?php echo e($sub->icon); ?> DC_icon_title"></i><?php echo e(__($sub->title)); ?></a></li>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <li id="category_<?php echo e($sub->id); ?>">
                                                <div class="DC_headeer_acordian2 DC_text_box_li" id="category_<?php echo e($category->id); ?>">
                                                    <span class="DC_text_li"><i class="<?php echo e($sub->icon); ?> DC_icon_title"></i><?php echo e(__($sub->title)); ?></span>
                                                    <i class="  fa-solid fa-angle-left"></i>
                                                    <i class="  fa-solid fa-angle-right"></i>
                                                </div>
                                                <ul class="DC_sub_list_box DC_ul DC_headeer_acordian3 category_<?php echo e($category->id); ?>" data-name="category_<?php echo e($sub->id); ?>">
                                                    <?php echo $sub->getSubMenus(); ?>

                                                </ul>
                                                

                                                
                                                
                                                
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            
            
            
            
            
            
            
            
        </div>
    </div>
</div>
<?php /**PATH /home/qozeem/projects/web/wasalney/laravel/resources/views/admin-panel/layout/sidebar.blade.php ENDPATH**/ ?>