@extends('layouts.app', ['page_title' => 'Страница не найдена'])

@section('content')

    <section id="error-page" class="section-page-secondary">
        <div class="container">
            <div class="row">
                <div class="page-secondary-banner" style="background-image: url('../../images/bg/error-bg.jpg');"></div>
                <ul class="breadcrumbs-list list-unstyled d-flex">
                    <li class="breadcrumbs-list-item">
                        <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                    </li>
                    <li class="breadcrumbs-list-item">
                        <a href="#" class="breadcrumbs-list-item__link">404</a>
                    </li>
                </ul>
                <div class="col-12 text-center text-white pt-sm-5">
                    <h1 class="error-page-title">
                        Упс!!! Страница нЕ найдена...
                    </h1>
                    <h2 class="error-page-title-description mb-5">
                        Ошибка
                    </h2>
                    <h3 class="error-page-title-bg">
                        404
                    </h3>
                    <a href="/" class="btn btn-outline-light error-page__btn text-dark">На главную</a>
                </div>
            </div>
        </div>
    </section>


@endsection