@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Edit Room</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Room Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $room->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Room Type</label>
                    <select name="room_type_id" class="form-control" required>
                        @foreach($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}" {{ $room->room_type_id == $roomType->id ? 'selected' : '' }}>
                                {{ $roomType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $room->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" step="0.01" value="{{ $room->price }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ $room->location }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Distance from Station (in minutes)</label>
                    <input type="number" name="distance_from_station" class="form-control" value="{{ $room->distance_from_station }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Link (Optional)</label>
                    <input type="url" name="link" class="form-control" value="{{ $room->link }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Existing Images</label>
                    <div>
                        @if($room->images)
                            @foreach(explode(',', $room->images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" width="50" height="50" class="rounded me-1">
                            @endforeach
                        @else
                            <span>No Image</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload New Images</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
