<!DOCTYPE html>
<html lang="fa-IR">

<head>




    <?php echo $__env->make('seo.meta',['title'=>__('Login')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/plugins/bootstrap/bootstrap.min.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/icons/style.css")); ?>>

    <!-- Theme Colors -->
    <style id="colors">
        :root{
            --primary:     #4053BA;
            --accent:      #FF982E;
            --primary-op:  #4053ba21;
            --background1: #F8F8F8;
            --background2: #ffffff;
            --color1:      #474747;
            --color2:      #ffffff;
            --color3:      #7C7C7C;
            --color4:      #D3D3D3;
            --hover1:      #ffffff1a;
            --hover2:      #4053ba12;
            --hover3:      #4053ba0a;
            --shadow1:       0px 4px 30px rgba(0, 0, 0, 0.03);
            --shadow-accent: 0 5px 15px #ff982e3b;
            --shadow-primary:0 5px 15px #4053ba6b;
        }
    </style>

    <!-- Plugins -->
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/plugins/progresscircle/progresscircle.css")); ?>>

    <!-- Main Styles -->
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/styles/main.css")); ?>>
</head>

<body class="login-box dir_right">

<?php if($errors->any()): ?>
    <div style="position: absolute;top: 20px;width: 100%;display: flex;justify-content: center;align-items: center">

        <ul class="alert alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <?php echo e($error); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<div class="login-container">
    <div class="login-form">


        <div class="login-logo">
            <img src=<?php echo e(asset("admin-panel/images/logo.svg")); ?> alt=>
        </div>
        <div class="login-info">
            <h1><?php echo e(__('Login')); ?></h1>
            <form action="<?php echo e(route('admin.login')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="icon-input">
                    <label for="username"><?php echo e(__('Username')); ?> :</label>
                    <div class="input_box ">
                        <input name="username" type="text" id="username" placeholder="">
                        <i class=" ic-mobile"></i>
                    </div>
                </div>
                <div class="icon-input">
                    <label for="password"><?php echo e(__('Password')); ?> :</label>

                    <div class="input_box">
                        <input name="password" type="password" id="password">
                        <i class="ic-password"></i>
                    </div>
                </div>
                <div style="margin-bottom:12px;">
                    <img id="captcha_code" class="captcha_img" src="<?php echo e(captcha_src()); ?>" alt="captcha"/>
                    <img class="refresh_captcha pointer" source="captcha_code" src=<?php echo e(asset("admin-panel/images/refresh.png")); ?> alt="refresh"/>
                </div>

                <div class="icon-input">
                    <label for="password"><?php echo e(__('Captcha')); ?> :</label>

                    <div class="input_box">
                        <input name="captcha" type="number" id="captcha">
                        <i class="ic-password"></i>
                    </div>
                </div>

                <button type="submit"><?php echo e(__('Login')); ?> </button>
            </form>


            <a  class="back-btn"><?php echo e(__('Return')); ?></a>
        </div>
    </div>
</div>

<div id="overlay" class="overlay"></div>
<script src=<?php echo e(asset("admin-panel/plugins/bootstrap/bootstrap.bundle.min.js")); ?>></script>
<script src=<?php echo e(asset("admin-panel/plugins/jquery/jquery.min.js")); ?>></script>
<!-- Plugins -->
<script src=<?php echo e(asset("admin-panel/plugins/progresscircle/progresscircle.js")); ?>></script>
<script src=<?php echo e(asset("admin-panel/plugins/chartjs/chart.js")); ?>></script>

<!-- Main Scripts -->
<script src=<?php echo e(asset("admin-panel/scripts/login.js")); ?>></script>
<script>

    $(document).on("click", ".refresh_captcha", function () {
        var source = $(this).attr('source');
        $.get("/captcha_src/refresh", function (response) {
            $("#" + source).attr('src', response);
        });
    });
</script>

</body>

</html>
<?php /**PATH /home/qozeem/projects/web/wasalney/laravel/resources/views/admin-panel/dashboard/login.blade.php ENDPATH**/ ?>