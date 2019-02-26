@extends('layouts.app', ['app_title' => 'Вакансии'])

@section('content')

    <section id="jobs-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner" style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.vacancies') }}" class="breadcrumbs-list-item__link">Вакансии</a>
                </li>
            </ul>

            <h2 class="page-secondary-title page-secondary-title--big-margin text-white">Вакансии</h2>
            @foreach($vacancies as $vacancy)
            <div class="jobs-page-content">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contacts-page__title mb-5">
                            {{ $vacancy->title }}
                        </h2>
                    </div>
                    <div class="col-12">
                        <div class="contacts-page-item__text mb-2">
                            {{ $vacancy->city }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="jobs-page-brief">
                            <p class="jobs-page-brief__text">
                                {!! $vacancy->description !!}
                            </p>
                            <a href="#" id="open-jobs-page-all" class="more-info">Больше информации</a>
                        </div>
                    </div>
                    <div class="col-sm-5 pt-sm-5 pb-5 d-flex justify-content-center align-items-start">
                        <a href="#" id="open-jobs-page-respond" class="btn btn-outline-light text-primary py-2 px-5">Откликнуться</a>
                    </div>
                </div>

                <div class="jobs-page-item">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="jobs-page-item-img d-none d-sm-block"
                                 style="background-image: url({{ $vacancy->getFirstMediaUrl('vacancy') }});"></div>
                        </div>
                        <div class="col-sm-7 pl-4 pt-5">
                            <div class="jobs-page-item-content">
                                <h5 class="jobs-page-item-list-title">
                                    Основные обязанности:
                                </h5>
                                <div class="jobs-page-item-list jobs-page-item-list--main list-unstyled">
                                        {!! $vacancy->responsibilities !!}
                                </div>
                            </div>
                            <div class="jobs-page-item-content">
                                <h5 class="jobs-page-item-list-title">
                                    Требования к соискателю:
                                </h5>
                                <div class="jobs-page-item-list jobs-page-item-list--main list-unstyled">

                                        {!! $vacancy->requirements !!}


                                </div>
                            </div>

                            <div class="jobs-page-item-content">
                                <h5 class="jobs-page-item-list-title">
                                    Полный рабочий день:
                                </h5>
                                <div class="jobs-page-item-list jobs-page-item-list--data list-unstyled">
                                    <div class="jobs-page-item-list-item jobs-page-item-list-item--data">
                                        {{ $vacancy->work_day }}
                                    </div>
                                </div>
                            </div>

                            <div class="jobs-page-item-content">
                                <h5 class="jobs-page-item-list-title">
                                    Частичная занятость:
                                </h5>
                                <ul class="jobs-page-item-list jobs-page-item-list--data list-unstyled">
                                    <li class="jobs-page-item-list-item jobs-page-item-list-item--data">
                                        {{ $vacancy->part_time }}
                                    </li>
                                </ul>
                            </div>

                            <div class="jobs-page-item-content">
                                <h5 class="jobs-page-item-list-title">
                                    Контактное лицо: {{ $vacancy->contact }}
                                </h5>
                                <ul class="jobs-page-item-list jobs-page-item-list--contacts list-unstyled">
                                    <li class="jobs-page-item-list-item jobs-page-item-list-item--contacts">
                                        <a href="tel:{{ $vacancy->phone }}" class="jobs-page-item-list-item__link">{{ $vacancy->phone }}</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                <div class="jobs-page-respond">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="jobs-page-respond-content">
                                <div class="section-description pb-2 mb-5">
                                    <div class="section-description-name">Заполните форму</div>
                                    <h2 class="section-description-title">Откликнуться на вакансию</h2>
                                </div>
                                <form action="#" id="form-respond">

                                    <div class="form-group-item d-flex flex-column justify-content-lg-start align-items-center">
                                        <div class="form-group w-100 position-relative mb-3">
                                            <label for="user-name--respond" class="label-placeholder">Введите имя</label>
                                            <input type="text" class="form-control position-relative py-4" id="user-name--respond"
                                                   placeholder="Ваше имя">
                                        </div>

                                        <div class="form-group w-100 position-relative mb-3">
                                            <label for="user-email--respond" class="label-placeholder">Ваш почтовый
                                                ящик</label>
                                            <input type="email" class="form-control position-relative py-4" id="user-email--respond"
                                                   placeholder="Введите Email">
                                        </div>

                                        <div class="form-group w-100 position-relativemb-3">
                                            <label for="user-phone--respond" class="label-placeholder">Ваш номер
                                                телефона</label>
                                            <input type="text" class="form-control position-relative py-4" id="user-phone--respond"
                                                   placeholder="Введите номер">
                                        </div>

                                        <div class="form-group w-100">
                                            <label for="file--modal-respond" class="form-control-label text-primary">Прикрепить
                                                <span class="label-placeholder__link text-primary">файл</span>
                                                с резюме (doc, txt)</label>
                                            <input type="file" class="form-control-file d-none" id="file--modal-respond">
                                        </div>
                                        <div class="text-right w-100">
                                            <button id="respond-btn" class="btn btn-dark text-white">Отправить</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="jobs-page-respond-img" style="background-image: url('../../images/content/jobs/jobs-respond-1.jpg');"></div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection