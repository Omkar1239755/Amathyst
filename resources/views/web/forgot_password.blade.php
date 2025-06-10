@extends('webtemplate.layouts.layout')
@section('content')
<body>


  <!-- login form -->
  <section class="forgot-password">
    <div class="container">
      <div class="row">
        <div class="col-md-6 form-regis h-100 d-flex flex-column justify-content-center forgot">
          <img src="{{asset('assests/images/forgotpassword.svg')}}" alt="" />
        </div>

        <div class="col-md-6 form-regis h-100 d-flex flex-column justify-content-center forgott-rht">
             @if (session('success'))
          <div id="success-message" class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif   
     <form method='POST' action = "{{route('forgotpasswordCheck')}}">
          @csrf
            <h2 class="forgot-h">Forgot Your Password?</h2>
            <p class="para-forgot">
              No worries! Enter the email linked to your account, and we’ll
              send you instructions to reset your password.
            </p>

            <div class="mb-3 email-lab">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your email" />
            </div>
               @error('email')
                     <div class="form-text text-danger" >{{ $message }}</div>
               @enderror
         <button type='submit' class="btn-sendlink"' href={{route('forgotpasswordCheck')}} >Send Reset Link</button>
          
            
     </form>

          
        </div>
      </div>
    </div>
  </section>
  
<script>
    setTimeout(function() {
        const alertBox = document.getElementById('success-message');
        if (alertBox) {
            alertBox.style.transition = 'opacity 0.5s ease';
            alertBox.style.opacity = '0';
            setTimeout(() => alertBox.style.display = 'none', 500);
        }
    }, 3000); // 3 seconds
</script>
  
@endsection

