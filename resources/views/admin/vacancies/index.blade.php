@extends('layouts.admin', ['app_title' => 'Вакансии'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Вакансии</h1>
        <div class="ml-3">
            <a href="{{ route('admin.vacancies.create') }}" class="btn btn-primary">
                Создать новую вакансию
            </a>
        </div>
    </div>
    @forelse($vacancies as $vacancy)
        <article class="item">
            <div class="item-id">{{ $vacancy->id }}</div>

            <div class="item-body">
                <div class="col-auto">
                    @if ($vacancy->hasMedia('vacancy'))
                        <img src="{{ $vacancy->getFirstMediaUrl('vacancy', 'thumb') }}" class="rounded"
                             alt="{{ $vacancy->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-avatar.png') }}" class="rounded"
                             alt="{{ $vacancy->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.vacancies.edit', $vacancy) }}" class="underline">
                            {{ $vacancy->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $vacancy->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.vacancies.edit', $vacancy) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.vacancies.destroy', $vacancy) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $vacancy->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.vacancies.destroy', $vacancy) }}"
                          id="delete-form-{{ $vacancy->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Вакансии пока не созданы!
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
