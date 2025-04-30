@extends('admin-panel.layout.index')

@section('title', 'Tour Bookings')

@section('content')
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
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $booking->booking_id }}</td>
                                <td>{{ $booking->customer_name }}</td>
                                <td>{{ $booking->tour->name }}</td>
                                <td>{{ $booking->booking_date->format('d M, Y') }}</td>
                                <td>{{ $booking->number_of_people }}</td>
                                <td>${{ number_format($booking->total_amount, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $booking->status_color }}">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.tour-bookings.show', $booking->id) }}"
                                       class="btn btn-sm btn-primary">
                                        View
                                    </a>
                                    <a href="{{ route('admin.tour-bookings.edit', $booking->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.tour-bookings.destroy', $booking->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No bookings found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($bookings->hasPages())
                <div class="mt-4">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#bookingsTable').DataTable({
            responsive: true,
            order: [[3, 'desc']], // Sort by booking date by default
            pageLength: 25,
        });
    });
</script>
@endpush