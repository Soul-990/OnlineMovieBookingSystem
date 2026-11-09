@extends('layout.admin')
@section('title', 'Schedule Show')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="m-4 text-danger">Schedule Show</h3>
<form method="POST" action="{{ route('admin.shows.store') }}">
    @csrf
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Movie</label>
        <select name="movie_id" class="form-select" required>
            <option value="">Select Movie</option>
            @foreach ($movies as $movie)
                <option value="{{ $movie->movie_id }}" @selected(old('movie_id', $show->movie_id ?? '') == $movie->movie_id)>{{ $movie->movie_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Theatre</label>
        <select name="theatre_id" class="form-select" required>
            <option value="">Select Theatre</option>
            @foreach ($theatres as $theatre)
                <option value="{{ $theatre->theatre_id }}" @selected(old('theatre_id', $show->theatre_id ?? '') == $theatre->theatre_id)>{{ $theatre->theatre_name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Show Date</label>
        <input type="date" name="show_date" value="{{ old('show_date', isset($show) ? $show->show_date->format('Y-m-d') : '') }}" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Show Time</label>
        <input type="time" name="show_time" value="{{ old('show_time', isset($show) ? \Carbon\Carbon::parse($show->show_time)->format('H:i') : '') }}" class="form-control" required>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Gold Price</label>
        <input type="number" step="0.01" name="gold_price" value="{{ old('gold_price', $show->gold_price ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Platinum Price</label>
        <input type="number" step="0.01" name="platinum_price" value="{{ old('platinum_price', $show->platinum_price ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Box Price</label>
        <input type="number" step="0.01" name="box_price" value="{{ old('box_price', $show->box_price ?? '') }}" class="form-control" required>
    </div>
</div>
    <button type="submit" class="btn btn-primary">Save Show</button>
</form>
        </div>
    </div>
</div>
@endsection