@extends('layout.admin')
@section('title', 'All Bookings')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 my-4">
            <h3 class="mb-4">All Bookings</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>User</th>
            <th>Movie</th>
            <th>Theatre</th>
            <th>Class</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($bookings as $booking)
            <tr>
                <td>{{ $booking->user->full_name }}</td>
                <td>{{ $booking->show->movie->movie_name }}</td>
                <td>{{ $booking->show->theatre->theatre_name }}</td>
                <td>{{ $booking->seat_class }}</td>
                <td>Rs. {{ number_format($booking->total_amount, 2) }}</td>
                <td>{{ $booking->booking_status }}</td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center text-muted">Currently no booking</td></tr>
        @endforelse
    </tbody>
</table>
        </div>
    </div>
</div>
@endsection