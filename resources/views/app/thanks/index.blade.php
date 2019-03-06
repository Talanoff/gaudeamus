@extends('layouts.app', ['page_title' => 'Спасибо'])

@section('content')


    <section id="thank-page" class="section-page-secondary">
        <div class="container h-100">
            <div class="row h-100">
                <div class="page-secondary-banner bg-gradient"
                     style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
                <ul class="breadcrumbs-list list-unstyled d-flex">
                    <li class="breadcrumbs-list-item">
                        <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                    </li>
                    <li class="breadcrumbs-list-item">
                        <a href="{{ route('app.thanks') }}" class="breadcrumbs-list-item__link">Спасибо</a>
                    </li>
                </ul>
                <div class="col-12 text-center">
                    <h1 class="thank-page__title text-white mb-4">
                        СПАСИБО! МЫ С ВАМИ СВЯЖЕМСЯ...
                    </h1>
                    <a href="/" class="btn btn-outline-light thank-page__btn text-dark">На главную</a>
                </div>
            </div>
        </div>
    </section>

@endsection