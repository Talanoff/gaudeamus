@extends('layouts.app', ['page_title' => 'Вопросы'])

@section('content')

    <section id="questions-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.faqs') }}" class="breadcrumbs-list-item__link">Воспросы</a>
                </li>
            </ul>

            <h2 class="page-secondary-title page-secondary-title--big-margin text-white">Воспросы</h2>

            <div class="questions-page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="programs-show-description">
                            <h2 class="programs-show-description__title">Часто задаваемые вопросы</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @foreach($faqs as $faq)
                            <div class="questions-page-item">
                                <h3 class="questions-page-item-title">
                                    <span class="questions-page-item-title__text">{{ $faq->question }}</span>
                                    <div class="decoration-block">
                                        <div class="decoration-block-item"></div>
                                    </div>
                                </h3>
                                <div class="questions-page-item-description">
                                    <p class="questions-page-item-description__text">
                                        {!! $faq->answer !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @includeWhen($courses->count(), 'partials.app.sections.feedback')
@endsection