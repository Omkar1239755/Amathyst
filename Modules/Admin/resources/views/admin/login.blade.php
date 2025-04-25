<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin Panel </title>
    <link rel="stylesheet" href="{{ asset('admin_asset/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
             <a style="font-weight: 800; font-size: 32px; " href="index.php" class="h1 text-decoration-none "> Admin Panel </a> </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

<form action="/login" method="post">
 @csrf


    @if(session('error_message'))
        <div class="alert alert-danger">{{ session('error_message') }}</div>
    @endif

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="input-group mb-3"> 
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email id">
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
        </div>
    </div>

    <div class="input-group mb-3"> 
        <input type="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-dark btn-block">Sign In</button>
    </div>

    <h6 class="forgot_sec text-center"> <a href="#">Forgot Password?</a> </h6>
</form>

            </div>
        </div>
    </div>
   <script src="admin_asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>