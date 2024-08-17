@extends('admin.dashboard')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Edit News</title>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <style>
       
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .error-list {
            color: red;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group img {
            display: block;
            margin-top: 10px;
        }
        .submit-btn {
            text-align: center;
        }
        .submit-btn button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit News</h1>

        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $news->title }}">
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content">{{ $news->content }}</textarea>
                <script>
                    CKEDITOR.replace('content');
                </script>
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" value="{{ $news->author }}">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                @if ($news->image)
                    <img src="{{ Storage::url($news->image) }}" alt="image" width="100">
                @endif
            </div>

            <div class="submit-btn">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>

@endsection