@extends('layouts.app', ['page_title' => $article->title])

@section('content')
    <main id="main-articles-show">
        <section id="articles-show" class="section-page-secondary">
            <div class="container">
                <div class="page-secondary-banner"
                     style="background-image: url('../../images/bg/banner/articles-page-banner.jpg');"></div>
                <ul class="breadcrumbs-list list-unstyled d-flex">
                    <li class="breadcrumbs-list-item">
                        <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                    </li>
                    <li class="breadcrumbs-list-item">
                        <a href="{{ route('app.articles.index') }}" class="breadcrumbs-list-item__link">Cтатьи</a>
                    </li>
                </ul>

                <h2 class="page-secondary-title text-white">Cтатьи</h2>

                <div class="articles-show-content">
                    <div class="row">
                        <div class="col-sm-10 mx-auto px-5 px-sm-0">
                            <h2 class="articles-show-title py-3 mb-3">
                                {{ $article->title }}
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-12">
                                <div class="article-item">
                                    @if($article->hasMedia('article'))
                                    <div class="articles-show-img"
                                         style="background-image: url({{ $article->getFirstMediaUrl('article') }});"></div>
                                    @endif
                                    <div class="content">
                                        <div class="articles-show-item">
                                            <div class="articles-show-item-info">
                                                <div class="articles-show-item-info-row mb-3 d-flex justify-content-between align-items-center">
                                                    <div class="articles-show-item-info__text">
                                                        {{ $article->created_at }}
                                                    </div>
                                                    <div class="articles-show-item-info-views d-flex justify-content-center align-items-center">
                                                        <svg width="20" height="15">
                                                            <use xlink:href="#views-icon"></use>
                                                        </svg>
                                                        <div class="articles-show-item-info__text ml-2">
                                                            {{ $article->views_count }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="articles-show-item-info-row">
                                                    <div class="articles-show-item-info__text mb-3">
                                                        {{ $article->author_name }}
                                                    </div>
                                                    @if($article->tags->count())
                                                        @foreach($article->tags as $tag)
                                                            <div class="articles-show-item-info__whom">
                                                                {{ $tag->title }}
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <p class="articles-show-item__text">
                                            {!! $article->body  !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Secondary -->

        <section id="secondary-show">
            <div class="container">

                <div class="row mb-3">
                    <div class="col-12">
                        <h2 class="section-title">
                            ВАМ МОГУТ БЫТЬ ИНТЕРЕСНЫ
                        </h2>
                    </div>
                </div>

                <div class="row">

                    @foreach($interested as $item)
                        @if($item->hasMedia('article'))
                            <div class="col-sm-5 col-lg-4 px-2 mb-3 mb-lg-0 mx-auto mx-lg-0">
                                <a href="{{ route('app.articles.show', $article) }}"
                                   class="articles-page-card articles-page-card--simple articles-page-card--img">
                                    <div class="articles-page-card__img"
                                         style="background-image: url({{ $item->getFirstMediaUrl('article') }});"></div>
                                    <h3 class="articles-page-card__title">{{ $item->title }}</h3>
                                </a>
                            </div>
                        @else

                            <div class="col-sm-5 col-lg-4 px-2 mx-auto mx-lg-0">
                                <a href="{{ route('app.articles.show', $article) }}"
                                   class="articles-page-card articles-page-card--simple">
                                    <h3 class="articles-page-card__title">
                                        {{ $item->title }}
                                    </h3>
                                    <div class="articles-page-card-description">
                                        <p class="articles-page-card-description__text">
                                            {{ str_limit($item->body, $limit = 100, $end = '...') }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>
    </main>


@endsection