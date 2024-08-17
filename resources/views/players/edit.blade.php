@extends('admin.dashboard')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edit Player</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h1>Edit Player</h1>
    <form action="{{ route('players.update', $player->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $player->name }}" required>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" value="{{ $player->role }}" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $player->description }}</textarea>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
        <button type="submit">Update</button>
    </form>
</body>
</html>
@endsection
