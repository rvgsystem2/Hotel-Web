@extends('backend.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <h5 class="card-title">Edit About Section</h5>
        </div>
        <form action="{{ route('backend.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $about->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" required>{{ old('description', $about->description) }}</textarea>
                </div>

                <!-- Main Image -->
                <div class="mb-3">
                    <label for="main_image" class="form-label">Main Image</label>
                    <input type="file" class="form-control" name="main_image" id="main_image">
                    @if (!empty($about->main_image))
                        <div class="mt-2 d-flex align-items-center">
                            <img src="{{ asset('storage/' . $about->main_image) }}" width="100" class="img-thumbnail me-2">
                            <button type="button" class="btn btn-danger btn-sm remove-main-image" data-id="{{ $about->id }}">Remove</button>
                        </div>
                    @endif
                </div>

                <!-- Gallery Images -->
                <div class="mb-3">
                    <label for="gallery_images" class="form-label">Gallery Images</label>
                    <input type="file" class="form-control" name="gallery_images[]" id="gallery_images" multiple>
                    <div class="mt-2">
                        @php
                            $galleryImages = is_string($about->gallery_images) 
                                ? explode(',', $about->gallery_images) 
                                : (is_array($about->gallery_images) ? $about->gallery_images : []);
                        @endphp
                        @if (!empty($galleryImages))
                            @foreach ($galleryImages as $image)
                                @if (!empty($image))
                                    <div class="d-inline-block position-relative gallery-image-container">
                                        <img src="{{ asset('storage/' . $image) }}" width="100" class="me-2 img-thumbnail">
                                        <form action="{{route('backend.about.remove-gallery-image', $about->id)}}" method="post">
                                            @csrf
                                        <input type="hidden" name="image" value="{{$image}}">
                                        <button type="submit" class="btn btn-danger btn-sm remove-gallery-image position-absolute" 
                                                  style="top: 5px; right: 5px;">
                                            ×
                                        </button>
                                    </form>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="text-muted">No images uploaded</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label for="quick_access" class="form-label">Quick Access</label>
                    <input type="text" class="form-control" name="quick_access" id="quick_access" value="{{ old('quick_access', $about->quick_access) }}">
                </div>

                <div class="mb-3">
                    <label for="prime" class="form-label">Prime</label>
                    <input type="text" class="form-control" name="prime" id="prime" value="{{ old('prime', $about->prime) }}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- AJAX Script for Removing Images -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Remove main image
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("remove-main-image")) {
                let sectionId = event.target.dataset.id;
                let button = event.target;

                if (confirm("Are you sure you want to remove this main image?")) {
                    fetch(`/backend/about/remove-main-image/${sectionId}`, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                            "Content-Type": "application/json"
                        }
                    }).then(response => response.json()).then(data => {
                        if (data.success) {
                            button.closest(".d-flex").remove();
                        } else {
                            alert("Failed to remove image.");
                        }
                    }).catch(error => console.error('Error:', error));
                }
            }
        });

        // Remove gallery image
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("remove-gallery-image")) {
                let sectionId = event.target.dataset.id;
                let imageName = event.target.dataset.image;
                let imageContainer = event.target.closest(".gallery-image-container");

                if (confirm("Are you sure you want to remove this gallery image?")) {
                    fetch(`/backend/about/remove-gallery-image/${sectionId}`, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ image: imageName })
                    }).then(response => response.json()).then(data => {
                        if (data.success) {
                            imageContainer.remove();
                        } else {
                            alert("Failed to remove image.");
                        }
                    }).catch(error => console.error('Error:', error));
                }
            }
        });
    });
</script>
@endsection
