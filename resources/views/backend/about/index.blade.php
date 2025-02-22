@extends('backend.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">About Sections</h5>
            <a href="{{ route('backend.about.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="card-body">
            @if($sections->isEmpty())
                <div class="alert alert-warning text-center">No About Sections found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 15%;">Title</th>
                                <th style="width: 25%;">Description</th>
                                <th>Main Image</th>
                                <th>Gallery Images</th>
                                <th>Quick Access</th>
                                <th>Prime</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                            <tr>
                                <td>{{ $section->title }}</td>
                                <td>
                                    <span data-bs-toggle="tooltip" title="{{ $section->description }}">
                                        {{ Str::limit($section->description, 50) }}
                                    </span>
                                </td>
                                <td>
                                    @if ($section->main_image)
                                        <img src="{{ asset('storage/' . $section->main_image) }}" width="100" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $galleryImages = is_string($section->gallery_images) ? explode(',', $section->gallery_images) : (is_array($section->gallery_images) ? $section->gallery_images : []);
                                    @endphp
                                    @if (!empty($galleryImages))
                                        @foreach ($galleryImages as $image)
                                            @if (!empty($image))
                                                <img src="{{ asset('storage/' . trim($image)) }}" width="50" class="img-thumbnail mb-1">
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="text-muted">No Images</span>
                                    @endif
                                </td>
                                <td>{{ $section->quick_access }}</td>
                                <td>{{ $section->prime }}</td>
                                <td>
                                    <a href="{{ route('backend.about.edit', $section->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('backend.about.destroy', $section->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger delete-btn">Delete</button>
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
                    cancelButtonColor: "#3085d6",
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
