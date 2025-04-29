@extends('admin-panel.layout.index')
@section('title', __('Airline Travel Requests'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Airline Travel Requests') }}</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Customer') }}</th>
                                    <th>{{ __('From') }}</th>
                                    <th>{{ __('To') }}</th>
                                    <th>{{ __('Travel Date') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $request)
                                    <tr>
                                        <td>{{ $request->id }}</td>
                                        <td>{{ $request->user->name ?? 'N/A' }}</td>
                                        <td>{{ $request->departure_city }}</td>
                                        <td>{{ $request->arrival_city }}</td>
                                        <td>{{ $request->departure_date->format('Y-m-d') }}</td>
                                        <td>
                                            <span class="badge badge-{{ $request->status === 'COMPLETED' ? 'success' : ($request->status === 'PENDING' ? 'warning' : 'info') }}">
                                                {{ __($request->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.airline-travel.show', $request->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> {{ __('View') }}
                                            </a>
                                            @if(Auth::user()->can('airline-travel,edit'))
                                                <form action="{{ route('admin.airline-travel.update-status', $request->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="{{ $request->status === 'PENDING' ? 'PROCESSING' : 'COMPLETED' }}">
                                                    <button type="submit" class="btn btn-sm btn-{{ $request->status === 'PENDING' ? 'warning' : 'success' }}">
                                                        <i class="fas fa-check"></i> 
                                                        {{ $request->status === 'PENDING' ? __('Process') : __('Complete') }}
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">{{ __('No requests found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $requests->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 