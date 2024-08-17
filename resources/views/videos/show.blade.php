@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>{{ $video->title }}</h1>
    <p>{{ $video->description }}</p>
    <video width="600" controls>
        <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <a href="{{ route('videos.index') }}" class="btn btn-secondary mt-4">Back to List</a>
</div>
@endsection
