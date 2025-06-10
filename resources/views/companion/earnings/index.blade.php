 @section('css')
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
    
    .pagination .page-link {
    border-radius: 50%;
    background: #5f42a9;
    color: #FFF;
    font-size: 16px;
    font-weight: 600;
    font-family: 'Poppins';
}
</style>
@endsection
@extends('template.layout.app')
@section('content')
  <div class="row w-100 m-0">
    <main class="col-md-10 offset-md-2 px-4">
               @include('alertmessage')
                <div class="d-flex align-items-center justify-content-between flex-wrap editpro-txtt mb-4">
                  <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                    <h4 class="mb-0 editprofile-heding">My Earning</h4>
                  </div>
                </div>
               <div class="gemsearnig-card">
                  <div class="row mb-4">
                    <div class="col-md-3">
                    <div class="card earn-card">
                        <div class="card-bodyy">
                          <h5 class="earn-titlee">This week</h5>
                          <div class="cardgems-img">
                            <img src="{{asset('assests/images/gemsimg.svg')}}" alt="gems">
                            <h4>{{$thisweekearningcount}}</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card earn-card">
                        <div class="card-bodyy">
                          <h5 class="earn-titlee">Last week</h5>
                          <div class="cardgems-img">
                            <img src="{{asset('assests/images/gemsimg.svg')}}" alt="gems">
                            <h4>{{$lastWeekEarningCount}}</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card earn-card">
                        <div class="card-bodyy">
                          <h5 class="earn-titlee">Monthly</h5>
                          <div class="cardgems-img">
                            <img src="{{asset('assests/images/gemsimg.svg')}}" alt="gems">
                            <h4>{{$thisMonthEarningCount}}</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card earn-card">
                        <div class="card-body totelcardgemearn">
                          <h5 class="earn-titlee">Balance</h5>
                          <h4><img src="{{asset('assests/images/gemsimg.svg')}}" alt="gems" class="gemsearnsvg" > {{$earningcount-$withdrawansSum}}</h4>
                          <button type="button" class="withdral-btnn" data-bs-toggle="modal" data-bs-target="#withdrawalModal">
                            Withdrawal
                          </button>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-between flex-wrap tabinearningcompainon">
                       <div class="d-flex align-items-center flex-wrap flex-grow-1">
                            <ul class="nav nav-tabs ms-3 mt-2 mt-md-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="upcoming-tab" data-bs-toggle="tab"
                                        data-bs-target="#upcoming-tab-pane" type="button" role="tab"
                                        aria-controls="upcoming-tab-pane"
                                        aria-selected="true">Gems Offered</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="post-tab" data-bs-toggle="tab"
                                        data-bs-target="#post-tab-pane" type="button" role="tab"
                                        aria-controls="post-tab-pane" aria-selected="false">Gems Pending</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pending-tab" data-bs-toggle="tab"
                                        data-bs-target="#pending-tab-pane" type="button" role="tab"
                                        aria-controls="pending-tab-pane" aria-selected="false">Gems Withdrawn</button>
                                </li>
                             </ul>
                        </div>
                </div>
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="upcoming-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="card upcomin-card">
                        <div class="row mb-3">
                            <div class="container">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead class="table-lightcolor">
                                            <tr class="text-hedingdata">
                                                <th scope="col">Details</th>
                                                <th scope="col">Day</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Gems</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-content">
                                             @if(isset($earnings) && count($earnings) > 0)
                                             @foreach($earnings as $index => $earning) 
                                               
                                                    <tr class="align-middle">
                                                         
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
                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <p>No  Offered Gems Found</p>
                                                        </td>
                                                    </tr>
                                                @endif
                                         </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-5">
                                        <nav>
                                            <ul class="pagination">
                                                @if ($earnings->onFirstPage())
                                                    <li class="page-item disabled"><span class="page-link"><i class="fas fa-arrow-left"></i></span></li>
                                                @else
                                                    <li class="page-item"><a class="page-link" href="{{ $earnings->previousPageUrl() }}"><i class="fas fa-arrow-left"></i></a></li>
                                                @endif
                                    
                                                @foreach ($earnings->getUrlRange(1, $earnings->lastPage()) as $page => $url)
                                                    <li class="page-item {{ $earnings->currentPage() == $page ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                                                    </li>
                                                @endforeach
                                    
                                                @if ($earnings->hasMorePages())
                                                    <li class="page-item"><a class="page-link" href="{{ $earnings->nextPageUrl() }}"><i class="fas fa-arrow-right"></i></a></li>
                                                @else
                                                    <li class="page-item disabled"><span class="page-link"><i class="fas fa-arrow-right"></i></span></li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="tab-pane fade" id="post-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"><div class="card upcomin-card">
            <div class="row mb-3">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-lightcolor">
                                <tr class="text-hedth">
                                    <th scope="col">Sr No.</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Day/Date/Time</th>
                                    <th scope="col">Gems</th>
                                </tr>
                            </thead>
                            <tbody class="table-content">
                                 @if(isset($pendings) && count($pendings) > 0)
                                 @foreach($pendings as $index => $pending) 
                                 
                                <tr class="align-middle">
                                      <td>{{ $index + 1 }}</td>
                                      <td>{{ ($pending->status == 0) ? 'Pending' : 'Withdrawn' }}</td>
                                      <td>{{ \Carbon\Carbon::parse($pending->created_at)->setTimezone('Asia/Kolkata')->format('l, d-m-Y, h:i A') }}</td>
                                      @if($pending->status == 0)
                                        <td class="purple-txtgems">
                                          <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="gemsearnsvg">
                                          {{ $pending->earning_drawn }}Gems
                                        </td>
                                      @endif
                                      @if($pending->status == 1) 
                                        <td  class="redtxt-gems"  >
                                          <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" class="gemsearnsvg">
                                          {{ $pending->earning_drawn }}Gems
                                        </td>
                                      @endif
                                </tr>
                                 @endforeach
                                 @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <p>No Pending Gems Found</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-5">
                            <nav>
                                <ul class="pagination">
                                    @if ($pendings->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link"><i class="fas fa-arrow-left"></i></span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $pendings->previousPageUrl() }}"><i class="fas fa-arrow-left"></i></a></li>
                                    @endif
                        
                                    @foreach ($pendings->getUrlRange(1, $pendings->lastPage()) as $page => $url)
                                        <li class="page-item {{ $pendings->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                                        </li>
                                    @endforeach
                        
                                    @if ($pendings->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{ $pendings->nextPageUrl() }}"><i class="fas fa-arrow-right"></i></a></li>
                                    @else
                                        <li class="page-item disabled"><span class="page-link"><i class="fas fa-arrow-right"></i></span></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="tab-pane fade" id="pending-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"><div class="card upcomin-card">
            <div class="row mb-3">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-lightcolor">
                                <tr class="text-hedth">
                                    <th scope="col">Sr No.</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Day/Date/Time</th>
                                    <th scope="col">Gems</th>
                                </tr>
                            </thead>
                            <tbody class="table-content">
                                
                                 @if(isset($withdrawans) && count($withdrawans) > 0)
                                 
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
                                  @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <p>No Withdrawn Gems Found</p>
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
                
       <div class="modal fade" id="withdrawalModal" tabindex="-1" aria-labelledby="withdrawalModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog withdraw">
                     <form action="{{ route('myearnings-drawn') }}" method="POST">
                         @csrf
                         <input type="hidden" value="{{ $earningcount }}" name="total_earn">
                         <div class="modal-content border-model">
                             <div class="modal-header">
                                 <h5 class="modal-title withdrw-title" id="withdrawalModalLabel">Withdrawal</h5>
                                 <button type="button" class="btn-close withdrawl" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                             </div>
                             <div class="modal-body draw-colour">
                                 <div class="current-gemsmodel">
                                     <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gems" width="50px">
                                     <h4>Current Gems</h4>
                                     <h3>{{ $earningcount - $withdrawansSum }} Gems</h3>
                                     <div class="amount-total">
                                         <p>TOTAL AMOUNT <strong>${{ $earningcount - $withdrawansSum }}</strong></p>
                                         <p>MINIMUM WITHDRAWAL <strong>10 GEMS</strong> </p>
                                     </div>
                                 </div>
                             </div>
                             <div class="modal-footer now-withdraw">
                                 <h3>Amount to withdraw (in Gems)</h3>
                                 <label>
                                     <input type="text" name="earning_drawn" class="input-underline"
                                         placeholder="Enter amount">
                                 </label>
                                 <button type="submit" class="nowwithdraw-btn">Withdraw Now</button>
                             </div>
                         </div>
                     </form>
                 </div>
                 </main>
             </div>

</div>
@endsection
