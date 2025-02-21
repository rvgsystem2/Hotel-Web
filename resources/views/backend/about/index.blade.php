@extends('backend.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">About Sections</div>
            <a href="{{ route('backend.about.create') }}" class="btn btn-primary float-end">Add New</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Main Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $section)
                    <tr>
                        <td>{{ $section->title }}</td>
                        <td>{{ Str::limit($section->description, 50) }}</td>
                        <td><img src="{{ asset('storage/' . $section->main_image) }}" width="100"></td>
                        <td>
                            <a href="{{ route('backend.about.edit', $section->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('backend.about.destroy', $section->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
