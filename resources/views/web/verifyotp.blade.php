@extends('webtemplate.layouts.layout')
@section('content')
@php
    $email = session('email');
@endphp
<section class="otp-container">
        <div class="container">
            <div class="row align-items-center">
                    @if(session('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif
               <div class="col-md-6 text-center verify-image mb-4 mb-md-0">
                    <img class="image-arrow" src="{{ asset('assests/images/verfyimg.svg' )}}" alt="Verification Illustration" />
                </div>
                <div class="col-md-6 otp-text text-center text-md-start">
                    <div class="otp-container">
                        <h3 class="text-center otp-heading">Please verify your email</h3>
                        <p class="text-center otp-para">You're almost there! We’ve sent a verification code to your
                            email<br>
                        </p>
                    <form action="{{ route('verifyotp') }}" method="POST">
                        @csrf
                        <div class="otp-box">
                            <input type="text"  class="otp-input" maxlength="1" id="otp1">
                                <input type="text" class="otp-input" maxlength="1" id="otp2">
                                <input type="text" class="otp-input" maxlength="1" id="otp3">
                                <input type="text" class="otp-input" maxlength="1" id="otp4">
                                <input type="text" class="otp-input" maxlength="1" id="otp5">
                                <input type="text" class="otp-input" maxlength="1" id="otp6">
                                <input type="hidden" name="otp" id="otp_combined">
                            </div>
                            @error('otp')
                             <div class="form-text text-danger" style="font-size: 13px; padding-left: 63px;">{{ $message }}</div>
                            @enderror
                        <div class="text-center otp-btn ">
                            <button type="submit" class="otp-btn">Verify</button>
                        </div>
                    </form>
                    <p class="text-center mt-2">I didn’t receive a code</p>
                    <form method="POST" action="{{ route('resend.otp') }}" class="text-center">
                      @csrf
                      <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: #6f42c1;">Resend OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.querySelectorAll('.otp-input').forEach((input, index, inputs) => {
        input.addEventListener('input', (e) => {
            if (e.target.value && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });
    });
</script>
<script>
    document.querySelector('form').addEventListener('submit', function() {
        const otp = Array.from(document.querySelectorAll('.otp-input')).map(input => input.value).join('');
        document.getElementById('otp_combined').value = otp;
    });
</script>
<!--1 minute timer -->
<script>
    $(document).ready(function () {
        let timeLeft = 60;
        const $resendForm = $('form[action="{{ route('resend.otp') }}"]');
        const $resendButton = $resendForm.find('button');
        
        // Create countdown element and insert before button
        const $countdownText = $('<p class="text-center text-muted" id="countdown-timer" style="margin-bottom: 5px;"></p>');
        $resendButton.before($countdownText);
        
        // Disable the button initially
        $resendButton.prop('disabled', true);

        const countdown = setInterval(function () {
            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            $countdownText.text(`Resend available in 0${minutes}:${seconds}`);
            timeLeft--;

            if (timeLeft < 0) {
                clearInterval(countdown);
                $countdownText.remove();
                $resendButton.prop('disabled', false);
            }
        }, 1000);
    });
</script>

@endsection