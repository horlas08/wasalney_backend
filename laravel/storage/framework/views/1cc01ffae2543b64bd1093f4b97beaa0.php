

<header>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible  in" style="z-index: 1000">
            <p>

                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            </p>

            <ul class="">

                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <?php echo e($error); ?> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

    <?php endif; ?>







        <?php ($languages=\App\Models\Language::all()); ?>
        <div class="account-menu ol-hover">
            <span><?php echo e($selectedLang==null?'':$selectedLang->title); ?></span>
            <img src=<?php echo e(asset("admin-panel/images/translate.png")); ?> alt="">
            <ul>
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a  href="<?php echo e(route('language.change',['abbr'=>$lang->abbr])); ?>"><i class="ic-browser"></i><?php echo e($lang->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <h1><?php echo e(__('Admin Panel')); ?></h1>
    <div class="account-menu-section">

        <div class="buttons">
            <!--<button><i class="ic-settings"></i></button>-->
            <!--<button onclick="showNotifications()"><i class="ic-notify"></i><span></span></button>-->
            <!--              <button class="direction-btn">-->
            <!--                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
            <!--                <path d="M3.5 8.3C3.5 6.61984 3.5 5.77976 3.82698 5.13803C4.1146 4.57354 4.57354 4.1146 5.13803 3.82698C5.77976 3.5 6.61984 3.5 8.3 3.5H15.7C17.3802 3.5 18.2202 3.5 18.862 3.82698C19.4265 4.1146 19.8854 4.57354 20.173 5.13803C20.5 5.77976 20.5 6.61984 20.5 8.3V15.7C20.5 17.3802 20.5 18.2202 20.173 18.862C19.8854 19.4265 19.4265 19.8854 18.862 20.173C18.2202 20.5 17.3802 20.5 15.7 20.5H8.3C6.61984 20.5 5.77976 20.5 5.13803 20.173C4.57354 19.8854 4.1146 19.4265 3.82698 18.862C3.5 18.2202 3.5 17.3802 3.5 15.7V8.3Z" stroke="#33363F" stroke-linecap="round"/>-->
            <!--                <path d="M6.5 9.5H9C10.6569 9.5 12 10.8431 12 12.5V17M6.5 9.5L8 8M6.5 9.5L8 11" stroke="#33363F" stroke-linecap="round" stroke-linejoin="round"/>-->
            <!--                <path d="M17.5 9.5H15C13.3431 9.5 12 10.8431 12 12.5V17M17.5 9.5L16 8M17.5 9.5L16 11" stroke="#33363F" stroke-linecap="round" stroke-linejoin="round"/>-->
            <!--              </svg></button>-->
            <div class="account-menu-mobile ol-hover">
                <img src=<?php echo e(asset("admin-panel/images/avatar.png")); ?> alt="">

            </div>
        </div>
        <?php ($admin=\Illuminate\Support\Facades\Auth::guard('admin')->user()); ?>
        <div class="account-menu ol-hover">
            <span><?php echo e($admin->name); ?></span>
            <img src=<?php echo e(asset("admin-panel/images/avatar.png")); ?> alt="">
            <ul>
                <li><a href="<?php echo e(route('admin.editform',['id'=>$admin->id])); ?>"><i class="ic-user"></i><?php echo e(__('Edit User')); ?></a></li>
                <li><a href="<?php echo e(route('admin.logOut')); ?>"><i class="ic-block"></i><?php echo e(__('Logout')); ?></a></li>
            </ul>
        </div>

    </div>

</header>

<?php /**PATH /home/qozeem/projects/web/wasalney/laravel/resources/views/admin-panel/layout/header.blade.php ENDPATH**/ ?>