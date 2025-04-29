@extends('admin-panel.layout.master')
@section('title', __('View Airline Travel Request'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Airline Travel Request Details') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('airline-travel.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Add request details here -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Request ID') }}</label>
                                <p class="form-control-static">{{ $id }}</p>
                            </div>
                            <!-- Add more details -->
                        </div>
                        <div class="col-md-6">
                            @if(Auth::user()->can('airline-travel,edit'))
                            <div class="form-group">
                                <label>{{ __('Update Status') }}</label>
                                <form action="{{ route('airline-travel.update-status', $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group">
                                        <select name="status" class="form-control">
                                            <option value="pending">{{ __('Pending') }}</option>
                                            <option value="approved">{{ __('Approved') }}</option>
                                            <option value="rejected">{{ __('Rejected') }}</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 