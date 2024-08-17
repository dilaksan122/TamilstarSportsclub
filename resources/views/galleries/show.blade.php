@extends('admin.dashboard')
<link href="{{ asset('admin/css/showgalleries.css') }}" rel="stylesheet">
@section('content')
    <h1>Gallery Details</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $gallery->title }}</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="image">Image</label>
                <br>
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" width="300">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <p>{{ $gallery->description }}</p>
            </div>
            <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this gallery item?')">Delete</button>
            </form>
            <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Back to Gallery</a>
        </div>
    </div>
@endsection
