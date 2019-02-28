@extends('layouts.app', ['page_title' => $page->title])

@section('content')

    <section id="programs-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner page-secondary-banner--big"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.programs.index') }}" class="breadcrumbs-list-item__link">Программы</a>
                </li>
            </ul>

            <h2 class="page-secondary-title page-secondary-title--big-margin text-white">{{ $page->title }}</h2>

            <div class="row">
                <div class="col-sm-9">
                    <div class="page-secondary-item position-relative">
                        <h2 class="page-secondary-item__title position-relative pb-3">{{ $page->description }}</h2>
                        <p class="page-secondary-item__text pt-3 mb-4">
                            {!! $page->body !!}
                        </p>
                    </div>
                </div>
            </div>
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
                                <a href="#" class="btn btn-dark mr-lg-4">Выбрать</a>
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
