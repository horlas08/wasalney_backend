@extends('admin-panel.layout.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Booking Details') }} #{{ $booking->id }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.airport.bookings.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>{{ __('Booking Information') }}</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th>{{ __('Status') }}</th>
                                    <td>
                                        <span class="badge badge-{{ $booking->status == 'PENDING' ? 'warning' :
                                            ($booking->status == 'ASSIGNED' ? 'info' :
                                            ($booking->status == 'IN_PROGRESS' ? 'primary' :
                                            ($booking->status == 'COMPLETED' ? 'success' : 'danger'))) }}">
                                            {{ __($booking->status) }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('Service Type') }}</th>
                                    <td>{{ $booking->serviceType->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Booking Type') }}</th>
                                    <td>{{ __($booking->booking_type) }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Pickup Location') }}</th>
                                    <td>{{ $booking->pickup_location }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Booking Date') }}</th>
                                    <td>{{ $booking->booking_date->format('Y-m-d H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Passengers') }}</th>
                                    <td>
                                        {{ $booking->adults }} {{ __('Adults') }},
                                        {{ $booking->children }} {{ __('Children') }},
                                        {{ $booking->infants }} {{ __('Infants') }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h4>{{ __('Fare Details') }}</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th>{{ __('Base Fare') }}</th>
                                    <td>{{ number_format($booking->base_fare, 2) }} {{ __('Dinar') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Urgent Booking Fee') }}</th>
                                    <td>{{ number_format($booking->urgent_booking_fee, 2) }} {{ __('Dinar') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Waiting Charges') }}</th>
                                    <td>{{ number_format($booking->waiting_charges, 2) }} {{ __('Dinar') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Total Fare') }}</th>
                                    <td><strong>{{ number_format($booking->total_fare, 2) }} {{ __('Dinar') }}</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    @if($booking->flightDetails->isNotEmpty())
                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>{{ __('Flight Details') }}</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('Flight Number') }}</th>
                                        <th>{{ __('Flight Time') }}</th>
                                        <th>{{ __('Airline') }}</th>
                                        <th>{{ __('Terminal') }}</th>
                                        <th>{{ __('Ticket Number') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($booking->flightDetails as $flight)
                                    <tr>
                                        <td>{{ $flight->flight_number }}</td>
                                        <td>{{ $flight->flight_time->format('Y-m-d H:i') }}</td>
                                        <td>{{ $flight->airline }}</td>
                                        <td>{{ $flight->terminal }}</td>
                                        <td>{{ $flight->ticket_number }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h4>{{ __('Luggage Details') }}</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th>{{ __('Large Bags') }}</th>
                                    <td>{{ $booking->luggageDetails->large_bags }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Medium Bags') }}</th>
                                    <td>{{ $booking->luggageDetails->medium_bags }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Small Bags') }}</th>
                                    <td>{{ $booking->luggageDetails->small_bags }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Total Bags') }}</th>
                                    <td>{{ $booking->luggageDetails->getTotalBags() }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h4>{{ __('Driver Information') }}</h4>
                            @if($booking->driver)
                            <table class="table table-bordered">
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <td>{{ $booking->driver->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Phone') }}</th>
                                    <td>{{ $booking->driver->phone }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Car Model') }}</th>
                                    <td>{{ $booking->driver->car_model }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Car Number') }}</th>
                                    <td>{{ $booking->driver->car_number }}</td>
                                </tr>
                            </table>
                            @else
                            <div class="alert alert-warning">
                                {{ __('No driver assigned yet') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($booking->customer_notes)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>{{ __('Customer Notes') }}</h4>
                            <div class="alert alert-info">
                                {{ $booking->customer_notes }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
