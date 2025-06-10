
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
      <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    
</head>
<body class="hold-transition login-page">
    
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                
             <a style="font-weight: 800; font-size: 32px;color: #5f42a9;font-family: poppins; " href="{{route('index')}}" class="h1 text-decoration-none "> 
                 <img src="https://work.mobidudes.in/OM/Amathyst/public/assests/images/textlogoamythyst.png" alt="logo" class=logoadmin>
                 </a> </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @include('alertmessage')
                <form action="{{route('admin.logincheck')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="input-group mb-3"> 
                        <input type="email" name="email" value="{{old('email')}}"  class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                     </div>
                     
                    <div class="input-group mb-3"> 
                        <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class=" btn-block">Sign In</button>
                    </div>
                </form>
             </div>
        </div>
    </div>
   <script src="admin_asset/js/bootstrap.bundle.min.js"></script>
</body>
</html>