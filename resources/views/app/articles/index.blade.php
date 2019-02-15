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

                    @if($loop->iteration == 1 || $loop->iteration == 6 || $loop->iteration == 8 || $loop->iteration == 11 )
                        <div class="row">
                    @endif

                    @if($loop->index ==0 )
                        <div class="col-sm-7 col-lg-4 px-2 mx-auto mx-lg-0">
                    @elseif($loop->index ==1)
                        <div class="col-sm-7 col-lg-4 px-2 mb-3 mb-lg-0 mx-auto mx-lg-0">
                    @elseif($loop->index ==3)
                        <div class="col-sm-7 col-lg-4 px-2 mb-5 mb-lg-0 mx-auto mx-lg-0">
                    @elseif($loop->index ==5)
                        <div class="col-sm-7 col-lg-6 px-2 mx-auto mx-lg-0">
                    @elseif($loop->index ==6)
                        <div class="col-sm-7 col-lg-6 px-2 mb-3 mb-lg-0 mx-auto mx-lg-0">
                    @elseif($loop->index ==7)
                        <div class="col-sm-5 col-lg-4 px-2 mx-auto mx-lg-0">
                    @elseif($loop->index ==8)
                        <div class="col-sm-5 col-lg-4 px-2 mx-auto mx-lg-0">
                    @elseif($loop->index ==9)
                        <div class="col-sm-5 col-lg-4 px-2 mb-3 mb-lg-0 mx-auto mx-lg-0">
                    @elseif($loop->index ==10)
                        <div class="col-12 col-lg-8 px-2">
                    @elseif($loop->index ==11)
                        <div class="col-sm-5 col-lg-4 px-2 mx-auto mx-lg-0">
                    @endif

                        @if($article->hasMedia('article'))
                            @if($loop->first)
                            <a href="{{ route('app.articles.show') }}"
                            class="articles-page-card articles-page-card--big articles-page-card--img">
                                <div class="articles-page-card__img"
                                style="background-image: url({{ $article->getFirstMediaUrl('article') }});"></div>
                                <h3 class="articles-page-card__title">{{ $article->title }}</h3>
                            </a>
                            @else
                                    <a href="{{ route('app.articles.show') }}"
                                       class="articles-page-card articles-page-card--simple articles-page-card--img">
                                        <div class="articles-page-card__img"
                                             style="background-image: url({{ $article->getFirstMediaUrl('article') }});"></div>
                                        <h3 class="articles-page-card__title">{{ $article->title }}</h3>
                                    </a>
                                @endif
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
                        @if($loop->index ==0 )
                            </div>
                        @elseif($loop->index ==2)
                            </div>
                        @elseif($loop->index ==4)
                            </div>
                        @elseif($loop->index ==5)
                            </div>
                        @elseif($loop->index ==6)
                            </div>
                        @elseif($loop->index ==7)
                            </div>
                        @elseif($loop->index ==8)
                            </div>
                        @elseif($loop->index ==9)
                            </div>
                        @elseif($loop->index ==10)
                            </div>
                        @elseif($loop->index ==11)
                            </div>
                        @endif
                   @if($loop->iteration == 5 || $loop->iteration == 7 || $loop->iteration == 10 || $loop->iteration == 12 )
                        </div>
                    @endif
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