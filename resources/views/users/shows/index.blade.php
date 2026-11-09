@extends('layout.app')
@section('title', 'Manage Shows')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-danger">Schedule Show</h3>
    @auth
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('admin.shows.create') }}" class="btn btn-primary">Schedule Show</a>
        @endif
    @endauth
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Movie</th>
            <th>Theatre</th>
            <th>Date</th>
            <th>Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($shows as $show)
            <tr>
                <td>{{ $show->movie->movie_name }}</td>
                <td>{{ $show->theatre->theatre_name }}</td>
                <td>{{ $show->show_date->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($show->show_time)->format('h:i A') }}</td>
                <td><a href="{{ route('shows.show', $show) }}" class="btn btn-sm btn-outline-primary">View</a></td>
                @auth
               @if (auth()->user()->role === 'admin')
                <td>
                    
                    <a href="{{ route('admin.shows.edit', $show) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <form method="POST" action="{{ route('admin.shows.destroy', $show) }}" class="d-inline" onsubmit="return confirm('Delete this show?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
                  @endif
           @endauth
            </tr>
        @empty
            <tr><td colspan="5" class="text-center text-muted">No Shows Shudule available.</td></tr>
        @endforelse
    </tbody>
</table>
        </div>
    </div>
</div>
@endsection