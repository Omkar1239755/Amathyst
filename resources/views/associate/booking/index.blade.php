@section('css')
<style>
    body {
      background-color: #111; 
      color: white;
      padding: 20px;
    }

    .fa-star {
      cursor: pointer;
      color: #ccc; 
      transition: color 0.2s ease;
    }

    .text-warning {
      color: gold !important; 
    }
</style>
@endsection
@extends('template.layout.app')
@section('content')
                    <div class="row w-100 m-0">
                        <main class="col-md-10 offset-md-2 px-4">
                            @include('alertmessage')
                            <div class="d-flex align-items-center justify-content-between flex-wrap editpro-txttassoiatet">
                              <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                                     <h4 class="mb-0 editprofile-heding">My Booking</h4>
                                      <div class="vr mx-3 d-none d-md-block boder-leftgrey"></div>
                                    <ul class="nav nav-tabs ms-3 mt-2 mt-md-0" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="upcoming-tab" data-bs-toggle="tab"
                                                data-bs-target="#upcoming-tab-pane" type="button" role="tab"
                                                aria-controls="upcoming-tab-pane"
                                                aria-selected="true">Upcoming</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="post-tab" data-bs-toggle="tab"
                                                data-bs-target="#post-tab-pane" type="button" role="tab"
                                                aria-controls="post-tab-pane" aria-selected="false">Completed</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="cancel-tab" data-bs-toggle="tab"
                                                data-bs-target="#cancel-tab-pane" type="button" role="tab"
                                                aria-controls="cancel-tab-pane" aria-selected="false">Cancelled</button>
                                        </li>
                                    </ul>
                                </div>
                             </div>
                             <div class="tab-content mt-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="upcoming-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <div class="card upcomin-card">
                                        <div class="row mb-3">
                                            <div class="container">
                                                <div class="table-responsive">
                                                    <table class="table align-middle ">
                                                        <thead class="table-lightcolor">
                                                            <tr class="text-hedingdata">
                                                                <th scope="col">Profile</th>
                                                                <th scope="col">Companion</th>
                                                                <th scope="col">Date & Time</th>
                                                                <th scope="col">Gems Offered</th>
                                                                <th scope="col">Action</th>
                                                              
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-content">
                                                            @if(isset($bookings) && count($bookings) > 0)
                                                            @foreach($bookings as $booking)
                                                                <tr class="align-middle">
                                                                    <td class="align-middle">
                                                                        <img src="{{ asset('uploads/profilecompanion/' . $booking->companion->profile_picture) }}"
                                                                            alt="Avatar" class="avatar-img">
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <div class="table-anker">
                                                                            <a href="#">{{ $booking->companion->name }}</a>
                                                                            <p>{{ $booking->companion->email }}</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <div class="timing-txt">
                                                                            <h6>{{ date('d-m-Y', strtotime($booking->date)) }}</h6>
                                                                            <p>{{ \Carbon\Carbon::parse($booking->created_at)->setTimezone('Asia/Kolkata')->format('h:i A') }}</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <img src="{{ asset('assests/images/gemsimg.svg') }}"
                                                                                alt="gem" class="gems-img">
                                                                            <div class="gems-txt">
                                                                                <h6>{{ $booking->gem }} Gems</h6>
                                                                                <p>{{ $booking->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="statusbtn">
                                                                        @if($booking->complete_status == 1)
                                                                            <button type="button" class="approvecancel-btn" disabled>
                                                                                Cancel   
                                                                            </button>
                                                                        @else
                                                                            @if($booking->status == 1)
                                                                                <button type="button" class="approvecancel-btn approve-btn" data-id="{{ $booking->id }}" data-gem="{{ $booking->gem }}">
                                                                                    Cancel
                                                                                </button>
                                                                                <a href="{{ route('chat', ['companion_id' => $booking->companion_id, 'associate_id' => auth()->id(), 'source' => 'booking']) }}" class="message-chatbtn">Message</a>
                                                                            @elseif($booking->status == 0)
                                                                                <button type="button" class="approvecancel-btn" disabled>
                                                                                    {{ $booking->status == 1 ? 'Cancel' : 'Cancelled' }}
                                                                                </button>
                                                                            @endif
                                                                        @endif 
                                                                        @if($booking->complete_status == 0)
                                                                            <button type="button" class="markass-btn mark-btn" data-id="{{ $booking->id }}">
                                                                                Mark As Complete
                                                                            </button>
                                                                        @endif  
                                                                        @if($booking->complete_status == 1)
                                                                            <button type="button" class="markass-btn" disabled>
                                                                                Mark As Complete
                                                                            </button>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="5" class="text-center">
                                                                        <p>No Upcoming Bookings Found</p>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="post-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <div class="tab-pane fade show active" id="upcoming-tab-pane" role="tabpanel"
                                        aria-labelledby="home-tab" tabindex="0">

                                        <div class="card upcomin-card">
                                            <div class="row mb-3">
                                                 <div class="container">
                                                    <div class="table-responsive">
                                                        <table class="table align-middle ">
                                                            <thead class="table-lightcolor">
                                                                <tr class="text-hedth">
                                                                    <th scope="col">Profile</th>
                                                                    <th scope="col">Companion</th>
                                                                    <th scope="col">Date & Time</th>
                                                                    <th scope="col">Gems Offered</th>
                                                                    <th scope="col">Action</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody class="table-content">
                                                        @if(isset($ratebookings) && count($ratebookings) > 0)
                                                        @foreach($ratebookings as $ratebooking)
                                                             <tr class="align-middle">
                                                                    <td class="align-middle">
                                                                        <img src="{{asset('uploads/profilecompanion/'. $ratebooking->companion->profile_picture)}}"
                                                                            alt="Avatar" class="avatar-img">
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <div class="table-anker">
                                                                            <a href="#">{{$ratebooking->companion->name}}</a>
                                                                            <p>{{$ratebooking->companion->email}}</p>
                                                                        </div>
                                                                    </td>

                                                                    <td class="align-middle">
                                                                        <div class="timing-txt">
                                                                           <h6>{{ date('d-m-Y', strtotime($ratebooking->date)) }}</h6>
                                                                             <p>{{ \Carbon\Carbon::parse($ratebooking->created_at)->setTimezone('Asia/Kolkata')->format('h:i A') }}</p>

                                                                        </div>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <img src="{{ asset('assests/images/gemsimg.svg') }}"
                                                                                alt="gem" class="gems-img">
                                                                            <div class="gems-txt">
                                                                                <h6>{{ $ratebooking->gem }} Gems</h6>
                                                                                <p>{{ $ratebooking->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>


                                                                    <td>
                                                                        @if($ratebooking->rate_status == 0)
                                                                        <button type="button" class="ratenow-button"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#rateNowModal"
                                                                            data-companion-id="{{ $ratebooking->companion_id }}"
                                                                            data-booking-id="{{ $ratebooking->id}}"
                                                                            data-companion-name="{{ $ratebooking->companion->name }}"
                                                                            data-companion-image="{{ asset('uploads/profilecompanion/' . $ratebooking->companion->profile_picture) }}">
                                                                            Rate Now
                                                                        </button>
                                                                        @endif
                                                                         @if($ratebooking->rate_status == 1)
                                                                         <button type="button" class="ratedd-button" disabled>
                                                                            Rated</button>
                                                                         @endif
                                                                         
                                                                         
                                                                     </td>
                                                                 </tr>
                                                                 @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td colspan="5" class="text-center">
                                                                            <p>No Completed Bookings Found</p>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                               
                                                                 
                                                            </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="cancel-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <div class="tab-pane fade show active" id="upcoming-tab-pane" role="tabpanel"
                                        aria-labelledby="home-tab" tabindex="0">
                                        <div class="card upcomin-card">
                                            <div class="row mb-3">
                                                 <div class="container">
                                                    <div class="table-responsive">
                                                        <table class="table align-middle ">
                                                            <thead class="table-lightcolor">
                                                                <tr class="text-hedth">
                                                                    <th scope="col">Profile</th>
                                                                    <th scope="col">Companion</th>
                                                                    <th scope="col">Date & Time</th>
                                                                    <th scope="col">Gems Offered</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-content">
                                                            @if(isset($cancelbookings) && count($cancelbookings) > 0)
                                                            @foreach($cancelbookings as $cancelbooking)
                                                             <tr class="align-middle">
                                                                    <td class="align-middle">
                                                                        <img src="{{asset('uploads/profilecompanion/'. $cancelbooking->companion->profile_picture)}}"
                                                                            alt="Avatar" class="avatar-img">
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <div class="table-anker">
                                                                            <a href="#">{{$cancelbooking->companion->name}}</a>
                                                                            <p>{{$cancelbooking->companion->email}}</p>
                                                                        </div>
                                                                    </td>

                                                                    <td class="align-middle">
                                                                        <div class="timing-txt">
                                                                           <h6>{{ date('d-m-Y', strtotime($cancelbooking->date)) }}</h6>
                                                                            <p>{{ \Carbon\Carbon::parse($cancelbooking->created_at)->setTimezone('Asia/Kolkata')->format('h:i A') }}
                                                                            </p>
                                                                        </div>
                                                                    </td>
                                                                    
                                                                     <td>
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <img src="{{ asset('assests/images/gemsimg.svg') }}"
                                                                                alt="gem" class="gems-img">
                                                                            <div class="gems-txt">
                                                                                <h6>{{ $cancelbooking->gem }} Gems</h6>
                                                                                <p>{{ $cancelbooking->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                 </tr>
                                                                 @endforeach
                                                                 @else
                                                                    <tr>
                                                                        <td colspan="5" class="text-center">
                                                                            <p>No Cancel Bookings Found</p>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                           </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
              
             <div class="modal fade" id="rateNowModal" tabindex="-1" aria-labelledby="rateNowModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                        <form action ="{{route('associate-companion-rating')}}" method="POST">
                            @csrf
                              <input type="hidden" name="companion_id" id="companion-id">
                              <input type="hidden" name="booking_id" id="booking_id">
                            <div class="modal-content text-center p-3">
                                <div class="modal-header flex-column align-items-center postmodel">
                                    <img id="companion-image" src="/assets/images/profileimgasssoi.svg" alt="img" width="80" class="mb-2"/>
                                    <h5 class="modal-title w-100" id="companion-name">How was your time with Keanu Repes?</h5>
                                    <p class="feedback-review">Your feedback helps us build a respectful and enjoyable community. Please rate your experience and leave a short comment if you'd like.</p>
                                    <button type="button" class="btn-close closebtn-bookking" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="mb-3 mt-3 rating-staricon" id="star-container">
                                          <i class="far fa-star fa-2x" data-index="0"></i>
                                          <i class="far fa-star fa-2x" data-index="1"></i>
                                          <i class="far fa-star fa-2x" data-index="2"></i>
                                          <i class="far fa-star fa-2x" data-index="3"></i>
                                          <i class="far fa-star fa-2x" data-index="4"></i>
                                     <div class="reviewhere-text mt-3">
                                        <textarea name="review" id="review-text" placeholder="Leave your review here..." class="review-here"></textarea>
                                     </div>
                                </div>
                                <div class="modal-footer border-0 justify-content-center">
                                    <button type="button" class="skipfornow-rate" data-bs-dismiss="modal">Skip for Now</button>
                                    <button type="submit" class="skipfornow-rate"  data-bs-dismiss="modal">Submit Rating</button>
                                </div>
                            </div>
                        </form>
                </div>
            </main>
        </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.approve-btn').click(function() {
            var bookingId = $(this).data('id');
            var gem = $(this).data('gem'); 
     
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to Cancel this booking?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{route('booking-status')}}',
                        method: 'POST',
                        data: {
                            'bookingId':bookingId,
                            'gem':gem,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Approved!',
                                response.message,
                                'success'
                            ).then(() => {
                                location.reload(); 
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
    
    
       $(document).ready(function() {
        $('.mark-btn').click(function() {
            var bookingId = $(this).data('id');
            
            Swal.fire({
                title: 'Are you sure?',
                html: 'You want to mark this booking as complete? <span style="color: red;"><br>Once marked, you will not be liable for refunding the booking amount, and your booking will be marked as complete.</span>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{route('associate-mark-as-complete')}}',
                        method: 'POST',
                        data: {
                            'bookingId':bookingId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire(
                                'Approved!',
                                response.message,
                                'success'
                            ).then(() => {
                                location.reload(); 
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
<script>

document.addEventListener('DOMContentLoaded', function () {
    const rateNowModal = document.getElementById('rateNowModal');

    rateNowModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
         const bookingId = button.getAttribute('data-booking-id');
        const companionId = button.getAttribute('data-companion-id');
        const companionName = button.getAttribute('data-companion-name');
        const companionImage = button.getAttribute('data-companion-image');
        const modalImage = rateNowModal.querySelector('#companion-image');
        const modalTitle = rateNowModal.querySelector('#companion-name');
        const modalCompanionId = rateNowModal.querySelector('#companion-id');
        const modalbookingId = rateNowModal.querySelector('#booking_id');
        modalImage.src = companionImage;
        modalTitle.textContent = `How was your time with ${companionName}?`;
        modalCompanionId.value = companionId;
        modalbookingId.value = bookingId;
    });
});

</script>
<script>
const stars = document.querySelectorAll('#star-container .fa-star');
const ratingInput = document.createElement('input'); 
ratingInput.type = 'hidden';
ratingInput.name = 'rating'; 
document.querySelector('form').appendChild(ratingInput); 
stars.forEach((star, index) => {
  star.addEventListener('click', () => {
   ratingInput.value = index + 1; 
    stars.forEach((s, i) => {
      if (i <= index) {
        s.classList.remove('far');
        s.classList.add('fas', 'text-warning');
      } else {
        s.classList.remove('fas', 'text-warning');
        s.classList.add('far');
      }
    });
  });
});
</script>
<script>
 const skipButton = document.querySelector('.skipfornow-rate');
  skipButton.addEventListener('click', function() {
    location.reload();
  });
</script>
@endsection