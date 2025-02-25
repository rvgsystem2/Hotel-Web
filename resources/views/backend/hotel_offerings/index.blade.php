@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Hotel Offerings</h5>
            <div class="ms-auto">
                <a href="{{ route('backend.hotel_offerings.create') }}" class="btn btn-dark btn-sm">Add New</a>
            </div>
        </div>
        <div class="card-body">
            @if($offerings->isEmpty())
                <div class="alert alert-warning text-center">No Hotel Offerings found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offerings as $offering)
                            <tr>
                                
                                    <td><i class="{{ $offering->icon }}"></i></td>

                                    {{-- <span class="material-icons text-3xl">{{ $offering->icon }}</span> --}}
                                
                                <td>{{ $offering->title }}</td>
                                <td>
                                    <span data-bs-toggle="tooltip" title="{{ $offering->short_description }}">
                                        {{ Str::limit($offering->short_description, 50) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('backend.hotel_offerings.edit', $offering->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('backend.hotel_offerings.destroy', $offering->id) }}" method="POST" class="d-inline delete-form">
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
