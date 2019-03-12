@extends('layouts.admin', ['app_title' => $slide->title])

@section('content')
    <form action="{{ route('admin.slides.update', $slide) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') ?? $slide->title }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                    <label for="description">Заголовок</label>
                    <textarea type="text" class="form-control" id="description"
                              name="description" required>{{ old('body') ?? $slide->description }}</textarea>
                    @if($errors->has('description'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('body') ? ' is-invalid' : '' }}">
                    <label for="body">Описание</label>
                    <textarea type="text" class="form-control" id="body"
                              name="body" required>{{ old('body') ?? $slide->body }}</textarea>
                    @if($errors->has('body'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <image-uploader name="slides" image-id="{{ optional($slide->getFirstMedia('slides'))->id }}" src="{{ $slide->getFirstMediaUrl('slides') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
