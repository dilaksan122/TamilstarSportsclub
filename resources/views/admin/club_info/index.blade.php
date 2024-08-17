@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Club Information</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.club_info.create') }}" class="btn btn-primary mb-3">Add New Club Info</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clubInfos as $clubInfo)
            <tr>
                <td>{{ $clubInfo->name }}</td>
                <td>{{ $clubInfo->address }}</td>
                <td>{{ $clubInfo->PhoneNo }}</td>
                <td>{{ $clubInfo->Email }}</td>
                <td>
                    @if($clubInfo->logoImage)
                        <img src="{{ asset('storage/' . $clubInfo->logoImage) }}" alt="Logo" width="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.club_info.edit', $clubInfo->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.club_info.destroy', $clubInfo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
