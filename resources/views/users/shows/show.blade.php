@extends('layout.app')
@section('title', 'Show Details')
@section('heading', $show->movie->movie_name)

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <section id="detail" class="p_3">
 <div class="container-xl">
  <div class="login_1m p-4 bg-light">
    <h4>{{ $show->movie->movie_name }}</h4>
    <p class="text-muted mb-1"><i class="fa fa-map-marker col_oran me-1"></i> {{ $show->theatre->theatre_name }}, {{ $show->theatre->city }}</p>
    <p class="mb-3">
      <i class="fa fa-calendar col_oran me-1"></i> {{ $show->show_date->format('D, d M Y') }}
      &middot; <i class="fa fa-clock-o col_oran me-1 ms-2"></i> {{ \Carbon\Carbon::parse($show->show_time)->format('h:i A') }}
    </p>

    <table class="table table-bordered bg-white w-auto">
      <thead>
        <tr><th>Class</th><th>Price</th></tr>
      </thead>
      <tbody>
        <tr><td>Gold</td><td>Rs. {{ number_format($show->gold_price, 2) }}</td></tr>
        <tr><td>Platinum</td><td>Rs. {{ number_format($show->platinum_price, 2) }}</td></tr>
        <tr><td>Box</td><td>Rs. {{ number_format($show->box_price, 2) }}</td></tr>
      </tbody>
    </table>

    @auth
        <a href="{{ route('bookings.create', $show) }}" class="button d-inline-block text-center">Book Tickets</a>
    @else
        <a href="{{ route('login') }}" class="button d-inline-block text-center">Login to Book Tickets</a>
    @endauth
  </div>
 </div>
</section>
    </div>
  </div>
</div>
@endsection