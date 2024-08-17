@extends('admin.dashboard')
<link href="{{ asset('admin/css/createplayer.css') }}" rel="stylesheet">
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Create Player</title>
</head>
<body>
<h1>Add New Player</h1>
    <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
@endsection