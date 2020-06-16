@extends('layout')
@section('content')
<div class="hero-wrap" style="background-image: url('/storage/images/{{ $blog->image }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Blog details</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog Details</h1>
        </div>
      </div>
    </div>
  </div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ftco-animate">
          <h2 class="mb-3">{{ $blog->title }}</h2>
          
          <p>
            <img src="/storage/images/{{ $blog->image }}" alt="" class="img-fluid">
          </p>
          <p>{!! $blog->description !!}</p>
         


        </div> <!-- .col-md-8 -->
        <div class="col-md-4 sidebar ftco-animate">
          <div class="sidebar-box ftco-animate">
            <h3>Recent Courses</h3>
            @foreach ($blogs as $item)
            <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(/storage/images/{{ $item->image }});"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">{!!substr(strip_tags($item->description),0,80,) !!}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{ $blog->created_at->diffForHumans() }}</a></div>
                    {{-- <div><a href="#"><span class="icon-person"></span> </a></div> --}}
                    {{-- <div><a href="#"><span class="icon-chat"></span> 19</a></div> --}}
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </section> <!-- .section -->
@endsection

@push('scripts')
    <script>
        
    </script>
@endpush