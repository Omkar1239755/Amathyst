
@extends('layouts.layout')
@section('content')




    <!-- Signup body -->

    <section class="signup">
      <div class="container">
        <div class="row">
          <div
            class="col-md-6 signup-left d-flex align-items-center justify-content-center h-100"
          >
            <img
              src="/assests/images/signupimg.svg"
              alt="Illustration"
              class="img-fluid"
            />
          </div>

          <div
            class="col-md-6 right-signup align-items-center justify-content-center h-100" >
            <div class="content-sighnup">
              <div class="textright-sign">
                <h5>Who Are You Signing Up As?</h5>
                <h2>Companion or Date Seeker</h2>
                <p>
                  Select the account type that best matches your role. This
                  helps us tailor your experience on Amathyst.
                </p>
              </div>

         
           <div class="twoo-btns">
            <a href="{{route('associate')}}" class="assoite-link">
              <div class="assoiate-content">
                <img src="/assests/images/btnprofile.svg" alt="" class="assoite-pic" />
                <div class="assoitebtn-text">
                  <h2 class="title-iam">I'm an Associate</h2>
                  <p class="description-assoite">
                    I want to explore and connect with companions for meaningful experiences and fun dates.
                  </p>

                </div>
                <i class="fas fa-arrow-right assoiate-icon"></i>
              </div>
            </a>
            

            <a href="{{route('companion')}}" class="champion-link">
              <div class="assoiate-content">
                <img src="/assests/images/btnprofilesecond.svg" alt="" class="assoite-pic" />
                <div class="assoitebtn-text">
                  <h2 class="title-iam">I’m a Companion</h2>
                  <p class="description-assoite">
                    I want to share great moments, build new connections, and offer my time through Amathyst.
                  </p>
                </div>
                <i class="fas fa-arrow-right assoiate-icon"></i>
              </div>
            </a>
            
              
            <div class="sign-continue">
              <a href="/" class="btnsign-continue">Continue</a>
            </div>



          </div>


            </div>
          </div>
        </div>
      </div>
    </section>



    @endsection