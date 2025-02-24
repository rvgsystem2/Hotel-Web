@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Smart Service</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('backend.smart_services.update', $smartService->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $smartService->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" required>{{ $smartService->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon Class</label>
            <input type="text" class="form-control" name="icon" value="{{ $smartService->icon }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Current Image</label>
            <br>
            @if($smartService->image && file_exists(public_path('storage/' . $smartService->image)))
                <img src="{{ asset('storage/' . $smartService->image) }}" width="100">
            @else
                <img src="{{ asset('default.png') }}" width="100"> <!-- Default Image -->
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload New Image</label>
            <input type="file" class="form-control" name="image" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="badge_text" class="form-label">Badge Text</label>
            <input type="text" class="form-control" name="badge_text" value="{{ $smartService->badge_text }}">
        </div>

        <div class="mb-3">
            <label for="badge_color" class="form-label">Badge Color</label>
            <input type="text" class="form-control" name="badge_color" value="{{ $smartService->badge_color }}">
        </div>

        <div class="mb-3">
            <label for="cta_text" class="form-label">CTA Text</label>
            <input type="text" class="form-control" name="cta_text" value="{{ $smartService->cta_text }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection
