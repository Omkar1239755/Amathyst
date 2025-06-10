@extends('webtemplate.layouts.layout')
@section('content')
    <section class="signup">
        <div class="container">
            <div class="row">
                <div class="col-md-6 signup-left d-flex align-items-center justify-content-center h-100">
                    <img src="{{ asset('assests/images/signupimg.svg') }}" alt="Illustration" class="img-fluid">
                </div>
                <div class="col-md-6 right-signup align-items-center justify-content-center h-100">
                    <div class="content-sighnup">
                        <div class="textright-sign">
                            <h5>Who Are You Signing Up As?</h5>
                            <h2>Companion or Date Seeker</h2>
                            <p>
                                Select the account type that best matches your role. This
                                helps us tailor your experience on Amathyst.
                            </p>
                        </div>

                        <div class="twoo-btns-box">
                            <a href="{{ route('associate') }}" class="assoite-link">
                                <div class="assoiate-content">
                                    <img src="{{ asset('assests/images/btnprofile.svg') }}" alt=""
                                        class="assoite-pic" />
                                    <div class="assoitebtn-text">
                                        <h2 class="title-iam">Being Associate</h2>
                                        <p class="description-assoite">
                                            Associates are date seekers who browse, book, and enjoy activities with verified
                                            Companions.
                                            Think of this as your personalized adventure through real-world connections.
                                        </p>
                                    </div>
                                    <i class="fas fa-arrow-right assoiate-icon"></i>
                                </div>
                            </a>
                            <div class="btn-divider"></div>

                            <a href="{{ route('companion') }}" class="champion-link">
                                <div class="assoiate-content">
                                    <img src="{{ asset('assests/images/btnprofilesecond.svg') }}" alt=""
                                        class="assoite-pic" />
                                    <div class="assoitebtn-text">
                                        <h2 class="title-iam">Being Companion</h2>
                                        <p class="description-assoite">
                                            Companions are the heart of Amathyst; they provide genuine presence and shared
                                            experiences.
                                            You’re here to connect, inspire, and create memorable moments.
                                        </p>
                                    </div>
                                    <i class="fas fa-arrow-right assoiate-icon"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
