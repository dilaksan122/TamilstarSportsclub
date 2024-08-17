@extends('admin.dashboard')
<link href="{{ asset('admin/css/Editgalleries.css') }}" rel="stylesheet">
@section('content')
    <h1>Edit Gallery</h1>

    <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $gallery->title }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/' . $gallery->image) }}" width="100">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $gallery->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
