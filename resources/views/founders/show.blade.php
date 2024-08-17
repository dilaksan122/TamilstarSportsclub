@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Founder Details</h1>

        <div class="card">
            <div class="card-body">
                <h3>{{ $founder->name }}</h3>
                <p><strong>Position:</strong> {{ $founder->position }}</p>
                <img src="/images/{{ $founder->image }}" width="300">
            </div>
        </div>

        <a href="{{ route('founders.index') }}" class="btn btn-primary mt-3">Back</a>
    </div>
@endsection
