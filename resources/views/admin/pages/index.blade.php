@extends('layouts.admin', ['app_title' => 'Страницы'])

@section('content')
    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Страницы</h1>
    </div>
    @forelse($pages as $page)
        <article class="item">
            <div class="item-id">{{ $page->id }}</div>

            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="underline">
                            {{ $page->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $page->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.pages.edit', $page) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.pages.destroy', $page) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $page->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.pages.destroy', $page) }}"
                          id="delete-form-{{ $page->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Страниц пока нет!
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