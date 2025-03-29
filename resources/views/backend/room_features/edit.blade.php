@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Edit Room Feature</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.room_features.update', $roomFeature->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Room Type</label>
                    <select name="room_type_id" class="form-control" required>
                        <option value="">Select Room Type</option>
                        @foreach($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}" {{ $roomFeature->room_type_id == $roomType->id ? 'selected' : '' }}>
                                {{ $roomType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Feature</label>
                    <input type="text" name="feature" class="form-control" value="{{ $roomFeature->feature }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="3">{{ $roomFeature->short_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
