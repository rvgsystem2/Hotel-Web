@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Packages</h5>
            <div class="ms-auto">
                <a href="{{ route('backend.packages.create') }}" class="btn btn-dark btn-sm">Add New</a>
            </div>
        </div>
        <div class="card-body">
            @if($packages->isEmpty())
                <div class="alert alert-warning text-center">No Packages found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $key => $package)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $package->title }}</td>
                                <td>{{ $package->description }}</td>
                                <td>${{ number_format($package->price, 2) }}</td>
                                <td>
                                    @if($package->image)
                                        <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->title }}" width="50" height="50">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    @if($package->link)
                                        <a href="{{ $package->link }}" target="_blank">View</a>
                                    @else
                                        <span>No Link</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('backend.packages.edit', $package->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('backend.packages.destroy', $package->id) }}" method="POST" class="d-inline delete-form">
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
@endsection

@section('scripts')
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
