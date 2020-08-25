<header id="app-header">
    <div class="container-fluid d-flex justify-content-between align-items-center p-0 pl-lg-4">
        <div class="header-item d-flex align-items-center">
            <div class="logo">
                <a href="{{ url('/') }}" class="">
                    <img src="{{ asset('images/logo.svg') }}" alt="logo">
                </a>
            </div>
            <div class="search d-none d-sm-flex align-items-center">
                <form id="form-search" class="form form--search" action="{{ route('app.search') }}" method="get">
                    <input class="form-control" type="search" name="search" placeholder="Поиск...">
                    <div class="search-btn position-absolute">
                        <svg width="25" height="25">
                            <use xlink:href="#search-icon"></use>
                        </svg>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-item d-flex justify-content-end justify-content-lg-between align-items-center">
            <ul class="login-list list-unstyled d-none d-lg-flex">
                <li class="login-list-item">
                    @guest
                        <a href="{{ route('login') }}" class="login-list-item__link">
                            Вход/Регистрация
                            <svg width="20" height="20">
                                <use xlink:href="#user-icon"></use>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="login-list-item__link">
                            Выйти
                            <svg width="20" height="20">
                                <use xlink:href="#user-icon"></use>
                            </svg>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </a>
                    @endauth
                </li>
            </ul>
            <div class="decoration-line d-none d-lg-block"></div>
            <ul class="nav-social-list list-unstyled d-none d-lg-flex">
                @foreach(app('settings')['social'] as $social)
                    <li class="nav-social-list-item nav-social-list-item--{{ $social->name }} mr-3">
                        <a href="{{ $social->value }}" class="nav-social-list-item__link">
                            <svg width="25" height="25">
                                <use xlink:href="#{{ $social->name }}-icon"></use>
                            </svg>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="contact-phone d-none d-lg-block">
                @foreach(app('settings')['phones'] as $phone)
                    <div>
                        <a href="tel:{{ str_replace(['(', ')', '-', ' '], '', $phone->value) }}"
                           class="contact-phone-link text-white">
                            {{ $phone->value }}
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="burger-menu d-flex flex-column justify-content-center align-items-center position-relative">
                <div class="line line--top"></div>
                <div class="line line--middle"></div>
                <div class="line line--bottom"></div>
                <div class="line line-close line--left"></div>
                <div class="line line-close line--right"></div>
            </div>

            <div class="menu position-absolute d-flex align-items-center">
                <ul class="menu-nav-list list-unstyled">
                    @foreach(app('nav')->main() as $nav)
                        <li class="menu-nav-list-item">
                            <a href="{{ $nav['route'] }}" class="menu-nav-list-item__link">
                                {{ $nav['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
