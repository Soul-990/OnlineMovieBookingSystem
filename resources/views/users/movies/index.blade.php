@extends('layout.app')
@section('title', 'Movies')
@section('heading', 'Movies')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark my-3">All Movies</h3>
    @auth
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('admin.movies.create') }}" class="btn btn-primary">Add Movie</a>
        @endif
    @endauth
</div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="row trend_2">
      @forelse ($movies as $movie)
          <div class="col-md-3 col-sm-6">
           <div class="trend_2i position-relative">
             <div class="trend_2i1">
               <img src="{{ $movie->poster ? asset('storage/'.$movie->poster) : asset('template/img/'.((($movie->movie_id % 12) + 5)).'.jpg') }}" class="w-100" alt="{{ $movie->movie_name }}">
           </div>
           <div class="trend_2i2 bg_back position-absolute w-100 h-100 top-0 px-4">
            <h6 class="font_14 text-light">{{ $movie->genre }} / {{ $movie->duration }}</h6>
            <h5><a class="text-white a_tag" href="{{ route('movies.show', $movie) }}">{{ $movie->movie_name }}</a></h5>
            <h6 class="mb-0 mt-3"><a class="button_1 p-2 px-3 font_14" href="{{ route('movies.show', $movie) }}">View & Book</a></h6>
           </div>
           </div>
           @auth
               @if (auth()->user()->role === 'admin')
                   <div class="mt-2 text-center">
                       <a href="{{ route('admin.movies.edit', $movie) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                       <form method="POST" action="{{ route('admin.movies.destroy', $movie) }}" class="d-inline" onsubmit="return confirm('Delete this movie?')">
                           @csrf
                           @method('DELETE')
                           <button class="btn btn-sm btn-outline-danger">Delete</button>
                       </form>
                   </div>
               @endif
           @endauth
          </div>
      @empty
          <div class="col-md-12 text-center text-muted py-5">No movies found.</div>
      @endforelse
   </div>
        </div>
    </div>
</div>
@endsection