@extends('admin.dashboard')
<link href="{{ asset('admin/css/createplayer.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <h1>Create About Us</h1>
    <form action="{{ route('aboutUs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Display global errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       

        <div class="form-group">
            <label for="history">History</label>
            <textarea name="history" id="history" class="form-control @error('history') is-invalid @enderror" required>{{ old('history') }}</textarea>
            @error('history')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="mission">Mission</label>
            <textarea name="mission" id="mission" class="form-control @error('mission') is-invalid @enderror" required>{{ old('mission') }}</textarea>
            @error('mission')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="vision">Vision</label>
            <textarea name="vision" id="vision" class="form-control @error('vision') is-invalid @enderror" required>{{ old('vision') }}</textarea>
            @error('vision')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="anthem">Anthem</label>
            <textarea name="anthem" id="anthem" class="form-control @error('anthem') is-invalid @enderror" required>{{ old('anthem') }}</textarea>
            @error('anthem')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<!-- Include CKEditor from CDN -->
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor on textareas
    CKEDITOR.replace('history');
    CKEDITOR.replace('mission');
    CKEDITOR.replace('vision');
    CKEDITOR.replace('anthem');
</script>
@endsection
