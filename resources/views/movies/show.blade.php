@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $movie->title }}</h1>
    <p><strong>Genre:</strong> {{ $movie->genre->name }}</p>
    <p><strong>Year:</strong> {{ $movie->year }}</p>
    <p><strong>Available:</strong> {{ $movie->available ? 'Yes' : 'No' }}</p>
    <p><strong>Synopsis:</strong></p>
    <p>{{ $movie->synopsis }}</p>
    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
