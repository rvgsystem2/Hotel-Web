@extends('backend.layouts.app')

@section('content')
<div class="col-md-12">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Hero Section</div>
        </div>
        <!--end::Header-->
        
        <!--begin::Form-->
        <form action="{{ route('backend.hero.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" required></textarea>
                </div>
                
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="video" id="video" accept="video/*">
                    <label class="input-group-text" for="video">Upload Video</label>
                </div>
                
                <div class="mb-3">
                    <label for="button_text" class="form-label">Button Text</label>
                    <input type="text" class="form-control" name="button_text" id="button_text">
                </div>
                
                <div class="mb-3">
                    <label for="button_link" class="form-label">Button Link</label>
                    <input type="url" class="form-control" name="button_link" id="button_link">
                </div>
            </div>
            <!--end::Body-->
            
            <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <!--end::Footer-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Quick Example-->
</div>
@endsection
