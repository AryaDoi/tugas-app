@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movies List</h1>
    <div class="d-flex justify-content-between mb-3">
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Poster</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Available</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" style="width: 100px; height: auto;">
                </td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->genre->name }}</td>
                <td>{{ $movie->year }}</td>
                <td>{{ $movie->available ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection