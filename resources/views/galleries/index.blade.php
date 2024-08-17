@extends('admin.dashboard')
<link href="{{ asset('admin/css/galleries.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <h1>Gallery</h1>

    <a href="{{ route('galleries.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->title }}</td>
                    <td><img src="{{ asset('storage/' . $gallery->image) }}" width="100" alt="{{ $gallery->title }}"></td>
                    <td>{{ $gallery->description }}</td>
                    <td>
                        <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $galleries->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
