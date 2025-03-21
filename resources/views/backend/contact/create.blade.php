@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Add New Contact</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.contact.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required maxlength="15" pattern="\+?[0-9]{10,14}" title="Phone number must be 10-14 digits and may start with +">

                </div>
                <div class="mb-3">
                    <label class="form-label">Check In Time</label>
                    <input type="time" name="check_in_time" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Check Out Time</label>
                    <input type="time" name="check_out_time" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
