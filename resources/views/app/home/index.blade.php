@extends('layouts.app', ['page_title' => 'Главная'])

@section('content')

    @includeWhen($slides->count(),'partials.app.layout.slider')

    @if(!empty($about->body))
        @include('partials.app.sections.about')
    @endif
    @if(!empty($methods->body))
        @include('partials.app.sections.methods')
    @endif
    @includeWhen($aspects->count(), 'partials.app.sections.aspects')
    @includeWhen($reviews->count(), 'partials.app.sections.reviews')
    @includeIf('partials.app.sections.feedback')

@endsection
