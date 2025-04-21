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
