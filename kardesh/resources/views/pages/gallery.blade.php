@extends('layout')


@section('content')
<div class="hero-wrap" style="background-image: url('/storage/images/{{ App\Setting::find(1)->image6 }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Gallery</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Galleries</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-gallery">
    
      <div class="container">
        <div class="d-md-flex row">
        @foreach ($gallaries as $galla)
         
              <a href="/storage/images/{{ $galla->image }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/storage/images/{{ $galla->image }});">
                  <div class="icon d-flex justify-content-center align-items-center">
                      <span class="icon-search"></span>
                  </div>
              </a>
          @endforeach
      </div>
      </div>
   
  </section>

  <section class="ftco-section-3 img" style="background-image: url(/assets/images/bg_3.jpg);">
      <div class="overlay"></div>
      <div class="container">
          <div class="row d-md-flex">
          <div class="col-md-6 d-flex ftco-animate">
              <div class="img img-2 align-self-stretch" style="background-image: url(/assets/images/bg_4.jpg);"></div>
          </div>
          <div class="col-md-6 volunteer pl-md-5 ftco-animate">
              <h3 class="mb-3">Be a volunteer</h3>
              <form action="{{ route('volunter') }}" method="POST" class="volunter-form">
                @csrf
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email"  class="form-control" placeholder="Your Email" required>
          </div>
          <div class="form-group">
            <textarea name="message" id="" cols="30" rows="10" class="form-control" required placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-white py-3 px-5">
          </div>
        </form>
          </div>    			
          </div>
      </div>
  </section>

@endsection

@push('scripts')
    
@endpush