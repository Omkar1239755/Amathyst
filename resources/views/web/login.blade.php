@extends('webtemplate.layouts.layout')
@section('content')
    <section class="login-form">
        <div class="container">
            <div class="row">
                <div class="col-md-6 form-regis h-100 d-flex flex-column justify-content-center login-log">
                    <img src="{{ asset('assests/images/registerimage.svg') }}" alt="" />
                </div>
                @include('alertmessage')
                <div class="col-md-6 h-100 d-flex flex-column justify-content-center Login-log">
                    <form method="POST" id="loginForm" action="{{ route('logincheck') }}">
                        @csrf
                        <h2 class="welcome-heading">Welcome Back!</h2>
                        <p class="login-para">
                            Connect with confidence and start meaningful relationships that
                            match your vibe.
                        </p>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter your email address" value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control showhiide-password"
                                    placeholder="Enter your password" />

                                <button type="button" class="input-group-text cheackit-password" disabled>
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-check mb-4 d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input me-2" type="checkbox" id="terms" />
                                <label class="form-check-label Remember-me mb-0" for="terms">
                                    Remember Me
                                </label>
                            </div>
                            <div class="forgot-link">
                                <a class="forgot-pass" href="{{ route('forgotpassword') }}">Forgot your password?</a>
                            </div>
                        </div>

                        <div class="login-btndiv text-center">
                            <a href="#" id="loginButton" class="btnform-login">Log In</a>
                        </div>
                        
                        <div class="otherwaysignin text-center">
                            <p>Or login with</p>
                            <div class="orloginbtn">
                                <a href="{{ route('auth.google') }}">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google" style="height: 14px;">
                                    <span>Sign in with Google</span>
                                </a>
                                <!--<a href="{{ route('auth.google') }}"  <button type="button"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="google" class="svggoogle" />Google</button></a>
                                <!--<button type="button"><img src="{{ asset('assests/images/Facebook1.svg') }}" alt="facebook" class="svggoogle" />Facebook</button>-->
                            </div>
                        </div>
                      </form>
                    <div class="log text-center mt-3">
                        Don’t have an account? <a href="{{ route('register') }}">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        document.getElementById("loginButton").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("loginForm").submit();
        });
    </script>
    <script>
        $(".cheackit-password").on("click", function() {
            $(this).toggleClass("active");
            const input = $(this).prev(".showhiide-password");

            if ($(this).hasClass("active")) {
                input.attr("type", "text");
                $(this).find("i").removeClass("fa-eye-slash").addClass("fa-eye");
            } else {
                input.attr("type", "password");
                $(this).find("i").removeClass("fa-eye").addClass("fa-eye-slash");
            }
        });
        $(".showhiide-password").on("focus", function() {
            $(this).next(".cheackit-password").removeAttr("disabled");
        });
    </script>
@endsection
