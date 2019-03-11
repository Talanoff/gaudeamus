@extends('layouts.admin', ['app_title' => 'Фотогалерея'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Фотогалерея</h1>
        <div class="ml-3">
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
                Создать новую фотографию
            </a>
        </div>
    </div>
    @forelse($galleries as $gallery)
        <article class="item">
            <div class="item-id">{{ $gallery->id }}</div>

            <div class="item-body">
                <div class="col-auto">
                    <img src="{{ $gallery->getFirstMediaUrl('gallery', 'thumb') }}" class="rounded-circle"
                         alt="{{ $gallery->title }}" style="width: 100px;">
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="underline">
                            {{ $gallery->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $gallery->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.galleries.destroy', $gallery) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $gallery->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.galleries.destroy', $gallery) }}"
                          id="delete-form-{{ $gallery->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Фото пока не созданы!
    @endforelse
    {{ $galleries->links() }}
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
