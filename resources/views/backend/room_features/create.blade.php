@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Add New Room Feature</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.room_features.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Room Type</label>
                    <select name="room_type_id" class="form-control" required>
                        <option value="">Select Room Type</option>
                        @foreach($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Feature</label>
                    <input type="text" name="feature" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
