@extends('layout.app')
@section('title', 'Home')
@section('content')
<div class="container-fluid my-1">
	<section id="center" class="center_home">
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('template/img/imgi_44_Tiger-3-3-999x749.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
          <h3 class="col_oran">Thriller Movie</h3>
		  <h1 class="text-white mt-3">Tiger Zindha<br> Season 3</h1>
		  <p class="mt-3 text-light w-75">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer typesetting, remaining essentially unchanged.</p>
		  <ul class="mb-0 mt-4">
		  <li class="d-inline-block"><a class="button" href="{{ route('movies.index') }}"><i class="fa fa-check-circle me-1 font_14"></i> More Info</a></li>
		   <li class="d-inline-block ms-2"><a class="button_1 " href="#"><i class="fa fa-check-circle me-1 font_14"></i> Get Ticket</a></li>
		</ul>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('template/img/imgi_4_WelcomeBack (1).jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
          <h3 class="col_oran">Comedy Moview</h3>
		  <h1 class="text-white mt-3">welcome <br> j</h1>
		  <p class="mt-3 text-light w-75">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer typesetting, remaining essentially unchanged.</p>
		  <ul class="mb-0 mt-4">
		  <li class="d-inline-block"><a class="button" href="{{ route('movies.index') }}"><i class="fa fa-check-circle me-1 font_14"></i> More Info</a></li>
		   <li class="d-inline-block ms-2"><a class="button_1 " href="#"><i class="fa fa-check-circle me-1 font_14"></i> Get Ticket</a></li>
		</ul>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('template/img/imgi_3_WTTJ.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
          <h3 class="col_oran">Adventure Movie</h3>
		  <h1 class="text-white mt-3">welcome to  <br> Jungle</h1>
		  <p class="mt-3 text-light w-75">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer typesetting, remaining essentially unchanged.</p>
		  <ul class="mb-0 mt-4">
		  <li class="d-inline-block"><a class="button" href="{{ route('movies.index') }}"><i class="fa fa-check-circle me-1 font_14"></i> More Info</a></li>
		   <li class="d-inline-block ms-2"><a class="button_1 " href="#"><i class="fa fa-check-circle me-1 font_14"></i> Get Ticket</a></li>
		</ul>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
</div>

<section id="join" class="px_4 p_3">
 <div class="container-fluid">
   <div class="row join_1">
     <div class="col-md-4">
	   <div class="join_1l position-relative">
	     <div class="join_1li">
	      <img src="{{ asset('template/img/5.jpg') }}" class="w-100" alt="Join Now">
	   </div>
	     <div class="join_1li1 p-4 bg_backo position-absolute w-100 h-100 top-0">
		   <div class="join_1li1n row">
		     <div class="col-md-8">
			   <div class="join_1li1l">
			      <h6 class="text-light">Join Now</h6>
		   <h3 class="mb-0 text-white">Upcoming <br>
Film Festivals</h3>
			   </div>
			 </div>
			 <div class="col-md-4">
			   <div class="join_1li1r">
			     <span class="d-inline-block bg_oran text-white rounded-circle text-center font_50"><i class="fa fa-video-camera"></i></span>
			   </div>
			 </div>
		   </div>
	    </div>
	   </div>
	 </div>
	 <div class="col-md-4">
	   <div class="join_1l position-relative">
	     <div class="join_1li">
	      <img src="{{ asset('template/img/6.jpg') }}" class="w-100" alt="Join Now">
	   </div>
	     <div class="join_1li1 p-4 bg_backo position-absolute w-100 h-100 top-0">
		    <div class="join_1li1n row">
		     <div class="col-md-8">
			   <div class="join_1li1l">
			     <h6 class="text-light">Watch Now</h6>
		   <h3 class="mb-0 text-white">Watch Film
 <br>
Awards</h3>
			   </div>
			 </div>
			 <div class="col-md-4">
			   <div class="join_1li1r">
			     <span class="d-inline-block bg_oran text-white rounded-circle text-center font_50"><i class="fa fa-film"></i></span>
			   </div>
			 </div>
		   </div>
	    </div>
	   </div>
	 </div>
	 <div class="col-md-4">
	   <div class="join_1l position-relative">
	     <div class="join_1li">
	     <img src="{{ asset('template/img/6.jpg') }}" class="w-100" alt="Join Now">
	   </div>
	     <div class="join_1li1 p-4 bg_backo position-absolute w-100 h-100 top-0">
		   <div class="join_1li1n row">
		     <div class="col-md-8">
			   <div class="join_1li1l">
			   <h6 class="text-light">Get Ticket</h6>
		   <h3 class="mb-0 text-white">Comedy TV
 <br>
Shows</h3>
			   </div>
			 </div>
			 <div class="col-md-4">
			   <div class="join_1li1r">
			     <span class="d-inline-block bg_oran text-white rounded-circle text-center font_50"><i class="fa fa-microphone"></i></span>
			   </div>
			 </div>
		   </div>
	    </div>
	   </div>
	 </div>
   </div>
 </div>
</section>
<section id="trend" class="p_3 pt-0">
 <div class="container-xl">
   <div class="row trend_1 text-center mb-4">
      <div class="col-md-12">
        <span class="fa fa-film col_oran"></span>
        <h6 class="text-muted mt-3">Watch New Movies</h6>
        <h1 class="mb-0 font_50">All Movies</h1>
      </div>
   </div>
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
          </div>
      @empty
          <div class="col-md-12 text-center text-muted">No movies are currently added.</div>
      @endforelse
   </div>
 </div>
 <div class="row feat_3  border_1 p-3 mx-auto">
    <div class="col-md-9">
	  <div class="feat_3l mt-1">
	    <p class="mb-0"><span class="fs-5 col_oran fw-bold align-middle">23,00+</span> more comedy & horror movies you can explore</p>
	  </div>
	</div>
	<div class="col-md-3">
	  <div class="feat_3r text-end">
	    <h6 class="mb-0"><a class="button_2 p-2 px-3 font_14" href="{{ route('movies.index') }}">Explore Now</a></h6>
	  </div>
	</div>
   </div>
</section>

<section id="choose">
 <div class="choose_m bg_backo pt-5 pb-5 mb-3">
   <div class="container-xl">
    <div class="choose_1 row">
	  <div class="col-md-6 col-sm-6">
	     <div class="choose_1l">
		   <span class="fa fa-film col_oran"></span>
		<h6 class="text-white-50 mt-3">Documentary</h6>
		<h1 class="font_50 text-white">Movies Now Playing</h1>
		<p class="mt-3 text-white-50">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer typesetting, remaining essentially unchanged</p>
		<h6 class="mb-0 mt-4"><a class="button_1" href="{{ route('movies.index') }}">More Info</a></h6>
		 </div>
	  </div>
	  <div class="col-md-6 col-sm-6">
	     <div class="choose_1r text-center mt-5">
		   <h4 class="text-white mb-0">Watch the Trailer <span class="ms-2"><a class="col_oran" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#templateVideoModal"><i class="fa fa-play-circle align-middle"></i></a></span></h4>
		 </div>
	  </div>
	</div>
 </div>
 </div>
</section>
@endsection