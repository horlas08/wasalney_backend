@extends('admin-panel.layout.index')

@section('title', 'Airport Service Types')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Airport Service Types</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceTypeModal">
                            <i class="fas fa-plus"></i> Add New Service Type
                        </button>
                    </div>
                </div>
                <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Name (Arabic)</th>
                                <th>Type</th>
                                <th>Base Price</th>
                                <th>Price/Km</th>
                                <th>Free Waiting (min)</th>
                                <th>Waiting Price/Hour</th>
                                <th>Max Passengers</th>
                                <th>Status</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($serviceTypes as $serviceType)
                            <tr>
                                <td>{{ $serviceType->id }}</td>
                                <td>{{ $serviceType->name }}</td>
                                <td>{{ $serviceType->name_ar }}</td>
                                <td>{{ $serviceType->type }}</td>
                                <td>{{ number_format($serviceType->base_price, 2) }}</td>
                                <td>{{ number_format($serviceType->price_per_km, 2) }}</td>
                                <td>{{ $serviceType->free_waiting_time }}</td>
                                <td>{{ number_format($serviceType->waiting_price_per_hour, 2) }}</td>
                                <td>{{ $serviceType->max_passengers }}</td>
                                <td>
                                    <span class="badge bg-{{ $serviceType->active ? 'success' : 'danger' }}">
                                        {{ $serviceType->active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editServiceTypeModal{{ $serviceType->id }}">
                                        <i class="fas fa-edit"></i>
                                        </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteServiceTypeModal{{ $serviceType->id }}">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Service Type Modal -->
<div class="modal fade" id="addServiceTypeModal" tabindex="-1" aria-labelledby="addServiceTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceTypeModalLabel">Add New Service Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.airport.service-types.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name (English)</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name_ar" class="form-label">Name (Arabic)</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="ECONOMY" {{ old('type') == 'ECONOMY' ? 'selected' : '' }}>Economy</option>
                            <option value="STANDARD" {{ old('type') == 'STANDARD' ? 'selected' : '' }}>Standard</option>
                            <option value="VIP" {{ old('type') == 'VIP' ? 'selected' : '' }}>VIP</option>
                            <option value="CVIP" {{ old('type') == 'CVIP' ? 'selected' : '' }}>CVIP</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="base_price" class="form-label">Base Price</label>
                        <input type="number" class="form-control" id="base_price" name="base_price" step="0.01" value="{{ old('base_price') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price_per_km" class="form-label">Price per Kilometer</label>
                        <input type="number" class="form-control" id="price_per_km" name="price_per_km" step="0.01" value="{{ old('price_per_km') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="free_waiting_time" class="form-label">Free Waiting Time (minutes)</label>
                        <input type="number" class="form-control" id="free_waiting_time" name="free_waiting_time" value="{{ old('free_waiting_time') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="waiting_price_per_hour" class="form-label">Waiting Price per Hour</label>
                        <input type="number" class="form-control" id="waiting_price_per_hour" name="waiting_price_per_hour" step="0.01" value="{{ old('waiting_price_per_hour') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="max_passengers" class="form-label">Maximum Passengers</label>
                        <input type="number" class="form-control" id="max_passengers" name="max_passengers" value="{{ old('max_passengers') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Service Type Modals -->
@foreach($serviceTypes as $serviceType)
<div class="modal fade" id="editServiceTypeModal{{ $serviceType->id }}" tabindex="-1" aria-labelledby="editServiceTypeModalLabel{{ $serviceType->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceTypeModalLabel{{ $serviceType->id }}">Edit Service Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.airport.service-types.update', $serviceType->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name{{ $serviceType->id }}" class="form-label">Name (English)</label>
                        <input type="text" class="form-control" id="edit_name{{ $serviceType->id }}" name="name" value="{{ $serviceType->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_name_ar{{ $serviceType->id }}" class="form-label">Name (Arabic)</label>
                        <input type="text" class="form-control" id="edit_name_ar{{ $serviceType->id }}" name="name_ar" value="{{ $serviceType->name_ar }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_type{{ $serviceType->id }}" class="form-label">Type</label>
                        <select class="form-select" id="edit_type{{ $serviceType->id }}" name="type" required>
                            <option value="ECONOMY" {{ $serviceType->type == 'ECONOMY' ? 'selected' : '' }}>Economy</option>
                            <option value="STANDARD" {{ $serviceType->type == 'STANDARD' ? 'selected' : '' }}>Standard</option>
                            <option value="VIP" {{ $serviceType->type == 'VIP' ? 'selected' : '' }}>VIP</option>
                            <option value="CVIP" {{ $serviceType->type == 'CVIP' ? 'selected' : '' }}>CVIP</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_base_price{{ $serviceType->id }}" class="form-label">Base Price</label>
                        <input type="number" class="form-control" id="edit_base_price{{ $serviceType->id }}" name="base_price" step="0.01" value="{{ $serviceType->base_price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_price_per_km{{ $serviceType->id }}" class="form-label">Price per Kilometer</label>
                        <input type="number" class="form-control" id="edit_price_per_km{{ $serviceType->id }}" name="price_per_km" step="0.01" value="{{ $serviceType->price_per_km }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_free_waiting_time{{ $serviceType->id }}" class="form-label">Free Waiting Time (minutes)</label>
                        <input type="number" class="form-control" id="edit_free_waiting_time{{ $serviceType->id }}" name="free_waiting_time" value="{{ $serviceType->free_waiting_time }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_waiting_price_per_hour{{ $serviceType->id }}" class="form-label">Waiting Price per Hour</label>
                        <input type="number" class="form-control" id="edit_waiting_price_per_hour{{ $serviceType->id }}" name="waiting_price_per_hour" step="0.01" value="{{ $serviceType->waiting_price_per_hour }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_max_passengers{{ $serviceType->id }}" class="form-label">Maximum Passengers</label>
                        <input type="number" class="form-control" id="edit_max_passengers{{ $serviceType->id }}" name="max_passengers" value="{{ $serviceType->max_passengers }}" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="edit_active{{ $serviceType->id }}" name="active" {{ $serviceType->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="edit_active{{ $serviceType->id }}">Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Service Type Modal -->
<div class="modal fade" id="deleteServiceTypeModal{{ $serviceType->id }}" tabindex="-1" aria-labelledby="deleteServiceTypeModalLabel{{ $serviceType->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteServiceTypeModalLabel{{ $serviceType->id }}">Delete Service Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this service type?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.airport.service-types.delete', $serviceType->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('.table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
@endpush
