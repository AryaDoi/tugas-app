@extends('layouts.app')

@section('title', 'Genre List')

@section('content')
<div class="container mt-5"></div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center mb-4">Genre List</h1>
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genres as $genre)
                            <tr>
                                <td>{{ $genre->name }}</td>
                                <td>
                                    <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($genres->isEmpty())
                        <p class="text-center mt-3">No genres available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
