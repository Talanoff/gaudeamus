@extends('layouts.app', ['page_title' => 'Вакансии'])

@section('content')

    <section id="jobs-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner bg-gradient"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>

            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.vacancies.index') }}" class="breadcrumbs-list-item__link">Вакансии</a>
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
                            <a href="#vacancy-form" id="open-jobs-page-respond"
                               class="btn btn-outline-light text-primary py-2 px-5">Откликнуться</a>
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
                                            <a href="tel:{{ $vacancy->phone }}"
                                               class="jobs-page-item-list-item__link">{{ $vacancy->phone }}</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    @include('app.vacancies.partials.respond')
                </div>
            @endforeach
        </div>
    </section>
@endsection
