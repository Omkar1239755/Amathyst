<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registert</title>

  <!-- Bootstrap 5.3.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Icons link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="/css/style.css" />
</head>

<body>
  <!-- Header -->
  <header class="bg-purple-custom">
    <div class="container">
      <div class="head">
        <nav class="navbar navbar-expand-sm navbar-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}"><img src="{{ asset('assests/images/Logo.png') }}" alt="" class="logo-hedd" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/companion-profile.html">Companions</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">How It Works</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">FAQ</a>
                </li>
              </ul>

              <div class="login-navv">
                <a href="{{route('login')}}" class="bbtn-loginn">Login</a>
                <a href="{{route('register')}}" class="bbtn-registerr">Register</a>
              </div>

            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>



@php
    $email = session('email');
@endphp



    <section class="otp-container">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6 text-center verify-image mb-4 mb-md-0">
                    <img class="image-arrow" src="{{ asset('assests/images/verfyimg.svg' )}}" alt="Verification Illustration" />
                </div>

                <div class="col-md-6 otp-text text-center text-md-start">
                    <div class="otp-container">
                        <h3 class="text-center otp-heading">Please verify your email</h3>
                        <p class="text-center otp-para">You're almost there! We’ve sent a verification code to your
                            email<br>
                            <!-- <b>{{$email}}</b> -->
                        </p>

                    <!-- Display error messages if any -->
                    @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif  


               <form action="{{ route('verifyotp') }}" method="POST">
                        @csrf
                        <div class="otp-box">
                        <!-- <div class="d-flex justify-content-between gap-3"> -->
                            <input type="text" class="otp-input" maxlength="1" id="otp1">
                            <input type="text" class="otp-input" maxlength="1" id="otp2">
                            <input type="text" class="otp-input" maxlength="1" id="otp3">
                            <input type="text" class="otp-input" maxlength="1" id="otp4">
                            <input type="text" class="otp-input" maxlength="1" id="otp5">
                            <input type="text" class="otp-input" maxlength="1" id="otp6">
                        </div>


                            <!-- ✅ Add this hidden input to send OTP -->
                       <input type="hidden" name="otp" id="otp_combined">
                        <div class="resend">
                            <p>I didn’t received a code <a href="/verifyotp.html" id="resendBtn">Resend</a></p>
                        </div>

                      
                        <div class="text-center otp-btn mt-3">
                            <button type="submit" class="btn btn-primary">Verify</button>
                        </div>

               </form>

                    </div>

                </div>
            </div>
        </div>
    </section>









    <!-- Footer -->

    <section class="footer py-5">
        <div class="container">
            <footer class="foot-footer">
                <div class="row ">

                    <!-- Logo + Description -->
                    <div class="col-12 col-md-4 mb-4 footer-border">
                        <div class="logo-textfooter"><img src="assests/images/Logo.png" alt=""></div>
                        <p class="logo-descriptionfooter">
                            Clarity gives you the blocks and components you need to
                            create a truly professional website.
                        </p>
                        <div class="d-flex justify-content-center justify-content-md-start gap-3 mt-3 social-icons">
                            <a href="#"><i class="fab fa-twitter "></i></a>
                            <a href="#"><i class="fab fa-facebook-f "></i></a>
                            <a href="#"><i class="fab fa-instagram "></i></a>
                            <a href="#"><i class="fab fa-github "></i></a>
                        </div>
                    </div>

                    <!-- Quick Links 1 -->
                    <div class="col-12 col-md-4 mb-4 footer-border">
                        <h5 class="fw-semibold mb-3">Quick Links</h5>
                        <ul class="list-unstyled footer-links">
                            <li><a href="#" class="text-decoration-none ">Link 1</a></li>
                            <li><a href="#" class="text-decoration-none ">Link 2</a></li>
                            <li><a href="#" class="text-decoration-none ">Link 3</a></li>
                            <li><a href="#" class="text-decoration-none ">Link 4</a></li>
                        </ul>
                    </div>

                    <!-- Quick Links 2 -->
                    <div class="col-12 col-md-4 mb-4 quicc">
                        <h5 class="fw-semibold mb-3">Quick Links</h5>
                        <ul class="list-unstyled footer-links">
                            <li><a href="#" class="text-decoration-none ">Link 1</a></li>
                            <li><a href="#" class="text-decoration-none ">Link 2</a></li>
                            <li><a href="#" class="text-decoration-none ">Link 3</a></li>
                            <li><a href="#" class="text-decoration-none ">Link 4</a></li>
                        </ul>
                    </div>

                </div>
            </footer>
        </div>
    </section>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Automatically focus the next input field
    document.querySelectorAll('.otp-input').forEach((input, index, inputs) => {
        input.addEventListener('input', (e) => {
            if (e.target.value && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });
    });

    // Combine the OTP inputs into one hidden field for submission
    document.querySelector('form').addEventListener('submit', function() {
        const otp = Array.from(document.querySelectorAll('.otp-input')).map(input => input.value).join('');
        document.getElementById('otp_combined').value = otp;
    });
</script>



</body>

</html>