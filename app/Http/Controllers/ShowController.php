<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Movie;
use App\Models\Theatre;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::with(['movie', 'theatre'])->latest()->get();

        return view('users.shows.index', compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::orderBy('movie_name')->get();
        $theatres = Theatre::orderBy('theatre_name')->get();

        return view('admin.shows.create', compact('movies', 'theatres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validated($request);

        Show::create($validated);

        return redirect()->route('shows.index')->with('status', 'Show schedule available now.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Show $show)
    {
        return view('users.shows.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Show $show)
    {
        $movies = Movie::orderBy('movie_name')->get();
        $theatres = Theatre::orderBy('theatre_name')->get();

        return view('admin.shows.edit', compact('show', 'movies', 'theatres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Show $show)
    {
        $validated = $this->validated($request);

        $show->update($validated);

        return redirect()->route('shows.index')->with('status', 'Show sussefully added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        $show->delete();

        return back()->with('status', 'Show deleted succesfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'movie_id' => ['required', 'exists:movies,movie_id'],
            'theatre_id' => ['required', 'exists:theatres,theatre_id'],
            'show_date' => ['required', 'date'],
            'show_time' => ['required'],
            'gold_price' => ['required', 'numeric', 'min:0'],
            'platinum_price' => ['required', 'numeric', 'min:0'],
            'box_price' => ['required', 'numeric', 'min:0'],
        ]);
    }
}
