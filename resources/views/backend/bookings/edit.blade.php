@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Edit Booking</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @include('backend.bookings._form', [
                'action' => route('backend.bookings.update', $booking->id),
                'method' => 'PUT',
                'booking' => $booking,
                'rooms' => $rooms,
                'guests' => $guests,
                'buttonText' => 'Update'
            ])
        </div>
    </div>
</div>
@endsection
