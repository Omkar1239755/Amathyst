
@extends('layouts.layout')
@section('content')



  <!-- login form -->
  <section class="login-form">
    <div class="container">
      <div class="row">
        <div class="col-md-6 form-regis h-100 d-flex flex-column justify-content-center login-log">
          <img src="/assests/images/registerimage.svg" alt="" />
        </div>

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
                                      <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter your email address"
                                            value="{{ old('email') }}" />
                                      @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    <div class="mb-3">
                                      <label class="form-label">Password</label>
                                      <div class="input-group">
                                        <input type="password" name="password"
                                              class="form-control @error('password') is-invalid @enderror"
                                              placeholder="Enter your password" />
                                        <span class="input-group-text"><i class="far fa-eye"></i></span>
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
                                      <a class="forgot-pass" href="forgotpassword.html">Forgot your password?</a>
                                    </div>
                                  </div>

                                            <div class="login-btndiv text-center">
                              <a href="#" id="loginButton" class="btnform-login">Log In</a>
                            </div>
                   </form>

       

          <div class="log text-center mt-3">
            Don’t have an account? <a href="register.html">Create an Account</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById("loginButton").addEventListener("click", function(event) {
        event.preventDefault(); // prevent link from navigating
        document.getElementById("loginForm").submit(); // submit the form
    });
</script>
</body>

</html>


@endsection