@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h2 class="fw-bold text-primary">Manage Experiences</h2>
        <a href="{{ route('backend.experiences.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New Experience
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover table-responsive-lg">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Short Description</th>
                        <th>Button Text</th>
                        <th>Button Link</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($experiences as $key => $experience)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $experience->title }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $experience->image) }}" alt="Image" class="img-thumbnail rounded" width="80" height="50">
                        </td>
                        <td>{{ Str::limit($experience->short_description, 50) }}</td>
                        <td>{{ $experience->button_text ?? 'N/A' }}</td>
                        <td>
                            @if($experience->button_link)
                                <a href="{{ $experience->button_link }}" target="_blank" class="btn btn-outline-primary btn-sm">Visit</a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('backend.experiences.edit', $experience->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('backend.experiences.destroy', $experience->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
