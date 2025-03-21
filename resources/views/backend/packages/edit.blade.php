@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Edit Package</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $package->title }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $package->slug }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ $package->description }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" step="0.01" value="{{ $package->price }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if($package->image)
                        <div class="mt-2">
                            <img src="{{ asset($package->image) }}" alt="Current Image" width="100">
                        </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Link (Optional)</label>
                    <input type="url" name="link" class="form-control" value="{{ $package->link }}">
                </div>
                
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
