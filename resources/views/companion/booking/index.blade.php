@section('css')
<style>
    body {
      background-color: #111; /* Dark background */
      color: white;
      padding: 20px;
    }

    .fa-star {
      cursor: pointer;
      color: #ccc; /* Grey stars by default */
      transition: color 0.2s ease;
    }

    .text-warning {
      color: gold !important; /* Selected stars = yellow */
    }
  </style>
@endsection
@extends('template.layout.app')
@section('content')
 <div class="row w-100 m-0">
    <main class="col-md-10 offset-md-2 px-4">
                    @include('alertmessage')
                    <div class="d-flex align-items-center justify-content-between flex-wrap editpro-txtt">
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
                                                                <th scope="col">Associate</th>
                                                                <th scope="col">Date & Time</th>
                                                                <th scope="col">Gems Offered</th>
                                                                <th scope="col">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-content">
                                                           @if(isset($bookings) && count($bookings) > 0)
                                                            @foreach($bookings as $booking)
                                                            
                                                            <tr class="align-middle">
                                                                <td class="align-middle">
                                                                    <img src="{{asset('uploads/profile/'. $booking->associate->profile_picture)}}"
                                                                        alt="Avatar" class="avatar-img">
                                                                </td>
                                                                <td class="align-middle">
                                                                    <div class="table-anker">
                                                                        <a href="#">{{$booking->associate->name}}</a>
                                                                        <p> {{$booking->associate->email}}</p>
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
                                                                        <img src="{{asset('assests/images/gemsimg.svg')}}"
                                                                            alt="gem" class="gems-img">
                                                                        <div class="gems-txt">
                                                                            <h6> {{$booking->gem}} Gems</h6>
                                                                            <p> {{$booking->title}}</p>
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
                                                                            <a href="{{ route('chat', ['associate_id' => $booking->associate_id, 'companion_id' => auth()->id(), 'source' => 'booking']) }}" class="message-chatbtn">Message</a>
                                                                            {{--<a href="{{ route('chat', ['companion_id' => $booking->companion_id, 'associate_id' => auth()->id(), 'source' => 'booking']) }}" class="msgnow-button">Message</a>--}}
                                                                        @elseif($booking->status == 0)
                                                                            <button type="button" class="approvecancel-btn" disabled>
                                                                                {{ $booking->status == 1 ? 'Cancel' : 'Cancelled' }}
                                                                            </button>
                                                                        @endif
                                                                    @endif 
                                                                    @if($booking->complete_status == 0)
                                                                       <button type="button" class="markass-btn mark-btn" data-id="{{ $booking->id }}" >
                                                                         Mark As Complete</button>
                                                                    @endif  
                                                                      
                                                                     @if($booking->complete_status == 1)
                                                                      <button type="button" class="markass-btn" disabled>
                                                                         Mark As Complete</button>
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
                                                                    <th scope="col">Associate</th>
                                                                    <th scope="col">Date & Time</th>
                                                                    <th scope="col">Gems Offered</th>
                                                                   
                                                                 </tr>
                                                            </thead>
                                                            <tbody class="table-content">
                                                     @if(isset($ratebookings) && count($ratebookings) > 0)
                                                     @foreach($ratebookings as $ratebooking)
                                                             <tr class="align-middle">
                                                                    <td class="align-middle">
                                                                        <img src="{{asset('uploads/profile/'. $ratebooking->associate->profile_picture)}}"
                                                                            alt="Avatar" class="avatar-img">
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <div class="table-anker">
                                                                            <a href="#">{{$ratebooking->associate->name}}</a>
                                                                            <p>{{$ratebooking->associate->email}}</p>
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
                                                                    <th scope="col">Associate</th>
                                                                    <th scope="col">Date & Time</th>
                                                                    <th scope="col">Gems Offered</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-content">
                                                              @if(isset($cancelbookings) && count($cancelbookings) > 0)
                                                              @foreach($cancelbookings as $cancelbooking)
                                                             <tr class="align-middle">
                                                                    <td class="align-middle">
                                                                        <img src="{{asset('uploads/profile/'. $cancelbooking->associate->profile_picture)}}"
                                                                            alt="Avatar" class="avatar-img">
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <div class="table-anker">
                                                                            <a href="#">{{$cancelbooking->associate->name}}</a>
                                                                            <p>{{$cancelbooking->associate->email}}</p>
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
        </div>
</div>
 

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.approve-btn').click(function() {
            var bookingId = $(this).data('id');
            
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
                        url: '{{route('bookingstatuscompanion')}}',
                        method: 'POST',
                        data: {
                            'bookingId':bookingId,
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
                html: 'You want to mark this booking as complete? <span style="color: red;"><br>Once marked, your booking will be considered complete</span>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{route('companion-mark-as-complete')}}',
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
        const associateId = button.getAttribute('data-associate-id');
        const associateName = button.getAttribute('data-associate-name');
        const associateImage = button.getAttribute('data-associate-image');

        const modalAssociateImage = rateNowModal.querySelector('#associate-image');
        const modalTitle = rateNowModal.querySelector('#associate-name');
        const modalAssociateId = rateNowModal.querySelector('#associate-id');
        const modalBookingId = rateNowModal.querySelector('#booking_id');

        if (modalAssociateImage) modalAssociateImage.src = associateImage;
        if (modalTitle) modalTitle.textContent = `How was your time with ${associateName}?`;
        if (modalAssociateId) modalAssociateId.value = associateId;
        if (modalBookingId) modalBookingId.value = bookingId;
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