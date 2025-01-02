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

        // Simpan data ke database
        Movie::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      // Ambil data film berdasarkan ID
      $movie = Movie::find($id);

      // Periksa apakah film ditemukan
      if (!$movie) {
          return redirect()->route('movies.index')->with('error', 'Movie not found.');
      }
  
      // Kirim data ke view menggunakan compact
      return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
