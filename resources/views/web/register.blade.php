@extends('webtemplate.layouts.layout')
@section('content')
    <section class="register-section">
        <div class="container-fluid">
            <div class="row  align-items-center">
                <div class="col-md-6 register-left h-100 d-flex flex-column justify-content-center register-form"> <img
                        src="{{ asset('assests/images/registerimage.svg') }}" alt="" /> </div>
                <div class="col-md-6 form-regis d-flex flex-column justify-content-center register-form">
                    <form id="passwordForm" method="post" action="{{ route('storeregister') }}"> @csrf <h2
                            class="register-heading">
                            Register</h2>
                        <p class="para-register"> Build meaningful moments with people who share your interests. Sign up to
                            start your
                            journey with Amathyst. </p> 
                        <div class="mb-3"> <label class="form-label">Full Name</label> <input type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Enter your full name" /> 
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> {{-- Email --}}
                        <div class="mb-3"> <label class="form-label">Email Address</label> <input type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Enter your email address" /> 
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3"> <label class="form-label">Country</label> <select
                                class="form-select @error('country') is-invalid @enderror" name="country">
                                <option selected disabled>Select your country</option>
                                <option {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                <option {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                                <option {{ old('country') == 'UK' ? 'selected' : '' }}>UK</option>
                                <option {{ old('country') == 'Australia' ? 'selected' : '' }}>Australia</option>
                            </select> 
                            @error('country')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3"> <label class="form-label" for="birthday">Birthday:</label>
                            <input type="date" id="birthday" name="birthday"
                                class="form-control @error('birthday') is-invalid @enderror"
                                value="{{ old('birthday') }}" />
                            @error('birthday')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div> 
                        
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">

                                <input type="password" id="password" name="password"
                                    class="form-control showhiide-password @error('password') is-invalid @enderror"
                                    placeholder="Enter your password" required />
                                    
                                <button type="button" class="input-group-text cheackit-password" disabled>
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div id="strengthMessage"></div>
                       
                        <div class="mb-3"> <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" id="confirmPassword" name="confirm"
                                    class="form-control showhiide-password @error('confirm') is-invalid @enderror"
                                    placeholder="Confirm your password" required />
                                <button type="button" class="input-group-text cheackit-password" disabled>
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                                @error('confirm')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3"> <label class="form-label">How did you hear about us?</label> <select
                                class="form-select @error('heard_about') is-invalid @enderror" name="heard_about">
                                <option selected disabled>Select</option>
                                <option {{ old('heard_about') == 'Friends' ? 'selected' : '' }}>Friends</option>
                                <option {{ old('heard_about') == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                <option {{ old('heard_about') == 'Search Engine' ? 'selected' : '' }}>Search Engine</option>
                                <option {{ old('heard_about') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select> @error('heard_about')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="form-check mb-4"> <input class="form-check-input" type="checkbox" id="terms"
                                name="terms" />
                            <label class="form-check-label" for="terms"> I accept the <a href="#">Terms &
                                    Conditions</a> and <a href="#">Privacy Policy</a>. </label> @error('terms')
                                <div class="form-text text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="registraionform-btndiv text-center"> <a href="#" class="btnform-register"
                                onclick="submitForm(event)">Register Now</a> </div>
                        <div class="login-link mt-3"> Already have an account? <a href="{{ route('login') }}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function validatePassword(password) {
            const pattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
            return pattern.test(password);
        }
    </script>
    <script>
        function submitForm(event) {
            event.preventDefault(); 
            document.getElementById('passwordForm').submit(); 
        }
    </script>
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
            const input = $(this).siblings(
            ".showhiide-password"); 
            if ($(this).hasClass("active")) {
                input.attr("type", "text");
                $(this).find("i").removeClass("fa-eye-slash").addClass("fa-eye");
            } else {
                input.attr("type", "password");
                $(this).find("i").removeClass("fa-eye").addClass("fa-eye-slash");
            }
        });

   
        $(".showhiide-password").on("focus", function() {
            $(this).siblings(".cheackit-password").prop("disabled", false);
        });
    </script>
    
<script>
    document.getElementById('password').addEventListener('input', function() {
        var strengthMessage = document.getElementById('strengthMessage');
        var val = this.value;
        var strength = 0;
    
        if (val.length > 7) strength++;
        if (/[A-Z]/.test(val)) strength++;
        if (/[0-9]/.test(val)) strength++;
        if (/[^A-Za-z0-9]/.test(val)) strength++;
    
        switch(strength) {
            case 0:
            case 1:
                strengthMessage.textContent = "Weak";
                strengthMessage.style.color = "red";
                break;
            case 2:
                strengthMessage.textContent = "Moderate";
                strengthMessage.style.color = "orange";
                break;
            case 3:
            case 4:
                strengthMessage.textContent = "Strong";
                strengthMessage.style.color = "green";
                break;
        }
    });
</script>
@endsection