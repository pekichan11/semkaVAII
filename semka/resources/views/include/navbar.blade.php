<nav class="navbar navbar-expand-lg navbar-dark bg-dark first-navbar">
    <a href="#" class="logo" >
        <img src="{{ asset('/img/logo.png')}}" alt="logo" class="logo-img">
    </a>
    <div class="float-right">
    @guest
        <a href="{{ route('login') }}" class="nav-right-link" >Log in</a>
    @endguest
    @auth
        <a href="#" class="nav-right-link" >Profil</a>
    @endauth
    </div>
   
</nav>
@auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark second-navbar">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Knihy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Požičané</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pokuty</a>
            </li>
        </ul>
    </nav>
@endauth