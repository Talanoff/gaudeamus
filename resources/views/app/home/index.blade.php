@extends('layouts.app', ['page_title' => 'Главная'])

@section('content')

    @includeWhen($slides->count(),'partials.app.layout.slider')

    @if(!empty($about->body))
        @include('partials.app.sections.about')
    @endif
    @if(!empty($methods->body))
        @include('partials.app.sections.methods')
    @endif

    @includeWhen($reviews->count(), 'partials.app.sections.reviews')
    @includeWhen($courses->count(), 'partials.app.sections.feedback')

@endsection