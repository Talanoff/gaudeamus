@extends('layouts.app', ['page_title' => $contacts->title])

@section('content')
    <section id="contacts-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner bg-gradient"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="#" class="breadcrumbs-list-item__link">{{ $contacts->title }}</a>
                </li>
            </ul>

            <h2 class="page-secondary-title mb-5 text-white">{{ $contacts->title }}</h2>

            <div class="row">
                <div class="col-sm-6 mt-4 mt-sm-0 ml-auto mr-0">
                    <div class="teachers-quote text-white">
                        <div class="teachers-quote-text">
                            {{ $quote->qoute }}
                        </div>
                        <div class="teachers-quote-name position-relative d-flex align-items-center">
                            <div class="teachers-quote-name-decoration mr-3"></div>
                            {{ $quote->author }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="contacts-page-content">
                <h2 class="contacts-page__title">
                    {{ $contacts->description }}
                </h2>

                {!! $contacts->body !!}
            </div>
        </div>
    </section>

@endsection
