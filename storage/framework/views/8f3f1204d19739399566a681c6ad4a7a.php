<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('Airport Bookings')); ?></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Booking ID')); ?></th>
                                    <th><?php echo e(__('User')); ?></th>
                                    <th><?php echo e(__('Service Type')); ?></th>
                                    <th><?php echo e(__('Booking Type')); ?></th>
                                    <th><?php echo e(__('Pickup Location')); ?></th>
                                    <th><?php echo e(__('Booking Date')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Total Fare')); ?></th>
                                    <th><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($booking->id); ?></td>
                                    <td><?php echo e($booking->user->name); ?></td>
                                    <td><?php echo e($booking->serviceType->name); ?></td>
                                    <td><?php echo e(__($booking->booking_type)); ?></td>
                                    <td><?php echo e($booking->pickup_location); ?></td>
                                    <td><?php echo e($booking->booking_date->format('Y-m-d H:i')); ?></td>
                                    <td>
                                        <span class="badge badge-<?php echo e($booking->status == 'PENDING' ? 'warning' :
                                            ($booking->status == 'ASSIGNED' ? 'info' :
                                            ($booking->status == 'IN_PROGRESS' ? 'primary' :
                                            ($booking->status == 'COMPLETED' ? 'success' : 'danger')))); ?>">
                                            <?php echo e(__($booking->status)); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e(number_format($booking->total_fare, 2)); ?> <?php echo e(__('Dinar')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.airport.bookings.show', $booking)); ?>"
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> <?php echo e(__('View')); ?>

                                        </a>
                                        <?php if($booking->status == 'PENDING'): ?>
                                        <button type="button"
                                                class="btn btn-primary btn-sm assign-driver"
                                                data-booking-id="<?php echo e($booking->id); ?>">
                                            <i class="fas fa-user-plus"></i> <?php echo e(__('Assign Driver')); ?>

                                        </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($bookings->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Assign Driver Modal -->
<div class="modal fade" id="assignDriverModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Assign Driver')); ?></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="availableDrivers">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="sr-only"><?php echo e(__('Loading...')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('.assign-driver').click(function() {
        const bookingId = $(this).data('booking-id');
        $('#assignDriverModal').modal('show');

        // Load available drivers
        $.get(`/admin/airport/bookings/${bookingId}/available-drivers`, function(drivers) {
            let html = '<div class="list-group">';
            drivers.forEach(driver => {
                html += `
                    <a href="#" class="list-group-item list-group-item-action driver-item"
                       data-driver-id="${driver.id}">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">${driver.name}</h5>
                            <small>${driver.phone}</small>
                        </div>
                        <p class="mb-1">${driver.car_model} - ${driver.car_number}</p>
                    </a>
                `;
            });
            html += '</div>';
            $('#availableDrivers').html(html);
        });
    });

    $(document).on('click', '.driver-item', function(e) {
        e.preventDefault();
        const driverId = $(this).data('driver-id');
        const bookingId = $('.assign-driver').data('booking-id');

        $.post(`/admin/airport/bookings/${bookingId}/assign-driver`, {
            driver_id: driverId,
            _token: '<?php echo e(csrf_token()); ?>'
        }, function(response) {
            if(response.success) {
                location.reload();
            } else {
                alert(response.message);
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin-panel.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/qozeem/projects/web/wasalney/resources/views/admin-panel/airport-bookings/index.blade.php ENDPATH**/ ?>