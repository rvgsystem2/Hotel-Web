@extends('backend.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Create About Section</div>
        </div>
        <form action="{{ route('backend.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="main_image" class="form-label">Main Image</label>
                    <input type="file" class="form-control" name="main_image" id="main_image" required>
                </div>
                <div class="mb-3">
                    <label for="gallery_images" class="form-label">Gallery Images</label>
                    <input type="file" class="form-control" name="gallery_images[]" id="gallery_images" multiple>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
