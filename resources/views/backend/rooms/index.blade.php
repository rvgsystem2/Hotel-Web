@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Rooms</h5>
            <div class="ms-auto">
                <a href="{{ route('backend.rooms.create') }}" class="btn btn-dark btn-sm">Add New</a>
            </div>
        </div>
        <div class="card-body">
            @if($rooms->isEmpty())
                <div class="alert alert-warning text-center">No Rooms found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Images</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Distance (km)</th>
                                <th>Link</th>
                                <th>Room Type</th>
                                <th>Price</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                            <tr>
                                <td>
                                    @if($room->images)
                                        @foreach(explode(',', $room->images) as $image)
                                            <img src="{{ asset('storage/' . $image) }}" alt="Room Image" width="50" height="50" class="rounded me-1">
                                        @endforeach
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>{{ $room->title }}</td>
                                <td>{{ Str::limit($room->description, 50) }}</td>
                                <td>{{ $room->location }}</td>
                                <td>{{ $room->distance_from_station ?? 'N/A' }}</td>
                                <td>
                                    @if($room->link)
                                        <a href="{{ $room->link }}" target="_blank">View</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $room->roomType->name }}</td>
                                <td>{{ $room->price }}</td>
                                <td class="text-center">
                                    <a href="{{ route('backend.rooms.edit', $room->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('backend.rooms.destroy', $room->id) }}" method="POST" class="d-inline delete-form">
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
