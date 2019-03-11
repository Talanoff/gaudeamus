@extends('layouts.admin', ['app_title' => 'Аспекты'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Аспекты</h1>
        <div class="ml-3">
            <a href="{{ route('admin.aspects.create') }}" class="btn btn-primary">
                Создать новый аспект
            </a>
        </div>
    </div>
    @forelse($aspects as $aspect)
        <article class="item">
            <div class="item-id">{{ $aspect->id }}</div>
            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.aspects.edit', $aspect) }}" class="underline">
                            {{ $aspect->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $aspect->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.aspects.edit', $aspect) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.aspects.destroy', $aspect) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $aspect->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.aspects.destroy', $aspect) }}"
                          id="delete-form-{{ $aspect->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Аспекты пока не созданы!
    @endforelse
    {{ $aspects->links() }}
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
