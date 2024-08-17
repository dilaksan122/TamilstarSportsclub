@extends('admin.dashboard')
@section('content')
    <div class="container">
        <h1>Edit Founder</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('founders.update', $founder->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $founder->name }}">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control">
                <img src="/images/{{ $founder->image }}" width="100" class="mt-2">
            </div>

            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" name="position" class="form-control" value="{{ $founder->position }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
