@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Founders</h1>
        <a href="{{ route('founders.create') }}" class="btn btn-primary">Add New Founder</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Position</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($founders as $founder)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $founder->name }}</td>
                    <td><img src="/images/{{ $founder->image }}" width="100"></td>
                    <td>{{ $founder->position }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('founders.show', $founder->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('founders.edit', $founder->id) }}">Edit</a>
                        <form action="{{ route('founders.destroy', $founder->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
