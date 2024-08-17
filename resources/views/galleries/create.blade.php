@extends('admin.dashboard')

@section('content')
    <h1>Add New Gallery</h1>

    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
