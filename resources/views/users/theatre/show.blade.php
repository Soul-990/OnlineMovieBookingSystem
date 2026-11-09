@extends('layout.app')
@section('title', $theatre->theatre_name)
@section('heading', $theatre->theatre_name)

@section('content')
<section id="detail" class="p_3 bg-dark">
 <div class="container">
   <div class="card shadow border-0">
    <div class="card-body p-5 ">
      <h4>{{ $theatre->theatre_name }}</h4>
          <p class="mb-3">
             <i class="fa fa-map-marker text-danger me-2"></i>
              <strong>Address:</strong>
              {{ $theatre->address }}, {{ $theatre->city }}
          </p>
   @if ($theatre->contact_no)
   
       <p><i class="fa fa-phone col_oran me-1"></i> {{ $theatre->contact_no }}</p>
   @endif
    </div>
   </div>
 </div>
</section>
@endsection