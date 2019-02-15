@extends('layouts.app', ['page_title' => 'Главная'])

@section('content')

    @includeWhen($slides->count(),'partials.app.layout.slider')
    @includeWhen($reviews->count(), 'partials.app.reviews.reviews')

@endsection