@extends('admin-panel.layout.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Airport Service Types') }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceTypeModal">
                            <i class="fas fa-plus"></i> {{ __('Add Service Type') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Name (Arabic)') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('Base Price') }}</th>
                                    <th>{{ __('Price per KM') }}</th>
                                    <th>{{ __('Free Waiting Time') }}</th>
                                    <th>{{ __('Waiting Price/Hour') }}</th>
                                    <th>{{ __('Max Passengers') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($serviceTypes as $type)
                                <tr>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->name_ar }}</td>
                                    <td>{{ __($type->type) }}</td>
                                    <td>{{ number_format($type->base_price, 2) }} {{ __('Dinar') }}</td>
                                    <td>{{ number_format($type->price_per_km, 2) }} {{ __('Dinar') }}</td>
                                    <td>{{ $type->free_waiting_time }} {{ __('minutes') }}</td>
                                    <td>{{ number_format($type->waiting_price_per_hour, 2) }} {{ __('Dinar') }}</td>
                                    <td>{{ $type->max_passengers }}</td>
                                    <td>
                                        <span class="badge badge-{{ $type->active ? 'success' : 'danger' }}">
                                            {{ $type->active ? __('Active') : __('Inactive') }}
                                        </span>
                                    </td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-info btn-sm edit-service-type"
                                                data-type="{{ $type }}">
                                            <i class="fas fa-edit"></i> {{ __('Edit') }}
                                        </button>
                                        <button type="button"
                                                class="btn btn-danger btn-sm delete-service-type"
                                                data-id="{{ $type->id }}">
                                            <i class="fas fa-trash"></i> {{ __('Delete') }}
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
</div>

<!-- Add Service Type Modal -->
<div class="modal fade" id="addServiceTypeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add Service Type') }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="addServiceTypeForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Name (Arabic)') }}</label>
                        <input type="text" class="form-control" name="name_ar" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Type') }}</label>
                        <select class="form-control" name="type" required>
                            <option value="ECONOMY">{{ __('Economy') }}</option>
                            <option value="STANDARD">{{ __('Standard') }}</option>
                            <option value="VIP">{{ __('VIP') }}</option>
                            <option value="CVIP">{{ __('CVIP') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Base Price') }}</label>
                        <input type="number" class="form-control" name="base_price" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Price per KM') }}</label>
                        <input type="number" class="form-control" name="price_per_km" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Free Waiting Time (minutes)') }}</label>
                        <input type="number" class="form-control" name="free_waiting_time" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Waiting Price per Hour') }}</label>
                        <input type="number" class="form-control" name="waiting_price_per_hour" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Max Passengers') }}</label>
                        <input type="number" class="form-control" name="max_passengers" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Service Type Modal -->
<div class="modal fade" id="editServiceTypeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Service Type') }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editServiceTypeForm">
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" id="edit_name" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Name (Arabic)') }}</label>
                        <input type="text" class="form-control" name="name_ar" id="edit_name_ar" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Type') }}</label>
                        <select class="form-control" name="type" id="edit_type" required>
                            <option value="ECONOMY">{{ __('Economy') }}</option>
                            <option value="STANDARD">{{ __('Standard') }}</option>
                            <option value="VIP">{{ __('VIP') }}</option>
                            <option value="CVIP">{{ __('CVIP') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Base Price') }}</label>
                        <input type="number" class="form-control" name="base_price" id="edit_base_price" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Price per KM') }}</label>
                        <input type="number" class="form-control" name="price_per_km" id="edit_price_per_km" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Free Waiting Time (minutes)') }}</label>
                        <input type="number" class="form-control" name="free_waiting_time" id="edit_free_waiting_time" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Waiting Price per Hour') }}</label>
                        <input type="number" class="form-control" name="waiting_price_per_hour" id="edit_waiting_price_per_hour" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Max Passengers') }}</label>
                        <input type="number" class="form-control" name="max_passengers" id="edit_max_passengers" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Status') }}</label>
                        <select class="form-control" name="active" id="edit_active">
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Inactive') }}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Add Service Type
    $('#addServiceTypeForm').submit(function(e) {
        e.preventDefault();
        $.post('{{ route("admin.airport.service-types.store") }}', $(this).serialize(), function(response) {
            if(response.success) {
                location.reload();
            } else {
                alert(response.message);
            }
        });
    });

    // Edit Service Type
    $('.edit-service-type').click(function() {
        const type = $(this).data('type');
        $('#edit_id').val(type.id);
        $('#edit_name').val(type.name);
        $('#edit_name_ar').val(type.name_ar);
        $('#edit_type').val(type.type);
        $('#edit_base_price').val(type.base_price);
        $('#edit_price_per_km').val(type.price_per_km);
        $('#edit_free_waiting_time').val(type.free_waiting_time);
        $('#edit_waiting_price_per_hour').val(type.waiting_price_per_hour);
        $('#edit_max_passengers').val(type.max_passengers);
        $('#edit_active').val(type.active ? 1 : 0);
        $('#editServiceTypeModal').modal('show');
    });

    $('#editServiceTypeForm').submit(function(e) {
        e.preventDefault();
        const id = $('#edit_id').val();
        $.ajax({
            url: `/admin/airport/service-types/${id}`,
            type: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                if(response.success) {
                    location.reload();
                } else {
                    alert(response.message);
                }
            }
        });
    });

    // Delete Service Type
    $('.delete-service-type').click(function() {
        if(confirm('{{ __("Are you sure you want to delete this service type?") }}')) {
            const id = $(this).data('id');
            $.ajax({
                url: `/admin/airport/service-types/${id}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.success) {
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    });
});
</script>
@endpush
