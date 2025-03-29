@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Add New Room Type</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.room_types.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Room Type Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
