@extends('layout')

@section('content')
    
<div class="hero-wrap" style="background-image: url('storage/images/{{ App\Setting::find(1)->image2 }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>About</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
        </div>
      </div>
    </div>
  </div>

  
  <section class="ftco-section">
      <div class="container">
          <div class="row d-flex">
              <div class="col-md-6 d-flex ftco-animate">
                  <div class="img img-about align-self-stretch" style="background-image: url(/assets/images/bg_3.jpg); width: 100%;"></div>
              </div>
              <div class="col-md-6 pl-md-5 ftco-animate">
                  <h2 class="mb-4">Welcome to Kadesh Barnes Stablished Since 2011</h2>
                  <p style="color: black;" >Kardesh was founded by regina and stephen kamanjiri and supported by their daughter, their family and friends from kenya and overseas.</p>
                    <p style="color: black;">Kadesh Barnes Baby and Children's Home opened its doors in April, 2011. It exists to provide a safe and loving family environment for abandoned babies and young children who are both able bodied and with Special needs. We take in children who have been abandoned, neglected, abused and children with special needs. Kadesh Barnes means "a changing point", so we aim to create a changing point in the lives of the forgotten hearts of Kenya and improve their future. We are a family set up institution meaning we live with the children in the same house and we do everything together as a family. Since we started running in 2011, we have rescued and lovingly nurtured a lot of children and also connected some of them with adoptive parents all over the world and locally too. At the moment we have 9 children in total (3boys and 6 girls), out of the nine we have 4 with special needs.</p>
                    <p style="color: black;">Most children with special needs in Kenya five a life that is full of shattered dreams and that is why we at Kadesh Barnes believe that Jesus Christ has a special purpose for each and every one of them. In Kenya there are very few private institutions that offer services for children with special needs; this is where Kadesh comes in. We provide shelter, clothes, Education as well as occupational therapy. As for those without special needs, we</p>
                    <p style="color: black;">connect them with loving individuals through legal adoption. While many children have been adopted, there are still others who are still at the home and they will stay with us for many years.</p>
                    <p style="color: black;">For the last six years, we have managed to survive on the funding of a few volunteers we have had and from on and off donations here and there. We thank God for that. But for us to be able to stand on our own, this is how you can be of assistance.</p>
                    <h3 style="color: black;">Ways you can help:</h3><hr>
                    <p style="color: black;">As you can imagine, babies and children need a lot of milk, food and diapers and quickly outgrow clothes. It's only through generosity that we can be able to sustain the home and pay the costs, rent, staff, medical bills to name but a few.</p>
                    <p style="color: black;">There are many ways you can help us and it doesn't have to involve money. Little or small is greatly appreciated and will go a long may in improving the lives of the children.</p>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6 mt-5">
              <h3>Donations</h3><hr>
                    <ol>
                      <li style="color: black;">Food</li>
                      <li style="color: black;">Diapers</li>
                      <li style="color: black;">New Or Used Clothesfrom age 3-15(girls) and age 8-12(boys)</li>
                      <li style="color: black;">Medicine</li>
                      <li style="color: black;">Shoes</li>
                      <li style="color: black;">Toys</li>
                      <li style="color: black;">School Suplies/uniforms</li>
                      <li style="color: black;">Blankets and bedding</li>
                      <li style="color: black;">Toys</li>
                  </ol>
            </div>
            <div class="col-md-6 mt-5">
              <h3>volunteer</h3><hr>
                    <ol>
                      <li style="color: black;">Tutoring</li>
                      <li style="color: black;">Physical and speech therapy</li>
                      <li style="color: black;">Repairs and maintanance</li>
                      <li style="color: black;">Outings With Childrens</li>
                      <li style="color: black;">Through Sponsoring a child or making One off donation through our
                          <ol>
                            <li>Face book Page Kadesh Barnea Kenya is Linked With Paypal</li>
                            <li>Bank Account Name Kadesh Barnea Baby & Childrens Home
                              <p style="color: black">A/C No. 1002003348</p>
                              <p style="color: black">Swift Code NINCKENYA</p>
                              <p style="color: black">Bank Name: NIC Nakuru Branch Kenya</p>
                              <p style="color: black"></p>
                            </li>
                          </ol>
                      </li>
                  </ol>
            </div>
          </div>
      </div>
  </section>

  <section class="ftco-counter ftco-intro ftco-intro-2" id="section-counter">
      <div class="container">
          <div class="row no-gutters">
              <div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 color-1 align-items-stretch">
            <div class="text">
                <span>Served Over</span>
              <strong class="number" data-number="20">0</strong>
              <span>Children in 2 countries in the world</span>
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

  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Latest Donations</h2>
        </div>
      </div>
      <div class="row">
        @foreach (App\Donate::orderBy('date_created', 'DESC')->paginate(3) as $donate)
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
        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
      </div>
      <div class="form-group">
        <input type="email" name="email"  class="form-control" placeholder="Your Email" required>
      </div>
      <div class="form-group">
        <textarea name="message" id="" cols="30" rows="10" class="form-control" required placeholder="Message"></textarea>
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