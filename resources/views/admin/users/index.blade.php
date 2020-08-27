@extends('layouts.admin', ['app_title' => $title])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">{{ $title }}</h1>
        <div class="ml-3">
            <a href="{{ route('admin.' . $route . '.create') }}" class="btn btn-primary">
                Добавить нового
            </a>
        </div>
    </div>

    @forelse($users as $user)
        <article class="item">
            <div class="item-id">{{ $user->id }}</div>

            <div class="item-body">
                <div class="col-auto">
                    @if ($user->hasMedia('avatar'))
                        <img src="{{ $user->getFirstMediaUrl('avatar', 'thumb') }}" class="rounded-circle"
                             alt="{{ $user->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-avatar.png') }}" class="rounded-circle"
                             alt="{{ $user->name }}" style="width: 100px;">
                    @endif
                </div>

                <div class="col">
                    <h3>
                        <a href="{{ route('admin.' . $route . '.edit', $user) }}" class="underline">
                            {{ $user->name }}
                        </a>
                    </h3>

                    @if ($user->hasRole(['student', 'teacher']))
                        <p class="mb-1">
                            Курсов: <strong>{{ $user->courses()->count() }}</strong>
                        </p>
                    @endif

                    @if (!$user->is_confirmed)
                        <p>
                            <span class="text-danger">
                                Не подтвержден
                            </span>
                        </p>
                    @endif

                    <p class="mt-2 mb-0">
                        Зарегистрирован {{ $user->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>

                @if ($route === 'teachers')
                    @includeIf('partials.admin.layout.order', ['model' => $user, 'className' => \App\Models\User\User::class])
                @endif

                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.'. $route .'.edit', $user) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.'. $route .'.destroy', $user) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $user->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.'. $route .'.destroy', $user) }}"
                          id="delete-form-{{ $user->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        ...
    @endforelse

    {{ $users->links() }}

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
