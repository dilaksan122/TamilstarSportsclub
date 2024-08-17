@extends('admin.dashboard')
<link href="{{ asset('admin/css/anthem.css') }}" rel="stylesheet">
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Sportstar Anthem</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Sportstar Anthem</h1>
        <p>This is the Sportstar Anthem page.</p>
        <audio controls>
            <source src="path_to_anthem.mp3" type="audio/mp3">
            Your browser does not support the audio element.
        </audio>
        <br>
        <a href="{{ route('sportstars.index') }}" class="btn btn-secondary">Back to Sportstars</a>
    </div>
</body>
</html>
@endsection