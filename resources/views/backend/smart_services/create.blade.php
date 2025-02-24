@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Smart Service</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('backend.smart_services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Icon Class</label>
            <input type="text" class="form-control" name="icon" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="badge_text" class="form-label">Badge Text</label>
            <input type="text" class="form-control" name="badge_text">
        </div>
        <div class="mb-3">
            <label for="badge_color" class="form-label">Badge Color</label>
            <input type="text" class="form-control" name="badge_color">
        </div>
        <div class="mb-3">
            <label for="cta_text" class="form-label">CTA Text</label>
            <input type="text" class="form-control" name="cta_text">
        </div>
        <button type="submit" class="btn btn-success">Save Service</button>
    </form>
</div>
@endsection
