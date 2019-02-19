@extends('layouts.app')

@section('content')

    <section id="login-page"
             class="section-page-secondary section-page-secondary--registration section-page-secondary--login">
        <div class="container h-100">
            <div class="row h-100">
                <div class="registration-img" style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
                <div class="col-sm-6 h-100 mx-auto ml-lg-auto mr-lg-0 px-lg-5 d-flex align-items-center">
                    <div class="login-page-item">
                        <h2 class="registration-title text-white">Войти</h2>
                        <form action="{{ route('login') }}" id="form-login" method="POST">
                            @csrf
                            <div class="form-group-item d-flex flex-column justify-content-lg-start align-items-start">
                                <div class="form-group w-100 position-relative mb-3">
                                    <label for="user-name--login" class="label-placeholder">Введите e-mail</label>
                                    <input type="email" name="email"
                                           class="form-control position-relative py-4 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           id="user-name--login" placeholder="Ваш e-mail"
                                           value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group w-100 position-relativemb-3">
                                    <label for="user-password--login" class="label-placeholder">Введите пароль</label>
                                    <input type="password" name="password"
                                           class="form-control position-relative py-4 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           id="user-password--login" placeholder="Ваш пароль" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group form-check pl-0 mb-4">
                                    <input type="checkbox" class="form-check-input d-none" id="agree--login">
                                    <label class="label-placeholder form-check-label" for="agree--login">
                                        Запомнить меня
                                    </label>
                                </div>
                                <button type="submit" id="login-btn" class="btn btn-outline-light text-secondary mb-4">
                                    Войти
                                </button>


                                <div class="social-registration d-flex">
                                    <div class="social-registration__text text-white mr-1 mr-sm-3">Войти с помощью
                                        соцсетей:</div>
                                    <ul class="nav-social-list list-unstyled d-flex">
                                        <li class="nav-social-list-item mr-4">
                                            <a href="#" class="nav-social-list-item__link">
                                                <svg width="25" height="25">
                                                    <use xlink:href="#facebook-icon"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="nav-social-list-item mr-4">
                                            <a href="#" class="nav-social-list-item__link">
                                                <svg width="25" height="25">
                                                    <use xlink:href="#instagram-icon"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="nav-social-list-item">
                                            <a href="#" class="nav-social-list-item__link">
                                                <svg width="25" height="25">
                                                    <use xlink:href="#youtube-icon"></use>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <a href="{{ route('register') }}" class="registration-btn text-center d-block text-white py-4">
                                ЗАРЕГЕСТРИРОВАТЬСЯ
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
