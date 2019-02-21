<footer id="app-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-10">
                <ul class="footer-menu-list list-unstyled d-flex flex-column flex-sm-row justify-content-between align-items-center">
                    <li class="footer-menu-list-item">
                        <a href="#" class="footer-menu-list-item__link">О НАС</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.programs') }}" class="footer-menu-list-item__link">ПРОГРАММА И СТОИМОСТЬ</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="#" class="footer-menu-list-item__link">УЧЕБНЫЕ МАТЕРИАЛЫ</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.teachers.index') }}" class="footer-menu-list-item__link">ПРЕПОДАВАТЕЛИ</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="#" class="footer-menu-list-item__link">ВАКАНСИИ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3 mt-sm-5 mb-4">
            <div class="col-sm-12 col-lg-10">
                <ul class="footer-menu-list list-unstyled d-flex flex-column flex-sm-row justify-content-between align-items-center">
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.reviews') }}" class="footer-menu-list-item__link">ОТЗЫВЫ</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.galleries') }}" class="footer-menu-list-item__link">ФОТОГАЛЕРЕЯ</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.faqs') }}" class="footer-menu-list-item__link">ВОПРОСЫ</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="{{ route('app.articles.index') }}" class="footer-menu-list-item__link">СТАТЬИ</a>
                    </li>
                    <li class="footer-menu-list-item">
                        <a href="#" class="footer-menu-list-item__link">КОНТАКТЫ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-xl-2 ml-auto mr-0 d-flex align-items-center flex-column">
                <div class="footer-list-title">Мы в соц.сетях</div>
                <ul class="nav-social-list list-unstyled d-flex">
                    @foreach(app('settings')['social'] as $social)
                        <li class="nav-social-list-item mr-4">
                            <a href="{{ $social->value }}" class="nav-social-list-item__link">
                                <svg width="25" height="25">
                                    <use xlink:href="#{{ $social->name }}-icon"></use>
                                </svg>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 mx-auto">
                <div class="footer-copyr text-center py-4">
                    <div class="footer-copyr__text">&copy; 2017 &ndash; {{ date('Y') }} Все права защищены.</div>
                    <div class="footer-copyr__text footer-copyr__text--big">Дизайн и разработка
                        <a href="https://impressionbureau.pro/" target="_blank">
                            <span class="text-bold">Impression Bureau</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


</body>

</html>