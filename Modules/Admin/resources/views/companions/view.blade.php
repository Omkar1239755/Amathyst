@extends('admin::admin.layouts.layout')
@section('css')
    <style>
        ul#profileTabs {
            border: none;
        }

        .profilebar {
            background-color: white;

            height: 100%;
            padding: 30px 20px;
        }

        .profilebar a {
            display: block;
            color: #000;

            margin-bottom: 15px;
            text-decoration: none;
            font-weight: 500;
        }

        .info-section {
            padding: 40px 30px;
        }

        .info-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .info-label {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .info-value {
            color: #555;
        }



        .profile-name {
            font-weight: 700;
            font-size: 1.1rem;
            color: #5f42a9;
        }

        .profile-email {
            color: gray;
            font-size: 0.9rem;
        }

        .info-section h4 {
            color: #5f42a9;
        }

        tr.text-hedingdata {
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 18px;
            line-height: 100%;
            color: #221e2c;
        }

        ul#myTab {
            border-bottom: none;
        }

        .card.upcomin-card {
            border: none;
            border-radius: 15px;
            width: 100%;
            margin-top: 20px;
        }

        button#photos-tab {
            border: none;
            color: #000;
            font-size: 18px;
            font-family: poppins;
            font-weight: 500;
        }

        button#earning-tab {
            border: none;
            font-size: 18px;
            color: #000;
            font-family: poppins;
        }

        button#personal-tab {
            border: none;
            font-size: 18px;
            font-family: poppins;
            font-weight: 500;
            color: #000;
        }


        table.table thead th {
            border-bottom: 0px solid transparent !important;
            background-color: transparent !important;
        }

        button#personal-tab.active,
        button#photos-tab.active,
        button#earning-tab.active,
        button#verify-tab.active,
        button#rates-tab.active,
        button#booking-tab.active,
        button#withdraw-tab.active,
        button#banking-tab.active,
        button#setting-tab.active {
            background-color: rgba(95, 66, 169, 1);
            color: #ffffff;
            font-weight: 600;
            font-family: poppins;
            padding: 8px 10px;
            border-radius: 12px;

        }

        .phototabbar {
            padding-top: 50px;
        }

        button#personal-tab button#photos-tab,
        button#verify-tab,
        button#rates-tab,
        button#earning-tab,
        button#booking-tab,
        button#withdraw-tab,
        button#banking-tab,
        button#setting-tab {
            border: none;
            color: #000;
            font-weight: 500;
            font-family: poppins;
            font-size: 18px;
        }

        thead.table-lightcolor {
            background: rgba(246, 243, 255, 1);
            height: 65px;
        }

        table th {
            vertical-align: middle;
            border: none !important;
        }

        thead tr th {
            font-weight: 600;
            font-size: 14px;
        }

        tr.align-middle {
            border-top: 1px solid #e6e3eb;
        }

        .table-responsive {
            border-radius: 16px;
            /*overflow: hidden;*/
        }

        .table-anker a {
            color: #5f42a9;
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 16px;
            text-decoration: underline;
            text-decoration-style: solid;
            margin: 13px 0px 8px 0px;
        }

        .table-anker p {
            font-family: 'Poppins';
            font-weight: 400;
            font-size: 15px;
            color: #1a0e25;
            display: block;
            margin: 0px 0px 8px 0px;
        }

        .timing-txt h6 {
            font-size: 16px;
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 16px;
            line-height: 1.2;
            color: #1a0e25;
            margin: 13px 0px 8px 0px;
        }

        .timing-txt p {
            font-family: 'Poppins';
            font-weight: 400;
            font-size: 15px;

            letter-spacing: -1%;
            color: rgba(78, 71, 100, 1);
            line-height: 1.2;
        }

        .gems-txt h6 {
            font-size: 16px;
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 16px;
            line-height: 1.2;
            margin: 13px 0px 8px 25px;
        }

        .gems-txt p {
            font-family: 'Poppins';
            font-weight: 400;
            font-size: 15px;
            line-height: 1.2;
            color: rgba(78, 71, 100, 1);
            text-align: justify;
        }

        .gems-img {
            width: 25px;
            height: 25px;
            object-fit: contain;
            margin-right: -26px;
            margin-bottom: 25px;
        }

        .avatar-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
        }

        .earn-gemsimg {
            width: 28px;
            height: 22px;
            object-fit: contain;
        }

        .earning-content {
            padding-left: 45px;
            padding-top: 10px;
        }

        .gems-earned {
            position: relative;
            right: -163px;
            background: #fff;
            height: 60px;
            border-radius: 20px;
            width: 15%;
        }

        .hundred-earn {
            padding-left: 10px;
        }

        .gems-earned p {
            font-size: 15px;
            display: inline;
            font-family: 'Poppins';
            font-weight: 400;
            padding: 25px;
        }

        .gems-earned h6 {
            font-size: 18px;
            display: contents;
            font-family: 'Poppins';
            font-weight: 600;
            line-height: 16px;
        }

        button.ratenow-button {
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            background: #4CAF50;
            font-family: Poppins;
            font-weight: 500;
            font-size: 15px;
            color: #ffffff;
        }

        .d-flex.align-items-center.justify-content-between.flex-wrap.Tabheading {
            padding-top: 30px;
        }

        .tabbtn .tablinks {
            background-color: #fff;
            border: 1px solid #5f42a9;
            padding: 10px 20px;
            cursor: pointer;
        }
        
        
    .compainionimgadmin {
    width: 100%;
    height: 200px; 
    object-fit: cover;
    border-radius: 8px; 
}
    </style>
@endsection
@section('content')
    <div class="row w-100 m-0">
        <main class="col-md-10 offset-md-2 px-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap Tabheading">
                <div class="d-flex align-items-center justify-content-between flex-wrap editpro-txtt">
                    <!-- Tabs -->
                    <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                        <ul class="nav nav-tabs ms-3 mt-2 mt-md-0" id="profileTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personal-tab" data-bs-toggle="tab"
                                    data-bs-target="#personal-tab-pane" type="button" role="tab"
                                    aria-controls="personal-tab-pane" aria-selected="true">Personal Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="photos-tab" data-bs-toggle="tab"
                                    data-bs-target="#photos-tab-pane" type="button" role="tab"
                                    aria-controls="photos-tab-pane" aria-selected="false">Photos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="verify-tab" data-bs-toggle="tab"
                                    data-bs-target="#verify-tab-pane" type="button" role="tab"
                                    aria-controls="verify-tab-pane" aria-selected="false">Document Verification</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="rates-tab" data-bs-toggle="tab"
                                    data-bs-target="#rates-tab-pane" type="button" role="tab"
                                    aria-controls="rates-tab-pane" aria-selected="false">Rates</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="booking-tab" data-bs-toggle="tab"
                                    data-bs-target="#booking-tab-pane" type="button" role="tab"
                                    aria-controls="booking-tab-pane" aria-selected="false">Bookings</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="earning-tab" data-bs-toggle="tab"
                                    data-bs-target="#earning-tab-pane" type="button" role="tab"
                                    aria-controls="earning-tab-pane" aria-selected="false">Earnings </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="withdraw-tab" data-bs-toggle="tab"
                                    data-bs-target="#withdraw-tab-pane" type="button" role="tab"
                                    aria-controls="withdraw-tab-pane" aria-selected="false">Withdraw</button>
                            </li>
                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <button class="nav-link" id="banking-tab" data-bs-toggle="tab"-->
                            <!--        data-bs-target="#banking-tab-pane" type="button" role="tab"-->
                            <!--        aria-controls="banking-tab-pane" aria-selected="false">Bank Details</button>-->
                            <!--</li>-->
                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <button class="nav-link" id="setting-tab" data-bs-toggle="tab"-->
                            <!--        data-bs-target="#setting-tab-pane" type="button" role="tab"-->
                            <!--        aria-controls="setting-tab-pane" aria-selected="false">Settings</button>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div>

            </div>
            <!-- Tab Content -->
            <div class="tab-content mt-4" id="profileTabsContent">
                <div class="tab-pane fade show active" id="personal-tab-pane" role="tabpanel"
                    aria-labelledby="personal-tab">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-md-4">
                                                    <div class="profile-image-container text-center">
                                                        @if ($companion->profile_picture)
                                                            <img src="{{ asset('uploads/profilecompanion/' . $companion->profile_picture) }}"
                                                                class="img-fluid rounded-circle clickable-profile-image"
                                                                style="width: 250px; height: 250px; object-fit: cover; border: 3px solid #6f42c1; cursor: pointer;"
                                                                alt="Profile Picture" data-bs-toggle="modal"
                                                                data-bs-target="#profileImageModal">
                                                        @else
                                                            <img src="{{ asset('uploads/blankImage/blank.jpg') }}"
                                                                class="img-fluid rounded-circle"
                                                                style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ddd;"
                                                                alt="Default Profile">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <h2 class="mb-3">{{ $companion->name }}</h2>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <p><strong>Email:</strong> {{ $companion->email ?? '-' }}</p>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <p><strong>Username:</strong> {{ $companion->user_name ?? '-' }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><strong>Hear About Us:</strong>
                                                                {{ $companion->heard_about_us ?? '-' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><strong>Country:</strong> {{ $companion->country ?? '-' }}
                                                            </p>
                                                        </div>
                                                        @php
                                                            $birthday = \Carbon\Carbon::createFromDate($companion->year, $companion->month, $companion->day);
                                                        @endphp

                                                        <div class="col-md-6">
                                                            <p><strong>Age:</strong>
                                                                {{ $birthday->age }} years old</p>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            @if(!$averageRate)
                                                                   <p><strong>Rating: 
                                                                    </strong>Not Rated</p>
                                                            @elseif($averageRate)
                                                                <p><strong>Rating: {{ $averageRate }}<i
                                                                            class="fas fa-star text-warning ms-1"></i>
                                                                    </strong></p>
                                                            @endif    
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <p><strong>Email Status:</strong>
                                                                @if ($companion->email_status == 0)
                                                                    <span class="status-badge status-in-progress">Not
                                                                        Verified</span>
                                                                @elseif($companion->email_status == 1)
                                                                    <span
                                                                        class="status-badge status-verified">Verified</span>
                                                                @endif
                                                            </p>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <p><strong>Document Status:</strong>
                                                                @if ($companion->doc_status == 0)
                                                                    <span class="status-badge status-in-progress">In
                                                                        Progress</span>
                                                                @elseif($companion->doc_status == 1)
                                                                    <span
                                                                        class="status-badge status-verified">Verified</span>
                                                                @elseif($companion->doc_status == 2)
                                                                    <span class="status-badge status-reupload">Reupload
                                                                        Required</span>
                                                                @else
                                                                    <span class="status-badge status-unknown">Unknown
                                                                        Status</span>
                                                                @endif
                                                            </p>
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
               </div>
                <div class="tab-pane fade" id="photos-tab-pane" role="tabpanel" aria-labelledby="photos-tab">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($images as $hobbie)
                                <div class="col-md-4 mb-3">
                                    <img src="{{ asset($hobbie->images) }}" alt="img" class="compainionimgadmin img-fluid">
                                </div>
                                @if ($loop->iteration % 3 == 0 && !$loop->last)
                                    </div><div class="row">
                                @endif
                            @endforeach
                        </div>
                    </div>
               </div>

                <div class="tab-pane fade" id="verify-tab-pane" role="tabpanel" aria-labelledby="verify-tab">
                   <div class="card rates-card">
                    <div class="row mb-3">
                         <div class="table-responsive">
                            <table class="table myearning-td" >
                              <thead class="table-light">
                                <tr>
					                <th>Id Document</th>
					                <th>Selfie Document</th>
					                <th>Document Status</th>
					            </tr>
                              </thead>
                                <tbody>
                                        <tr>
                                          <td>
                                                @if ($document->id_image)
                                                                <img src="{{ asset('uploads/id_documents/' . $document->id_image) }}" 
                                                                     width="200" height="100" 
                                                                     alt="{{ asset($document->id_image) }}" 
                                                                     class="hover-zoom">
                                                            @else
                                                                <img src="{{ asset('uploads/blankImage/blank.jpg') }}" 
                                                                     width="30" height="30" 
                                                                     alt="blank.jpg">
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($document->id_selfie_image)
                                                                    <img src="{{ asset('uploads/selfies/'.$document->id_selfie_image)}}" width="200" height="100" alt="{{ asset($document->id_selfie_image)}}" class="hover-zoom">            
                                                              @else
                                                                <img src="{{ asset('uploads/blankImage/blank.jpg' ) }}" width="30" height="30" alt="blank.jpg" >
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <label class="switch">
                                                                <select class="toggle-class" name="status" data-id="{{ $document->id }}">
                                                                    <option value="0" {{ $document->doc_status == 0 ? 'selected' : '' }}>In Progress</option>
                                                                    <option value="1" {{ $document->doc_status == 1 ? 'selected' : '' }}>Verified</option>
                                                                    <option value="2" {{ $document->doc_status == 2 ? 'selected' : '' }}>Reupload</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                        </tr>
                                </tbody>
                            </table>
                          </div>
                      </div>
                </div>
                </div>
                   <div class="tab-pane fade" id="rates-tab-pane" role="tabpanel" aria-labelledby="rates-tab">
                       <div class="card rates-card">
                    <div class="row mb-3">
                         <div class="table-responsive">
                            <table class="table table-striped" style="width:100%" id="companionratetable" >
                              <thead class="table-light">
                                <tr class="head-earningtable">
                                  <th scope="col">SNo</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Gems</th>
                                  <th scope="col">Hours</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                    @if($rates->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center"><b>No Rates available</b></td>
                                        </tr>
                                    @else
                                        @foreach($rates as $index => $rate)
                                            <tr class="rate-row">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $rate->title }}</td>
                                                <td>{{ $rate->gem }}</td>
                                                <td>{{ $rate->hours }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                          </div>
                      </div>
                </div>
                    </div>
                <div class="tab-pane fade" id="booking-tab-pane" role="tabpanel" aria-labelledby="booking-tab">
                    <div class="card-body">
					   				 	<table id="earningtable" class="table table-striped" style="width:100%">
					   				 		 <thead>
        							            <tr>
        							                <th>S.No</th>
        							                <th>Date</th>
        							                <th>Associate</th>
        							                <th>Companion</th>
        							                <th>Title</th>
        							                <th>Gems(Purchased)</th>
        							            </tr>
							        	</thead>
							       		<tbody>
                                         @foreach ($bookings as $index => $booking)
                                            <tr>
                                                <td>{{$index+1 }}</td>
                                                <td>{{date('d-m-Y',strtotime($booking->date))}}</td>
                                                <td>{{ $booking->associate?->name ?? '-' }}</td>
                                                <td>{{$booking->companion?->name??'-'}}</td>
                                                <td>{{ $booking->title}}</td>
                                                <td>{{ $booking->gem}}</td>
                                             </tr>
                                        @endforeach	
                                    </tbody>
							   </table>    
					   	 </div>
                </div>
                <div class="tab-pane fade" id="earning-tab-pane" role="tabpanel" aria-labelledby="earning-tab">
                    <div class="card-body">
					   				 	<table id="testtable" class="table table-striped" style="width:100%">
					   				 		 <thead>
        							            <tr>
            							            <th>Sr No</th>
                                                    <th>Details</th>
                                                    <th>Day</th>
                                                    <th>Status</th>
                                                    <th>Gems</th>
        							            </tr>
							        	</thead>
							       		<tbody>
                                         @foreach($earnings as $index => $earning) 
                                                    <tr class="align-middle">
                                                          <td>{{ $index + 1 }}</td>
                                                          <td>Received from {{ $earning->associate->name ?? '-' }}</td>
                                                          <td>
                                                             {{ \Carbon\Carbon::parse($earning->created_at)->setTimezone('Asia/Kolkata')->format('l, d-m-Y, h:i A') }}
                                                          </td>
                                                         @if($earning->cancel == 1)
                                                          <td style="color:red">Cancelled</td>
                                                         @else
                                                         <td style="color:green">Completed</td>
                                                         @endif
                                                         <td class="green-txtgems">
                                                              <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="gemsearnsvg">
                                                              {{ $earning->gem }}Gems
                                                         </td>
                                                        
                                                    </tr>
                                                @endforeach
                                    </tbody>
							   </table>    
					   	 </div>
                </div>
                <div class="tab-pane fade" id="withdraw-tab-pane" role="tabpanel" aria-labelledby="withdraw-tab">
                   <div class="container">
                    <div class="table-responsive">
                        <table id="withdrawtable" class="table table-striped" style="width:100%">
                            <thead class="table-lightcolor">
                                <tr class="text-hedth">
                                    <th scope="col">Sr No.</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Day/Date/Time</th>
                                    <th scope="col">Gems</th>
                                </tr>
                            </thead>
                            <tbody class="table-content">
                                 @foreach($withdrawans as $index => $withdrawan) 
                                <tr class="align-middle">
                                      <td>{{ $index + 1 }}</td>
                                      <td>{{ ($withdrawan->status == 0) ? 'Pending' : 'Withdrawn' }}</td>
                                      <td>{{ \Carbon\Carbon::parse($withdrawan->created_at)->setTimezone('Asia/Kolkata')->format('l, d-m-Y, h:i A') }}</td>
                                      @if($withdrawan->status == 0)
                                        <td class="purple-txtgems">
                                          <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="gemsearnsvg">
                                          {{ $withdrawan->earning_drawn }}Gems
                                        </td>
                                      @endif
                                      @if($withdrawan->status == 1) 
                                        <td  class="redtxt-gems"  >
                                          <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="gemsearnsvg">
                                          {{ $withdrawan->earning_drawn }}Gems
                                        </td>
                                      @endif
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <!--<div class="tab-pane fade" id="banking-tab-pane" role="tabpanel" aria-labelledby="banking-tab">-->
                <!--    <p>Bank Details content here...</p>-->
                <!--</div>-->
                <!--<div class="tab-pane fade" id="setting-tab-pane" role="tabpanel" aria-labelledby="setting-tab">-->
                <!--    <p>Settings content here...</p>-->
                <!--</div>-->
            </div>
        </main>
    </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalImg = document.querySelector('#profileImageModal img');
            if (modalImg) {
                let isZoomed = false;

                modalImg.addEventListener('click', function() {
                    if (isZoomed) {
                        this.style.transform = 'scale(1)';
                        this.style.cursor = 'zoom-in';
                    } else {
                        this.style.transform = 'scale(1.5)';
                        this.style.cursor = 'zoom-out';
                    }
                    isZoomed = !isZoomed;
                });
            }
        });
        
        
        
        
$(document).ready(function() {
    $(document).on('change', '.toggle-class', function() {
        var status = $(this).val();
        var user_id = $(this).data('id');
        $.ajax({
            url: '{{ route('document.status') }}',
            type: 'GET',
            data: {
                _token: '{{ csrf_token() }}',
                user_id: user_id,
                status: status
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                   setTimeout(function() {
                    location.reload();
                }, 2000);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops!',
                        text: response.message
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong. Please try again.'
                });
                console.error('Error:', xhr.responseText);
            }
        });
    });
});
</script>
@endsection