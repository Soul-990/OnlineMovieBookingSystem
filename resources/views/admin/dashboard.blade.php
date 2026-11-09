@extends('layout.admin')
@section('title', 'Admin Dashboard')

@section('content')
@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row g-3 my-3" >
                <h3 class="mb-4 text-danger">Admin Dashboard</h3>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-dark">{{ $stats['total_users'] }}</h4>
                <small class="text-muted">Total Users</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-dark">{{ $stats['total_movies'] }}</h4>
                <small class="text-muted">Total Movies</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-dark">{{ $stats['total_theatres'] }}</h4>
                <small class="text-muted">Total Theatres</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body ">
                <h4 class="text-dark">{{ $stats['total_bookings'] }}</h4>
                <small class="text-muted">Total Bookings</small>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
@endsection