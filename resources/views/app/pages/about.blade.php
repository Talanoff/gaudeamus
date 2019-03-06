@extends('layouts.app', ['page_title' => $about->title])

@section('content')

    <section id="questions-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner bg-gradient"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.about') }}" class="breadcrumbs-list-item__link">{{ $about->title }}</a>
                </li>
            </ul>

            <h2 class="page-secondary-title page-secondary-title--big-margin text-white">{{ $about->title }}</h2>

            <div class="questions-page-content">
                <div class="programs-show-description">
                    <h2 class="programs-show-description__title">{{ $about->description }}</h2>
                </div>
                <div class="section">
                    <p class="about-item-description">
                        {!! $about->body !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @includeWhen($courses->count(), 'partials.app.sections.feedback')
@endsection