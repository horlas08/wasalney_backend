




<?php ($lang=getLang()); ?>
<?php ($setting=\App\Models\Setting::where('lang_abbr',$lang)->first()); ?>
<?php ($title=isset($title) && $setting!=null?$setting->name.' | '.$title:(isset($title)?$title:($setting!=null?$setting->name:''))); ?>
<?php ($description=isset($description)?$description: ($setting!=null?$setting->description:'')); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
<meta content="IE=Edge" http-equiv="X-UA-Compatible">
<meta name="description" content="<?php echo e($description); ?>">
<title><?php echo e($title); ?></title>
<meta property="og:locale" content="<?php echo e($lang); ?>"/>

<?php if($setting!=null): ?>
<link rel="manifest" href="<?php echo e('/setting/'.$lang.'/manifest.json'); ?>">
<!-- iOS meta tags & icons -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo e($setting->theme_color); ?>">
<meta name="apple-mobile-web-app-title" content="<?php echo e($setting->name); ?>">


<link rel="apple-touch-icon" sizes="57x57" href="<?php echo e('/setting/'.$lang.'/57/'.$setting->favicon); ?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo e('/setting/'.$lang.'/60/'.$setting->favicon); ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo e('/setting/'.$lang.'/72/'.$setting->favicon); ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo e('/setting/'.$lang.'/76/'.$setting->favicon); ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo e('/setting/'.$lang.'/114/'.$setting->favicon); ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo e('/setting/'.$lang.'/120/'.$setting->favicon); ?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo e('/setting/'.$lang.'/144/'.$setting->favicon); ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo e('/setting/'.$lang.'/152/'.$setting->favicon); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e('/setting/'.$lang.'/180/'.$setting->favicon); ?>">

<meta name="msapplication-TileColor" content="<?php echo e($setting->background_color); ?>">
<meta name="msapplication-TileImage" content="<?php echo e('/setting/'.$lang.'/144/'.$setting->favicon); ?>">
<meta name="theme-color" content="<?php echo e($setting->theme_color); ?>">

<link rel="icon" type="image/png" sizes="192x192" href="<?php echo e('/setting/'.$lang.'/192/'.$setting->favicon); ?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo e('/setting/'.$lang.'/96/'.$setting->favicon); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e('/setting/'.$lang.'/32/'.$setting->favicon); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e('/setting/'.$lang.'/16/'.$setting->favicon); ?>">

<?php endif; ?>
<?php /**PATH /home/qozeem/projects/web/wasalney/resources/views/seo/meta.blade.php ENDPATH**/ ?>