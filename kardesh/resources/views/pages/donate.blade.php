@extends('layout')


@section('content')
    
<div class="hero-wrap" style="background-image: url('/assets/images/bg_6.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Donate</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Donations</h1>
        </div>
      </div>
    </div>
  </div>

  
  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            @foreach ($plans as $plan)
                
            <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
                <div class="card" style="width: 18rem;">
                    <h1 class="ml-auto mr-auto mt-4 mb-4">${{ $plan->amount }}</h1>
                    <div class="card-body">
                        <h4 class="text-center">{{ $plan->name }}</h4><hr>
                        <ul>
                            <li> <i class="fa fa-check" aria-hidden="true"></i> Food For Childrens</li>
                            <li> <i class="fa fa-check" aria-hidden="true"></i> Shelter For Childrens</li>
                            <li> <i class="fa fa-check" aria-hidden="true"></i> Education For Childrens</li>
                            <li> <i class="fa fa-check" aria-hidden="true"></i> Helth For children</li>
                        </ul>
                        <hr>
                        <br>
                        <a href="#" class="btn btn-primary donate btn-block text-center" data-id="{{ $plan->id }}">Donate for this Plan</a>
                        {{-- <br><br><br><br><br> --}}
                    </div>
                  </div>
            </div> 
            @endforeach
        </div>
      <div class="row">
          @foreach ($donates as $donate)
              
       
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
              <div class="staff">
                  <div class="d-flex mb-4">
                      <div class="img" style="background-image: url(/base/assets/img/images.jpeg);"></div>
                      <div class="info ml-4">
                          <h3><a href="teacher-single.html">{{ $donate->name }}</a></h3>
                          <span class="position">{{ Carbon\Carbon::parse($donate->created_at)->isoFormat('dddd, MMMM Do YYYY') }}</span>
                          <div class="text">
                              <p>Donated <span>${{ $donate->amount }}</span> for <a href="#">{{ $donate->categories['title'] }}</a></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach

      </div>
      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li class="active"><span>{{ $donates->links() }}</span></li>
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
              <form action="#" class="volunter-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Email">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-white py-3 px-5">
          </div>
        </form>
          </div>    			
          </div>
      </div>
  </section>
  
  <!-- Modal -->
  <div class="modal fade" id="donateModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <style>
            .content {
                /* margin-top: 5px; */
                text-align: center;
            }
            </style>
            <div class="flex-center position-ref full-height">
  
                <div class="content">   
                    <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a></td></tr></table><hr>
                    <h3>Donate <span id="amt"></span> for <span class="position" id="pln"></span></h3><hr>
                    <form action="{{ route('payment') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="plan">Donating Category</label>
                            <select name="cat" id="cat" class="form-control" required>
                                <option value="">--select category--</option>
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="email">Plan</label>
                            <input type="text" name="plan" id="plan" class="form-control" readonly>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Continue</button>
                      </div>
                    </form>
      
                </div>
            </div>
        </div>
       
      </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $(".donate").click(function(){
                $("#donateModal").modal("show");
                var id = $(this).data("id");
                $.ajax({
                    url:"{{ route('get_details') }}",
                    type:"get",
                    data:{'id': id},
                    success:function(res){
                        var data = res.details;
                        $("#amt").html(data.amount)
                        $("#pln").html(data.name)
                        $("#plan").val(data.name)
                        $("#amount").val(data.amount)
                    },
                    error:function(err){
                        toastr.error("error", "an error occured");
                    }
                })
            });
        })
    </script>
@endpush