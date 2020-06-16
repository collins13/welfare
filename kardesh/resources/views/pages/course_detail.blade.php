@extends('layout')
@section('content')
<div class="hero-wrap" style="background-image: url('/storage/images/{{ $course->image }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Course details</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Course Details</h1>
        </div>
      </div>
    </div>
  </div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ftco-animate">
          <h2 class="mb-3">{{ $course->categories['title'] }}</h2>
          
          <p>
            <img src="/storage/images/{{ $course->image }}" alt="" class="img-fluid">
          </p>
          <p>{!! $course->description !!}</p>
         


        </div> <!-- .col-md-8 -->
        <div class="col-md-4 sidebar ftco-animate">
          <div class="sidebar-box ftco-animate">
            <div class="categories">
                <h3>Donate For This Course</h3><hr>
             
                  <form action="{{ route('payment') }}" method="POST">
                      @csrf
                <div class="row">
                  <div class="col-md-12">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control" required>
                  </div>
                  <input type="hidden" name="cat" id="cat" value="{{ $course->categories['id'] }}">
                  <input type="hidden" name="plan" id="plan" value="General Plan">
                  <input type="hidden" name="d_id" id="d_id" value="">
                 
                <div class="col-md-12">
                    <label for="name">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label for="name">Amount Donating</label>
                    <input type="number" name="amount" id="amount" class="form-control" required>
                </div>
            </div><br>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
            
            </div>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>Recent Courses</h3>
            @foreach ($courses as $item)
            <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(/storage/images/{{ $item->image }});"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">{!!substr(strip_tags($course->description),0,80,) !!}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, MMMM Do YYYY') }}</a></div>
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
        $(document).ready(function(){
            var id = $("#cat").val();
            $.ajax({
                    url:"{{ route('get_d') }}",
                    type:"get",
                    data:{'id': id},
                    success:function(res){
                        $("#d_id").val(res.d.d_id);
                    },
                    error:function(err){
                        toastr.error("error", "an error occured");
                    }
                })
        })
    </script>
@endpush