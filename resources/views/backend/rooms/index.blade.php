@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Rooms</h5>
            <div class="ms-auto">
                <a href="{{ route('backend.rooms.create') }}" class="btn btn-dark btn-sm">Add New Room</a>
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
                                <th>Room Number</th>
                                <th>Hotel</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Images</th> <!-- Added Images Column -->
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->room_number }}</td>
                                <td>{{ $room->hotel->name }}</td>
                                <td>{{ $room->roomType->name ?? 'N/A' }}</td> <!-- Fixed Room Type Reference -->
                                <td>${{ number_format($room->price, 2) }}</td>
                                <td>
                                    @foreach(explode(',', $room->image) as $img)
                                        <img src="{{ asset('storage/' . $img) }}" width="50" height="50" class="rounded" alt="Room Image">
                                    @endforeach
                                </td>
                                <td>
                                    <span class="badge bg-{{ $room->status == 'available' ? 'success' : ($room->status == 'booked' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($room->status) }}
                                    </span>
                                </td>
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
