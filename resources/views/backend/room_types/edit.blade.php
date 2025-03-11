@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Edit Room Type</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.room_types.update', $roomType->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Room Type Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $roomType->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ $roomType->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Images</label>
                    <div>
                        @if($roomType->images)
                            @foreach(explode(',', $roomType->images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" width="50" height="50" class="rounded me-2">
                            @endforeach
                        @else
                            <p>No images uploaded</p>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload New Images (Optional)</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
