<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TheatreController;
use App\Http\Controllers\Admin\DashboardController;

//Home //
Route::get('/', [HomeController::class, 'index'])->name('home');

//Authication//
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//public//
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/about', function () {
    return view('users.about');
})->name('about');

//Public Theatre//
Route::get('/theatres', [TheatreController::class, 'index'])->name('theatre.index');
Route::get('/theatres/{theatre}', [TheatreController::class, 'show'])->name('theatre.show');

//Routes for logged users //
Route::middleware('auth')->group(function () {
    Route::get('/shows/{show}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/shows/{show}/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/my-booking', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');
    Route::get('/shows/{show}', [ShowController::class, 'show'])->name('shows.show');
    Route::post('/movies/{movie}/review', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    //profile//
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

//Admin//

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::get('/bookings', [DashboardController::class, 'bookings'])->name('bookings');

    //movies//
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

    //theatre//
    Route::get('/theatres/create', [TheatreController::class, 'create'])->name('theatre.create');
    Route::post('/theatres', [TheatreController::class, 'store'])->name('theatre.store');
    Route::get('/theatres/{theatre}/edit', [TheatreController::class, 'edit'])->name('theatre.edit');
    Route::put('/theatres/{theatre}', [TheatreController::class, 'update'])->name('theatre.update');
    Route::delete('/theatres/{theatre}', [TheatreController::class, 'destroy'])->name('theatre.destroy');

    //shows//
    Route::get('/shows/create', [ShowController::class, 'create'])->name('shows.create');
    Route::post('/shows', [ShowController::class, 'store'])->name('shows.store');
    Route::get('/shows/{show}/edit', [ShowController::class, 'edit'])->name('shows.edit');
    Route::put('/shows/{show}', [ShowController::class, 'update'])->name('shows.update');
    Route::delete('/shows/{show}', [ShowController::class, 'destroy'])->name('shows.destroy');
});
