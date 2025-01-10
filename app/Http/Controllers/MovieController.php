<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('genre')->get()->map(function ($movie) {
            $movie->poster = $movie->poster ?: 'https://picsum.photos/200';
            return $movie;
        });

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'available' => 'required|boolean',
            'synopsis' => 'required|string',
        ]);

        Movie::create($validatedData);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Movie not found.');
        }

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();
    
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'available' => 'required|boolean',
            'poster' => 'nullable|image|max:2048', 
        ]);
    
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->genre_id = $request->input('genre_id');
        $movie->year = $request->input('year');
        $movie->available = $request->input('available');
    
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $movie->poster = 'storage/testing' . $posterPath;
        }
    
        $movie->save();
    
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Movie not found.');
        }

        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}
