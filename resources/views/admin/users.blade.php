@extends('layout.admin')
@section('title', 'All Users')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="m-4 text-danger">Registered Users</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Joined</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->full_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->created_at->format('d M Y') }}</td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center text-muted">No users Register yet!</td></tr>
        @endforelse
    </tbody>
</table>
        </div>
    </div>
</div>
@endsection