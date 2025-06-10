@extends('template.layout.app')
@section('content')
 <div class="row w-100 m-0">
    <main class="col-md-10 offset-md-2 px-4">
        <div class="main-section">
            <div class="d-flex align-items-center myprofile-txtt flex-wrap">
                <div class="dashboard-asscoiateheder">
                    <h4 class="mb-0 editprofile-heding">My profile</h4>
                </div>
            </div>
            <div class="card assoiate-profiledashboard p-4 mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile p-2">
                            <div class="d-flex justify-content-between align-items-start flex-wrap">
                                <div class="d-flex align-items-center mb-3 fix-dashprofile"> <img src="{{asset('uploads/profile/'.Auth::User()->profile_picture)}}" alt="profile-img" class="profile-associateadmin">
                                    <div class="d-flex flex-column editing-assoiatep">
                                        <h4 class="user-detail-name mb-1">{{Auth::User()->name}}</h4>
                                        <p class="user-detail-mail mb-2">{{Auth::User()->email}}</p>
                                        <div class="divider my-2"></div>
                                        <div class="user-info d-flex flex-wrap gap-4">
                                            <p><span class="fw-bold">Username:</span>{{Auth::User()->user_name}}</p>
                                            <p><span class="fw-bold">Country:</span>{{Auth::User()->country}}</p> @php $birthday = \Carbon\Carbon::createFromDate($user->year, $user->month, $user->day); @endphp <p><span class="fw-bold">Age:</span> {{ $birthday->age ?? ""}} year old</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                     <a href="{{route('Editassociate')}}" class="edit-assoiate d-flex align-items-center"> 
                                     <i class="fas fa-pen edit-iconn me-2" style="color: #fff;">
                                         
                                     </i> Edit Your Profile</a> </div>
                            </div>
                            <div class="mb-3 btnin-select">
                                <div class="section-title">Interests:</div>
                                <div class="badge-container"> @foreach($hobbies as $hobbie) <span class="badge-custom"> <img src="{{ asset('uploads/hobbies/'.$hobbie->image) }}" class="icon-dashbord" /> {{ ucfirst($hobbie->hobbie) }} </span> @endforeach </div>
                            </div>
                            <div class="mb-3 btnin-select">
                                <div class="section-title">Hobbies:</div>
                                <div class="badge-container"> @foreach($additionalhobbie as $hobbie) <span class="badge-custom"><img src="{{ asset('uploads/additional_hobbies/'.$hobbie->image) }}" alt="" class="icon-dashbord" /> {{ ucfirst($hobbie->additional_hobbie) }} </span> @endforeach </div>
                            </div>
                            <div class="mb-3 btnin-select">
                                <div class="section-title">Personal Traits:</div>
                                <div class="badge-container"> @foreach($trait as $hobbie) <span class="badge-custom"><img src="{{asset('uploads/personaltrait/'.$hobbie->image)}}" alt="" class="icon-dashbord" /> {{ ucfirst($hobbie->personal_trait) }} </span> @endforeach </div>
                            </div>
                            <div class="mb-2 btnin-select">
                                <div class="section-title">Favorite Activities:</div>
                                <div class="badge-container"> @foreach($activity as $hobbie) <span class="badge-custom"><img src=" {{ asset('uploads/activity/'.$hobbie->image)}}" alt="" class="icon-dashbord" /> {{ ucfirst($hobbie->activity) }}</span> @endforeach </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        </div>
@endsection
@section('script')
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
 @endsection