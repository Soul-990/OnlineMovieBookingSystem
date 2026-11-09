<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Show;
use App\Models\Theatre;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_movies' => Movie::count(),
            'total_theatres' => Theatre::count(),
            'total_shows' => Show::count(),
            'total_bookings' => Booking::where('booking_status', 'Booked')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        $users = User::where('role', 'user')->latest()->get();

        return view('admin.users', compact('users'));
    }

    public function bookings()
    {
        $bookings = Booking::with(['user', 'show.movie', 'show.theatre'])->latest()->get();

        return view('admin.bookings', compact('bookings'));
    }
}
