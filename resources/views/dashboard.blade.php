@extends('template.layout.app')
@section('content')
    <div class="row w-100 m-0">
        <main class="col-md-10 offset-md-2 px-4">
           @include('alertmessage')
            <div class="main-section">
                <div class="d-flex align-items-center myprofile-companionheding flex-wrap">
                    <div class="dashboard-profilehed">
                        <h4 class="myprofile-das">My profile</h4>
                    </div>
                </div>
                <div class="card dashboard-contenttext p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div style="
                  --swiper-navigation-color: #fff;
                  --swiper-pagination-color: #fff;
                "
                                class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    @foreach ($images as $hobbie)
                                        <div class="swiper-slide">

                                            <img src="{{ asset($hobbie->images) }}" />

                                        </div>
                                    @endforeach
                               </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper swiper-dashboard">

                                    @foreach ($images as $hobbie)
                                        <div class="swiper-slide">

                                            <img src="{{ asset($hobbie->images) }}" />

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>



                        <div class="col-md-8">
                            <div class="profile">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="heding-txtprofile">
                                        <h3 class="mb-1">{{ $user->name ?? '' }}</h3>
                                        <p class="mb-1">{{ $user->email ?? '' }}</p>
                                    </div>
                                    <a href="{{ route('editCompanion') }}" class="edit-profile mt-1">
                                        <i class="fas fa-pen edit-iconn" style="color: #fff"> </i>
                                        Edit Your Profile
                                    </a>
                                </div>

                                <div class="bio-simpletxt">
                                    <h3>Bio:</h3>
                                    <p>
                                        {{ $user->bio ?? '' }}
                                    </p>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-5 d-flex nameuser">
                                        <h6>Username:</h6>
                                        <p class=""> {{ $user->user_name ?? '' }}</p>
                                    </div>
                                    <div class="col-md-4 d-flex nameuser">
                                        <h6>Country:</h6>
                                        <p class=""> {{ $user->country ?? '' }}</p>
                                    </div>
                                    @php
                                        $birthday = \Carbon\Carbon::createFromDate($user->year, $user->month, $user->day);
                                    @endphp
                                    <div class="col-md-3 d-flex nameuser">
                                        <h6>Age:</h6>
                                        <p>
                                            {{ $birthday->age }} years old
                                        </p>
                                    </div>
                                </div>

                                <div class="mb-3 btnin-select">
                                    <div class="section-title">Interests:</div>
                                    <div class="badge-container">
                                        @foreach ($hobbies as $hobbie)
                                            <span class="badge-custom">
                                                <img src="{{ asset('uploads/hobbies/' . $hobbie->image) }}"
                                                    class="icon-dashbord" />
                                                {{ ucfirst($hobbie->hobbie) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-3 btnin-select">
                                    <div class="section-title">Hobbies:</div>
                                    <div class="badge-container">
                                        @foreach ($additionalhobbie as $hobbie)
                                            <span class="badge-custom"><img
                                                    src="{{ asset('uploads/additional_hobbies/' . $hobbie->image) }}"
                                                    alt="" class="icon-dashbord" />
                                                {{ ucfirst($hobbie->additional_hobbie) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-3 btnin-select">
                                    <div class="section-title">Personal Traits:</div>
                                    <div class="badge-container">

                                        @foreach ($trait as $hobbie)
                                            <span class="badge-custom"><img
                                                    src="{{ asset('uploads/personaltrait/' . $hobbie->image) }}"
                                                    alt="" class="icon-dashbord" />
                                                {{ ucfirst($hobbie->personal_trait) }}
                                            </span>
                                        @endforeach

                                    </div>
                                </div>


                                <div class="mb-2 btnin-select">
                                    <div class="section-title">Personalities & Preferences</div>
                                    <div class="badge-container">

                                        @foreach ($personality as $person)
                                            <span class="badge-custom"><img
                                                    src=" {{ asset('uploads/personalities/' . $person->image) }}"
                                                    alt="" class="icon-dashbord" />
                                                {{ ucfirst($person->personality_preferences) }}</span>
                                        @endforeach

                                    </div>
                                </div>



                                <div class="mb-2 btnin-select">
                                    <div class="section-title">Favorite Activities:</div>
                                    <div class="badge-container">

                                        @foreach ($activity as $hobbie)
                                            <span class="badge-custom"><img
                                                    src=" {{ asset('uploads/activity/' . $hobbie->image) }}" alt=""
                                                    class="icon-dashbord" />
                                                {{ ucfirst($hobbie->activity) }}</span>
                                        @endforeach

                                    </div>
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
    <!-- swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 3,
            grid: {
                rows: 2,
                fill: "row",
            },
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
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

            // Set active link from localStorage on page load
            if (localStorage.getItem("activeSidebar") === href) {
                link.classList.add("active");
                img.src = hoverSrc;
            }

            // Hover behavior
            link.addEventListener("mouseenter", () => {
                img.src = hoverSrc;
            });

            link.addEventListener("mouseleave", () => {
                if (!link.classList.contains("active")) {
                    img.src = defaultSrc;
                }
            });

            // On click, store active link in localStorage
            link.addEventListener("click", (e) => {
                localStorage.setItem("activeSidebar", href);
                // allow navigation to the page
            });
        });
    </script>
@endsection
