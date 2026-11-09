@extends('layout.app')
@section('title', 'My Bookings')
@section('heading', 'My Bookings')

@section('content')
<section id="mybookings" class="p_3">
    <div class="container-xl">
        <div class="row">
            @forelse($bookings as $booking)
            <div class="col-lg-6 mb-4">
                <div class="card booking_card shadow-sm border-0 h-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $booking->show->movie->poster) }}" class="img-fluid h-100 rounded-start object-fit-cover" alt="{{ $booking->show->movie->movie_name }}">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body d-flex flex-column h-100">

                                <h4 class="mb-3">
                                    {{ $booking->show->movie->movie_name }}
                                </h4>

                                <p><i class="fa fa-building me-2"></i>
                                    {{ $booking->show->theatre->theatre_name }}
                                </p>

                                <p><i class="fa fa-calendar me-2"></i>
                                    {{ $booking->show->show_date }}
                                </p>

                                <p><i class="fa fa-clock-o me-2"></i>
                                    {{ $booking->show->show_time }}
                                </p>

                                <p><strong>Class:</strong> {{ $booking->seat_class }}</p>

                                <p><strong>Tickets:</strong>
                                    {{ $booking->adult_tickets }} Adult,
                                    {{ $booking->kid_tickets }} Kid
                                </p>

                                <p class="fw-bold">
                                    Rs. {{ number_format($booking->total_amount,2) }}
                                </p>

                                <div class="mt-auto">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <span class="badge bg-{{ $booking->booking_status=='Booked' ? 'success' : 'danger' }}">
            {{ $booking->booking_status }}
        </span>

        @if ($booking->payment)
            <span class="badge bg-info">{{ $booking->payment->payment_method }} — {{ $booking->payment->payment_status }}</span>
        @endif
    </div>

    @if($booking->booking_status=='Booked')
    <form method="POST"
          action="{{ route('bookings.cancel',$booking) }}"
          onsubmit="return confirm('Cancel this booking?')">
        @csrf
        <button class="btn btn-outline-danger btn-sm">Cancel</button>
    </form>
    @endif
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No bookings yet.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection