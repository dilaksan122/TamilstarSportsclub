@extends('admin.dashboard')
<!-- In your dashboard layout file, add this in the head section -->
<link href="{{ asset('admin/css/showplayer.css') }}" rel="stylesheet">

@section('content')
<div class="container player-details mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Player Details</h1>
        </div>
        <div class="card-body">
            <div class="player-info mb-3">
                <p><strong>Name:</strong> {{ $player->name }}</p>
                <p><strong>Role:</strong> {{ $player->role }}</p>
                <p><strong>Description:</strong> {{ $player->description }}</p>
                <p><strong>Image:</strong></p>
                <img src="{{ asset('images/players/' . $player->image) }}" alt="{{ $player->name }}" class="img-fluid mb-3">
            </div>
            <div class="player-actions">
                <a href="{{ route('players.edit', $player->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('players.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
