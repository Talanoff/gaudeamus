@extends('layouts.admin', ['app_title' => 'Материалы'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Материалы</h1>
        <div class="ml-3">
            <a href="{{ route('admin.materials.create') }}" class="btn btn-primary">
                Создать материалы
            </a>
        </div>
    </div>
    @forelse($materials as $material)
        <article class="item">
            <div class="item-id">{{ $material->id }}</div>

            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.materials.edit', $material) }}" class="underline">
                            {{ $material->title }}
                        </a>
                    </h3>
                    <p class="mb-1">
                        Материалы к курсу
                        <strong>{{ $material->course->title}}</strong>
                    </p>
                    <p class="mt-2 mb-0">
                        Создан {{ $material->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>

                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.materials.edit', $material) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.materials.destroy', $material) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $material->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.materials.destroy', $material) }}"
                          id="delete-form-{{ $material->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
       Материалы пока не созданы!
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