@extends('layouts.app')

@section('content')
<<<<<<< HEAD

    <section id="singup-page" class="section-page-secondary section-page-secondary--registration">
        <div class="container h-100">
            <div class="row h-100">
                <div class="registration-img" style="background-image: url('../../images/bg/singup-bg.jpg');"></div>
                <div class="col-sm-6 h-100 mx-auto ml-lg-auto mr-lg-0 px-lg-5 d-flex align-items-center">
                    <div class="singup-page-item">
                        <h2 class="registration-title text-white">ЗАРЕГЕСТРИРОВАТЬСЯ</h2>
                        <form method="POST" action="{{ route('register') }}" id="form-singup">
                            @csrf
                            <div class="form-group-item d-flex flex-column justify-content-lg-start align-items-start">
                                <div class="form-group w-100 position-relative mb-3">
                                    <label for="user-name--singup" class="label-placeholder">Введите ваше имя</label>
                                    <input type="text" id="user-name--singup"
                                           class="form-control position-relative py-4 {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="Ваше имя" name="name" value="{{ old('name') }}" required
                                           autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group w-100 position-relative mb-3">
                                    <label for="user-email--singup" class="label-placeholder">Ваш Email</label>
                                    <input type="email" id="user-email--singup"
                                           class="form-control position-relative py-4 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="Введите Email" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group w-100 position-relativemb-3">
                                    <label for="user-password--singup" class="label-placeholder">Ваш пароль</label>
                                    <input type="password" id="user-password--singup"
                                           class="form-control position-relative py-4 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           placeholder="Введите пароль" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group w-100 position-relativemb-3">
                                    <label for="user-password-confirm--singup" class="label-placeholder">Подтвердите
                                        пароль</label>
                                    <input type="password" class="form-control position-relative py-4"
                                           id="user-password-confirm--singup"
                                           placeholder="Подтвердите пароль" name="password_confirmation" required>
                                </div>
                                <div class="form-group form-check pl-0">
                                    <input type="checkbox" class="form-check-input d-none" id="agree-singup">
                                    <label class="label-placeholder form-check-label" for="agree-singup">
                                        Запомнить меня
                                    </label>
                                </div>
                                <button type="submit" id="singup-btn" class="btn btn-outline-light text-secondary mb-4">
                                    Зарегистрироваться
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
                            <a href="{{ route('login') }}" class="registration-btn text-center d-block text-white py-4">
                                Войти
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
=======
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
>>>>>>> origin/master
@endsection
