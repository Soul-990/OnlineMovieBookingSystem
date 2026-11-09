@extends('layout.app')
@section('title', 'Theatres')
@section('heading', 'Theatres')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 class="my-3">All Theatres that are Availiable!!!</h4>
        </div>
    </div>
</div>
<section id="theatres" class="p_3">
 <div class="container-xl">
   @auth
       @if (auth()->user()->role === 'admin')
           <div class="mb-4 text-end">
               <a href="{{ route('admin.theatre.create') }}" class="button p-2 px-3">+ Add Theatre</a>
           </div>
       @endif
   @endauth

   <div class="row g-4">
      @forelse ($theatres as $theatre)
          <div class="col-md-4">
            <div class="feat_2i2 bg-dark text-white shadow_box p-4 h-100">
              <h5>{{ $theatre->theatre_name }}</h5>
              <h6 class="font_14 mt-2 text-muted"><i class="fa fa-map-marker col_oran me-1"></i> {{ $theatre->city }}</h6>
              <p class="mt-2 mb-2 small">{{ $theatre->address }}</p>
              @if ($theatre->contact_no)
                  <p class="small text-muted mb-3"><i class="fa fa-phone col_oran me-1"></i> {{ $theatre->contact_no }}</p>
              @endif
              <a href="{{ route('theatre.show', $theatre) }}" class="button_1 p-2 px-3 font_14">View Details</a>

              @auth
                  @if (auth()->user()->role === 'admin')
                      <div class="mt-2">
                          <a href="{{ route('admin.theatre.edit', $theatre) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                          <form method="POST" action="{{ route('admin.theatre.destroy', $theatre) }}" class="d-inline" onsubmit="return confirm('Delete this theatre?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-outline-danger">Delete</button>
                          </form>
                      </div>
                  @endif
              @endauth
            </div>
          </div>
      @empty
          <div class="col-md-12 text-center text-muted py-5">No theatres found.</div>
      @endforelse
   </div>
 </div>
</section>
@endsection