@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Room Features</h5>
            <div class="ms-auto">
                <a href="{{ route('backend.room_features.create') }}" class="btn btn-dark btn-sm">Add New</a>
            </div>
        </div>
        <div class="card-body">
            @if($roomFeatures->isEmpty())
                <div class="alert alert-warning text-center">No Room Features found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Room Type</th>
                                <th>Feature</th>
                                <th>Short Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roomFeatures as $feature)
                            <tr>
                                <td>{{ $feature->roomType->name }}</td>
                                <td>{{ $feature->feature }}</td>
                                <td>{{ $feature->short_description ?? 'No Description' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('backend.room_features.edit', $feature->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('backend.room_features.destroy', $feature->id) }}" method="POST" class="d-inline delete-form">
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

<!-- Delete Confirmation Script -->
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
    });
</script>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
