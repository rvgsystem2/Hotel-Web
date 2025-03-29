@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Add New Room</h5>
        </div>
        <div class="card-body">
            {{-- Show validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('backend.rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Room Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Room Type</label>
                    <select name="room_type_id" class="form-control" required>
                        <option value="">Select Room Type</option>
                        @foreach($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}" {{ old('room_type_id') == $roomType->id ? 'selected' : '' }}>
                                {{ $roomType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacity</label>
                    <input type="number" name="capacity" class="form-control" value="{{ old('capacity') }}" required min="1">
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Distance from Station (in minutes)</label>
                    <input type="number" name="distance_from_station" class="form-control" value="{{ old('distance_from_station') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Link (Optional)</label>
                    <input type="url" name="link" class="form-control" value="{{ old('link') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Images</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
