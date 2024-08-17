<!-- resources/views/admin/club_info/edit.blade.php -->

@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Edit Club Information</h1>

    <form action="{{ route('admin.club_info.update', $clubInfo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Club Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $clubInfo->name }}" required>
        </div>

        <div class="form-group">
            <label for="address">Club Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $clubInfo->address }}" required>
        </div>

        <div class="form-group">
            <label for="phoneNo">Phone Number:</label>
            <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="{{ $clubInfo->PhoneNo }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $clubInfo->Email }}">
        </div>

        <div class="form-group">
            <label for="logoImage">Logo Image:</label>
            @if($clubInfo->logoImage)
                <img src="{{ asset('storage/' . $clubInfo->logoImage) }}" alt="Logo" width="100">
            @endif
            <input type="file" class="form-control" id="logoImage" name="logoImage">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
