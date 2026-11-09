<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payments;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Auth::user()->bookings()->with(['show.movie', 'show.theatre'])->latest()->get();
        return view('users.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Show $show)
    {
        return view('users.bookings.create', compact('show'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Show $show)
    {
        $validated = $request->validate([
            'seat_class' => ['required', 'in:Gold,Platinum,Box'],
            'adult_tickets' => ['required', 'integer', 'min:0'],
            'kid_tickets' => ['required', 'integer', 'min:0'],
            'payment_method' => ['required', 'in:Cash,Card,EasyPaisa,Jazzcash']
        ]);

        $totalTickets = $validated['adult_tickets'] + $validated['kid_tickets'];

        if ($totalTickets < 1) {
            return back()->withErrors(['adult_tickets' => 'please atleast buy one ticket thank you!']);
        }

        $price = match ($validated['seat_class']) {
            'Gold' => $show->gold_price,
            'Platinum' => $show->platinum_price,
            'Box' => $show->box_price
        };

        $totalamount = ($validated['adult_tickets'] * $price) + ($validated['kid_tickets'] * $price * 0.5);

      $booking =  Booking::create([
            'user_id' => Auth::id(),
            'show_id' => $show->show_id,
            'seat_class' => $validated['seat_class'],
            'adult_tickets' => $validated['adult_tickets'],
            'kid_tickets' => $validated['kid_tickets'],
            'total_amount' => $totalamount,
            'booking_status' => 'Booked'
        ]);

        Payments::create([
            'booking_id' => $booking->booking_id,
            'amount' => $totalamount,
            'payment_method' => $validated['payment_method'],
            'payment_status' => 'Paid',
        ]);

        return redirect()->route('bookings.index')->with('status', 'Booked Sucessfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function cancel(Booking $booking)
    {
        if ($booking->user_id != Auth::user()->user_id) {
            abort(403);
        }

        $booking->update([
            'booking_status' => 'Cancelled',
        ]);

        return back()->with('status', 'Successfully cancelled your ticket.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
