@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Edit Room Facility</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.room_facilities.update', $facility) }}" method="POST">                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Room</label>
                    <select name="room_id" class="form-control" required>
                        <option value="">Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" {{ $facility->room_id == $room->id ? 'selected' : '' }}>
                                {{ $room->room_number }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Facility Name</label>
                    <input type="text" name="facility_name" class="form-control" value="{{ $facility->facility_name }}" required>

                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
