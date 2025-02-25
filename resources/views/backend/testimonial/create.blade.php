@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Add New Testimonial</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.testimonial.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Review</label>
                    <textarea name="review" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <input type="number" name="rating" class="form-control" min="1" max="5" required>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
