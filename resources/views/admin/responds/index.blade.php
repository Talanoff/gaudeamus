@extends('layouts.admin', ['app_title' => 'Отклики на вакансии'])

@section('content')
    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Отклики на вакансии</h1>
    </div>
    @forelse($responds as $respond)
        <article class="item">
            <div class="item-id">{{ $respond->id }}</div>

            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.responds.edit', $respond) }}" class="underline">
                            {{ $respond->name  }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $respond->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.responds.edit', $respond) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.responds.destroy', $respond) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $respond->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.responds.destroy', $respond) }}"
                          id="delete-form-{{ $respond->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Отзывов пока нет!
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