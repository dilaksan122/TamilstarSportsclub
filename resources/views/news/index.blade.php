@extends('admin.dashboard')
<link href="{{ asset('admin/css/shownews.css') }}" rel="stylesheet"> 
@section('content')
<div class="container">
    <h1>News</h1>
    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Create News</a>
    <table class="table table-bordered mt-3">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $newsItem)
            <tr>
                <td>{{ $newsItem->title }}</td>
                <td>{{ $newsItem->author }}</td>
                <td>
                    @if ($newsItem->image)
                        <img src="{{ Storage::url($newsItem->image) }}" alt="image" width="100">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $newsItem->created_at }}</td>
                <td>{{ $newsItem->updated_at }}</td>
                <td>
                    <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline-block;">
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
    <div class="d-flex justify-content-center">
        {{ $news->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
