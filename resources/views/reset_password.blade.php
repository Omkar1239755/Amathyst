@extends('webtemplate.layouts.layout')
@section('content')
<section class="new-password">
        <div class="container">
            <div class="row">
                <div class="col-md-6 form-regis h-100 d-flex flex-column justify-content-center login-log">
                    <img src="{{ asset('assests/images/new-passwordimg.svg') }}" alt="" />
                </div>
                <div class="col-md-6 form-regis h-100 d-flex flex-column justify-content-center create-password">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <h2>Create a New Password</h2>
                        <p class="login-para">
                            Enter a strong new password for your account. Make sure it’s something secure and easy for you
                            to remember.
                        </p>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <div class="input-group has-validation">
                                <input type="password" name="password" class="form-control" id="newPassword">
                                <span class="input-group-text toggle-password">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>
                        </div>
                         <button type="submit" class="btn-sendlink">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
