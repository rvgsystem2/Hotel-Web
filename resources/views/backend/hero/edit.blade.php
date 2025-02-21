@extends(' backend.layouts.app')

@section('content')
<div class="container">
    <!-- Edit Hero Section Form -->
    <div class="card">
        <div class="card-header">
            <h3>Edit Hero Section</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $hero->title }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required>{{ $hero->description }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Video</label>
                    <input type="file" name="video" class="form-control" accept="video/*">
                    @if($hero->video)
                        <div class="mt-2">
                            <video width="100" controls>
                                <source src="{{ asset('storage/' . $hero->video) }}" type="video/mp4">
                            </video>
                        </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $hero->button_text }}">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Button Link</label>
                    <input type="url" name="button_link" class="form-control" value="{{ $hero->button_link }}">
                </div>
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
