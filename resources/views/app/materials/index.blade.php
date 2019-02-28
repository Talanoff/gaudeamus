@extends('layouts.app', ['page_title' => 'Материалы'])

@section('content')

    <section id="materials-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.materials') }}" class="breadcrumbs-list-item__link">Учебные материалы</a>
                </li>
            </ul>

            <h2 class="page-secondary-title text-white">Учебные материалы</h2>

            <div class="materials-page-item position-relative">
                @foreach($courses as $course)
                    <div class="row mb-5">
                        <div class="col-sm-5">
                            <div class="materials-page-item-description">
                                <h2 class="materials-page-item-description__title pb-3 mb-5">
                                    {{ $course->title }}
                                </h2>
                                <a href="{{ route('app.programs.show', $course) }}"
                                   class="btn btn-dark materials-page-item-description__btn">К курсу</a>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="materials-page-item-description">
                                <p class="aterials-page-item-description__text">
                                    {!! $course->description !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="materials-page-item-content mb-0">
                        <div class="row">
                            @foreach($course->getFirstMaterials() as $material)
                                <div class="col-sm-6 col-lg-3">
                                    <div class="materials-page-item-content-img materials-page-item-content-img--englishland">
                                        <img src="{{ $material->getFirstMediaUrl('material') }}" alt="">
                                        <div class="materials-page-item-content-img-hover">
                                            <h3 class="materials-page-item-content-img-hover__title">
                                                {{ $material->title }}
                                            </h3>
                                            <p class="materials-page-item-content-img-hover__description">
                                                {{ $material->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if ($course->getHiddenMaterials()->count())
                            <div class="row collapse" id="show-more">
                                @foreach($course->getHiddenMaterials() as $material)
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="materials-page-item-content-img materials-page-item-content-img--englishland">
                                            <img src="{{ $material->getFirstMediaUrl('material') }}" alt="">
                                            <div class="materials-page-item-content-img-hover">
                                                <h3 class="materials-page-item-content-img-hover__title">
                                                    {{ $material->title }}
                                                </h3>
                                                <p class="materials-page-item-content-img-hover__description">
                                                    {{ $material->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-right mt-4">
                                <a href="#show-more" class="btn more-materials text-uppercase text-primary"
                                   data-toggle="collapse" role="button" aria-expanded="false"
                                   aria-controls="show-more">еще</a>
                            </div>
                        @endif
                    </div>

                    @if(!$loop->last)
                        <div class="decoration-line w-100 my-5"></div>
                    @endif
                @endforeach
            </div>

        </div>
        <div class="modal-mask"></div>
    </section>
    @includeWhen($courses->count(), 'partials.app.sections.feedback')
@endsection