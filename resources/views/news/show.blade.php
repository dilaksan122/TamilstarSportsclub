@extends('admin.dashboard')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Show News</title>
    <style>
       
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            margin: 10px 0;
        }
        img {
            display: block;
            margin: 20px auto;
        }
        a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
        a:hover {
            background-color: #0056b3;
        }
        .details {
            text-align: left;
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $news->title }}</h1>
        <div class="details">
            <p>{{ $news->content }}</p>
            <p><strong>Author:</strong> {{ $news->author }}</p>
            @if ($news->image)
                <img src="{{ Storage::url($news->image) }}" alt="image" width="300">
            @endif
            <p><strong>Created at:</strong> {{ $news->created_at }}</p>
            <p><strong>Updated at:</strong> {{ $news->updated_at }}</p>
        </div>
        <a href="{{ route('news.index') }}">Back to News List</a>
    </div>
</body>
</html>
@endsection
