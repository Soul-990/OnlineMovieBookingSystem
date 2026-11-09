@extends('layout.app')
@section('title', $movie->movie_name)
@section('heading', 'Movie Details')


@section('content')
<section id="detail" class="p_3">
 <div class="container-xl">
    <div class="detail_1 row">
      <div class="col-md-6">
        <div class="detail_1l">
          <h2>{{ $movie->movie_name }}</h2>
          <h6 class="mb-0 text-muted">{{ $movie->genre }} / {{ $movie->duration }}</h6>
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail_1r text-end">
          <span class="badge bg-{{ $movie->status === 'Now Showing' ? 'success' : 'secondary' }} fs-6 align-middle me-2">{{ $movie->status }}</span>
          @if ($movie->reviews->count())
              <span class="align-middle"><i class="fa fa-star text-warning"></i> {{ number_format($movie->reviews->avg('rating'), 1) }}/5 <span class="text-muted">({{ $movie->reviews->count() }})</span></span>
          @endif
        </div>
      </div>
    </div>
    <div class="detail_2 row mt-4">
      <div class="col-md-4">
        <div class="detail_2l">
          <div class="grid clearfix">
              <figure class="effect-jazz mb-0">
                <img src="{{ $movie->poster ? asset('storage/'.$movie->poster) : asset('template/img/'.((($movie->movie_id % 12) + 5)).'.jpg') }}" height="530" class="w-100" alt="{{ $movie->movie_name }}">
              </figure>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        @if ($movie->trailer_link)
            <div class="detail_2r d-flex align-items-center bg-dark" style="height: 530px;">
                <video controls width="100%">
                    <source src="{{ asset('storage/'.$movie->trailer_link) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @else
            <div class="detail_2r d-flex align-items-center justify-content-center bg-light" style="height: 530px;">
                <span class="text-muted">No trailer available</span>
            </div>
        @endif
      </div>
    </div>
    <div class="detail_3 row mt-4">
      <div class="col-md-4">
        <div class="detail_3l">
           <h6 class="mb-3 text-muted"><span class="fw-bold text-black me-4">Language:</span> {{ $movie->language }}</h6>
           <h6 class="mb-3 text-muted"><span class="fw-bold text-black me-4">Duration:</span> {{ $movie->duration }}</h6>
        </div>
      </div>
      <div class="col-md-4">
        <div class="detail_3l">
           <h6 class="mb-3 text-muted"><span class="fw-bold text-black me-4">Release:</span> {{ optional($movie->release_date)->format('d M Y') ?? '—' }}</h6>
           <h6 class="mb-3 text-muted"><span class="fw-bold text-black me-4">Genre:</span> {{ $movie->genre }}</h6>
        </div>
      </div>
    </div>
    <hr>
    <div class="detail_4 row">
     <div class="col-md-12">
       <h3>Story Line</h3>
       <p class="mt-3">{{ $movie->description }}</p>
     </div>
    </div>
 </div>
</section>

<section class="p_3">
    <div class="container-xl">
        <h3 class="mb-4">Available Shows</h3>
        <div class="row trend_2">
            @forelse($movie->shows as $show)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="position-relative">
                            <h6 class="mt-3">
                                @auth
                                    <a href="{{ route('bookings.create',$show) }}"
                                       class="button_1 p-2 px-3">
                                        Book Ticket
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="button_1 p-2 px-3">
                                        Login to Book
                                    </a>
                                @endauth
                            </h6>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No shows available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section id="reviews" class="p_3 bg-light">
 <div class="container-xl">
   <h3 class="mb-4">Reviews & Ratings</h3>

   @auth
       <div class="login_1m p-4 bg-white mb-4">
         <h6 class="mb-3 fw-bold">Write a Review</h6>
         <form method="POST" action="{{ route('reviews.store', $movie) }}">
           @csrf
           <div class="mb-2">
             <select name="rating" class="form-select" style="max-width:180px;" required>
               <option value="">Select Rating</option>
               @for ($i = 5; $i >= 1; $i--)
                   <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
               @endfor
             </select>
           </div>
           <div class="mb-3">
             <textarea name="review" class="form-control" rows="3" placeholder="Share your thoughts..."></textarea>
           </div>
           <button type="submit" class="button_2">Submit Review</button>
         </form>
       </div>
   @else
       <p><a class="a_tag fw-bold" href="{{ route('login') }}">Login</a> to write a review.</p>
   @endauth

   @forelse ($movie->reviews as $review)
       <div class="border-bottom py-3">
         <div class="d-flex justify-content-between">
           <strong>{{ $review->user->full_name }}</strong>
           <span class="text-warning">
             @for ($i = 1; $i <= 5; $i++)
                 <i class="fa fa-star{{ $i > $review->rating ? '-o' : '' }}"></i>
             @endfor
           </span>
         </div>
         <p class="mb-1">{{ $review->review }}</p>

         @auth
             @if ($review->user_id == auth()->id())
                 <form method="POST" action="{{ route('reviews.destroy', $review) }}" class="d-inline" onsubmit="return confirm('Delete this review?')">
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-link btn-sm text-danger p-0">Delete</button>
                 </form>
             @endif
         @endauth
       </div>
   @empty
       <p class="text-muted">No reviews yet. Be the first to review!</p>
   @endforelse
 </div>
</section>

@endsection