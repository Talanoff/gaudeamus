@extends('layouts.admin', ['app_title' => 'Цитаты'])

@section('content')
    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Цитаты</h1>
    </div>
    @forelse($quotes as $quote)
        <article class="item">
            <div class="item-id">{{ $quote->id }}</div>

            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.quotes.edit', $quote) }}" class="underline">
                            {{ $quote->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $quote->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.quotes.edit', $quote) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                </div>
            </div>
        </article>
    @empty
        Цитат пока нет!
    @endforelse

@endsection

