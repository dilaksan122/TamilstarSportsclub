@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Add New Founder</h1>

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

        <form action="{{ route('founders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" name="position" class="form-control" placeholder="Enter Position">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
