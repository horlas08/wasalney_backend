@extends('admin-panel.layout.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Travel Request Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.airline-travel.index') }}" class="btn btn-sm btn-default">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Request Information</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $request->id }}</td>
                                </tr>
                                <tr>
                                    <th>User</th>
                                    <td>{{ $request->user->name }} ({{ $request->user->email }})</td>
                                </tr>
                                <tr>
                                    <th>Departure</th>
                                    <td>{{ $request->departure_location }}</td>
                                </tr>
                                <tr>
                                    <th>Destination</th>
                                    <td>{{ $request->destination }}</td>
                                </tr>
                                <tr>
                                    <th>Number of People</th>
                                    <td>{{ $request->number_of_people }}</td>
                                </tr>
                                <tr>
                                    <th>Trip Duration</th>
                                    <td>{{ $request->trip_duration_days }} days</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Current Status</th>
                                    <td>
                                        <span class="badge badge-{{ $request->status === 'PENDING' ? 'warning' : ($request->status === 'PROCESSING' ? 'info' : ($request->status === 'COMPLETED' ? 'success' : 'danger')) }}">
                                            {{ $request->status }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            @if($request->needs_airport_transfer)
                            <h5 class="mt-4">Airport Transfer Details</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Service Type</th>
                                    <td>{{ $request->airportService->name }}</td>
                                </tr>
                                <tr>
                                    <th>Service Class</th>
                                    <td>{{ $request->airportService->type }}</td>
                                </tr>
                                <tr>
                                    <th>Base Price</th>
                                    <td>{{ $request->airportService->base_price }}</td>
                                </tr>
                                <tr>
                                    <th>Price per KM</th>
                                    <td>{{ $request->airportService->price_per_km }}</td>
                                </tr>
                                <tr>
                                    <th>Free Waiting Time</th>
                                    <td>{{ $request->airportService->free_waiting_time }} minutes</td>
                                </tr>
                                <tr>
                                    <th>Waiting Price/Hour</th>
                                    <td>{{ $request->airportService->waiting_price_per_hour }}</td>
                                </tr>
                                <tr>
                                    <th>Max Passengers</th>
                                    <td>{{ $request->airportService->max_passengers }}</td>
                                </tr>
                            </table>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h5>Update Status</h5>
                            <form action="{{ route('admin.airline-travel.update-status', $request->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="PENDING" {{ $request->status === 'PENDING' ? 'selected' : '' }}>Pending</option>
                                        <option value="PROCESSING" {{ $request->status === 'PROCESSING' ? 'selected' : '' }}>Processing</option>
                                        <option value="COMPLETED" {{ $request->status === 'COMPLETED' ? 'selected' : '' }}>Completed</option>
                                        <option value="CANCELLED" {{ $request->status === 'CANCELLED' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Admin Notes</label>
                                    <textarea name="admin_notes" rows="4" class="form-control @error('admin_notes') is-invalid @enderror">{{ $request->admin_notes }}</textarea>
                                    @error('admin_notes')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Status
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 