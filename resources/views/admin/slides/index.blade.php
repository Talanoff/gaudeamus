@extends('layouts.admin', ['app_title' => 'Слайдер'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Слайдер</h1>
        <div class="ml-3">
            <a href="{{ route('admin.slides.create') }}" class="btn btn-primary">
                Создать новый слайд
            </a>
        </div>
    </div>
    @forelse($slides as $slide)
        <article class="item">
            <div class="item-id">{{ $slide->id }}</div>

            <div class="item-body">
                <div class="col-auto">
                    @if ($slide->hasMedia('slides'))
                        <img src="{{ $slide->getFirstMediaUrl('slides', 'thumb') }}" class="rounded"
                             alt="{{ $slide->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-avatar.png') }}" class="rounded"
                             alt="{{ $slide->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.slides.edit', $slide) }}" class="underline">
                            {{ $slide->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $slide->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.slides.edit', $slide) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.slides.destroy', $slide) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $slide->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.slides.destroy', $slide) }}"
                          id="delete-form-{{ $slide->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Слайды пока не созданы!
    @endforelse

@endsection

@push('scripts')
    <script>
      function confirmDelete(id) {
        event.preventDefault();
        const agree = confirm('Уверены?');
        if (agree) {
          document.getElementById('delete-form-' + id).submit();
        }
      }
    </script>
@endpush
