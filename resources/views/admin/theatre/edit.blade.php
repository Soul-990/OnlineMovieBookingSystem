@extends('layout.admin')
@section('title', 'Edit Theatre')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="m-4 text-danger">Edit Theatre</h3>
<form method="POST" action="{{ route('admin.theatre.update', $theatre) }}">
     @csrf
    @method('PUT')
   
<div class="mb-3">
    <label class="form-label">Theatre Name</label>
    <input type="text" name="theatre_name" value="{{ old('theatre_name', $theatre->theatre_name ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label class="form-label">City</label>
    <input type="text" name="city" value="{{ old('city', $theatre->city ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label class="form-label">Address</label>
    <textarea name="address" class="form-control" rows="2" required>{{ old('address', $theatre->address ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Contact Number</label>
    <input type="text" name="contact_no" value="{{ old('contact_no', $theatre->contact_no ?? '') }}" class="form-control">
</div>
    <button type="submit" class="btn btn-primary">Update Theatre</button>
</form>
        </div>
    </div>
</div>
@endsection