@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h2 class="fw-bold text-primary">Add New Experience</h2>
        <a href="{{ route('backend.experiences.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('backend.experiences.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter experience title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="3" placeholder="Enter short description" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Button Text</label>
                    <input type="text" name="button_text" class="form-control" placeholder="Enter button text (optional)">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Button Link</label>
                    <input type="url" name="button_link" class="form-control" placeholder="Enter button link (optional)">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Save Experience
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
