<!-- resources/views/admin/comments/index.blade.php -->

@extends('admin.dashboard')
<link href="{{ asset('admin/css/Comments.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <h1>All Comments</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>News Title</th>
                <th>Comment</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->news->title }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <!-- Add action buttons such as Edit or Delete if needed -->
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="d-flex justify-content-center mt-4">
        {{ $comments->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
