@extends('admin.dashboard')
<link href="{{ asset('admin/css/players.css') }}" rel="stylesheet">
@section('content')
<div class="container mt-5">
    <h1>Players</h1>
    <a href="{{ route('players.create') }}" class="btn btn-primary mb-3">Add New Player</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
            <tr>
                <td>{{ $player->id }}</td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->role }}</td>
                <td>{{ $player->description }}</td>
                <td><img src="{{ asset('storage/' . $player->image) }}" alt="{{ $player->name }}" width="100"></td>
                <td>
                    <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning btn-edit">Edit</a>
                    <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $players->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
