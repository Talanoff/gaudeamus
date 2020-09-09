@extends('layouts.app')

@section('content')

    <section id="singup-page" class="section-page-secondary section-page-secondary--registration">
        <div class="container h-100">
            <div class="row h-100">
                <div class="registration-img" style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
                <div class="col-sm-6 h-100 mx-auto ml-lg-auto mr-lg-0 px-lg-5 d-flex align-items-center">
                    <div class="singup-page-item">
                        <h2 class="registration-title text-white text-uppercase">{{ __('Register') }}</h2>
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
                                    {{ __('Register') }}
                                </button>
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

@endsection
