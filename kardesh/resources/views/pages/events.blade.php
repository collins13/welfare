@extends('layout')


@section('content')
<div class="hero-wrap" style="background-image: url('/storage/images/{{ App\Setting::find(1)->image7 }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Event</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Events</h1>
        </div>
      </div>
    </div>
  </div>

  
  <section class="ftco-section">
    <div class="container">
      <div class="row">
        @if(count($events) > 0)
        @foreach ($events as $event)
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20" style="background-image: url('/storage/images/{{ $event->image }}');">
          </a>
          <div class="text p-4 d-block">
              <div class="meta mb-3">
              <div><a href="#">{{ Carbon\Carbon::parse($event->created_at)->isoFormat('dddd, MMMM Do YYYY') }}</a></div>
              {{-- <div><a href="#">{{ $event->created_by }}</a></div> --}}
              <div><a href="#" class="meta-chat"></a></div>
            </div>
            <h3 class="heading mb-4"><a href="#">{{ $event->agenda }}</a></h3>
            <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> {{ $event->time }}</span> <span><i class="icon-map-o"></i> {{$event->venue}}</span></p>
            <p>{{ Str::limit($event->description, 80) }}</p>
            <p><a href="event.html">Read more and Join Event <i class="ion-ios-arrow-forward"></i></a></p>
          </div>
        </div>
      </div>
               
        @endforeach
        @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Holy guacamole!</strong> There Re no Events Yet.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

      </div>
      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li class="active"><span>{{ $events->links() }}</span></li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
      
@endsection

@push('scripts')
    
@endpush