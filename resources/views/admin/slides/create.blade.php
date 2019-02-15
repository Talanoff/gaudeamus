@extends('layouts.admin', ['app_title' => 'Нвый слайд'])

@section('content')
    <form action="{{ route('admin.slides.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                    <label for="description">Заголовок </label>
                    <textarea type="text" class="form-control" id="description" name="description"
                              value="{{ old('description') }}"></textarea>
                    @if($errors->has('description'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('body') ? ' is-invalid' : '' }}">
                    <label for="body">Описание</label>
                    <textarea type="text" class="form-control" id="body" name="body"
                              value="{{ old('body') }}"></textarea>
                    @if($errors->has('body'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <image-uploader name="slides"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection


