@extends('layouts.admin', ['app_title' => 'Новый учитель'])

@section('content')

    <form action="{{ route('admin.teachers.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control form-control-lg" id="name" name="name"
                           value="{{ old('name') }}" required>
                    @if($errors->has('name'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ old('email') }}" required>
                    @if($errors->has('email'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                    <label for="phone">Телефон</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                           value="{{ old('phone') }}">
                    @if($errors->has('phone'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="birthday">День рождения</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"
                           value="{{ old('birthday') }}">
                </div>

                <hr class="my-5">

                <h4 class="mb-4">Курсы</h4>

                <div class="row">
                    @forelse($courses as $course)
                        <div class="col-md-6 mb-3">
                            <div class="custom-control custom-checkbox item">
                                <div class="item-id" style="top: -10px">{{ $course->id }}</div>
                                <input type="checkbox" class="custom-control-input" name="courses[]"
                                       id="course-{{ $course->id }}" value="{{ $course->getKey() }}">
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
                <image-uploader name="avatar"></image-uploader>

                <hr class="my-5">

                <div class="form-group">
                    <label for="position">Должность</label>
                    <input type="text" class="form-control" id="position" name="position"
                           value="{{ old('position') }}">
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <wysiwyg name="description" class="mb-3" content="{{ old('description') }}" required></wysiwyg>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection
