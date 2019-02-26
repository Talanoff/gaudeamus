@extends('layouts.admin', ['app_title' => $course->title])

@section('content')
    <form action="{{ route('admin.courses.update', $course) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название курса</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') ?? $course->title }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                    <label for="description">Описание</label>
                    <wysiwyg name="description" class="mb-3"
                             content="{{ old('description') ?? $course->description  }}" required></wysiwyg>
                    @if($errors->has('description'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group"{{ $errors->has('lessons') ? ' is-invalid' : '' }}>
                            <label for="lessons">Кол-во лекций</label>
                            <input type="number" min="1" class="form-control" id="lessons" name="lessons"
                                   value="{{ old('lessons') ?? $course->lessons }}" required>
                            @if($errors->has('lessons'))
                                <div class="mt-1 text-danger">
                                    {{ $errors->first('lessons') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' is-invalid' : '' }}">
                            <label for="price">Цена</label>
                            <input type="number" min="0.01" step="0.01" class="form-control" id="price" name="price"
                                   value="{{ old('price') ?? $course->price }}" required>
                            @if($errors->has('price'))
                                <div class="mt-1 text-danger">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="starts_at">Дата начала курсов</label>
                            <input type="date" class="form-control" id="starts_at" name="starts_at"
                                   value="{{ old('starts_at') ?? $course->starts_at->format('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="ends_at">Дата окончания курсов</label>
                            <input type="date" class="form-control" id="ends_at" name="ends_at"
                                   value="{{ old('ends_at') ?? $course->ends_at->format('Y-m-d') }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <image-uploader name="course" src="{{ $course->getFirstMediaUrl('course') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection