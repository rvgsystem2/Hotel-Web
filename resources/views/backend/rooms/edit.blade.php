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
                    <label class="form-label">Room Number</label>
                    <input type="text" name="room_number" class="form-control" value="{{ $room->room_number }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hotel</label>
                    <select name="hotel_id" class="form-control" required>
                        @foreach ($hotels as $hotel)
                            <option value="{{ $hotel->id }}" {{ $room->hotel_id == $hotel->id ? 'selected' : '' }}>
                                {{ $hotel->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Room Type</label>
                    <select name="room_type_id" class="form-control" required>
                        @foreach ($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}" {{ $room->room_type_id == $roomType->id ? 'selected' : '' }}>
                                {{ $roomType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $room->price }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Booked</option>
                        <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                </div>

                <!-- Existing Room Images -->
                <div class="mb-3">
                    <label class="form-label">Current Images</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach (explode(',', $room->image) as $image)
                            @if ($image)
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail" width="100" height="100">
                                    <input type="checkbox" name="remove_images[]" value="{{ $image }}"> Remove
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- New Image Upload -->
                <div class="mb-3">
                    <label class="form-label">Upload New Images</label>
                    <input type="file" name="image[]" class="form-control" multiple accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
