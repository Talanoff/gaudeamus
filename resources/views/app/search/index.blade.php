@extends('layouts.app', ['page_title' => 'Поиск'])

@section('content')

    <section id="materials-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner bg-gradient"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.search') }}" class="breadcrumbs-list-item__link">Поиск</a>
                </li>
            </ul>

            <h2 class="page-secondary-title text-white">Поиск</h2>

            <div class="row">
                @foreach($courses as $course)
                    <div class="col-sm-8 mx-auto mb-4 mb-lg!-0 mx-lg-0 col-lg-6">
                        <div class="programs-page-card">
                            <div class="programs-page-card-preview"
                                 style="background-image: url({{ $course->getFirstMediaUrl('course') }});">
                                <h2 class="programs-page-card-preview__title text-uppercase text-white">{{ $course->title }}</h2>
                            </div>
                            <div class="programs-page-card-content">
                                <div class="programs-page-card-content-title">Основной курс</div>
                                <div class="programs-page-card-content-title">{{ $course->lessons }} занятий в месяц</div>
                                <div class="programs-page-card-content-title">Срок обучения
                                    <span class="programs-page-card-content-description">
                                    {{ $course->starts_at->format('d.m.Y') }}-{{ $course->ends_at->format('d.m.Y')  }}
                                </span>
                                </div>
                                <div class="programs-page-card-content-title">Стоимость <span class="programs-page-card-content-description">
                                    {{ $course->price }} грн / месяц</span></div>
                                <a href="{{ route('app.programs.show', $course) }}" class="more-info">Подробнее</a>
                                <div class="text-center mt-4">
                                    <a href="#feedback" class="btn btn-dark mr-lg-4">Выбрать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @includeWhen($courses->count(), 'partials.app.sections.feedback')

@endsection