@extends('admin.dashboard')
<link href="{{ asset('admin/css/showEvents.css') }}" rel="stylesheet">

@section('content')
<div class="event-container">
    <h1>{{ $event->title }}</h1>
    <p>Date: {{ $event->date }}</p>
    <p>{{ $event->description }}</p>
    <h2>Match Features</h2>
    <a href="{{ route('match-features.create') }}" class="btn btn-primary">Create Match Feature</a>
    <ul>
        @foreach ($event->matchFeatures as $matchFeature)
        <li>{{ $matchFeature->title }} - {{ $matchFeature->date }} {{ $matchFeature->time }} at {{ $matchFeature->location }}</li>
        @endforeach
    </ul>
</div>

@endsection
