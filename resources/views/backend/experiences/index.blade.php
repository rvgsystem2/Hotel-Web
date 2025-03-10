@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="container-fluid">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Manage Experiences</h5>
                <div class="ms-auto">
                    <a href="{{ route('backend.faq.create') }}" class="btn btn-dark btn-sm">Add New</a>
                </div>
            </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            @if($experiences->isEmpty())
                <div class="alert alert-warning text-center">No Experiences found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Short Description</th>
                                <th>Button Text</th>
                                <th>Button Link</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experiences as $experience)
                            <tr>
                                <td>{{ $experience->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $experience->image) }}" alt="Image" class="img-thumbnail rounded" width="60" height="40">
                                </td>
                                <td>
                                    <span data-bs-toggle="tooltip" title="{{ $experience->short_description }}">
                                        {{ Str::limit($experience->short_description, 50) }}
                                    </span>
                                </td>
                                <td>{{ $experience->button_text ?? 'N/A' }}</td>
                                <td>
                                    @if($experience->button_link)
                                        <a href="{{ $experience->button_link }}" target="_blank" class="btn btn-outline-primary btn-sm">Visit</a>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('backend.experiences.edit', $experience->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('backend.experiences.destroy', $experience->id) }}" method="POST" class="d-inline delete-form">
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
                event.preventDefault();

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
