@extends('layouts.app', ['page_title' => $teacher->name])

@section('content')

    <section id="teachers-show" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner bg-gradient"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.teachers.index') }}" class="breadcrumbs-list-item__link">{{ __('Our team') }}</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.teachers.show', $teacher) }}" class="breadcrumbs-list-item__link">Коваль
                        Елена Николаевна</a>
                </li>
            </ul>
            <div class="row">
                <div class="col-sm-3">
                    <div class="teachers-card-img">
                        <img src="{{ $teacher->avatar }}" alt=""></div>
                    <div class="decoration-block"></div>
                </div>
                <div class="col-sm-9">
                    <div class="reviews-page-content position-relative">
                        <h2 class="page-secondary-item__title position-relative text-uppercase pb-3">
                            {{ $teacher->name }}
                        </h2>
                        <p class="page-secondary-item__text pt-3 mb-4">
                            {{ optional($teacher->profile)->position }}
                        </p>
                        <p class="page-secondary-item__text">
                            {!! optional($teacher->profile)->description !!}
                        </p>
                        <div class="text-right">
                            <a href="{{ route('app.teachers.index') }}" class="more-info">Другие преподаватели</a>
                        </div>
                    </div>
                </div>
            </div>
            @if($teacher->getMedia('certificates')->count())
                <div class="teachers-show-certificates">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h2 class="teachers-show-title">Cертификаты и награды преподавателя</h2>
                        </div>
                    </div>

                    <div class="teachers-show-certificates-slider">
                        @foreach($teacher->getMedia('certificates') as $certificate)
                            <div class="teachers-show-certificates-slider-item">
                                <img src="{{ $certificate->getFullUrl() }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <div class="header-banner-slider-nav header-banner-slider-nav--teachers-show-certificates d-flex align-items-center pl-5">
                                <div class="header-banner-slider-nav-arrow mx-auto d-flex justify-content-between align-items-center">
                                    <div class="header-banner-slider-nav-arrow-prev header-banner-slider-nav-arrow-prev--teachers-show-certificates"></div>
                                    <div class="header-banner-slider-nav-arrow-next header-banner-slider-nav-arrow-next--teachers-show-certificates"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @includeWhen($reviews->count(), 'partials.app.sections.reviews')
        </div>
    </section>

    @includeWhen($courses->count(), 'partials.app.sections.feedback')
@endsection
