@extends('admin-panel.layout.index')

@section('title', 'Airport Service Types')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Airport Service Types</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceTypeModal">
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
                                <th>Description</th>
                                <th>Base Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($serviceTypes as $serviceType)
                            <tr>
                                <td>{{ $serviceType->id }}</td>
                                <td>{{ $serviceType->name }}</td>
                                <td>{{ $serviceType->description }}</td>
                                <td>{{ number_format($serviceType->base_price, 2) }}</td>
                                <td>
                                    <span class="badge badge-{{ $serviceType->is_active ? 'success' : 'danger' }}">
                                        {{ $serviceType->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editServiceTypeModal{{ $serviceType->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteServiceTypeModal{{ $serviceType->id }}">
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
<div class="modal fade" id="addServiceTypeModal" tabindex="-1" role="dialog" aria-labelledby="addServiceTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceTypeModalLabel">Add New Service Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.airport.service-types.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="base_price">Base Price</label>
                        <input type="number" class="form-control" id="base_price" name="base_price" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Service Type Modals -->
@foreach($serviceTypes as $serviceType)
<div class="modal fade" id="editServiceTypeModal{{ $serviceType->id }}" tabindex="-1" role="dialog" aria-labelledby="editServiceTypeModalLabel{{ $serviceType->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceTypeModalLabel{{ $serviceType->id }}">Edit Service Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.airport.service-types.update', $serviceType->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_name{{ $serviceType->id }}">Name</label>
                        <input type="text" class="form-control" id="edit_name{{ $serviceType->id }}" name="name" value="{{ $serviceType->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_description{{ $serviceType->id }}">Description</label>
                        <textarea class="form-control" id="edit_description{{ $serviceType->id }}" name="description" rows="3">{{ $serviceType->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_base_price{{ $serviceType->id }}">Base Price</label>
                        <input type="number" class="form-control" id="edit_base_price{{ $serviceType->id }}" name="base_price" step="0.01" value="{{ $serviceType->base_price }}" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="edit_is_active{{ $serviceType->id }}" name="is_active" {{ $serviceType->is_active ? 'checked' : '' }}>
                            <label class="custom-control-label" for="edit_is_active{{ $serviceType->id }}">Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Service Type Modal -->
<div class="modal fade" id="deleteServiceTypeModal{{ $serviceType->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteServiceTypeModalLabel{{ $serviceType->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteServiceTypeModalLabel{{ $serviceType->id }}">Delete Service Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this service type?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.airport.service-types.destroy', $serviceType->id) }}" method="POST" style="display: inline;">
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
