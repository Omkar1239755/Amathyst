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
            font-size: 17px;
            font-family: poppins;
            font-weight: 500;
        }

        button#earning-tab {
            border: none;
            font-size: 17px;
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
  
    .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        color: white;
    }
    .status-in-progress {
        background-color: #ffc107;
        color: #000;
    }
    .status-verified {
        background-color: #28a745;
    }
    .status-reupload {
        background-color: #dc3545;
    }
  
  .clickable-profile-image {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .clickable-profile-image:hover {
        transform: scale(1.03);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    .modal-content {
        background-color: rgba(0,0,0,0.8);
    }
    .modal-body img {
        border: 2px solid #6f42c1;
        border-radius: 5px;
    }
   
    .clickable-profile-image:hover {
        transform: scale(1.05);
    }
    .clickable-profile-image:hover + .profile-image-overlay {
        opacity: 1;
    }
    .status-badge {
        font-size: 0.9rem;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    h2.mb-3.textprofile {
    font-size: 25px;
    font-weight: 600;
    font-family: poppins;
}
   strong.subtext {
    font-size: 16px;
    padding-right: 5px;
}
span.textchild {
    font-size: 16px;
}
    p {
        font-size: 1.1rem;
        line-height: 1.6;
    }
    .text-primary {
        color: #6f42c1 !important;
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
                                <button class="nav-link" id="booking-tab" data-bs-toggle="tab"
                                    data-bs-target="#booking-tab-pane" type="button" role="tab"
                                    aria-controls="booking-tab-pane" aria-selected="false">Bookings</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="earning-tab" data-bs-toggle="tab"
                                    data-bs-target="#earning-tab-pane" type="button" role="tab"
                                    aria-controls="earning-tab-pane" aria-selected="false">Transaction</button>
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
                <div class="tab-pane fade show active" id="personal-tab-pane" role="tabpanel" aria-labelledby="personal-tab">
                  <section class="content py-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-body p-5">
                            <div class="row align-items-center mb-4">
                                <div class="col-md-4 text-center mb-4 mb-md-0">
                                    <div class="profile-image-container position-relative">
                                        @if ($associate->profile_picture)
                                            <img src="{{ asset('uploads/profile/' . $associate->profile_picture) }}"
                                                class="img-fluid rounded-circle clickable-profile-image shadow-sm"
                                                style="width: 200px; height: 200px; object-fit: cover; border: 4px solid #6f42c1;;"
                                                alt="Profile Picture" data-bs-toggle="modal"
                                                data-bs-target="#profileImageModal">
                                        @else
                                            <img src="{{ asset('Uploads/blankImage/blank.jpg') }}"
                                                class="img-fluid rounded-circle shadow-sm"
                                                style="width: 200px; height: 200px; object-fit: cover; border: 4px solid #e9ecef;"
                                                alt="Default Profile">
                                        @endif
                                        <div class="profile-image-overlay position-absolute top-0 start-0 w-100 h-100 rounded-circle"
                                            style="background: rgba(0,0,0,0.1); opacity: 0;"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h2 class="mb-3 textprofile">
                                        {{ $associate->name }}
                                    </h2>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <p class="mb-2"><strong class="subtext">Email:</strong>
                                                <span class="textchild">{{ $associate->email ?? '-' }}</span></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-2"><strong class="subtext">Username:</strong>
                                                <span class="textchild">{{ $associate->user_name ?? '-' }}</span></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-2"><strong class="subtext">Hear About Us:</strong>
                                                <span class="textchild">{{ $associate->heard_about_us ?? '-' }}</span></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-2"><strong class="subtext">Country:</strong>
                                                <span class="textchild">{{ $associate->country ?? '-' }}</span></p>
                                        </div>
                                        @php
                                            $birthday = \Carbon\Carbon::createFromDate($associate->year, $associate->month, $associate->day);
                                        @endphp
                                        <div class="col-md-6">
                                            <p class="mb-2"><strong class="subtext">Age:</strong>
                                                <span class="text-dark">{{ $associate->age }} years old</span></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-2"><strong class="subtext">Email Status:</strong>
                                                @if ($associate->email_status == 0)
                                                    <span class="status-badge status-in-progress badge bg-warning text-dark px-3 py-1 rounded-pill">Not Verified</span>
                                                @elseif($associate->email_status == 1)
                                                    <span class="status-badge status-verified badge bg-success text-white px-3 py-1 rounded-pill">Verified</span>
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
                <div class="tab-pane fade" id="booking-tab-pane" role="tabpanel" aria-labelledby="booking-tab">
                    <div class="card-body">
			   			 <table id="table" class="table table-striped" style="width:100%">
			   				 	<thead>
						            <tr>
						                <th>S.No</th>
						                <th>Date</th>
						                <th>Associate</th>
						                <th>Companion</th>
						                <th>Title</th>
						                <th>Gems</th>
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
                  <table id="example" class="table table-striped" style="width:100%">
			   				 	<thead>
						             <tr>
						                <th>S.No</th>
						                <th>Name</th>
						                <th>Date</th>
						                <th>Transaction Id</th>
						                <th>Amount</th>
						                <th>Gems</th>
						                <th>Status</th>
						            </tr>
					        	</thead>
					       		<tbody>
                                 @foreach ($transactions as $index =>$transaction)
                                            <tr>
                                                <td>{{$index+1 }}</td>
                                                 <td>{{$transaction->user->name }}</td>
                                                <td>{{date('d-m-Y',strtotime($transaction->created_at))}}</td>
                                                <td>{{($transaction->transaction_id)?$transaction->transaction_id:'-'}}</td>
                                                <td>{{ ($transaction->Amount)?$transaction->Amount:'-' }}</td>
                                                <td>{{ ($transaction->Gems)?$transaction->Gems:'-'}}</td>
                                                <td>
                                                    @if($transaction->status==0)
                                                     <span style="color:yellow">Pending</span> 
                                                    @endif
                                                    @if($transaction->status==1)
                                                        <span style="color:green">Completed</span>
                                                    @endif
                                                    @if($transaction->status==2)
                                                      <span style="color:red">Failed</span>
                                                     @endif
                                                </td>
                                                
                                             </tr>
                                        @endforeach	
                            </tbody>
					   </table>    
                </div>
                <!--<div class="tab-pane fade" id="banking-tab-pane" role="tabpanel" aria-labelledby="banking-tab">-->
                   
                <!--</div>-->
                <!--<div class="tab-pane fade" id="setting-tab-pane" role="tabpanel" aria-labelledby="setting-tab">-->
                   
                </div>
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