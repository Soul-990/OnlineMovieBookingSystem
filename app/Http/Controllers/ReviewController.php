<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\review;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'review' => ['nullable', 'string', 'max:2000']
        ]);

        review::updateOrCreate(
            [
                'movie_id' => $movie->movie_id,
                'user_id' => Auth::id()
            ],
            [ 
                'rating' => $validated['rating'],
                'review' => $validated['review'] ?? null
            ]
        );
        return back()->with('status', 'succesfully submitted your review');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(review $review)
    {
        if($review->user_id != Auth::id()){
            abort(403);
        }

        $review->delete();

        return back('status', 'succesfully deleted your review');
    }
}
