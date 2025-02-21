@extends('backend.layouts.app')

@section('content')
<div class="container">
    <!-- Add Hero Section Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Hero Sections</h2>
        <a href="{{ route('backend.hero.create') }}" class="btn btn-success">Add Hero Section</a>
    </div>
    
    <!-- Hero Sections Table -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Button Text</th>
                        <th>Button Link</th>


                        <th>Video</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($heroSections as $hero)
                        <tr>
                            <td>{{ $hero->title }}</td>
                            <td>{{ $hero->description }}</td>
                            <td>{{ $hero->button_text }}</td>
                             <td>{{ $hero->button_link }}</td>

                               <td>
                                @if($hero->video)
                                    <video width="100" controls>
                                        <source src="{{ asset('storage/' . $hero->video) }}" type="video/mp4">
                                    </video>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('backend.hero.edit', $hero->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('backend.hero.destroy', $hero->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
