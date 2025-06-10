 
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
    
  <title>Home-page</title>
  
 <link rel="icon" href="{{ asset('assests/images/gemsimg.svg') }}" type="image/svg+xml">

  
  <!-- Bootstrap 5.3.3 CSS -->
  <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
  <!-- Icons link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('/css/swiper-bundle.min.css')}}" />
</head>
<body>
  <!-- Header -->
  <header class="bg-purple-custom">
    <div class="container-fluid">
      <div class="head">
        <nav class="navbar navbar-expand-sm navbar-dark">
         <a class="navbar-brand" href="{{route('index')}}"><img src="{{ asset('assests/images/Logo.png') }}" alt="" class="logo-hedd" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                    <li class="nav-item">
                  <a class="nav-link" href="{{route('index')}}">Home</a>
                </li> 
                  
                <li class="nav-item">
                  <a class="nav-link" href="{{route('home.companion')}}">Companions</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('index')}}#howitwork">How It Works</a>
                </li>
                <li class="nav-item">
            
                   <a class="nav-link" href="{{route('webfaq')}}">FAQ</a>
                </li>
              </ul>
              
              
             @guest
            <div class="login-navv">
                <a href="{{route('login')}}" class="bbtn-loginn">Login</a>
                <a href="{{route('register')}}" class="bbtn-registerr">Register</a>
              </div>
            </div>
            @endguest
            
            
            
              @auth
          
                 <div class="index-profile d-flex align-items-center gap-3">
                    @if(Auth::User()->user_type == 2)    
                     <img src="{{asset('uploads/profilecompanion/'.Auth::User()->profile_picture)}}" class="rounded-circle" width="50" alt="User Avatar" />
                    @endif
                    
                    @if(Auth::User()->user_type == 1)    
                     <img src="{{asset('uploads/profile/'.Auth::User()->profile_picture)}}" class="rounded-circle" width="50" alt="User Avatar" />
                    @endif
                    <div class="d-flex flex-column">
                        <p class="mb-0 welcom-txt">Welcome Back</p>
                        <div class="d-flex align-items-center gap-2">
                            <small class="mb-0 sub-hedwelcom"> {{Auth::User()->name}}</small>
                           <div class="dropdown">
                             <a class="btn btn-sm dropdown-toggle indexx-drop" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu">
                                      @if(Auth::User()->user_type == 2)
                                        <li><a class="dropdown-item" href="{{route('dashboard')}}"><img src="{{asset('assests/images/dashboardicon.svg')}}" alt="dashboard" width="20px" height="20px"> Go to Dashboard</a></li>
                                      @endif
                                       @if(Auth::User()->user_type == 1)
                                        <li><a class="dropdown-item" href="{{route('associatedashboard')}}"><img src="{{asset('assests/images/dashboardicon.svg')}}" alt="dashboard" width="20px" height="20px"> Go to Dashboard</a></li>
                                      <li><hr class="dropdown-divider"></li>
                                      @endif
                                   
                                    <li><a class="dropdown-item" href="{{route('logout')}}"><img src="{{asset('assests/images/logout-Unfill.svg')}}" alt="logout" width="20px"> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
             </div> 
     
        @endauth
            
         </nav>
      </div>
    </div>
  </header>
  <main>