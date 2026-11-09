<?php

namespace App\Http\Controllers;

use App\Models\Theatre;
use Illuminate\Http\Request;

class TheatreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theatres = Theatre::latest()->get();
        return view('users.theatre.index', compact('theatres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.theatre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validated($request);

        Theatre::create($validated);

        return redirect()->route('theatre.index')->with('status', 'Theatre added sucessfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Theatre $theatre)
    {
        return view('users.theatre.show', compact('theatre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theatre $theatre)
    {
        return view('admin.theatre.edit', compact('theatre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theatre $theatre)
    {
        $validated = $this->validated($request);

        $theatre->update($validated);

        return redirect()->route('theatre.index')->with('status', 'Theatre update succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theatre $theatre)
    {
        $theatre->delete();

        return back()->with('status', 'Theatre deleted succesfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'theatre_name' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string'],
            'contact_no' => ['nullable', 'string', 'max:20'],
        ]);
    }
}
