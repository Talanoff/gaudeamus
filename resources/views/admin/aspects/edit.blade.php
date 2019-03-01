@extends('layouts.admin', ['app_title' => $aspect->title])

@section('content')
    <form action="{{ route('admin.aspects.update', $aspect) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') ?? $aspect->title }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                    <label for="description">Описание</label>
                    <input type="text" class="form-control" id="description" name="description"
                           value="{{ old('description') ?? $aspect->description }}" required>
                    @if($errors->has('description'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <hr class="my-5">
                <label>Картинка к тексту</label>
                <image-uploader name="aspects_body" src="{{ $aspect->getFirstMediaUrl('aspects_body') }}"></image-uploader>
            </div>
            <div class="col-md-4">
                <label>Заглавная картинка</label>
                <image-uploader name="aspects_header" src="{{ $aspect->getFirstMediaUrl('aspects_header') }}"></image-uploader>
                
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
