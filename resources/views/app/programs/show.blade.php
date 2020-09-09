@extends('layouts.app', ['page_title' => $course->title])

@section('content')

    <section id="programs-show" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner bg-gradient"
                 style="background-image: url({{ $course->getFirstMediaUrl('course') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.programs.index') }}" class="breadcrumbs-list-item__link">Программы</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.programs.show', $course) }}"
                       class="breadcrumbs-list-item__link">{{ $course->title }}</a>
                </li>
            </ul>

            <h2 class="page-secondary-title page-secondary-title--big-margin text-white">{{ $course->title }}</h2>

            <div class="programs-show-item position-relative">
                <div class="row">
                    <div class="col-sm-5">
                        <h2 class="programs-show-item__title pb-3 mb-5">
                            {{ $course->title }}
                        </h2>
                        <a href="#feedback" class="btn btn-dark programs-show-item__btn mb-5 mb-sm-0">Записаться</a>
                    </div>
                    <div class="col-sm-7">
                        <div class="programs-show-item__text">
                            {!! $description[0] !!}
                            {!! $description[1] !!}

                            @isset($description[2])
                                <div class="jobs-page-item">
                                    {!! $description[2] !!}
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>

            <div class="programs-show-teachers position-relative">

                <div class="programs-show-description mb-4">
                    <h2 class="programs-show-description__title">Преподаватели курса</h2>
                    <a href="{{ route('app.teachers.index') }}"
                       class="btn btn-outline-primary programs-show-description__btn">Все преподаватели</a>
                </div>
                @if($teachers->count())
                    <div class="programs-show-teachers-slider">
                        @foreach($teachers as $teacher)
                            <div class="programs-show-teachers-slider-item">
                                <div class="teachers-card">
                                    <div class="teachers-card-description">
                                        <h2 class="teachers-card-description-name">{{ $teacher->name }}</h2>
                                        <div class="teachers-card-description-position">
                                            {{ optional($teacher->profile)->position }}
                                        </div>
                                        <a href="{{ route('app.teachers.show' , $teacher) }}"
                                           class="more-info">Подробнее</a>
                                    </div>
                                    <div class="teachers-card-img">
                                        <img src="{{ $teacher->avatar }}" alt=""></div>
                                    <div class="decoration-block"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-6 mx-auto">
                        <div class="header-banner-slider-nav d-flex align-items-center pl-5">
                            <div
                                class="header-banner-slider-nav-arrow mx-auto d-flex justify-content-between align-items-center">
                                <div
                                    class="header-banner-slider-nav-arrow-prev header-banner-slider-nav-arrow-prev--programs-show-teachers"></div>
                                <div
                                    class="header-banner-slider-nav-arrow-next header-banner-slider-nav-arrow-next--programs-show-teachers"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>


    <section id="pr-materials">
        <div class="container">
            @if($materials->count())
                <div class="programs-show-materials position-relative">
                    <div class="programs-show-description">
                        <h2 class="programs-show-description__title">Учебные материалы курса {{ $course->title }}</h2>
                        <a href="{{ route('app.materials.index') }}"
                           class="btn btn-outline-primary programs-show-description__btn">Еще</a>
                    </div>

                    <div class="row">
                        @foreach($materials as $material)
                            <div class="col-sm-6 col-lg-3">
                                <div class="materials-page-item-content-img materials-page-item-content-img--englishland"
                                    @click="showMaterialModal('{{ route('app.materials.modal', $material) }}')">
                                    <img src="{{ $material->getFirstMediaUrl('material') }}" alt="">
                                    <div class="materials-page-item-content-img-hover">
                                        <h3 class="materials-page-item-content-img-hover__title">
                                            {{ $material->title }}
                                        </h3>
                                        <p class="materials-page-item-content-img-hover__description">
                                            {{ $material->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <materials-modal></materials-modal>
                    </div>
                </div>
            @endif
        </div>
    </section>
    @includeWhen($courses->count(), 'partials.app.sections.feedback')
@endsection
