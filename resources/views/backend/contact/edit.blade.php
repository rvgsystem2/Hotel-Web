@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Edit Contact</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.contact.update', $contact->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ $contact->location }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $contact->email }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" required maxlength="10">
                </div>
                <div class="mb-3">
                    <label class="form-label">Check In Time</label>
                    <input type="time" name="check_in_time" class="form-control" value="{{ $contact->check_in_time }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Check Out Time</label>
                    <input type="time" name="check_out_time" class="form-control" value="{{ $contact->check_out_time }}" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
