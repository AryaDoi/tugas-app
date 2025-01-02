@extends('layouts.app')

@section('title', 'Add New Movie')

@section('content')
<div class="container">
    <h1>Add New Movie</h1>
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" id="genre_id" class="form-control" required>
                <option value="">Select Genre</option>
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
                @endforeach
            </select>
            @error('genre_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}" required>
            @error('year')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea name="synopsis" id="synopsis" class="form-control" required>{{ old('synopsis') }}</textarea>
            @error('synopsis')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        <div class="mb-3">
            <label for="available" class="form-label">Available</label>
            <select name="available" id="available" class="form-control">
                <option value="1" {{ old('available') == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('available') == '0' ? 'selected' : '' }}>No</option>
            </select>
            @error('available')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
