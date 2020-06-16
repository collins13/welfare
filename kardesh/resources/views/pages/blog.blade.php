@extends('layout')


@section('content')
<div class="hero-wrap" style="background-image: url('/storage/images/{{ App\Setting::find(1)->image5 }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Blog</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog</h1>
        </div>
      </div>
    </div>
  </div>

  
  <section class="ftco-section">
    <div class="container">
      <div class="row d-flex">
        @foreach ($blogs as $blog)
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20" style="background-image: url('/assets/images/image_1.jpg');">
          </a>
          <div class="text p-4 d-block">
              <div class="meta mb-3">
              <div><a href="#">{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('dddd, MMMM Do YYYY') }}</a></div>
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
      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li class="active"><span>{{ $blogs->links() }}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
      
@endsection