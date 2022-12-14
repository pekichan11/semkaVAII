<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'kniznica')</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <link rel="icon"  href="{{ asset('favicon.ico')}}">
</head>
<body>
    @include('include.flash-message')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    @if(Request::segment(1) != 'login' && Request::segment(1) != 'register')
        <header>
            @include('include.navbar')
        </header>
    @endif
    
    <main>
        <div class="container">
            @yield('main')
        </div>
    </main>
    <footer>
        <div class="container">
            @yield('footer')
        </div>
    </footer>


    <script src="{{ asset('/js/app.js')}}"></script>
</body>
</html>