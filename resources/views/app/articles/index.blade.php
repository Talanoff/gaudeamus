@extends('layouts.app', ['page_title' => 'Статьи'])

@section('content')

    <section id="articles-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner"
                 style="background-image: url('images/bg/banner/articles-page-banner.jpg');"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="#" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="#" class="breadcrumbs-list-item__link">Cтатьи</a>
                </li>
            </ul>

            <h2 class="page-secondary-title text-white">Cтатьи</h2>

            <div class="articles-page-content">

                @foreach($articles as $article)



                    <div class="row">
                        <div class="col-sm-7 col-lg-4 px-2 mx-auto mx-lg-0">
                            @if($article->hasMedia('article'))
                                <a href="{{ route('app.articles.show') }}"
                                   class="articles-page-card articles-page-card--big articles-page-card--img">
                                    <div class="articles-page-card__img"
                                         style="background-image: url({{ $article->getFirstMediaUrl('article') }});"></div>
                                    <h3 class="articles-page-card__title">{{ $article->title }}</h3>
                                </a>
                            @else
                                <a href="{{ route('app.articles.show') }}"
                                   class="articles-page-card articles-page-card--simple">
                                    <h3 class="articles-page-card__title">{{ $article->title }}</h3>
                                    <div class="articles-page-card-description">
                                        <p class="articles-page-card-description__text">
                                            {{ str_limit($article->body, $limit = 100, $end = '...') }}
                                        </p>
                                    </div>
                                </a>

                            @endif
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row my-5">
                <div class="col-sm-4">
                    <div class="pagination d-flex align-items-center">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>

        </div>
    </section>





@endsection