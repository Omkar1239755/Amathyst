@extends('layouts.layout')
@section('content')


  <section class="register-section">
    <div class="container-fluid">
      <div class="row min-vh-100 align-items-center">
        <!-- Left side with image -->

        <div class="col-md-6 register-left h-100 d-flex flex-column justify-content-center register-form">
          <img src="/assests/images/registerimage.svg" alt="" />
        </div>
        <!-- Right side with form -->

        <div class="col-md-6 form-regis d-flex flex-column justify-content-center register-form">



                             <form id="passwordForm" method="post" action="{{ route('storeregister') }}">
                            @csrf

                            <h2 class="register-heading">Register</h2>
                            <p class="para-register">
                                Build meaningful moments with people who share your interests.
                                Sign up to start your journey with Amathyst.
                            </p>

                            {{-- Full Name --}}
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your full name" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email address" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                            <label class="form-label">Country</label>
                            <select class="form-select @error('country') is-invalid @enderror" name="country">
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

                             <div class="mb-3">
                              <label class="form-label" for="birthday">Birthday:</label>
                              <input type="date" id="birthday" name="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}" />
                              @error('birthday')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                              @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" required />
                                    <span class="input-group-text" onclick="toggleVisibility('password', this)">
                                        <i class="far fa-eye"></i>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            {{-- Confirm Password --}}
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" id="confirmPassword" name="confirm" class="form-control @error('confirm') is-invalid @enderror" placeholder="Confirm your password" required />
                                    <span class="input-group-text" onclick="toggleVisibility('confirmPassword', this)">
                                        <i class="far fa-eye"></i>
                                    </span>
                                    @error('confirm')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">How did you hear about us?</label>
                                <select class="form-select @error('heard_about') is-invalid @enderror" name="heard_about">
                                  <option selected disabled>Select</option>
                                  <option {{ old('heard_about') == 'Friends' ? 'selected' : '' }}>Friends</option>
                                  <option {{ old('heard_about') == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                  <option {{ old('heard_about') == 'Search Engine' ? 'selected' : '' }}>Search Engine</option>
                                  <option {{ old('heard_about') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('heard_about')
                                  <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                              </div>


                              {{-- Terms --}}
                              <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" />
                                <label class="form-check-label" for="terms">
                                  I accept the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.
                                </label>

                                @error('terms')
                                  <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                              </div>


                            {{-- Register Button --}}
                            <div class="registraionform-btndiv text-center">
                                <a href="#" class="btnform-register" onclick="submitForm(event)">Register Now</a>
                            </div>

                             <div class="login-link mt-3">
                                Already have an account? <a href="{{ route('login') }}">Login</a>
                            </div>
                        </form>

        </div>
      </div>
    </div>
  </section>

  

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function validatePassword(password) {
      const pattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
      return pattern.test(password);
    }


  </script>

<script>
    function submitForm(event) {
        event.preventDefault(); // prevent the default anchor behavior
        document.getElementById('passwordForm').submit(); // submit the form manually
    }
</script>












</body>

</html>


@endsection