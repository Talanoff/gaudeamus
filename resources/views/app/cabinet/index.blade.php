@extends('layouts.app', ['page_title' => 'Личный кабинет'])

@section('content')
    <section id="cabinet-page" class="section-page-secondary">
        <div class="container h-100">
            <div class="cabinet-page-item">
                <h2 class="registration-title text-white">ЛИЧНЫЙ КАБИНЕТ</h2>
                <div class="cabinet-page-tabs">
                    <div class="cabinet-page-tabs-header">
                        <ul class="cabinet-page-tabs-header-list list-unstyled d-flex">
                            <li class="cabinet-page-tabs-header-list-item active mr-2 mr-xl-4">ПРОФИЛЬ</li>
                            <li class="cabinet-page-tabs-header-list-item mr-2 mr-xl-4">СМЕНА ПАРОЛЯ</li>
                            <li class="cabinet-page-tabs-header-list-item">ПЛАТНЫЕ УСЛУГИ</li>
                        </ul>
                    </div>

                    <div class="cabinet-page-tabs-body">
                        <div class="cabinet-page-tabs-body-item active">
                            <form method="post" action="{{ route('app.cabinet.update') }}"
                                  id="form-cabinet-login">
                                @csrf
                                @method('patch')

                                <div class="form-group-item d-flex flex-column justify-content-lg-start align-items-start">

                                    <div class="form-group w-100 position-relative">
                                        <label for="name" class="label-placeholder">Введите имя</label>
                                        <input type="text"
                                               class="form-control position-relative {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               id="name"
                                               name="name" value="{{ old('name') ?? $user->name }}" required>
                                        @if($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group w-100 position-relative">
                                        <label for="email" class="label-placeholder">Ваш
                                            почтовый ящик</label>
                                        <input type="email" class="form-control position-relative"
                                               id="email" name="email"
                                               value="{{ old('email') ?? $user->email }}" readonly required>
                                    </div>

                                    <div class="form-group w-100 position-relative mb-3">
                                        <label for="phone" class="label-placeholder">Ваш
                                            номер телефона</label>
                                        <input type="tel"
                                               class="form-control position-relative py-4 {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                               id="phone" name="phone"
                                               value="{{ old('phone') ?? $user->phone }}">
                                        @if($errors->has('phone'))
                                            <div class="mt-1 text-danger">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group w-100 position-relative mb-3">
                                        <label for="birthday" class="label-placeholder">Дата
                                            Вашего рождения</label>
                                        <input type="date" class="form-control position-relative"
                                               id="birthday" name="birthday"
                                               value="{{ old('birthday') ?? optional($user->birthday)->format('Y-m-d') }}">
                                    </div>

                                    <button id="cabinet-login-btn"
                                            class="btn btn-outline-light text-secondary mt-4">Cохранить
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="cabinet-page-tabs-body-item">
                            <form method="post" action="{{ route('app.cabinet.update') }}"
                                  id="form-cabinet-confirm">
                                @csrf
                                @method('patch')

                                <div class="form-group-item d-flex flex-column justify-content-lg-start align-items-start">


                                    <div class="form-group w-100 position-relative mb-3">
                                        <label for="user-password--cabinet-confirm" class="label-placeholder">Ваш
                                            пароль</label>
                                        <input type="password"
                                               class="form-control position-relative py-4 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               id="user-password--cabinet-confirm"
                                               placeholder="Введите пароль" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group w-100 position-relative mb-3">
                                        <label for="user-password-cabinet--password-confirm"
                                               class="label-placeholder">Подтвердите
                                            пароль</label>
                                        <input type="password" class="form-control position-relative py-4"
                                               id="user-password-cabinet--password-confirm"
                                               placeholder="Подтвердите пароль" name="password_confirmation"
                                               required>
                                    </div>

                                    <button id="cabinet-confirm-btn"
                                            class="btn btn-outline-light text-secondary mt-4">Cохранить
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="cabinet-page-tabs-body-item">
                            @if($user->courses->count())
                                <div class="cabinet-access-cod-content">
                                    @foreach($user->courses as $course)
                                        <div class="cabinet-access-cod-item-description">
                                            <p class="cabinet-access-cod-item-description__text mt-2">
                                                Курс {{ $course->title }}
                                            </p>
                                            @foreach($course->materials as $material)
                                                @if($material->hasMedia('book'))
                                                    <div class="cabinet-access-cod-item">
                                                        <div class="cabinet-access-cod-item-img"
                                                             style="background-image: url({{$material->getFirstMediaUrl('material') }});"></div>
                                                        <div class="cabinet-access-cod-item-description">
                                                            <p class="cabinet-access-cod-item-description__text">
                                                                {{ $material->title }}
                                                            </p>
                                                            <a href="{{ $material->getFirstMediaUrl('book') }}" download
                                                               class="btn btn-outline-secondary cabinet-access-cod-item-description__btn text-white">Cкачать</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="cabinet-access-cod-item-description__text text-white">
                                    У вас пока нет записей на курсы!
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
