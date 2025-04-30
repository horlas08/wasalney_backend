<?php $__env->startSection('title', 'Tour Bookings'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Tour Bookings</h2>
                <div class="text-muted mt-1">Manage all tour bookings</div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">All Tour Bookings</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter card-table" id="bookingsTable">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Customer Name</th>
                            <th>Tour Name</th>
                            <th>Booking Date</th>
                            <th>Number of People</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($booking->booking_id); ?></td>
                                <td><?php echo e($booking->customer_name); ?></td>
                                <td><?php echo e($booking->tour->name); ?></td>
                                <td><?php echo e($booking->booking_date->format('d M, Y')); ?></td>
                                <td><?php echo e($booking->number_of_people); ?></td>
                                <td>$<?php echo e(number_format($booking->total_amount, 2)); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($booking->status_color); ?>">
                                        <?php echo e($booking->status); ?>

                                    </span>
                                </td>
                                <td class="text-nowrap">
                                    <a href="<?php echo e(route('admin.tour-bookings.show', $booking->id)); ?>"
                                       class="btn btn-sm btn-primary">
                                        View
                                    </a>
                                    <a href="<?php echo e(route('admin.tour-bookings.edit', $booking->id)); ?>"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="<?php echo e(route('admin.tour-bookings.destroy', $booking->id)); ?>"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="text-center">No bookings found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($bookings->hasPages()): ?>
                <div class="mt-4">
                    <?php echo e($bookings->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#bookingsTable').DataTable({
            responsive: true,
            order: [[3, 'desc']], // Sort by booking date by default
            pageLength: 25,
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin-panel.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/qozeem/projects/web/wasalney/resources/views/admin-panel/tour-bookings/index.blade.php ENDPATH**/ ?>