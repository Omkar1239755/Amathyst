@extends('webtemplate.layouts.layout')
@section('content')
<style>
   .testimonialcarousel {
      /* background-color: #f9f7fd; */
    }

    #testimonialCarousel {
      background: #fff;
      border-radius: 15px;
      /* box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05); */
      padding: 2rem;
    }

    .testimonial-card {
      background: #f3f0fb;
      border-radius: 12px;
      padding: 20px;
      margin: 10px;
       box-shadow: 0 4px 2px rgba(0, 0, 0, 0.1); 
     
    }

   

    .testimonial-img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
    }

    .carousel-indicators [data-bs-target] {
      background-color: #6f42c1;
    }


  </style>

    <!-- Hero section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="content-text text-center">
                    <h1 class="heading-parent">
                        Find Your Perfect Companion<br />
                        with Confidence!
                    </h1>
                    <p class="sub-headingpara">
                        Connect with like-minded individuals for meaningful experiences.
                    </p>
                    <a href="{{ route('home.companion') }}"><button class="hero-btn">Search Companion</button></a>
                </div>
            </div>
        </div>
    </section>
    <!-- How its work section -->
    <section class="Howit-works" id="howitwork">
        <div class="container">
            <div class="row">
                <div class="text-center how-itsswork">
                    <h1 class="frame-heading">How It Works</h1>
                    <img class="frame-image" src="{{ asset('assests/images/imagesframee.jpg') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!--Featured Companions section -->
    <section class="featured-companions py-5">
        <div class="container">
            <div class="cards-featured text-center mb-4">
                <h2>Featured Companions</h2>
                <p>Check out some of our most popular profiles.</p>
            </div>
             
            <div class="row g-4">
                <!-- Card 1 -->
                @foreach($featuredcompanions as $featuredcompanion)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                        <img src="{{ asset('uploads/profilecompanion/'.$featuredcompanion->profile_picture) }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                           <h5 class="card-title" style="text-align: center;">{{$featuredcompanion->name}}</h5>

                          
                        </div>
                    </div>
                </div>
                 @endforeach

            </div>
           

            <div class="text-center button-viewdiv mt-4">
                <a href="{{ route('login') }}"><button type="button" class="sign-viewbtn">Sign in to View More</button></a>
            </div>
        </div>
    </section>

    <!-- Discover Your Best Companion section  -->
    <section class="discoverbest-companion">
        <div class="container">
            <div class="row">
                <div class="secthird">
                    <div class="discover-yourbest text-center">
                        <h2>Discover Your Best Companion</h2>
                        <p>
                            Explore personalities & preferences to find your perfect match.
                        </p>
                    </div>
                    <!-- cardss -->
                    <div class="discover-yourbestcards">
                        <div class="container">
                            <div class="row g-4">
                                @foreach ($personality as $person)
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                        <a href="{{ route('home.companion', ['id' => $person->id]) }}">
                                        <div class="card-sec h-100">
                                            <img src="{{ asset('uploads/personalities/' . $person->image) }}"
                                                class="littlebit-card" alt="..." />
                                            <div class="card-bodysec text-center">
                                                <a href="{{ route('home.companion', ['id' => $person->id]) }}"
                                                    class="bestcompaign-card">
                                                    <h5 class="sec-text">{{ $person->personality_preferences }}</h5>
                                                </a>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Express Interests with Gems section -->
    <section class="interestwith-gems">
        <div class="container">
            <div class="row">
                <div class="fix-forgems">
                    <div class="text-center heading-gems">
                        <h5>Express Interests with Gems</h5>
                        <p>
                            Use Gems to chat, schedule dates, and access premium
                            experiences.
                        </p>
                    </div>
                    <div class="row justify-content-center gemscard">

                        @foreach ($data as $data)
                            <!-- Card 1 -->
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="gem-card">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="rupeegems-txt">
                                            <h2>${{ $data->Amount }}</h2>
                                            <p>{{ $data['No of gems'] }} Gems</p>

                                        </div>
                                        <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gem icon"
                                            class="gem-img">
                                    </div>
                                    <div class="description mb-3">Start exploring with a small pack!</div>
                                    @auth
                                        <a href="{{ route('associategems') }}" class="btn-purplegem"
                                            style="text-decoration: none;">Buy Gems Now</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn-purplegem" style="text-decoration: none;">Buy
                                            Gems Now</a>
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>


<div class="testimonialcarousel pt-5 pb-5">
  <div class="container">
    <h2 class="text-center mb-4">What Our Customers Say</h2>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel"data-bs-interval="10000" >
          <div class="carousel-inner">
            @php
              $chunkedTestimonials = array_chunk($testimonials->toArray(), 3);
            @endphp
            @foreach($chunkedTestimonials as $index => $chunk)
              <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="row">
                  @foreach($chunk as $testimonial)
                    <div class="col-md-4">
                      <div class="testimonial-card text-center">
                        <img src="{{ asset('uploads/testimonial/' . $testimonial['image']) }}" alt="{{ $testimonial['name'] }}" class="testimonial-img">
                        <h5>{{ $testimonial['name'] }}</h5>
                        <p class="text-muted">{{ $testimonial['position'] }}</p>
                       <p>{{ \Illuminate\Support\Str::words($testimonial['description'], 30, '...') }}</p>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>

          <div class="carousel-indicators mt-4">
            @foreach($chunkedTestimonials as $index => $chunk)
              <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
@section('script')
    <script>
        $('.links a').on('click', function(e) {
            var href = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(href).offset().top
            }, '300');
            e.preventDefault();
        });
    </script>
    
    <script>
  var myCarousel = document.querySelector('#testimonialCarousel');
  var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 10000, // 5 seconds delay
    ride: 'carousel'
  });
</script>

    
    
@endsection