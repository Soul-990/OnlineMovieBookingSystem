@extends('layout.admin')
@section('title', 'Edit Movie')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="m-4 text-danger">Edit Movie</h3>
            <form method="POST" action="{{ route('admin.movies.update', $movie) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
<div class="mb-3">
    <label class="form-label">Movie Name</label>
    <input type="text" name="movie_name" value="{{ old('movie_name', $movie->movie_name ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $movie->description ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Genre</label>
        <input type="text" name="genre" value="{{ old('genre', $movie->genre ?? '') }}" class="form-control">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Language</label>
        <input type="text" name="language" value="{{ old('language', $movie->language ?? '') }}" class="form-control">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Duration</label>
        <input type="text" name="duration" value="{{ old('duration', $movie->duration ?? '') }}" class="form-control" placeholder="e.g. 2h 15m">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Release Date</label>
        <input type="date" name="release_date" value="{{ old('release_date', isset($movie) ? optional($movie->release_date)->format('Y-m-d') : '') }}" class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            @foreach (['Now Showing', 'Upcoming', 'Ended'] as $status)
                <option value="{{ $status }}" @selected(old('status', $movie->status ?? '') == $status)>{{ $status }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Poster Image</label>
    <input type="file" name="poster" class="form-control">
    @if (! empty($movie) && $movie->poster)
        <img src="{{ asset('storage/'.$movie->poster) }}" class="mt-2" style="height:100px;">
    @endif
</div>
<div class="mb-3">
    <label class="form-label">Trailer Video (short clip)</label>
    <input type="file" name="trailer" class="form-control" accept="video/*">
    @if (! empty($movie) && $movie->trailer_link)
        <video width="200" controls class="mt-2">
            <source src="{{ asset('storage/'.$movie->trailer_link) }}" type="video/mp4">
        </video>
    @endif
</div>
    <button type="submit" class="btn btn-primary">Update Movie</button>
</form>
        </div>
    </div>
</div>
@endsection