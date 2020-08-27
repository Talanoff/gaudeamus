@extends('layouts.admin', ['app_title' => 'Курсы'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Курсы</h1>
        <div class="ml-3">
            <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                Создать новый курс
            </a>
        </div>
    </div>
    @forelse($courses as $course)
        <article class="item">
            <div class="item-id">{{ $course->id }}</div>

            <div class="item-body">
                <div class="col-auto">
                    @if ($course->hasMedia('course'))
                        <img src="{{ $course->getFirstMediaUrl('course', 'thumb') }}" class="rounded-circle"
                             alt="{{ $course->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-avatar.png') }}" class="rounded-circle"
                             alt="{{ $course->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.courses.edit', $course) }}" class="underline">
                            {{ $course->title }}
                        </a>
                    </h3>
                        <p class="mb-1">
                            Лекций:
                            <strong>{{ $course->lessons }}</strong>
                        </p>
                    <p class="mt-2 mb-0">
                        Создан {{ $course->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>

                <div class="col-auto">
                    @includeIf('partials.admin.layout.order', ['model' => $course, 'className' => \App\Models\Education\Course::class])
                </div>

                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.courses.edit', $course) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.courses.destroy', $course) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $course->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.courses.destroy', $course) }}"
                          id="delete-form-{{ $course->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Курсы пока не созданы!
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
