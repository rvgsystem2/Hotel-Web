@extends('backend.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create About Section</h5>
        </div>

    
        <form action="{{ route('backend.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Main Image -->
                <div class="mb-3">
                    <label for="main_image" class="form-label">Main Image</label>
                    <input type="file" class="form-control @error('main_image') is-invalid @enderror" name="main_image" id="main_image" required>
                    @error('main_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gallery Images -->
                <div class="mb-3">
                    <label for="gallery_images" class="form-label">Gallery Images</label>
                    <input type="file" class="form-control @error('gallery_images') is-invalid @enderror" name="gallery_images[]" id="gallery_images" multiple>
                    @error('gallery_images')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Prime -->
                <div class="mb-3">
                    <label for="prime" class="form-label">Prime</label>
                    <textarea class="form-control @error('prime') is-invalid @enderror" name="prime" id="prime" required>{{ old('prime') }}</textarea>
                    @error('prime')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quick Access -->
                <div class="mb-3">
                    <label for="quick_access" class="form-label">Quick Access</label>
                    <textarea class="form-control @error('quick_access') is-invalid @enderror" name="quick_access" id="quick_access" required>{{ old('quick_access') }}</textarea>
                    @error('quick_access')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
