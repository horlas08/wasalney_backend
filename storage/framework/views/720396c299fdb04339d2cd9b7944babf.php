<!DOCTYPE html>
<html lang="fa-IR">

<head>




    <?php echo $__env->make('seo.meta',['title'=>__('Admin Panel')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin-panel.layout.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('styles'); ?>
</head>


<?php ($selectedLang=\App\Models\Language::where('abbr',app()->getLocale())->first()); ?>

<body class="index-box <?php echo e($selectedLang==null || $selectedLang->direction=='rtl'?'dir_right':'dir_left'); ?>">

<div class="flex-box">
    <?php echo $__env->make('admin-panel.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="main-content" class="main-content">
        <?php echo $__env->make('admin-panel.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <!-- Responsive Datatable -->


    </div>
</div>
<ul class="ul_mobile_account ol-hover">
    <span>حامد باقری</span>
    <li><a href="#"><i class="ic-message"></i>لیست پیام ها</a></li>
    <li><a href="#"><i class="ic-statistics"></i>لیست پیام ها</a></li>
    <li><a href="#"><i class="ic-notify"></i>لیست پیام ها</a></li>
    <li><a href="#"><i class="ic-location"></i>لیست پیام ها</a></li>
    <li><a href="#"><i class="ic-dark"></i>لیست پیام ها</a></li>
</ul>


<!-- Notifications Popup -->
<div class="notify-box" id="notifications">
    <!--
      <div class="empty">
      <i class="ic-notify"></i>
      <span>موردی برای نمایش وجود ندارد!</span>
    </div>
     -->
    <div class="notify-item">
        <i class="ic-notify"></i>
        <strong>عنوان نوتفیکیشن</strong>
        <span>23 خرداد 1401</span>
        <a href="#">مشاهده</a>
    </div>
    <div class="notify-item">
        <i class="ic-notify"></i>
        <strong>عنوان نوتفیکیشن</strong>
        <span>23 خرداد 1401</span>
        <a href="#">مشاهده</a>
    </div>
    <div class="notify-item">
        <i class="ic-notify"></i>
        <strong>عنوان نوتفیکیشن</strong>
        <span>23 خرداد 1401</span>
        <a href="#">مشاهده</a>
    </div>
    <div class="notify-item">
        <img src=<?php echo e(asset("admin-panel/images/notify-light.png")); ?> alt="">
        <strong>عنوان نوتفیکیشن</strong>
        <span>23 خرداد 1401</span>
        <a href="#">مشاهده</a>
    </div>
    <div class="notify-item">
        <img src=<?php echo e(asset("admin-panel/images/notify-light.png")); ?> alt="">
        <strong>عنوان نوتفیکیشن</strong>
        <span>23 خرداد 1401</span>
        <a href="#">مشاهده</a>
    </div>
</div>

<!-- IconPicker Modal -->
<div class="modal fade" id="iconpicker" tabindex="-1" aria-labelledby="IconPicker" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content iconpicker">
            <div class="icp-header">
                <strong>انتخاب آیکون</strong>
                <form action="#" class="icp-search">
                    <input type="text" placeholder="جستجو در آیکون ها...">
                </form>
                <button type="button" class="btn-close icp-close" data-bs-dismiss="modal" aria-label="بستن"></button>
            </div>
            <div class="modal-body">
                <div class="nav nav-pills icons-categories" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="default-icons-tab" data-bs-toggle="pill" data-bs-target="#default-icons" type="button" role="tab" aria-controls="default-icons" aria-selected="true"><i class="ic-dark"></i>پیشفرض<span>1245</span></button>
                    <button class="nav-link" id="material-icons-tab" data-bs-toggle="pill" data-bs-target="#material-icons" type="button" role="tab" aria-controls="material-icons" aria-selected="false"><i class="ic-dark"></i>متریال<span>1245</span></button>
                    <button class="nav-link" id="fontawesome-icons-tab" data-bs-toggle="pill" data-bs-target="#fontawesome-icons" type="button" role="tab" aria-controls="fontawesome-icons" aria-selected="false"><i class="ic-dark"></i>FontAwesome<span>1245</span></button>
                    <button class="nav-link" id="fluent-icons-tab" data-bs-toggle="pill" data-bs-target="#fluent-icons" type="button" role="tab" aria-controls="fluent-icons" aria-selected="false"><i class="ic-dark"></i>Fluent<span>1245</span></button>
                    <button class="nav-link" id="feather-icons-tab" data-bs-toggle="pill" data-bs-target="#feather-icons" type="button" role="tab" aria-controls="feather-icons" aria-selected="false"><i class="ic-dark"></i>Feather<span>1245</span></button>
                    <button class="nav-link active" id="default-icons-tab" data-bs-toggle="pill" data-bs-target="#default-icons" type="button" role="tab" aria-controls="default-icons" aria-selected="true"><i class="ic-dark"></i>پیشفرض<span>1245</span></button>
                    <button class="nav-link" id="material-icons-tab" data-bs-toggle="pill" data-bs-target="#material-icons" type="button" role="tab" aria-controls="material-icons" aria-selected="false"><i class="ic-dark"></i>متریال<span>1245</span></button>
                    <button class="nav-link" id="fontawesome-icons-tab" data-bs-toggle="pill" data-bs-target="#fontawesome-icons" type="button" role="tab" aria-controls="fontawesome-icons" aria-selected="false"><i class="ic-dark"></i>FontAwesome<span>1245</span></button>
                    <button class="nav-link" id="fluent-icons-tab" data-bs-toggle="pill" data-bs-target="#fluent-icons" type="button" role="tab" aria-controls="fluent-icons" aria-selected="false"><i class="ic-dark"></i>Fluent<span>1245</span></button>
                    <button class="nav-link" id="feather-icons-tab" data-bs-toggle="pill" data-bs-target="#feather-icons" type="button" role="tab" aria-controls="feather-icons" aria-selected="false"><i class="ic-dark"></i>Feather<span>1245</span></button>
                    <button class="nav-link active" id="default-icons-tab" data-bs-toggle="pill" data-bs-target="#default-icons" type="button" role="tab" aria-controls="default-icons" aria-selected="true"><i class="ic-dark"></i>پیشفرض<span>1245</span></button>
                    <button class="nav-link" id="material-icons-tab" data-bs-toggle="pill" data-bs-target="#material-icons" type="button" role="tab" aria-controls="material-icons" aria-selected="false"><i class="ic-dark"></i>متریال<span>1245</span></button>
                    <button class="nav-link" id="fontawesome-icons-tab" data-bs-toggle="pill" data-bs-target="#fontawesome-icons" type="button" role="tab" aria-controls="fontawesome-icons" aria-selected="false"><i class="ic-dark"></i>FontAwesome<span>1245</span></button>
                    <button class="nav-link" id="fluent-icons-tab" data-bs-toggle="pill" data-bs-target="#fluent-icons" type="button" role="tab" aria-controls="fluent-icons" aria-selected="false"><i class="ic-dark"></i>Fluent<span>1245</span></button>
                    <button class="nav-link" id="feather-icons-tab" data-bs-toggle="pill" data-bs-target="#feather-icons" type="button" role="tab" aria-controls="feather-icons" aria-selected="false"><i class="ic-dark"></i>Feather<span>1245</span></button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="default-icons" role="tabpanel" aria-labelledby="default-icons-tab" tabindex="0">
                        <div class="icons-grid">
                            <i class="ic-home icp-item"></i>
                            <i class="ic-apple icp-item"></i>
                            <i class="ic-dark icp-item"></i>
                            <i class="ic-location icp-item"></i>
                            <i class="ic-message icp-item"></i>
                            <i class="ic-notify icp-item"></i>
                            <i class="ic-playstore icp-item"></i>
                            <i class="ic-plug icp-item"></i>
                            <i class="ic-question icp-item"></i>
                            <i class="ic-statistics icp-item"></i>
                            <i class="ic-user icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-apple icp-item"></i>
                            <i class="ic-dark icp-item"></i>
                            <i class="ic-location icp-item"></i>
                            <i class="ic-message icp-item"></i>
                            <i class="ic-notify icp-item"></i>
                            <i class="ic-playstore icp-item"></i>
                            <i class="ic-plug icp-item"></i>
                            <i class="ic-question icp-item"></i>
                            <i class="ic-statistics icp-item"></i>
                            <i class="ic-user icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-apple icp-item"></i>
                            <i class="ic-dark icp-item"></i>
                            <i class="ic-location icp-item"></i>
                            <i class="ic-message icp-item"></i>
                            <i class="ic-notify icp-item"></i>
                            <i class="ic-playstore icp-item"></i>
                            <i class="ic-plug icp-item"></i>
                            <i class="ic-question icp-item"></i>
                            <i class="ic-statistics icp-item"></i>
                            <i class="ic-user icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-apple icp-item"></i>
                            <i class="ic-dark icp-item"></i>
                            <i class="ic-location icp-item"></i>
                            <i class="ic-message icp-item"></i>
                            <i class="ic-notify icp-item"></i>
                            <i class="ic-playstore icp-item"></i>
                            <i class="ic-plug icp-item"></i>
                            <i class="ic-question icp-item"></i>
                            <i class="ic-statistics icp-item"></i>
                            <i class="ic-user icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-apple icp-item"></i>
                            <i class="ic-dark icp-item"></i>
                            <i class="ic-location icp-item"></i>
                            <i class="ic-message icp-item"></i>
                            <i class="ic-notify icp-item"></i>
                            <i class="ic-playstore icp-item"></i>
                            <i class="ic-plug icp-item"></i>
                            <i class="ic-question icp-item"></i>
                            <i class="ic-statistics icp-item"></i>
                            <i class="ic-user icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-apple icp-item"></i>
                            <i class="ic-dark icp-item"></i>
                            <i class="ic-location icp-item"></i>
                            <i class="ic-message icp-item"></i>
                            <i class="ic-notify icp-item"></i>
                            <i class="ic-playstore icp-item"></i>
                            <i class="ic-plug icp-item"></i>
                            <i class="ic-question icp-item"></i>
                            <i class="ic-statistics icp-item"></i>
                            <i class="ic-user icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                            <i class="ic-home icp-item"></i>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="material-icons" role="tabpanel" aria-labelledby="material-icons-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="fontawesome-icons" role="tabpanel" aria-labelledby="fontawesome-icons-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="fluent-icons" role="tabpanel" aria-labelledby="fluent-icons-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="feather-icons" role="tabpanel" aria-labelledby="feather-icons-tab" tabindex="0">...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FilePicker Modal -->
<div class="modal fade" id="filepicker" tabindex="-1" aria-labelledby="FilePicker" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content iconpicker">
            <div class="icp-header">
                <strong>انتخاب فایل</strong>
                <form action="#" class="icp-search">
                    <input type="text" placeholder="جستجو در فایل ها ...">
                </form>
                <button type="button" class="btn-close icp-close" data-bs-dismiss="modal" aria-label="بستن"></button>
            </div>
            <div class="modal-body">
                <div class="nav nav-pills icons-categories" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="fp-gallery-tab" data-bs-toggle="pill" data-bs-target="#fp-gallery" type="button" role="tab" aria-controls="fp-gallery" aria-selected="true"><i class="ic-gallery"></i>فایل های آپلود شده</button>
                    <button class="nav-link" id="fp-upload-tab" data-bs-toggle="pill" data-bs-target="#fp-upload" type="button" role="tab" aria-controls="fp-upload" aria-selected="false"><i class="ic-add"></i>آپلود فایل جدید</button>
                    <div class="nav-divider"></div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="fp-gallery" role="tabpanel" aria-labelledby="fp-gallery-tab" tabindex="0">
                        <div class="files-grid">
                            <div class="file-item fi-image"><img src=<?php echo e(asset("admin-panel/images/gallery/01.jpg")); ?> alt=""><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-video"><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-image"><img src=<?php echo e(asset("admin-panel/images/gallery/02.jpg")); ?> alt=""><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-audio"><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-archive"><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-image"><img src=<?php echo e(asset("admin-panel/images/gallery/03.jpg")); ?> alt=""><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-document"><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-unknown"><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-image"><img src=<?php echo e(asset("admin-panel/images/gallery/01.jpg")); ?> alt=""><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-video"><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-image"><img src=<?php echo e(asset("admin-panel/images/gallery/02.jpg")); ?> alt=""><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-audio"><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-archive"><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-image"><img src=<?php echo e(asset("admin-panel/images/gallery/03.jpg")); ?> alt=""><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-document"><span>Filename-01.jpg</span></div>
                            <div class="file-item fi-unknown"><span>Filename-01.jpg</span></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fp-upload" role="tabpanel" aria-labelledby="fp-upload-tab" tabindex="0">
                        <form action="#" class="upload-area">
                            <input class="file-input" type="file" name="files[]" id="fp-input" data-multiple-caption="{count} فایل انتخاب شده" multiple />
                            <label for="fp-input" class="fp-label">فایل موردنظرتان را <strong>انتخاب کنید</strong> یا آن را به اینجا بکشید و رها کنید !</label>
                        </form>
                        <div class="upload-item inprogress">
                            <i class="ic-audio"></i>
                            <span>filenname-12548.mp3</span>
                            <div class="fp-progress" role="progressbar" aria-label="Upload Progress" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 80%">80%</div>
                            </div>
                            <button class="cancel-upload"><i class="ic-close"></i></button>
                        </div>
                        <div class="upload-item error">
                            <i class="ic-image"></i>
                            <span>filenname-12548.jpg</span>
                            <div class="fp-error">خطا 501 - آپلود انجام نشد!</div>
                        </div>
                        <div class="upload-item done">
                            <i class="ic-video"></i>
                            <span>filenname-12548.mp4</span>
                            <button class="select-file">استفاده</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="overlay" class="overlay"></div>
<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title secondary-font" id="exampleModalLabel1"><?php echo e(__('Final Confirmation')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo e(__('Are you sure about the operation?')); ?>

            </div>
            <div class="modal-footer">
                <button id="btn_close_modal" type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    <?php echo e(__('No')); ?>

                </button>
                <a id="btn-confirm-modal" href="" type="button" class="btn btn-danger"><?php echo e(__('Yes')); ?></a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<?php echo $__env->make('admin-panel.layout.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>
<?php /**PATH /home/qozeem/projects/web/wasalney/laravel/resources/views/admin-panel/layout/index.blade.php ENDPATH**/ ?>