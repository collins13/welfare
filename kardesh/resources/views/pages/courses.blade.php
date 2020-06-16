@extends('layout')


@section('content')
<div class="hero-wrap" style="background-image: url('/storage/images/{{ App\Setting::find(1)->image3 }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Causes</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Causes</h1>
        </div>
      </div>
    </div>
  </div>

  
  <section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-md-4 ftco-animate">
              <div class="cause-entry">
                <a href="#" class="img" style="background-image: url(/storage/images/{{ $course->image }});"></a>
                <div class="text p-3 p-md-4">
                  <h3><a href="#">{{ $course->categories['title'] }}</a></h3>
                  <p>{!! substr(strip_tags($course->description),0,80,) !!}</p>
                  <span class="donation-time mb-3 d-block">{{ App\Donate::where('cat_id', $course->cat_id)->first()->created_at->diffForHumans()}}</span>
                  <div class="progress custom-progress-success">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="fund-raised d-block"><span class="text-success">{{ App\Donate::where('cat_id', $course->cat_id)->sum('amount') ? App\Donate::where('cat_id', $course->cat_id)->sum('amount') : 0}}</span> raised of ${{ $course->Amount }}</span><hr>
                  <a href="{{ route('course_details', $course->id) }}" class="text center">Read more and Donate <i class="ion-ios-arrow-forward"></i></a>
                </div>
              </div>
            </div>
              @endforeach

      </div>
      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li class="active"><span>{{ $courses->links() }}</span></li>
            </ul>
          </div>
        </div>
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
            <input type="text" name="name" class="form-control" placeholder="Your Name">
          </div>
          <div class="form-group">
            <input type="email" name="email"  class="form-control" placeholder="Your Email">
          </div>
          <div class="form-group">
            <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Message"></textarea>
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