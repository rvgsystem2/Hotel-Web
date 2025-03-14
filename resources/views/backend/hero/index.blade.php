@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Hero Sections</h5>
            <div class="ms-auto">
                <a href="{{ route('backend.hero.create') }}" class="btn btn-dark btn-sm">Add Hero Section</a>
            </div>
        </div>
        <div class="card-body">
            @if($heroSections->isEmpty())
                <div class="alert alert-warning text-center">No Hero Sections found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Button Text</th>
                                <th>Button Link</th>
                                <th>Video</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($heroSections as $hero)
                            <tr>
                                <td>{{ $hero->title }}</td>
                                <td>
                                    <span data-bs-toggle="tooltip" title="{{ $hero->description }}">
                                        {{ Str::limit($hero->description, 50) }}
                                    </span>
                                </td>
                                <td>{{ $hero->button_text }}</td>
                                <td>{{ $hero->button_link }}</td>
                                <td>
                                    @if ($hero->video)
                                        <video width="100" controls>
                                            <source src="{{ asset('storage/' . $hero->video) }}" type="video/mp4">
                                        </video>
                                    @else
                                        <span class="text-muted">No Video</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('backend.hero.edit', $hero->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('backend.hero.destroy', $hero->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Confirmation & Tooltip Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent immediate form submission

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest(".delete-form").submit();
                    }
                });
            });
        });

        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        if (tooltipTriggerList.length) {
            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
    });
</script>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
