@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Add New Room Facility</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.room_facilities.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Room</label>
                    <select name="room_id" class="form-control" required>
                        <option value="">Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Facility Name</label>
                    <input type="text" name="facility_name" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
