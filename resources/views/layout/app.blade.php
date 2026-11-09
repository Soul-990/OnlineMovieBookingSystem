<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Movie Booking System')</title>
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/list.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>
    @stack('styles')
</head>
<div class="main_o main">
 <div class="main_o1 bg_back">
   <section id="header">
    <nav class="navbar navbar-expand-md navbar-light px_4" id="navbar_sticky">
  <div class="container-fluid">
    <a class="navbar-brand p-0 fw-bold text-white" href="{{ route('home') }}"><i class="fa fa-modx col_oran"></i> MovieBooking</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-0 ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('movies.*') ? 'active' : '' }}" href="{{ route('movies.index') }}">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('theatre.*') ? 'active' : '' }}" href="{{ route('theatre.index') }}">Theatres</a>
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link {{ request()->routeIs('theatre.*') ? 'active' : '' }}" href="{{ route('theatre.index') }}">Theatres</a> --}}
          <a href="{{ route('shows.index') }}" class="nav-item nav-link">
        <i class="fa fa-video me-2"></i>Shows</a>
        </li>
        </li>
        
        @auth
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}" href="{{ route('bookings.index') }}">My Bookings</a>
            </li>
            @if (auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Panel</a>
                </li>
            @endif
        @endauth
      </ul>
      <ul class="navbar-nav mb-0 ms-auto">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        @endguest
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle drop_icon" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i> {{ auth()->user()->full_name }}
                </a>
                <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdownUser">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fa fa-chevron-right font_12 me-1"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('bookings.index') }}"><i class="fa fa-chevron-right font_12 me-1"></i> My Bookings</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="px-3 py-1">
                            @csrf
                            <button type="submit" class="dropdown-item border-0 p-0 text-start"><i class="fa fa-chevron-right font_12 me-1"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
</section>
 </div>
</div>


@if (session('status'))
    <div class="container-xl mt-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="container-xl mt-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

@yield('content')
<section id="footer" class="p_3 bg-black">
 <div class="container-xl">
    <div class="footer_1 row pb-4">
      <div class="col-md-3">
       <div class="footer_1l">
         <h4 class="mb-0"><a class="fw-bold text-white" href="{{ route('home') }}"><i class="fa fa-modx col_oran"></i> MovieBooking</a></h4>
       </div>
      </div>
      <div class="col-md-9">
       <div class="footer_1r text-end">
         <ul class="mb-0">
           <li class="d-inline-block"><a class="text-white-50 a_tag" href="{{ route('movies.index') }}">Movies</a></li>
           <li class="d-inline-block text-white-50">/</li>
           <li class="d-inline-block me-2"><a class="text-white-50 a_tag" href="{{ route('theatre.index') }}">Theatres</a></li>
           <li class="d-inline-block"><a class="social_icon" href="#"><i class="fa fa-twitter"></i></a></li>
           <li class="d-inline-block"><a class="social_icon" href="#"><i class="fa fa-facebook"></i></a></li>
           <li class="d-inline-block"><a class="social_icon" href="#"><i class="fa fa-instagram"></i></a></li>
         </ul>
       </div>
      </div>
    </div>
    <div class="footer_2 row mt-4">
      <div class="col-md-3">
       <div class="footer_2i">
         <p class="text-white fw-bold fs-5">Buy movie tickets easily, book your favorite show in seconds.</p>
         <h6 class="mb-0 mt-4"><a class="button" href="{{ route('movies.index') }}">Get Your Ticket</a></h6>
       </div>
      </div>
      <div class="col-md-3">
       <div class="footer_2i">
         <h5 class="col_oran mb-4">Quick Links</h5>
         <div class="row footer_1ism">
             <h6 class="fw-normal col-md-12 col-6"><a class="text-white-50 a_tag" href="{{ route('home') }}">Home</a></h6>
             <h6 class="fw-normal mt-2 col-md-12 col-6"><a class="text-white-50 a_tag" href="{{ route('movies.index') }}">Movies</a></h6>
             <h6 class="fw-normal mt-2 col-md-12 col-6"><a class="text-white-50 a_tag" href="{{ route('theatre.index') }}">Theatres</a></h6>
             @auth
                 <h6 class="fw-normal mt-2 col-md-12 col-6"><a class="text-white-50 a_tag" href="{{ route('bookings.index') }}">My Bookings</a></h6>
             @endauth
         </div>
       </div>
      </div>
      <div class="col-md-3">
       <div class="footer_2i">
         <h5 class="col_oran mb-4">Account</h5>
         <div class="row footer_1ism">
             @guest
                 <h6 class="fw-normal col-md-12 col-6"><a class="text-white-50 a_tag" href="{{ route('login') }}">Login</a></h6>
                 <h6 class="fw-normal mt-2 col-md-12 col-6"><a class="text-white-50 a_tag" href="{{ route('register') }}">Register</a></h6>
             @else
                 <h6 class="fw-normal col-md-12 col-6"><a class="text-white-50 a_tag" href="{{ route('profile.edit') }}">Profile</a></h6>
             @endguest
         </div>
       </div>
      </div>
      <div class="col-md-3">
       <div class="footer_2i">
         <h5 class="col_oran mb-4">Newsletter</h5>
         <p class="text-white-50">Subscribe for the latest movie updates.</p>
         <div class="input-group bg-white">
            <input type="text" class="form-control bg-transparent rounded-0 border-0" placeholder="Enter Your Email">
            <span class="input-group-btn">
                <button class="btn btn-primary bg-transparent rounded-0 border-0 col_oran p-3" type="button">
                    <i class="fa fa-location-arrow"></i></button>
            </span>
         </div>
       </div>
      </div>
    </div>
 </div>
</section>

<section id="footer_b" class="pt-3 pb-3 bg-dark">
 <div class="container-xl">
  <div class="footer_b1 row text-center">
    <div class="col-md-12">
      <p class="mb-0 text-white-50">&copy; {{ date('Y') }} MovieBooking System. All Rights Reserved.</p>
    </div>
  </div>
 </div>
</section>
<script src="{{ asset('template/js/common.js') }}"></script>
@stack('scripts')
</body>
</html>