@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Smart Services</h5>
            <div class="ms-auto">
                <a href="{{ route('backend.smart_services.create') }}" class="btn btn-dark btn-sm">Add New Service</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            @if($services->isEmpty())
                <div class="alert alert-warning text-center">No Smart Services found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Image</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->title }}</td>
                                <td><i class="{{ $service->icon }}"></i></td>
                                <td>
                                    @if ($service->image && file_exists(public_path('storage/' . $service->image)))
                                        <img src="{{ asset('storage/' . $service->image) }}" width="50" class="img-thumbnail">
                                    @else
                                        <img src="{{ asset('default.png') }}" width="50" class="img-thumbnail"> <!-- Default Image -->
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('backend.smart_services.edit', $service->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('backend.smart_services.destroy', $service->id) }}" method="POST" class="d-inline delete-form">
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
    });
</script>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection