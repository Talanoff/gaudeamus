@extends('layouts.app', ['page_title' => __('Our team')])

@section('content')

    <section id="teachers-page" class="section-page-secondary">
        <div class="container">
            <div class="page-secondary-banner bg-gradient"
                 style="background-image: url({{ $banner->getFirstMediaUrl('banner') }});"></div>
            <ul class="breadcrumbs-list list-unstyled d-flex">
                <li class="breadcrumbs-list-item">
                    <a href="/" class="breadcrumbs-list-item__link">Главная</a>
                </li>
                <li class="breadcrumbs-list-item">
                    <a href="{{ route('app.teachers.index') }}" class="breadcrumbs-list-item__link">{{ __('Our team') }}</a>
                </li>
            </ul>

            <h2 class="page-secondary-title mb-0 text-white">{{ __('Our team') }}</h2>

            {{--
            <div class="row">
                <div class="col-sm-6 mt-4 mt-sm-0 ml-auto mr-0">
                    <div class="teachers-quote text-white">
                        <div class="teachers-quote-text">
                            {{ $quote->quote }}
                        </div>
                        <div class="teachers-quote-name position-relative d-flex align-items-center">
                            <div class="teachers-quote-name-decoration mr-3"></div>
                            {{ $quote->author }}
                        </div>
                    </div>
                </div>
            </div>
            --}}

            <section style="margin-top: 30vh;">
                @if($teachers->count())
                    @foreach($teachers as $teacher)
                        @if($loop->index == 0 || $loop->index == 2 || $loop->index == 4)
                            <div class="row align-items-end">
                                @endif
                                <div class="col-sm-6">
                                    <div class="teachers-card">
                                        <div class="teachers-card-description">
                                            <h2 class="teachers-card-description-name">{{ $teacher->name }}</h2>
                                            <div class="teachers-card-description-position">
                                                {{ optional($teacher->profile)->position }}
                                            </div>
                                            <a href="{{ route('app.teachers.show' , $teacher) }}" class="more-info">Подробнее</a>
                                        </div>
                                        <div class="teachers-card-img">
                                            <img src="{{ $teacher->avatar }}" alt=""></div>
                                        <div class="decoration-block"></div>
                                    </div>
                                </div>

                                @if($loop->index == 1 || $loop->index == 3 || $loop->index == 5 )
                            </div>
                        @endif
                    @endforeach
            </section>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="pagination d-flex align-items-center">
                            {{ $teachers->links() }}
                        </div>
                    </div>
                </div>
            @else
                <div class="row align-items-end">
                    <div class="col-12">
                        <div class="teachers-card">
                            <div class="teachers-card-description">
                                <h2 class="teachers-card-description-name">
                                    Преподавателей пока нет!
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>



@endsection
