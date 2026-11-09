@extends('layout.app')
@section('title', 'My Profile')
@section('heading', 'My Profile')

@section('content')
<section id="login" class="p_3">
 <div class="container-xl">
  <div class="row g-4">
    <div class="col-md-6">
      <div class="login_1m p-4 bg-light">
        <h5 class="mb-3">Update Profile</h5>
        <form method="POST" action="{{ route('profile.update') }}">
          @csrf
          @method('PUT')
          <h6 class="mb-2 fw-bold">Full Name</h6>
          <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}" class="form-control mb-3" required>
          <h6 class="mb-2 fw-bold">Email</h6>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control mb-3" required>
          <h6 class="mb-2 fw-bold">Phone</h6>
          <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control mb-3">
          <button type="submit" class="button_2">Save Changes</button>
        </form>
      </div>
    </div>
    <div class="col-md-6">
      <div class="login_1m p-4 bg-light">
        <h5 class="mb-3">Change Password</h5>
        <form method="POST" action="{{ route('profile.password') }}">
          @csrf
          @method('PUT')
          <h6 class="mb-2 fw-bold">Current Password</h6>
          <input type="password" name="current_password" class="form-control mb-3" required>
          <h6 class="mb-2 fw-bold">New Password</h6>
          <input type="password" name="password" class="form-control mb-3" required>
          <h6 class="mb-2 fw-bold">Confirm New Password</h6>
          <input type="password" name="password_confirmation" class="form-control mb-3" required>
          <button type="submit" class="button">Update Password</button>
        </form>
      </div>
    </div>
  </div>
 </div>
</section>
@endsection