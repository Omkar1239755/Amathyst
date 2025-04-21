
@extends('layouts.layout')
@section('content')

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
          <button class="hero-btn">Start Your Journey</button>
        </div>
      </div>
    </div>
  </section>
  <!-- How its work section -->
  <section class="Howit-works">
    <div class="container">
      <div class="row">
        <div class="text-center how-itsswork">
          <h1 class="frame-heading">How It Works</h1>
          <img class="frame-image" src="/assests/images/imagesframee.jpg" alt="" />
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
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
          <div class="card h-100">
            <img src="/assests/images/cardfirst.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Smith Jhonsom</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text</p>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
          <div class="card h-100">
            <img src="/assests/images/card2.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Smith Jhonsom</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text</p>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
          <div class="card h-100">
            <img src="/assests/images/card3.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Smith Jhonsom</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text</p>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
          <div class="card h-100">
            <img src="/assests/images/card4.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Smith Jhonsom</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text</p>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center button-viewdiv mt-4">
        <button class="sign-viewbtn">Sign in to View More</button>
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
                <!-- Card 1 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                  <div class="card-sec h-100">
                    <img src="/assests/images/Adventurecard-first.png" class="card-img-top" alt="..." />
                    <div class="card-bodysec text-center">
                      <h5 class="sec-text">Adventurous</h5>
                    </div>
                  </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                  <div class="card-sec h-100">
                    <img src="/assests/images/intellecard2.png" class="card-img-top" alt="..." />
                    <div class="card-bodysec text-center">
                      <h5 class="sec-text">Intellectual</h5>
                    </div>
                  </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                  <div class="card-sec h-100">
                    <img src="/assests/images/outingcard3.png" class="card-img-top" alt="..." />
                    <div class="card-bodysec text-center">
                      <h5 class="sec-text">Outgoing</h5>
                    </div>
                  </div>
                </div>

                <!-- Card 4 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                  <div class="card-sec h-100">
                    <img src="/assests/images/shybutcard4.png" class="card-img-top" alt="..." />
                    <div class="card-bodysec text-center">
                      <h5 class="sec-text">Shy but Fun</h5>
                    </div>
                  </div>
                </div>

                <!-- Card 5 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                  <div class="card-sec h-100">
                    <img src="/assests/images/artsycard5.png" class="card-img-top" alt="..." />
                    <div class="card-bodysec text-center">
                      <h5 class="sec-text">Artsy & Creative</h5>
                    </div>
                  </div>
                </div>

                <!-- Card 6 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                  <div class="card-sec h-100">
                    <img src="/assests/images/fitnescard6.png" class="card-img-top" alt="..." />
                    <div class="card-bodysec text-center">
                      <h5 class="sec-text">Fitness Enthusiast</h5>
                    </div>
                  </div>
                </div>

                <!-- Card 7 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                  <div class="card-sec h-100">
                    <img src="/assests/images/foodicard7.png" class="card-img-top" alt="..." />
                    <div class="card-bodysec text-center">
                      <h5 class="sec-text">Foody</h5>
                    </div>
                  </div>
                </div>

                <!-- Card 8 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                  <div class="card-sec h-100">
                    <img src="/assests/images/singercard8.png" class="card-img-top" alt="..." />
                    <div class="card-bodysec text-center">
                      <h5 class="sec-text">Singer</h5>
                    </div>
                  </div>
                </div>
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

          <div class="d-flex justify-content-center flex-wrap gemscard">
            <!-- Card 1 -->
            <div class="gem-card">
              <div class="d-flex justify-content-between align-items-center">
                <div class="rupeegems-txt">
                  <h2>$10</h2>
                  <p>100 Gems</p>
                </div>
                <img src="assests/images/gemsimg.svg" alt="gem icon" class="gem-img">
              </div>

              <div class="description mb-3">Start exploring with a small pack!</div>

              <button class="btn-purplegem">Buy Gems Now</button>
            </div>

            <!-- card-2 -->
            <div class="gem-card">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="rupeegems-txt">
                  <h2>$45</h2>
                  <p>500 Gems</p>
                </div>
                <img src="assests/images/gemsimg.svg" alt="gem icon" class="gem-img">
              </div>

              <div class="description mb-3">Best value for active users!</div>

              <button class="btn-purplegem">Buy Gems Now</button>
            </div>


            <!-- Card 3 -->
            <div class="gem-card">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="rupeegems-txt">
                  <h2>$85</h2>
                  <p>1000 Gems</p>
                </div>
                <img src="assests/images/gemsimg.svg" alt="gem icon" class="gem-img">
              </div>

              <div class="description mb-3">Unlock more connections</div>

              <button class="btn-purplegem">Buy Gems Now</button>
            </div>


          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Frequently Asked Questions section  -->

  <section class="frequasked-questions py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10 frequasked-parentdiv">
          <div class="text-center faq-text">
            <h2 class="mb-3">Frequently Asked Questions</h2>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br />
              It has been the industry's standard dummy text ever since the 1500s.
            </p>
          </div>
          <div class="boxes">
            <div class="faq-box">
              <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                  <!-- Slide 1 -->
                  <div class="swiper-slide">

                    <h2>1. See What You Like</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                      the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                      type and scrambled it to make a type specimen book</p>
                  </div>

                  <!-- Slide 2 -->
                  <div class="swiper-slide">
                    <h2>2. See What You Like</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                      the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                      type and scrambled it to make a type specimen book</p>
                  </div>

                  <!-- Slide 3 -->
                  <div class="swiper-slide">
                    <h2>3. See What You Like</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                      the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                      type and scrambled it to make a type specimen book</p>
                  </div>

                </div>

                <!-- Swiper Pagination -->
                <div class="swiper-pagination mt-4"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection	