<!-- resources/views/about_us/index.blade.php -->
@extends('admin.dashboard')
<link href="{{ asset('admin/css/createplayer.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <h1>About Us</h1>
    <a href="{{ route('aboutUs.create') }}" class="btn btn-primary">Add New</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>History</th>
                <th>Mission</th>
                <th>Vision</th>
                <th>Anthem</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aboutUsEntries as $aboutUs)
                <tr>
                    <td>{{ Str::limit($aboutUs->history, 50) }}</td>
                    <td>{{ Str::limit($aboutUs->mission, 50) }}</td>
                    <td>{{ Str::limit($aboutUs->vision, 50) }}</td>
                    <td>{{ Str::limit($aboutUs->anthem, 50) }}</td>
                    <td>
                        <a href="{{ route('aboutUs.show', $aboutUs->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('aboutUs.edit', $aboutUs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('aboutUs.destroy', $aboutUs->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
