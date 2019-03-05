@extends('layouts.admin', ['app_title' => $material->title])

@section('content')
    <form action="{{ route('admin.materials.update', $material) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название материала</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') ?? $material->title }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                    <label for="description">Заголовок</label>
                    <input type="text" class="form-control" id="description" name="description"
                           value="{{ old('description') ?? $material->description }}" required>
                    @if($errors->has('description'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('body') ? ' is-invalid' : '' }}">
                    <label for="body">Описание</label>
                    <wysiwyg name="body" class="mb-3" content="{{ old('body') ?? $material->body }}" required></wysiwyg>
                    @if($errors->has('body'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>
                <hr class="my-5">

                <h4 class="mb-4">Книга</h4>
                @if($material->hasMedia('book'))
                    <p> Загруженый файл:
                        <a href="{{ $material->getFirstMediaUrl('book') }}"
                       download>{{ $material->getFirstMedia('book')->file_name }}</a></p>
                    <label for="file" class="form-control-label">Заменить файл с материалом (pdf)</label>
                @else
                    <label for="file" class="form-control-label">Прикрепить файл с материалом (pdf)</label>
                @endif
                <input type="file" class="form-control-file"
                       id="file" name="book" accept=".pdf">

                <hr class="my-5">

                <h4 class="mb-4">Курсы</h4>

                <div class="row">
                    @forelse($courses as $course)
                        <div class="col-md-6 mb-3">
                            <div class="custom-control custom-checkbox item">
                                <div class="item-id" style="top: -10px">{{ $course->id }}</div>
                                <input type="checkbox" class="custom-control-input" name="courses[]"
                                       id="course-{{ $course->id }}" value="{{ $course->getKey() }}"
                                        {{ in_array($course->getKey(), $material->course()->pluck('course_id')->toArray()) ? 'checked' : '' }}>
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
                <image-uploader name="material" src="{{ $material->getFirstMediaUrl('material') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection