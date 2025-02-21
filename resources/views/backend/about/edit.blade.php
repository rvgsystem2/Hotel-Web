@extends('backend.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Edit About Section</div>
        </div>
        <form action="{{ route('backend.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $about->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" required>{{ $about->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="main_image" class="form-label">Main Image</label>
                    <input type="file" class="form-control" name="main_image" id="main_image">
                    <img src="{{ asset('storage/' . $about->main_image) }}" width="100" class="mt-2">
                </div>
                <div class="mb-3">
                    <label for="gallery_images" class="form-label">Gallery Images</label>
                    <input type="file" class="form-control" name="gallery_images[]" id="gallery_images" multiple>
                    <div class="mt-2">
                        @foreach ($about->gallery_images as $image)
                            <img src="{{ asset('storage/' . $image) }}" width="100" class="me-2">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
