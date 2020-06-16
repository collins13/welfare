@extends('layout')

@section('content')
<div class="hero-wrap" style="background-image: url('/storage/images/{{ App\Setting::find(1)->image1 }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Doing Nothing is Not An Option of Our Life</h1>

          <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="https://vimeo.com/45830194" class="btn btn-white btn-outline-white px-4 py-3 popup-vimeo"><span class="icon-play mr-2"></span>Watch Video</a></p>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-counter ftco-intro" id="section-counter">
      <div class="container">
          <div class="row no-gutters">
              <div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 color-1 align-items-stretch">
            <div class="text">
                <span>Served Over</span>
              <strong class="number" data-number="1432805">0</strong>
              <span>Children in 190 countries in the world</span>
            </div>
          </div>
        </div>
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 color-2 align-items-stretch">
            <div class="text">
                <h3 class="mb-4">Donate Money</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                <p><a href="{{ route('donate') }}" class="btn btn-white px-3 py-2 mt-2">Donate Now</a></p>
            </div>
          </div>
        </div>
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 color-3 align-items-stretch">
            <div class="text">
                <h3 class="mb-4">Be a Volunteer</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                <p><a href="#" id="vol" class="btn btn-white px-3 py-2 mt-2">Be A Volunteer</a></p>
            </div>
          </div>
        </div>
          </div>
      </div>
  </section>

  <section class="ftco-section">
      <div class="container">
          <div class="row">
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 d-flex services p-3 py-4 d-block">
            <div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
            <div class="media-body pl-4">
              <h3 class="heading">Make Donation</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 d-flex services p-3 py-4 d-block">
            <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
            <div class="media-body pl-4">
              <h3 class="heading">Become A Volunteer</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 d-flex services p-3 py-4 d-block">
            <div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
            <div class="media-body pl-4">
              <h3 class="heading">Sponsorship</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>    
        </div>
      </div>
      </div>
  </section>


  <section class="ftco-section bg-light">
      <div class="container-fluid">
          <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-5 heading-section ftco-animate text-center">
          <h2 class="mb-4">Our Causes</h2>
          {{-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> --}}
        </div>
      </div>
          <div class="row">
              <div class="col-md-12 ftco-animate">
                  <div class="carousel-cause owl-carousel">
                    @if (count($courses) > 0)
                    @foreach ($courses as $course)
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(/storage/images/{{ $course->image }});"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">{{ $course->categories['title'] }}</a></h3>
                                  <p>{!! substr(strip_tags($course->description),0,80,) !!}</p>
                                  <span class="donation-time mb-3 d-block">{{ App\Donate::where('cat_id', $course->cat_id)->first()->created_at->diffForHumans()}}</span>
                      <div class="progress custom-progress-success">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                          
                     
                      <span class="fund-raised d-block"><span class="text-success f_amt">{{ App\Donate::where('cat_id', $course->cat_id)->sum('amount') ? App\Donate::where('cat_id', $course->cat_id)->sum('amount') : 0}}</span> raised of ${{ $course->Amount }}</span><hr>
                      <a href="{{ route('course_details', $course->id) }}" class="text center">Read more and Donate <i class="ion-ios-arrow-forward"></i></a>
                              </div>
                          </div>
                      </div>
                      @endforeach
                      @endif
                  
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Latest Donations</h2>
         
        </div>
      </div>
      <div class="row">
        @foreach ($donates as $donate)
        <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
          <div class="staff">
              <div class="d-flex mb-4">
                  <div class="img" style="background-image: url(/base/assets/img/images.jpeg);"></div>
                  <div class="info ml-4">
                      <h3><a href="teacher-single.html">{{ $donate->name }}</a></h3>
                      <span class="position">{{ $donate->created_at->diffForHumans() }}</span>
                      <div class="text">
                          <p>Donated <span>${{ $donate->amount }}</span> for <a href="#">{{ $donate->categories['title'] }}</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
          @endforeach
      </div>
    </div>
  </section>

  <section class="ftco-gallery">
      <div class="d-md-flex row">
          @foreach ($gallaries as $galla)
          <a href="/storage/images/{{ $galla->image }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/storage/images/{{ $galla->image}});">
            <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-search"></span>
            </div>
        </a>
        @endforeach
      </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Recent from blog</h2>
        </div>
      </div>
      <div class="row d-flex">
        @foreach ($blogs as $blog)
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20" style="background-image: url('/assets/images/image_1.jpg');">
          </a>
          <div class="text p-4 d-block">
              <div class="meta mb-3">
              <div><a href="#">{{ Carbon\Carbon::parse($donate->created_at)->isoFormat('dddd, MMMM Do YYYY') }}</a></div>
              <div><a href="#">{{ $blog->created_by }}</a></div>
              {{-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> --}}
            </div>
            <h3 class="heading mt-3"><a href="#">{{ $blog->title }}</a></h3>
            <p>{!! substr(strip_tags($blog->description),0,80) !!}</p><hr>
            <a href="{{ route('blog_details', $blog->id) }}" class="btn btn-primary btn-block">Read More</a>
          </div>
        </div>
      </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Our Latest Events</h2>
        </div>
      </div>
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
            <p>{!! substr(strip_tags($event->description),0,80,)  !!}</p>
            <p><a href="{{ route('event_detail', $event->id) }}">Read more and Join Event <i class="ion-ios-arrow-forward"></i></a></p>
          </div>
        </div>
      </div>
               
        @endforeach
        @endif
          
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

  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="volModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Be a volunteer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('volunter') }}" method="POST">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </div>
  </form>
      </div>
    
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
         $("#vol").click(function(){
           $("#volModal").modal("show")
         })
        })
    </script>
@endpush