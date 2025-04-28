<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <div id="timetracker-layout" class="theme-indigo">
        @include('admin::admin.partials.sidebar')

    <div class="main px-lg-4 px-md-4">
        @include('admin::admin.partials.header')

        @yield('content')

        @include('admin::admin.partials.footer')
    </div>


    </div>
</body>

</body>
</html>