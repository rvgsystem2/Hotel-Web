@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Add New Info Card</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.info_cards.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Value</label>
                    <input type="text" name="value" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection