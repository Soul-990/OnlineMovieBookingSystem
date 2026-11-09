<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::latest()->get();
        return view('users.movies.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        $movie->load('shows.theatre');
        return view('users.movies.show', compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }
        if ($request->hasFile('trailer')) {
            $validated['trailer_link'] = $request->file('trailer')->store('trailers', 'public');
        }

        Movie::create($validated);

        return redirect()->route('movies.index')->with('status', 'Movie succesfully updated.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        if ($request->hasFile('trailer')) {
            $validated['trailer_link'] = $request->file('trailer')->store('trailers', 'public');
        }

        $movie->update($validated);

        return redirect()->route('movies.index')->with('status', 'Movie succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->poster && Storage::disk('public')->exists($movie->poster)) {
            Storage::disk('public')->delete($movie->poster);
        }

        if ($movie->trailer_link && Storage::disk('public')->exists($movie->trailer_link)) {
            Storage::disk('public')->delete($movie->trailer_link);
        }
        $movie->delete();
        return back()->with('status', 'Movie sucessfully deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'movie_name' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'genre' => ['nullable', 'string', 'max:50'],
            'language' => ['nullable', 'string', 'max:50'],
            'duration' => ['nullable', 'string', 'max:20'],
            'release_date' => ['nullable', 'date'],
            'trailer' => ['nullable', 'file', 'mimetypes:video/mp4,video/quicktime,video/x-msvideo', 'max:20480'],
            'status' => ['required', 'in:Now Showing,Upcoming,Ended'],
            'poster' => ['nullable', 'image', 'max:2048'],
        ]);
    }
}
