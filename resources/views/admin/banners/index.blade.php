@extends('layouts.admin', ['app_title' => 'Баннеры'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Баннеры</h1>
    </div>

    @foreach($banners as $banner)
        <article class="item">
            <div class="item-id">{{ $banner->id }}</div>
            <div class="item-body">
                <div class="col-auto">
                    @if ($banner->hasMedia('banner'))
                        <img src="{{ $banner->getFirstMedia('banner')->getFullUrl('thumb') }}" class="rounded"
                             alt="{{ $banner->title }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-avatar.png') }}" class="rounded"
                             alt="{{ $banner->title }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.banners.edit', $banner) }}" class="underline">
                            {{ $banner->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Обновлен {{ $banner->updated_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.banners.edit', $banner) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                </div>
            </div>
        </article>

    @endforeach

@endsection
