<?php $__env->startSection('content'); ?>

    <div class="d-flex row justify-content-between align-items-center col-12 mb-3">
        <?php echo e(__("رانندگان")); ?>



        <div class="d-flex row col-4 flex-nowrap justify-content-end">

            <a href="<?php echo e(route('admin.dashboard')); ?>" type="button" class="btn btn-outline-primary "
               style="width: auto!important;">
                <span class="tf-icons bx bx-share"></span>
                <span class="d-none d-sm-inline-block"><?php echo e(__('Return')); ?></span>
            </a>

            <div class="btn-group" style="width: auto;">
                <button type="button" class="btn btn-primary dropdown-toggle " data-bs-toggle="dropdown"
                        aria-expanded="true">
                    <?php echo e(__('Actions')); ?>

                </button>
                <ul class="dropdown-menu"
                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 38px);"
                    data-popper-placement="bottom-start">
                    <?php if(\App\Models\Admin::checkAccess('record','store',"drivers")): ?>
                        <li>
                            <a href="<?php echo e(route('record.storeform',['slug'=>'drivers'])); ?>" type="button"
                               class="dropdown-item btn ">
                                <i class="fa-solid fa-add me-1"></i>
                                <?php echo e(__('Store')); ?>


                            </a>
                        </li>

                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('record.export',['slug'=>'drivers'])); ?>" type="button"
                           class="dropdown-item btn ">
                            <i class="fa-solid fa-file-excel me-1"></i>
                            <?php echo e(__('Excel Export')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('record.pdf',['slug'=>'drivers'])); ?>" type="button" class="dropdown-item btn ">
                            <i class="fa-solid fa-file-pdf me-1"></i>
                            <?php echo e(__('PDF Export')); ?>

                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class=" widgets">
        <div class="row">
            <div class="card" id="table-box">
                
                <form method="get" action="<?php echo e(route('record.index',['slug'=>'drivers'])); ?>"
                      class="w-100 d-flex justify-content-center align-items-end">

                    <div class="m-2">
                        <label class="form-label" for="from"><?php echo e(__('کیف پول از')); ?></label>
                        <input name="from" type="number" id="from" class="form-control"
                               value="<?php echo e(app('request')->input('from')); ?>">
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="to"><?php echo e(__('کیف پول تا')); ?></label>
                        <input name="to" type="number" id="to" class="form-control"
                               value="<?php echo e(app('request')->input('to')); ?>">
                    </div>

                    <div class="m-2">
                        <button type="submit" class="btn btn-primary "><?php echo e(__('apply filter')); ?> </button>
                    </div>
                </form>
                

                <div class="card-datatable table-responsive">
                    <table id="ajax_table" class="table table-bordered "
                           sortLink="<?php echo e(route('record.sort',['slug'=>'drivers'])); ?>">
                        <thead>
                        <tr>
                            <th>#</th>

                            <th><?php echo e(__("نام و نام خانوادگی")); ?></th>
                            <th><?php echo e(__("موبایل")); ?></th>
                            <!--<th><?php echo e(__("ماشین")); ?></th>-->

                            <th><?php echo e(__("کدملی")); ?></th>
                            <th><?php echo e(__("جنسیت")); ?></th>
                            <th><?php echo e(__("امتیاز")); ?></th>
                            <th><?php echo e(__("نوع فعالیت")); ?></th>
                            <th><?php echo e(__("وضعیت آنلاین")); ?></th>
                            <th><?php echo e(__("وضعیت تایید ادمین")); ?></th>
                            <th><?php echo e(__("عکس")); ?></th>
                            <th><?php echo e(__("اعتبار")); ?></th>
                            <th><?php echo e(__("سطح")); ?></th>
                            <!--<th><?php echo e(__("lat")); ?></th>-->
                            <!--<th><?php echo e(__("long")); ?></th>-->
                            
                            
                            
                            
                            
                            
                            
                            <th><?php echo e(__("تذکر ادمین")); ?></th>
                            <th><?php echo e(__("کد معرفی")); ?></th>
                            <th><?php echo e(__("کد معرف استفاده شده")); ?></th>
                            <th><?php echo e(__("شماره بستگان")); ?></th>
                            <th>FCM token</th>

                            <th><?php echo e(__('Actions')); ?></th>
                        </tr>
                        </thead>

                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

    <!--    datatable-->
    <link rel="stylesheet" href=<?php echo e(asset("admin-panel/plugins/datatable/datatables-bs5/datatables.bootstrap5.css")); ?>>
    <link rel="stylesheet"
          href=<?php echo e(asset("admin-panel/plugins/datatable/datatables-responsive-bs5/responsive.bootstrap5.css")); ?>>
    <!--    icon-->
    <link href=<?php echo e(asset("admin-panel/styles/font-icon.css")); ?> rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .sort-mode tr:hover {
            background-color: whitesmoke;
            cursor: pointer;
        }

        .sort-mode tr {
            background-color: grey;

        }

        .sort-icon {
            cursor: pointer;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables/jquery.dataTables.js")); ?>></script>
    <?php if(getLang()=='fa'): ?>
        <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables/i18n/fa.js")); ?>></script>
    <?php endif; ?>

    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables-bs5/datatables-bootstrap5.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables-responsive/datatables.responsive.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatables-responsive-bs5/responsive.bootstrap5.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/tables-datatables-advanced.js")); ?>></script>
    <script src=<?php echo e(asset("admin-panel/plugins/datatable/datatableEN.js")); ?>></script>
    <script src="<?php echo e(asset('admin-panel/plugins/chunk/resumable.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-panel/scripts/chunk.js')); ?>"></script>


    <script>

        <?php ($tableInfo=session()->get('dataTableInfo')); ?>
        $('#ajax_table').DataTable({
            "ajax": "<?php echo e(route('record.pagination',['slug'=>'drivers'])); ?>",
            "columns": [
                {data: 'datatable-counter'},
                {data: "name"},
                {data: "mobile"},
                // {data: "car_detail"},

                {data: "code_meli"},
                {data: "gender"},
                {data: "rate", "orderable": false},
                {data: "type_activity"},
                {data: "state"},
                {data: "state_approval"},
                {data: "image"},
                {data: "credit"},
                {data: "level"},
                // { data : "lat"},
                // { data : "long"},
                // { data : "number_licence"},
                // { data : "certificate_type"},
                // {data: "certificat_date"},
                // {data: "certificate_validity"},
                // {data: "car_model"},
                // // {data: "notif_token"},
                // {data: "car_tag"},
                {data: "description"},
                {data: "code"},
                {data: "intro_code"},
                {data: "family_number"},
                {data: "fcm_token"},

                {data: 'datatable-actions', "orderable": false},
            ],
            "ordering": true,
            "order": [0, 'desc'],
            "responsive": true,
            "processing": true,
            "serverSide": true,
            <?php if($tableInfo!=null && $tableInfo->slug=="drivers" && $tableInfo->parentSlug==null && $tableInfo->parentId==null): ?>
            "displayStart": <?php echo e($tableInfo->start); ?>,
            "search": {
                "search": "<?php echo e($tableInfo->search); ?>"
            },
            "pageLength": <?php echo e($tableInfo->length); ?>

                    <?php endif; ?>
        });

        <?php ($lastCategory=\App\Models\Category::where("slug",'drivers')->first()); ?>
        <?php while($lastCategory!=null): ?>
        document.getElementById('category_<?php echo e($lastCategory->id); ?>').classList.add('menuActive');
        <?php ($lastCategory=\App\Models\Category::find($lastCategory->parent_id)); ?>
        <?php endwhile; ?>

        $('#main-content').addClass('menu-opened');
        $('.DC_sidbar_box ').addClass('DC_isOpen');
        $(".sidebar-main-box").addClass("open-side")
        $('#chart_box').addClass('DC_activeBoxBody');
        $('#v-dynamic').addClass('show active');
        $('#v-dynamic-tab').addClass('DC_activeTab');

        $(document).on('click', '.sort-icon', function () {
            if ($(this).closest('table').attr('sortSourceId') == null) {
                let sourceId = $(this).attr('sortId');
                $(this).closest('table').attr('sortSourceId', sourceId);
                $(this).closest('tbody').addClass('sort-mode');
                $(this).removeClass('fa-refresh');
                $(this).closest('tr').attr('style', 'background: transparent !important');
            }


        });


        $(document).on('click', 'tbody.sort-mode tr', function () {
            url = $(this).closest('table').attr('sortLink');
            let sourceId = $(this).closest('table').attr('sortSourceId');
            let targetId = $(this).find('.sort-icon').attr('sortId');
            $.ajax({
                url: url + '?sourceId=' + sourceId + '&targetId=' + targetId, success: function (result) {
                    if (result != true) {
                        $('body').append(result);
                        setTimeout(function () {
                            $('.alert').remove();
                        }, 5000);
                    } else
                        location.reload();

                }
            });
        });


    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin-panel.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/qozeem/projects/web/wasalney/resources/views/admin-panel/my-drivers/index.blade.php ENDPATH**/ ?>