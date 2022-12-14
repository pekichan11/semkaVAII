<nav class="navbar navbar-expand-lg navbar-dark bg-dark first-navbar">
    <a href="/" class="logo" >
        <img src="{{ asset('/img/logo.png')}}" alt="logo" class="logo-img">
    </a>
    <div class="float-right">
    @guest
        <a href="{{ route('register') }}" class="nav-right-link" >Register</a>
        <a href="{{ route('login') }}" class="nav-right-link">Login</a>
    @endguest
    @auth
        <a href="#" class="nav-right-link" >Profil</a>
        <a href="{{ route('logout') }}" class="nav-right-link" >Logout</a>
    @endauth
    </div>
   
</nav>

@auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark second-navbar">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href=" {{ route("welcome") }}">Domov</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/book">Knihy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pozicky">Požičané</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pokutky">Pokuty</a>
            </li>
        </ul>
    </nav>
@endauth