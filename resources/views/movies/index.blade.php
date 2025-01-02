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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
