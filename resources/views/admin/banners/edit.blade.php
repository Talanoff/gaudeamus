@extends('layouts.admin', ['app_title' => $banner->title])

@section('content')
    <form action="{{ route('admin.banners.update', $banner) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <h1 class="h3">Баннер для страницы {{ $banner->title }}</h1>
        <image-uploader name="banner" image-id="{{ optional($banner->getFirstMedia('banner'))->id }}"
                        src="{{ $banner->getFirstMediaUrl('banner') }}"></image-uploader>

        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
