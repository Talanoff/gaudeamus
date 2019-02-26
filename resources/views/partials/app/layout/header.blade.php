<header id="app-header">
    <div class="container-fluid d-flex justify-content-between align-items-center p-0 pl-lg-4">
        <div class="header-item d-flex align-items-center">
            <div class="logo position-relative">
                <a href="/" class="logo-link d-flex justify-content-center align-items-center position-absolute"><img
                            src="../../../../images/icon/logo/logo.png" alt="logo"></a>
            </div>
            <div class="search d-none d-sm-flex align-items-center">
                <form id="form-search" class="form form--search">
                    <input class="form-control" type="search" placeholder="Поиск...">
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
                            <svg width="25" height="25">
                                <use xlink:href="#user-icon"></use>
                            </svg>
                            Войти
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="login-list-item__link">
                            <svg width="25" height="25">
                                <use xlink:href="#user-icon"></use>
                            </svg>
                            Выйти
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
                    <li class="nav-social-list-item nav-social-list-ite--{{ $social->name }} mr-3">
                        <a href="{{ $social->value }}" class="nav-social-list-item__link">
                            <svg width="25" height="25">
                                <use xlink:href="#{{ $social->name }}-icon"></use>
                            </svg>
                        </a>
                    </li>
                @endforeach
            </ul>


            @foreach(app('settings')['phones'] as $phone)
                <div class="contact-phone d-none d-lg-block">
                    <a href="tel:{{ str_replace(['(', ')', '-', ' '], '', $phone->value) }}"
                       class="contact-phone-link text-white">
                        {{ $phone->value }}
                    </a>
                </div>
            @endforeach


            <div class="burger-menu d-flex flex-column justify-content-center align-items-center position-relative">
                <div class="line line--top"></div>
                <div class="line line--middle"></div>
                <div class="line line--bottom"></div>
                <div class="line line-close line--left"></div>
                <div class="line line-close line--right"></div>
            </div>
            <div class="menu position-absolute d-flex align-items-center">
                <ul class="menu-nav-list list-unstyled">
                    <li class="menu-nav-list-item">
                        <a href="#" class="menu-nav-list-item__link">
                            о нас
                        </a>
                    </li>
                    <li class="menu-nav-list-item">
                        <a href="{{ route('app.programs.index') }}" class="menu-nav-list-item__link">
                            программа и стоимость
                        </a>
                    </li>
                    <li class="menu-nav-list-item">
                        <a href="{{ route('app.materials') }}" class="menu-nav-list-item__link">
                            учебные материалы
                        </a>
                    </li>
                    <li class="menu-nav-list-item">
                        <a href="{{ route('app.teachers.index') }}" class="menu-nav-list-item__link">
                            преподаватели
                        </a>
                    </li>
                    <li class="menu-nav-list-item">
                        <a href="{{ route('app.vacancies') }}" class="menu-nav-list-item__link">
                            вакансии
                        </a>
                    </li>
                    <li class="menu-nav-list-item">
                        <a href="{{ route('app.reviews') }}" class="menu-nav-list-item__link">
                            отзывы
                        </a>
                    </li>
                    <li class="menu-nav-list-item">
                        <a href="{{ route('app.faqs') }}" class="menu-nav-list-item__link">
                            вопросы
                        </a>
                    </li>
                    <li class="menu-nav-list-item">
                        <a href="{{ route('app.galleries') }}" class="menu-nav-list-item__link">
                            фотогалерея
                        </a>
                    </li>
                    <li class="menu-nav-list-item">
                        <a href="{{ route('app.articles.index') }}" class="menu-nav-list-item__link">
                            статьи
                        </a>
                    </li>
                    <li class="menu-nav-list-item">
                        <a href="#" class="menu-nav-list-item__link">
                            контакты
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
