@extends('layouts.admin', ['app_title' => $user->name])

@section('content')

    <form action="{{ route('admin.students.update', $user) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control form-control-lg" id="name" name="name"
                           value="{{ old('name') ?? $user->name }}" required>
                    @if($errors->has('name'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ old('email') ?? $user->email }}" readonly required>
                    @if($errors->has('email'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                    <label for="phone">Телефон</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                           value="{{ old('phone') ?? $user->phone }}">
                    @if($errors->has('phone'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="birthday">День рождения</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"
                           value="{{ old('birthday') ?? $user->birthday->format('Y-m-d') }}">
                </div>

                <hr class="my-5">

                <h4 class="mb-4">Курсы</h4>

                <div class="row">
                    @forelse($courses as $course)
                        <div class="col-md-6 mb-3">
                            <div class="custom-control custom-checkbox item">
                                <div class="item-id" style="top: -10px">{{ $course->id }}</div>
                                <input type="checkbox" class="custom-control-input" name="courses[]"
                                       id="course-{{ $course->id }}" value="{{ $course->getKey() }}"
                                    {{ in_array($course->getKey(), $user->courses()->pluck('course_id')->toArray()) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="course-{{ $course->id }}">
                                    <h4>{{ $course->title }}</h4>
                                    <p class="mb-0">
                                        {{ $course->starts_at->format('d.m.Y') }} &mdash; {{ $course->ends_at->format('d.m.Y') }}
                                    </p>
                                </label>
                            </div>
                        </div>
                    @empty
                        ...
                    @endforelse
                </div>
            </div>

            <div class="col-md-4">
                <image-uploader name="avatar" image-id="{{ optional($user->getFirstMedia('avatar'))->id }}" src="{{ $user->avatar }}"></image-uploader>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
