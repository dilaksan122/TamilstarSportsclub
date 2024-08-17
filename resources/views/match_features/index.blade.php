@extends('admin.dashboard')
<link href="{{ asset('admin/css/MatchFeatures.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <h1>Match Features</h1>
    <a href="{{ route('match-features.create') }}" class="btn btn-primary">Create Match Feature</a>
    <table class="table mt-3">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Event</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matchFeatures as $matchFeature)
            <tr>
                <td>{{ $matchFeature->title }}</td>
                <td>{{ $matchFeature->date }}</td>
                <td>{{ $matchFeature->time }}</td>
                <td>{{ $matchFeature->location }}</td>
                <td>{{ $matchFeature->event->title }}</td>
                <td>
                    <a href="{{ route('match-features.show', $matchFeature->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('match-features.edit', $matchFeature->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('match-features.destroy', $matchFeature->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $matchFeatures->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
