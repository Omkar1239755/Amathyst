@extends('layouts.layout')
@section('content')

  <section class="verify-container">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left side image -->
        <div class="col-md-6 text-center verify-image mb-4 mb-md-0">
          <img class="image-arrow" src="/assests/images/verfyimg.svg" alt="Verification Illustration" />
        </div>
        <!-- Right side text -->
        <div class="col-md-6 verify-text text-center text-md-start">
          <div class="emailverify">
            <h4>Please verify your email</h4>
            <p>You're almost there! We sent an email to</p>
            <p class="email-highlight">duncan@memberstack.com</p>
            <p class="just-pargrap">
              Just click on the link in that email to complete your signup. If
              you don't see it, you may need to <b class="hightlit">check your spam</b> folder.
            </p>
            <p class="just-pargrap">Still can't find the email? No problem.</p>

            <div class="text-center verify-resendmaildiv">
            <a href="{{ route('signup') }}" class="resendmail-btn">Resend Verification Email</a>


            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

    </div>
  </section>

  <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


@endsection