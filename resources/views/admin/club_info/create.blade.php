<!-- resources/views/admin/club_info/create.blade.php -->

@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Add Club Information</h1>

    <form action="{{ route('admin.club_info.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Club Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="address">Club Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="form-group">
            <label for="phoneNo">Phone Number:</label>
            <input type="text" class="form-control" id="phoneNo" name="phoneNo">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="logoImage">Logo Image:</label>
            <input type="file" class="form-control" id="logoImage" name="logoImage">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
