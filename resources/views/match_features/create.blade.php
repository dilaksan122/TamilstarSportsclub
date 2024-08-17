@extends('admin.dashboard')
<link href="{{ asset('admin/css/createMatchFeatures.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <h1>Create Match Feature</h1>
    <form action="{{ route('match-features.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="event_id">Event</label>
            <select class="form-control" id="event_id" name="event_id" required>
                @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
