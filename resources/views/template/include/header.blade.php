<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no" />
    <title>Dashboard</title>
    <link rel="icon" href="{{ asset('assests/images/gemsimg.svg') }}" type="image/svg+xml">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
</head>

<body>
    <!--Mobile Sidebar Toggle Button -->
    <div><i class="fas fa-times"></i></div>
    <header class="d-md-none hedar-mobile p-2 d-flex justify-content-between align-items-center ">
        <button class="btn d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar"
            aria-controls="mobileSidebar">
            <i class="las la-bars fs-2"></i>
        </button>
        <div class="d-flex align-items-center">
            <i class="far fa-bell notification-bell"></i>
            <span class="activepoint"></span>
            <img src="{{ asset('uploads/' . Auth::User()->profile_picture) }}" class="rounded-circle-img">
        </div>
    </header>
</body>
