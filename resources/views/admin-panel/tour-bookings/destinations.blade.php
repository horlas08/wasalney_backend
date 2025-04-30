@extends('admin-panel.layout.index')

@section('title', 'Tour Destinations')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tour Destinations</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDestinationModal">
                            <i class="fas fa-plus"></i> Add New Destination
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
                                <th>Description</th>
                                <th>Description (Arabic)</th>
                                <th>Departure Point</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($destinations as $destination)
                            <tr>
                                <td>{{ $destination->id }}</td>
                                <td>{{ $destination->name }}</td>
                                <td>{{ $destination->name_ar }}</td>
                                <td>{{ Str::limit($destination->description, 50) }}</td>
                                <td>{{ Str::limit($destination->description_ar, 50) }}</td>
                                <td>
                                    <span class="badge badge-{{ $destination->is_departure ? 'success' : 'info' }}">
                                        {{ $destination->is_departure ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $destination->active ? 'success' : 'danger' }}">
                                        {{ $destination->active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editDestinationModal{{ $destination->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete('{{ $destination->id }}')">
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

<!-- Add Destination Modal -->
<div class="modal fade" id="addDestinationModal" tabindex="-1" aria-labelledby="addDestinationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDestinationModalLabel">Add New Destination</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.tour.destinations.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name (English)</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="name_ar" class="form-label">Name (Arabic)</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description (English)</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description_ar" class="form-label">Description (Arabic)</label>
                        <textarea class="form-control" id="description_ar" name="description_ar" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_departure" name="is_departure">
                            <label class="form-check-label" for="is_departure">
                                Is Departure Point
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                            <label class="form-check-label" for="active">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Destination</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Destination Modals -->
@foreach($destinations as $destination)
<div class="modal fade" id="editDestinationModal{{ $destination->id }}" tabindex="-1"
     aria-labelledby="editDestinationModalLabel{{ $destination->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDestinationModalLabel{{ $destination->id }}">Edit Destination</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.tour.destinations.update', $destination->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name{{ $destination->id }}" class="form-label">Name (English)</label>
                        <input type="text" class="form-control" id="edit_name{{ $destination->id }}"
                               name="name" value="{{ $destination->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_name_ar{{ $destination->id }}" class="form-label">Name (Arabic)</label>
                        <input type="text" class="form-control" id="edit_name_ar{{ $destination->id }}"
                               name="name_ar" value="{{ $destination->name_ar }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description{{ $destination->id }}" class="form-label">Description (English)</label>
                        <textarea class="form-control" id="edit_description{{ $destination->id }}"
                                  name="description" rows="3">{{ $destination->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description_ar{{ $destination->id }}" class="form-label">Description (Arabic)</label>
                        <textarea class="form-control" id="edit_description_ar{{ $destination->id }}"
                                  name="description_ar" rows="3">{{ $destination->description_ar }}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_is_departure{{ $destination->id }}"
                                   name="is_departure" {{ $destination->is_departure ? 'checked' : '' }}>
                            <label class="form-check-label" for="edit_is_departure{{ $destination->id }}">
                                Is Departure Point
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_active{{ $destination->id }}"
                                   name="active" {{ $destination->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="edit_active{{ $destination->id }}">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Destination</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@push('scripts')
<script>
function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this destination?')) {
        fetch(`{{ url('admin/tour/destinations') }}/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert(data.message || 'Error deleting destination');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting destination');
        });
    }
}
</script>
@endpush
@endsection
