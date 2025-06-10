<style>
    .dropdown-itemnotif {
        display: block;
        padding: 10px;
        border-bottom: 1px solid #eee;
      
    }

    .dropdown-itemnotif:last-child {
        border-bottom: none;
       
    }
    .pointer {cursor: pointer;}
</style>
@if (Auth::check() && Auth::user()->user_type == 1)
    <nav class="sidebar" id="sidebar">
        <div class="removesidebar"><i class="las la-times"></i></div>
        <ul class="nav flex-column px-3">
            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('associatedashboard') }}">
                    <i class="las la-user-circle"></i>
                    My Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('associate.booking') }}">
                    <i class="las la-book"></i>
                    My Booking
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('chat') }}">
                    <i class="las la-comment-dots"></i>
                    Messages
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('associategems') }}">
                    <i class="las la-gem"></i>
                    Gems
                </a>
            </li>

            

            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('settings') }}">
                    <i class="las la-cog"></i>
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="#" data-bs-toggle="modal"
                    data-bs-target="#logoutassociateModal">
                    <i class="las la-sign-out-alt"></i>
                    Logout
                </a>
            </li>
       
            <div class="modal fade" id="logoutassociateModal" tabindex="-1" aria-labelledby="logoutModalassociateLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content logout">
                        <div class="modal-header logout">
                            <h5 class="modal-title text-center" id="logoutModalassociateLabel"><img
                                    src="{{ asset('assests/images/logoutt.svg') }}" class="img-logout" alt="">
                            </h5>
                            <div class="close-logout">
                                <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"><img
                                        src="{{ asset('assests/images/logoutremovee.svg') }}" alt=""></button>
                            </div>
                        </div>
                        <div class="modal-body text-center logoutt">
                            <h3>Logout</h3>
                            Are you sure you want to log out of your account?
                        </div>

                        <div class="modal-footer justify-content-center logoutt">
                            <button type="button" class="btnlogout-noo" data-bs-dismiss="modal">No</button>
                            <a href ="{{ route('logout') }}"><button type="button"
                                    class="btnyes-logout ">Yes</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </nav>
@else
    <nav class="sidebar" id="sidebar">
        <div class="removesidebar"><i class="las la-times"></i></div>
        <ul class="nav flex-column px-3">
            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('dashboard') }}">
                    <i class="las la-user-circle"></i>
                    My Profile
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('companion.booking') }}">
                    <i class="las la-book"></i>
                    My Booking
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('chat') }}">
                    <i class="las la-comment-dots"></i>
                    Messages
                </a>
            </li>


            <!-- <li class="nav-item">-->
            <!--    <a class="nav-link sidebar-alink" href="{{ route('myavailability.index') }}">-->
            <!--        <i class="las la-stopwatch"></i>-->
            <!--         My Availability-->
            <!--    </a>-->
            <!--</li>-->

            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('myearnings') }}">
                    <i class="las la-file-invoice-dollar"></i>
                    My Earning
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('rate.index') }}">
                    <i class="las la-money-bill-wave"></i>
                    Rates
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('document.index') }}">
                    <i class="las la-id-card-alt"></i>
                    Verification Documents
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('companion.rating') }}">

                    <i class="las la-star"></i>
                    Rating/Reviews
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="{{ route('settings') }}">
                    <i class="las la-cog"></i>
                    Settings
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link sidebar-alink" href="#" data-bs-toggle="modal"
                    data-bs-target="#logoutModal">
                    <i class="las la-sign-out-alt"></i>
                    Logout
                </a>
            </li>
          
            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content logout">
                        <div class="modal-header logout">
                            <h5 class="modal-title text-center" id="logoutModalLabel"><img
                                    src="{{ asset('assests/images/logoutt.svg') }}" class="img-logout"
                                    alt=""></h5>
                            <div class="close-logout">
                                <button type="button" class="" data-bs-dismiss="modal"
                                    aria-label="Close"><img src="{{ asset('assests/images/logoutremovee.svg') }}"
                                        alt=""></button>
                            </div>
                        </div>
                        <div class="modal-body text-center logoutt">
                            <h3>Logout</h3>
                            Are you sure you want to log out of your account?
                        </div>

                        <div class="modal-footer justify-content-center logoutt">
                            <button type="button" class="btnlogout-noo" data-bs-dismiss="modal">No</button>
                            <a href ="{{ route('logout') }}"><button type="button"
                                    class="btnyes-logout ">Yes</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </ul>
    </nav>
@endif
<header class="fixed-top shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center px-4">
        <button type="button" id="sidebarcontrolbarr"><i class="las la-bars fs-2"></i></button>
        <div class="dashboard-logo">
            <a href="{{ route('index') }}"><img src="{{ asset('assests/images/Logo.png') }}" alt="Logo"
                    height="20"></a>
        </div>
        <div class="d-flex align-items-center gap-4">
            <a href="{{ route('home.companion') }}" class="listcompanion-link">Companion List</a>
            @php
                use App\Models\Booking;
                $bookingCount = Booking::where('companion_id', Auth::User()->id)
                    ->where('notification_status', 0)
                    ->count();
            @endphp
            @if (Auth::User()->user_type == 2)
                <div class="dropdown">
                    <div class="bell-notifiate position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-bell notification-bell"></i>
                        <span class="activepoint"> {{ $bookingCount }}</span>
                    </div>
                    @if ($bookingCount > 0)
                        <ul class="dropdown-menu notifications dropdown-menu-end p-0">

                                <li>
                                    <h6 class="dropdown-headernotifyactive">
                                      <a href="{{ route('notification') }}"
                                           class="cursor-pointer"
                                           style="text-decoration: none; color: inherit;">
                                           {{ $bookingCount }} Bookings
                                        </a>
                                    </h6>
                                </li>
                         
                            @php
                                $notifications = App\Models\Booking::where('companion_id', Auth::user()->id)
                                    ->where('notification_status', 0)
                                    ->get()
                                    ->groupBy('associate_id')
                                    ->map(function ($group) {
                                        return [
                                            'associate' => $group->first()->associate, // Get the associate from the first booking
                                            'count' => $group->count(), // Count the bookings
                                        ];
                                    });
                            @endphp

                            @foreach ($notifications as $notification)
                                <li>
                                    <a class="dropdown-itemnotif" href="#">
                                        <div>
                                            <i class="las la-user-friends"></i>
                                            <span class="notif-label">
                                                {{ $notification['associate']->name }} {{ $notification['count'] }}
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    @endif
                </div>
            
            @endif

            <div class="d-flex align-items-center gap-3">
                @if (Auth::User()->user_type == 2)
                    <img src="{{ asset('uploads/profilecompanion/' . Auth::User()->profile_picture) }}"
                        class="rounded-circle" width="45" alt="User Avatar" />
                @elseif(Auth::User()->user_type == 1)
                    <img src="{{ asset('uploads/profile/' . Auth::User()->profile_picture) }}" class="rounded-circle"
                        width="45" alt="User Avatar" />
                @endif

                <div class="d-flex flex-column">
                    <p class="mb-0 welcom-txt">Welcome Back</p>
                    <div class="d-flex align-items-center gap-2">
                        <small class="sub-hedwelcom">{{ Auth::User()->name }}</small>

                        <div class="dropdown mobiledropdown">
                            <a class="btn btn-sm dropdown-toggle indexx-drop" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"></a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if (Auth::User()->user_type == 2)
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}"><img
                                                src="{{ asset('assests/images/dashboardicon.svg') }}" alt="dashboard"
                                                width="20px" height="20px"> Go to Dashboard</a></li>
                                @endif

                                @if (Auth::User()->user_type == 1)
                                    <li><a class="dropdown-item" href="{{ route('associatedashboard') }}"><img
                                                src="{{ asset('assests/images/dashboardicon.svg') }}" alt="dashboard"
                                                width="20px" height="20px"> Go to Dashboard</a></li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="compaignrespnsive"><a class="dropdown-item "
                                        href="{{ route('home.companion') }}"><i
                                            class="lar la-list-alt linelisticonn"></i>Companion List</a></li>
                                <li class="compaignrespnsive">
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item " href="{{ route('logout') }}"><img
                                            src="{{ asset('assests/images/logout-Unfill.svg') }}" alt="logout"
                                            width="20px"> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
