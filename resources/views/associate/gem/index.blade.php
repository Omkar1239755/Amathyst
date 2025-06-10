@extends('template.layout.app')
@section('content')
    <div class="row w-100 m-0">
       <main class="col-md-10 offset-md-2 px-4">
                                @include('alertmessage')
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap editpro-txtt mb-4">
                                    <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                                        <h4 class="mb-0 editprofile-heding">Gems</h4>
                                    </div>
                                </div>
                                <div class="gemsearnig-card">
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="card earn-card">
                                                <div class="card-bodyy">
                                                    <h5 class="earn-titlee">Subscription Gems</h5>
                                                    <div class="cardgems-img">
                                                        <img src="{{asset('assests/images/gemsimg.svg')}}" alt="gems">
                                                        <h4>
                                                           {{ isset($usergem) && !is_null($usergem) ? $usergem->intial_gem : 0 }}                                                  
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card earn-card">
                                                <div class="card-bodyy">
                                                    <h5 class="earn-titlee">Available Gems</h5>
                                                    <div class="cardgems-img">
                                                        <img src="{{asset('assests/images/gemsimg.svg')}}" alt="gems">
                                                        <h4>
                                                         {{ isset($usergem) && !is_null($usergem) ? $usergem->intial_gem-$gempurchased+$usergem->cancel_gem: 0 }}    
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card earn-card">
                                                <div class="card-bodyy">
                                                    <h5 class="earn-titlee">Used Gems</h5>
                                                    <div class="cardgems-img">
                                                        <img src="{{asset('assests/images/gemsimg.svg')}}" alt="gems">
                                                         <h4>
                                                           {{ isset($gempurchased) && $usergem && !is_null($gempurchased - $usergem->cancel_gem) ? $gempurchased - $usergem->cancel_gem : 0 }}
 
                                                        </h4>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card gems-cardddashboard">
                                    <div class="tab-gems">
                                        <div class="tabbtn">
                                             <button class="tablinks" onclick="openCity(event, 'Paris')" id="defaultOpen">Gems
                                                Packages</button>
                                            <button class="tablinks" onclick="openCity(event, 'London')"
                                                >Gems History</button>
                                           
                                            </div>

                                         <div id="London" class="tabcontent ">
                                            <div class="table-responsive rounded shadow-sm">
                                                <table class="table table-bordered myearning-td">
                                                    <thead class="table-light">
                                                        <tr class="head-earningtable">
                                                            <th scope="col">Sr No</th>
                                                            <th scope="col">Companion Name</th>
                                                            <th scope="col">Service</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Gems</th>
                                                            <th scope="col">Status</th>
                                                         </tr>
                                                    </thead>
                                                    <tbody>
                                                      @if($bookings->isEmpty())
                                                            <tr>
                                                                <td colspan="5" class="text-center"><b>No Gems history available</b></td>
                                                            </tr>
                                                        @else
                                                        
                                                        @foreach($bookings as $index => $booking)
                                                        <tr class="text-withdraw">
                                                            <td>{{$index+1}}</td>

                                                            <td class="profileassoiate-svg">
                                                                <img src="{{ asset('uploads/profilecompanion/' . $booking->companion->profile_picture) }}" alt="profile"
                                                                     style="width: 60px; height: 60px; border-radius: 60%; object-fit: cover; margin-right: 8px;">
                                                                {{ $booking->companion->name }}
                                                            </td>
                                                                    
                                                            <td>{{ $booking->title}}</td>
                                                            <td>{{ $booking->created_at->format('d-m-Y') }}</td>
                                                            <td class="gemsassoiatesvg-img"><img src="{{asset('assests/images/gemsimg.svg')}}" alt="gems"
                                                                >{{ $booking->gem}}gems</td>
                                                             @if($booking->status == 1)  
                                                              <td style="color: #5cb85c;">Completed</td>
                                                             @else
                                                              <td style="color: #ff0000;">Cancelled</td>
                                                             @endif
                                                        </tr>
                                                        @endforeach
                                                         @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                       <div id="Paris" class="tabcontent">

                                            <div class="d-flex justify-content-center flex-wrap gemscard">
                                                <!-- Card 1 -->
                                             @foreach($gemdata as $data)
                                                <div class="gem-card">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="rupeegems-txt">
                                                            <h2 class="gems_amount">{{ $data->Amount }} $</h2>
                                                            <p class="gems_count">{{ $data->{'No of gems'} }} Gems</p>
                                                        </div>
                                                        <img src="{{ asset('assests/images/gemsimg.svg') }}" alt="gem icon" class="gem-img">
                                                    </div>
                                            
                                                    <div class="description mb-3">Start exploring with a small pack!</div>
                                            
                                                    <button type="button" class="btn-purplegem gems_purchase">Buy Gems Now</button>
                                                </div>
                                            @endforeach
                                         
                                        </div>
                                    </div>
                                 </div>
                             </div>
                        </div>
                </main>
    </div>
@endsection
@section('script')    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
   $(document).ready(function(){
    $(".gems_purchase").on("click", function(e){
        e.preventDefault();

        var $card = $(this).closest('.gem-card');
        var gems_count = $card.find('.gems_count').text().trim();
        var gems_amount = $card.find('.gems_amount').text().trim();
        var gemcount = parseInt(gems_count) || 0;  
        var gemamount = parseFloat(gems_amount) || 0;

        
        $.ajax({
            url: '{{ route('purchase') }}',  
            type: 'post',
            data: {
                count: gemcount,
                amount: gemamount,
                _token: '{{ csrf_token() }}'  
            },
            success: function(response){
               if (response.checkout_url) {
              window.location.href = response.checkout_url; // Redirect to Stripe Checkout
            }              
        else {
         Swal.fire('Error', 'Checkout URL not received', 'error');
            }
            
            },
            error: function(xhr, status, error){
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred: ' + error,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

</script>
  <script>
        const sidebarLinks = document.querySelectorAll(".sidebar .nav-link");

        sidebarLinks.forEach((link) => {
            const img = link.querySelector("img.sidebar-icon");
            if (!img) return;

            const defaultSrc = img.getAttribute("data-default");
            const hoverSrc = img.getAttribute("data-hover");
            const href = link.getAttribute("href");

          
            if (localStorage.getItem("activeSidebar") === href) {
                link.classList.add("active");
                img.src = hoverSrc;
            }

           
            link.addEventListener("mouseenter", () => {
                img.src = hoverSrc;
            });

            link.addEventListener("mouseleave", () => {
                if (!link.classList.contains("active")) {
                    img.src = defaultSrc;
                }
            });

           
            link.addEventListener("click", (e) => {
                localStorage.setItem("activeSidebar", href);
                
            });
        });
    </script>
    <script>
    function openCity(evt, cityName) {
        
        var tabcontent = document.getElementsByClassName("tabcontent");
        for (var i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
         var tablinks = document.getElementsByClassName("tablinks");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }
    window.onload = function () {
        document.getElementById("defaultOpen").click();
    };
</script>
@endsection