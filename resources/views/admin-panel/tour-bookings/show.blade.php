@extends('admin-panel.layout.index')

@section('title', 'Tour Booking Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Booking #{{ $booking->id }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.tour.bookings.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Booking Information</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="badge badge-{{
                                            $booking->status === 'PENDING' ? 'warning' :
                                            ($booking->status === 'PROCESSING' ? 'info' :
                                            ($booking->status === 'CONFIRMED' ? 'success' : 'danger'))
                                        }}">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>From</th>
                                    <td>{{ $booking->departure->name }}</td>
                                </tr>
                                <tr>
                                    <th>To</th>
                                    <td>{{ $booking->destination->name }}</td>
                                </tr>
                                <tr>
                                    <th>Departure Date</th>
                                    <td>{{ $booking->departure_date->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    <th>Return Date</th>
                                    <td>{{ $booking->return_date->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    <th>Hotel Stars</th>
                                    <td>{{ $booking->hotel_stars }} ⭐</td>
                                </tr>
                                <tr>
                                    <th>Adults</th>
                                    <td>{{ $booking->adults }}</td>
                                </tr>
                                <tr>
                                    <th>Children (2-10 years)</th>
                                    <td>{{ $booking->children }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Customer Information</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $booking->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $booking->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $booking->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Additional Notes</th>
                                    <td>{{ $booking->additional_notes ?: 'None' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Update Status</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.tour.bookings.update-status', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="PENDING" {{ $booking->status === 'PENDING' ? 'selected' : '' }}>Pending</option>
                                                        <option value="PROCESSING" {{ $booking->status === 'PROCESSING' ? 'selected' : '' }}>Processing</option>
                                                        <option value="CONFIRMED" {{ $booking->status === 'CONFIRMED' ? 'selected' : '' }}>Confirmed</option>
                                                        <option value="CANCELLED" {{ $booking->status === 'CANCELLED' ? 'selected' : '' }}>Cancelled</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="admin_notes">Admin Notes</label>
                                                    <textarea name="admin_notes" id="admin_notes" rows="3" class="form-control">{{ $booking->admin_notes }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Status</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
