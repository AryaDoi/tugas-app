@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Movie</h1>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select class="form-control" id="genre_id" name="genre_id" required>
                <option value="" disabled>Select Genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $movie->year) }}" required>
        </div>

        <div class="mb-3">
            <label for="available" class="form-label">Available</label>
            <select class="form-control" id="available" name="available" required>
                <option value="1" {{ $movie->available ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$movie->available ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="poster" class="form-label">Poster</label>
            <input type="file" class="form-control" id="poster" name="poster">
            @if($movie->poster)
                <div class="mt-2">
                    <img src="{{ $movie->poster }}" alt="Poster" style="width: 150px; height: auto;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update Movie</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
