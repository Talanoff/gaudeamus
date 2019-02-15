@extends('layouts.app', ['page_title' => 'Отзывы'])

@section('content')

    <section id="reviews-page" class="section-page-secondary">

        @include('app.reviews.partials.review')

        <div class="container">
            <div class="page-secondary-banner"
                 style="background-image: url('/images/bg/banner/reviews-page-banner.jpg');"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.reviews') }}" class="breadcrumbs-list-item__link">Отзывы</a>
                </li>
            </ul>

            <h2 class="page-secondary-title page-secondary-title--big-margin text-white">Мнения людей о нас</h2>

            <div class="reviews-page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="programs-show-description">
                            <h2 class="programs-show-description__title">Отзывы</h2>
                            <a href="#" id="add-reviews-btn"
                               class="btn btn-outline-primary programs-show-description__btn">Оставить
                                отзыв</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($reviews as $review)
                        <div class="col-sm-6">
                            <div class="reviews-slider-item-content">
                                @if ($review->author)
                                    <div class="reviews-slider-item-content__img rounded-circle"
                                         style="background-image: url({{$review->author->avatar}});"></div>
                                @else
                                    <div class="reviews-slider-item-content__img rounded-circle"
                                         style="background-image: url({{asset('images/no-avatar.png')}});"></div>
                                @endif

                                <div class="reviews-slider-item-content-main">
                                    <div class="reviews-slider-item-content-main-info">
                                        <h3 class="reviews-slider-item-content-main-info__name">
                                            {{ $review->author_name}}
                                        </h3>
                                        <div class="reviews-slider-item-content-main-info__data">
                                            {{ $review->created_at->formatLocalized('%d %B %Y') }}
                                        </div>
                                    </div>
                                    <div class="reviews-slider-item-content-main-description">
                                        <p class="reviews-slider-item-content-main-description__text">
                                            {{ $review->message }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row my-5">
                <div class="col-sm-4">
                    <div class="pagination d-flex align-items-center">
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
