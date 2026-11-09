@extends('layout.app')
@section('title', 'Book Tickets')
@section('heading', 'Book Tickets')

@section('content')
<section id="login" class="p_3">
 <div class="container-xl">
  <div class="row login_1">
    <div class="col-md-12">
      <div class="login_1m p-5 px-4 bg-light w-50 mx-auto">
        <h4 class="mb-1">{{ $show->movie->movie_name }}</h4>
        <p class="text-muted mb-4">
          {{ $show->theatre->theatre_name }} &middot;
          {{ $show->show_date->format('d M Y') }} &middot;
          {{ \Carbon\Carbon::parse($show->show_time)->format('h:i A') }}
        </p>

        <form method="POST" action="{{ route('bookings.store', $show) }}" id="bookingForm">
          @csrf

          <h6 class="mb-3 fw-bold">Seat Class</h6>
          <select name="seat_class" id="seatClass" class="form-select" required>
            <option value="Gold" data-price="{{ $show->gold_price }}">Gold - Rs. {{ number_format($show->gold_price, 2) }}</option>
            <option value="Platinum" data-price="{{ $show->platinum_price }}">Platinum - Rs. {{ number_format($show->platinum_price, 2) }}</option>
            <option value="Box" data-price="{{ $show->box_price }}">Box - Rs. {{ number_format($show->box_price, 2) }}</option>
          </select>

          <div class="row mt-4">
            <div class="col-6">
              <h6 class="mb-3 fw-bold">Adult Tickets</h6>
              <input type="number" name="adult_tickets" id="adultTickets" class="form-control" value="1" min="0" required>
            </div>
            <div class="col-6">
              <h6 class="mb-3 fw-bold">Kid Tickets <small class="text-muted">(50%)</small></h6>
              <input type="number" name="kid_tickets" id="kidTickets" class="form-control" value="0" min="0" required>
            </div>
          </div>
          <div>
            <h6 class="mb-3 fw-bold">Payment Method</h6>
            <select name="payment_method" class="form-select" required>
              <option value="Cash">Cash</option>
              <option value="Card">Card</option>
              <option value="EasyPaisa">EasyPaisa</option>
              <option value="JazzCash">JazzCash</option>
            </select>
          </div>

          <div class="d-flex justify-content-between align-items-center mt-4 p-3 bg-white border rounded">
            <span class="fw-bold">Total Bill</span>
            <span id="totalBill" class="fs-5 col_oran fw-bold">Rs. 0.00</span>
          </div>

          <h6 class="mt-4 center_sm"><button type="submit" class="button_2 d-block w-100 text-center border-0">Confirm Booking</button></h6>
        </form>
      </div>
    </div>
  </div>
 </div>
</section>

@push('scripts')
<script>
    function calculateTotal() {
        const select = document.getElementById('seatClass');
        const option = select.options[select.selectedIndex];
        const price = parseFloat(option.dataset.price);
        const adults = parseInt(document.getElementById('adultTickets').value) || 0;
        const kids = parseInt(document.getElementById('kidTickets').value) || 0;
        const total = (adults * price) + (kids * price * 0.5);
        document.getElementById('totalBill').textContent = 'Rs. ' + total.toFixed(2);
    }
    document.getElementById('seatClass').addEventListener('change', calculateTotal);
    document.getElementById('adultTickets').addEventListener('input', calculateTotal);
    document.getElementById('kidTickets').addEventListener('input', calculateTotal);
    calculateTotal();
</script>
@endpush
@endsection