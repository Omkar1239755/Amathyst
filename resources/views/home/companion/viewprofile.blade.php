@extends('webtemplate.layouts.layout')
@section('content')
 <div class="col-md-12">
        <div class="index-profilemain">
             <div class="card indexcompainin-profiles p-4">
                <div class="row">
                    @include('alertmessage')
                  <div class="col-md-4">
                 <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                      @foreach($images as $hobbie)
                        <div class="swiper-slide">
                          <img src="{{ asset($hobbie->images) }}" class="main-image"/>
                        </div>
                      @endforeach
                    </div>
                  <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
                <div class="swiper mySwiper mt-3">
                    <div class="swiper-wrapper">
                      @foreach($images as $hobbie)
                        <div class="swiper-slide">
                          <img src="{{ asset($hobbie->images) }}" class="thumb-image"/>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                        <div class="profile">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="heding-txtprofile">
                                    <h3 class="mb-1">{{$data->name}}</h3>
                                    <p class="mb-1">{{$data->country}}</p>
                                </div>
                                <h4 class="age-girl">29 Year Old</h4>
                            </div>
                           <div class="bio-simpletxt">
                           <div class="section-title">Bio:</div>
                                  {{$data->bio}}
                                </p>
                            </div>
                             <div class="mb-3 btnin-select">
                                <div class="section-title">Interests:</div>
                                <ui class="badge-container">
                                @foreach($hobbies as $hobbie)
                                    <span class="badge-custom">
                                    <img src="{{ asset('uploads/hobbies/'.$hobbie->image) }}"
                                      class="icon-dashbord"/>
                                    {{ ucfirst($hobbie->hobbie) }}
                                  </span>
                                 @endforeach
                               </ui>
                            </div>

                            <div class="mb-3 btnin-select">
                                <div class="section-title">Hobbies:</div>
                                <ui class="badge-container">
                                  @foreach($additionalhobbie as $hobbie)
                                    <span class="badge-custom"
                                      ><img
                                        src="{{ asset('uploads/additional_hobbies/'.$hobbie->image) }}"
                                        alt=""
                                        class="icon-dashbord"
                                      />
                                      {{ ucfirst($hobbie->additional_hobbie) }}
                                      </span>
                                     @endforeach
                                </ui>
                            </div>


                            <div class="mb-3 btnin-select">
                                <div class="section-title">Personal Traits:</div>
                                <ui class="badge-container">
                                     @foreach($trait as $hobbie) 
                                    <span class="badge-custom"
                                      ><img
                                        src="{{asset('uploads/personaltrait/'.$hobbie->image)}}"
                                        alt=""
                                        class="icon-dashbord"
                                      />
                                     {{ ucfirst($hobbie->personal_trait) }}
                                      </span>
                                  @endforeach
                                </ui>
                            </div>


                           <div class="mb-3 btnin-select">
                                    <div class="section-title">Personality :</div>
                                    <ui class="badge-container">
                                         @foreach($personality as $person) 
                                        <span class="badge-custom"
                                          ><img
                                            src="{{asset('uploads/personalities/'.$person->image)}}"
                                            alt=""
                                            class="icon-dashbord"
                                          />
                                         {{ ucfirst($person->personality_preferences) }}
                                          </span>
                                      @endforeach
                                    </ui>
                            </div>

                            <div class="mb-2 btnin-select">
                                <div class="section-title">Favorite Activities:</div>
                                <ui class="badge-container">
                                @foreach($activity as $hobbie)
                                    <span class="badge-custom"><img
                                        src=" {{ asset('uploads/activity/'.$hobbie->image)}}"
                                        alt=""
                                        class="icon-dashbord"/>
                                        {{ ucfirst($hobbie->activity) }}</span >
                              @endforeach
                                </ui>
                            </div>
                            <!--Rates-->
                            <div class="rates-hed">
                                <h4>Rates</h4>
                                <div class="rates-boxindex ">
                            @if($bookingdata->isEmpty())
                                <div class="text-center nodata-text">
                                    <h5>No Services Added by Companion</h5>
                                </div>
                            @endif
                                @foreach($bookingdata as $booking)
                                    <div class="content-boxxborder">
                                        <form class="bookingForm" autocomplete="off">
                                            @csrf
                                            <input type="hidden" name="gem" value="{{ $booking->gem }}">
                                            <input type="hidden" name="title" value="{{ $booking->title }}">
                                            <input type="hidden" name="hours" value="{{ $booking->hours }}">
                                            <input type="hidden" name="companion" value="{{  $booking->user_id }}">
                                            <input type="hidden" name="availablegem" value="{{ isset($usergem) && !is_null($usergem) ? $usergem->intial_gem - $gempurchased + $usergem->cancel_gem : 0 }}">

                                        
                                            <div class="badge-dates">
                                                <div class="rates-coffedates d-flex justify-content-between align-items-center">
                                                    <div class="coffe-heding">
                                                        <h5 class="mb-3">{{ $booking->title }} | {{ $booking->hours }} hrs</h5>
                                                        <p class="mb-0">
                                                            <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="start-gemsforimg">
                                                            {{ $booking->gem }} Gems
                                                        </p>
                                                    </div>
                                                    <div class="btn-book ms-3">
                                                        <button type="submit">Book Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                             <!-- rating star -->
                              <div class="rates-hed">
                                <h4>Reviews</h4>
                                <div class="riview-boxindex p-3">
                                    <div class="col-md-12 d-flex">
                                        <!--<div class="content-boxxborder">-->
                                        <!--    <div class="badge-dates">-->
                                        <!--        <div class="row">-->
                                        <!--            <div class="side">-->
                                        <!--                <div>5 star</div> -->
                                        <!--            </div>-->
                                        <!--            <div class="middle">-->
                                        <!--                <div class="bar-container">-->
                                        <!--                    <div class="bar-5"></div>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="side right">-->
                                        <!--               {{$fivestarcount}}-->
                                        <!--            </div>-->
                                        <!--            <div class="side">-->
                                        <!--                <div>4 star</div>-->
                                        <!--            </div>-->
                                        <!--            <div class="middle">-->
                                        <!--                <div class="bar-container">-->
                                        <!--                    <div class="bar-4"></div>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="side right">-->
                                        <!--                 {{$fourstarcount}}-->
                                        <!--            </div>-->
                                        <!--            <div class="side">-->
                                        <!--                <div>3 star</div>-->
                                        <!--            </div>-->
                                        <!--            <div class="middle">-->
                                        <!--                <div class="bar-container">-->
                                        <!--                    <div class="bar-3"></div>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="side right">-->
                                        <!--               {{$threestarcount}}-->
                                        <!--            </div>-->
                                        <!--            <div class="side">-->
                                        <!--                <div>2 star</div>-->
                                        <!--            </div>-->
                                        <!--            <div class="middle">-->
                                        <!--                <div class="bar-container">-->
                                        <!--                    <div class="bar-2"></div>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="side right">-->
                                        <!--                   {{$twostarcount}}-->
                                        <!--            </div>-->
                                        <!--            <div class="side">-->
                                        <!--                <div>1 star</div>-->
                                        <!--            </div>-->
                                        <!--            <div class="middle">-->
                                        <!--                <div class="bar-container">-->
                                        <!--                    <div class="bar-1"></div>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="side right">-->
                                        <!--                 {{$onetarcount}}-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                         
                                        <div class="reviews-start">
                                            <span class="heading">{{ number_format($average, 1) }}</span><br />
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $average)
                                                        <span class="fa fa-star checked"></span>
                                                    @else
                                                        <span class="fa fa-star"></span>
                                                    @endif
                                                @endfor
                                            <p class="review-txt">{{$totalcount}} Reviews</p>
                                            <hr style="border:3px solid #f1f1f1">
                                        </div>
                                    </div>
                                 </div>
                            </div>
                             @foreach($ratings as $rating)
                            <div class="content-boxxborder mb-3 p-3 ">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('uploads/profile/'. $rating->associatereviews->profile_picture)}}" alt="user" class="rounded-circle me-2"
                                            width="40" height="40">
                                        <div>
                                            <h6 class="mb-0">{{$rating->associatereviews->name}}</h6>
                                            <div class="rating text-warning">
                                                @php
                                                    $rate = $rating->rate;
                                                @endphp
                                                
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $rate)
                                                        <i class="fas fa-star"></i> 
                                                    @else
                                                        <i class="far fa-star"></i> 
                                                    @endif
                                                @endfor
                                             </div>
                                        </div>
                                    </div>

                                </div>
                                <p class="mb-0">{{$rating->reviews}}</p>
                            </div>
                            @endforeach
                         </div>
                    </div>
                </div>
            </div>
 </div>
    <!-- Confirmation Modal -->
 <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                     <div class="modal-header heder-profileindem border-0 flex-column align-items-center text-center">
                        <img src="assets/images/verifydocument.svg" alt="success-verify" width="100px" class="mb-2">
                        <h5 class="modal-title w-100 text-center" id="confirmationModalLabel">Booking Confirmed!</h5>
                        <p>You’ve successfully booked a session with Malena Veronica.</p>
                        <button type="button" class="btn-close closebtn-indexconfirm position-absolute end-0 top-0 m-3"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center confirmgems-model">
                        <h3><img src="assets/images/gemsimg.svg" alt="gems" width="25px"> 250 Gems deducted</h3>

                        <div class="d-flex justify-content-between">
                            <div class="me-3 datetime-model">
                                <h5>Date</h5>
                                <h5>Time</h5>
                            </div>
                            <div class="datetime-model">
                                <h5>15 May 2025</h5>
                                <h5>12:15 AM</h5>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-center border-0 ">
                        <a href=""><button type="button" class="goto-btnmodel" data-bs-dismiss="modal">Go to My
                                Bookings</button></a>
                        <a href=""><button type="button" class="goto-btnmodel" data-bs-dismiss="modal">OK</button></a>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('script')
<script>
  let thumbSwiper = new Swiper(".mySwiper", {
  spaceBetween: 10,
  slidesPerView: 4,
  grid: {
    rows: 2,
    fill: "row"
  },
  watchSlidesProgress: true,
});

let mainSwiper = new Swiper(".mySwiper2", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: thumbSwiper,
  },
});

</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
 <script>
    document.addEventListener('DOMContentLoaded', function () {
        var bookingModal = document.getElementById('bookingModal');
        bookingModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var hours = button.getAttribute('data-hours');
            var timeSelect = document.getElementById('bookingTime');
            for (var i = 0; i < timeSelect.options.length; i++) {
                if (timeSelect.options[i].value === hours) {
                    timeSelect.options[i].selected = true;
                    break;
                }
            }
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).on('submit', '.bookingForm', function(e) {
    e.preventDefault(); 

    var form = $(this); 
    var gemValue = form.find('input[name="gem"]').val();
    var availablegem = form.find('input[name="availablegem"]').val();
    var formData = form.serialize();

    Swal.fire({
        // html: `<b>Confirm Your booking for Companion?</b><br>Booking this  session will <span style="color:red;">-deduct <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="start-gemsforimg"> ${gemValue} gems</span> from your balance. <br> <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="start-gemsforimg">Remaining Gems : <span><b style=color:blue> ${availablegem}</b><span><br><b>Are you sure you want to proceed?</b>`,
        html: `<span><b>Confirm Your booking for Companion?<br></b>Balance : <span><b style=color:blue><img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="start-gemsforimg"> ${availablegem}</b> gems <br>Booking this  session will <span style="color:red;">deduct <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="start-gemsforimg"> ${gemValue} gems</span> from your balance. <br><b>Are you sure you want to proceed?</b>`,
        icon: 'question',
        showCancelButton: true,
        showDenyButton: true,
        denyButtonText: 'Buy More Gems',
        denyButtonColor:'#008000',
        confirmButtonText: 'Yes, book it!',
        cancelButtonText: 'Cancel',
        cancelButtonColor: '#FF0000',
    }).
    then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('booking.store') }}", 
                method: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': form.find('input[name="_token"]').val()
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Booked Successfully!',
                        text: 'Choose an action below:',
                        icon: 'success',
                        showCancelButton: true,
                        showDenyButton: true,
                        confirmButtonText: 'Go to Booking',
                        denyButtonText: 'Go to Message',
                        cancelButtonText: 'Cancel'
                    }).then((choice) => {
                        if (choice.isConfirmed) {
                            window.location.href = "{{ route('associate.booking') }}";
                        } else if (choice.isDenied) {
                            window.location.href = "{{ route('chat') }}";
                        }
                    });
                },
                error: function(xhr) {
                    let errorMessage = 'Something went wrong. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire(
                        'Oops!',
                        errorMessage,
                        'error'
                    );
                }
            });
        } else if (result.isDenied) {
            window.location.href = "{{ route('associategems') }}"; 
        }
    });
});
</script>
@endsection