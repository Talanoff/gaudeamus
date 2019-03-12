@extends('layouts.app', ['page_title' => 'Фотогалерея'])

@section('content')

    <section id="gallery-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner bg-gradient"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.galleries') }}" class="breadcrumbs-list-item__link">Фотогалерея</a>
                </li>
            </ul>

            <h2 class="page-secondary-title text-white">Фотогалерея</h2>

            <div class="gallery-page-content">

                <div class="row">
                    <div class="col-12">
                        <div class="header-banner-slider-nav d-flex justify-content-betweem align-items-center position-absolute">
                            <div class="header-banner-slider-nav-arrow mx-auto d-flex justify-content-between align-items-center">
                                <div class="header-banner-slider-nav-arrow-prev header-banner-slider-nav-arrow-prev--gallery-page"></div>
                                <div class="header-banner-slider-nav-arrow-next header-banner-slider-nav-arrow-next--gallery-page"></div>
                            </div>
                        </div>
                    </div>
                </div>

             

                <div class="gallery-page-slider-num">
                    <div class="gallery-page-slider-num-item gallery-page-slider-num-item-index"></div>
                    <div class="gallery-page-slider-num-item gallery-page-slider-num-item-last"></div>
                </div>

                @foreach($galleries as $gallery)

                    @if($loop->first)
                        <div class="row">
                            <div class="col-12">
                                <div class="gallery-page-slider">
                                    @endif

                                    <div class="gallery-page-slider-item">
                                        <div class="gallery-page-slider-item-info">
                                            <div class="gallery-page-slider-item-info__data">
                                                {{ $gallery->created_at->formatLocalized('%d %B %Y')  }}
                                            </div>
                                            <div class="gallery-page-slider-item-info__place">
                                                {{ $gallery->title }}
                                            </div>
                                        </div>
                                        <div class="gallery-page-slider-item__img"
                                             style="background-image: url({{ $gallery->getFirstMediaUrl('gallery') }});"></div>
                                    </div>

                                    @if($loop->last)
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach($galleries as $gallery)
                    @if($loop->first)
                         <div class="gallery-page-slider-navFor">
                             <div class="row">
                                 @endif
                                 <div class="col-2">
                                     <div class="gallery-page-slider-navFor-item"
                                          style="background-image: url({{ $gallery->getFirstMediaUrl('gallery') }});"></div>
                                 </div>
                                 @if($loop->last)
                             </div>
                         </div>
                     @endif

                @endforeach


            </div>

        </div>
    </section>

@endsection