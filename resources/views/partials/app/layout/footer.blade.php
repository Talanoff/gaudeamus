<footer id="app-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-10 mx-auto">
                <ul class="text-uppercase footer-menu-list list-unstyled d-flex flex-column flex-sm-row justify-content-between align-items-center">
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.about') }}" class="footer-menu-list-item__link">
                            {{ __('About us') }}
                        </a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.programs.index') }}" class="footer-menu-list-item__link">
                            {{ __('Program and cost') }}
                        </a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.materials.index') }}" class="footer-menu-list-item__link">
                            {{ __('Educational materials') }}
                        </a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.teachers.index') }}" class="footer-menu-list-item__link">
                            {{ __('Our team') }}
                        </a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.vacancies.index') }}" class="footer-menu-list-item__link">
                            {{ __('Vacancies') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3 mt-sm-5 mb-4">
            <div class="col-sm-12 col-lg-10 mx-auto">
                <ul class="footer-menu-list list-unstyled d-flex flex-column flex-sm-row justify-content-between align-items-center">
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.reviews.index') }}" class="footer-menu-list-item__link">{{ __('Reviews') }}</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.galleries') }}" class="footer-menu-list-item__link">{{ __('Gallery') }}</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.faqs') }}" class="footer-menu-list-item__link">{{ __('FAQ') }}</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.articles.index') }}" class="footer-menu-list-item__link">{{ __('Articles') }}</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.contacts') }}" class="footer-menu-list-item__link">{{ __('Contacts') }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 mx-auto">
                <div class="footer-copyr text-center py-4">
                    <div class="d-flex align-items-center mb-3">
                    <div class="footer-list-title mr-3">Мы в соц.сетях</div>
                    <ul class="nav-social-list list-unstyled d-flex mb-0">
                        @foreach(app('settings')['social'] as $social)
                            <li class="nav-social-list-item mr-4">
                                <a href="{{ $social->value }}" class="nav-social-list-item__link" target="_blank">
                                    <svg width="25" height="25">
                                        <use xlink:href="#{{ $social->name }}-icon"></use>
                                    </svg>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    </div>
                    <div class="footer-copyr__text">&copy; 2017 &ndash; {{ date('Y') }} Все права защищены.</div>
                </div>
            </div>
        </div>
    </div>
</footer>


</body>

</html>
