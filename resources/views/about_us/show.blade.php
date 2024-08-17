<!-- resources/views/about_us/show.blade.php -->
@extends('admin.dashboard')
<link href="{{ asset('admin/css/createplayer.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <h1>{{ $aboutUs->name }}</h1>
    <p><strong>History:</strong> {{ $aboutUs->history }}</p>
    <p><strong>Mission:</strong> {{ $aboutUs->mission }}</p>
    <p><strong>Vision:</strong> {{ $aboutUs->vision }}</p>
    <p><strong>Anthem:</strong> {{ $aboutUs->anthem }}</p>
    <a href="{{ route('aboutUs.index') }}" class="btn btn-primary mt-3">Back to List</a>
</div>
@endsection
