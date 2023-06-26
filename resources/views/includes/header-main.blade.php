<header class="header">
    <div class="container">
        <div class="header__inner">
            <a href="{{ route('home') }}" class="header__inner-logo">
                <img src="{{ asset('storage/images/logo.svg') }}" class="logo__img" alt="logo.svg">
                <h1 class="logo__text">{{ config('app.name') }}</h1>
            </a>
            <nav class="header__nav">
                <button type="button" class="burger-button" id="burger">
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                </button>
                <div class="menu__list" id="menu">
                    <a href="{{ route('market.index') }}" class="header__nav-link">MARKET</a>
                    <a href="{{ route('home') . '#concerts' }}" class="header__nav-link">CONCERTS</a>
                    <a href="{{ route('home') . '#crew' }}" class="header__nav-link">CREW</a>
                    @guest
                        <a href="{{ route('login.index') }}" class="header__nav-link">LOGIN</a>
                        <a href="{{ route('register.index') }}" class="header__nav-link">REGISTER</a>
                    @endguest
                    @auth
                        @if (auth()->user()->isAdmin)
                            <a class="header__nav-link" href="{{ route('admin.index') }}">ADMIN PANEL</a>
                        @endif
                        <a href="{{ route('user.index') }}" class="header__nav-link">{{ auth()->user()->name }}</a>
                        <a href="{{ route('logout') }}" class="header__nav-link">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit">LOGOUT</button>
                            </form>
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
</header>
