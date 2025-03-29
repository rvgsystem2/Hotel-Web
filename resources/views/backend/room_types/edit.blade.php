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
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $roomType->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $roomType->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($roomType->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $roomType->image) }}" alt="Room Type Image" width="100">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
