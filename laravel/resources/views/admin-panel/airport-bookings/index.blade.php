@extends('admin-panel.layout.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Airport Bookings') }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('Booking ID') }}</th>
                                    <th>{{ __('User') }}</th>
                                    <th>{{ __('Service Type') }}</th>
                                    <th>{{ __('Booking Type') }}</th>
                                    <th>{{ __('Pickup Location') }}</th>
                                    <th>{{ __('Booking Date') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Total Fare') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->serviceType->name }}</td>
                                    <td>{{ __($booking->booking_type) }}</td>
                                    <td>{{ $booking->pickup_location }}</td>
                                    <td>{{ $booking->booking_date->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <span class="badge badge-{{ $booking->status == 'PENDING' ? 'warning' :
                                            ($booking->status == 'ASSIGNED' ? 'info' :
                                            ($booking->status == 'IN_PROGRESS' ? 'primary' :
                                            ($booking->status == 'COMPLETED' ? 'success' : 'danger'))) }}">
                                            {{ __($booking->status) }}
                                        </span>
                                    </td>
                                    <td>{{ number_format($booking->total_fare, 2) }} {{ __('Dinar') }}</td>
                                    <td>
                                        <a href="{{ route('admin.airport.bookings.show', $booking) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> {{ __('View') }}
                                        </a>
                                        @if($booking->status == 'PENDING')
                                        <button type="button"
                                                class="btn btn-primary btn-sm assign-driver"
                                                data-booking-id="{{ $booking->id }}">
                                            <i class="fas fa-user-plus"></i> {{ __('Assign Driver') }}
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $bookings->links() }}
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
                <h5 class="modal-title">{{ __('Assign Driver') }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="availableDrivers">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">{{ __('Loading...') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
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
            _token: '{{ csrf_token() }}'
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
@endpush
