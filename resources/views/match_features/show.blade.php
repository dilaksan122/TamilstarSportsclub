@extends('admin.dashboard')
<link href="{{ asset('admin/css/showMatchFeatures.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <h1>{{ $matchFeature->title }}</h1>
    <p>Date: {{ $matchFeature->date }}</p>
    <p>Time: {{ $matchFeature->time }}</p>
    <p>Location: {{ $matchFeature->location }}</p>
    <p>Event: {{ $matchFeature->event ? $matchFeature->event->title : 'No Event Assigned' }}</p>
</div>
@endsection
