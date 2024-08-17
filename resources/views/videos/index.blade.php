@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Videos</h1>
    <a href="{{ route('videos.create') }}" class="btn btn-primary">Upload New Video</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Video</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $video)
                <tr>
                    <td>{{ $video->title }}</td>
                    <td>{{ $video->description }}</td>
                    <td>
                        <video width="200" controls>
                            <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </td>
                    <td>
                        <a href="{{ route('videos.show', $video->id) }}" class="btn btn-info">View</a>
                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
