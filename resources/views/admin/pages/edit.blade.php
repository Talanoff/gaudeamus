@extends('layouts.admin', ['app_title' => $page->title])

@section('content')
    <form action="{{ route('admin.pages.update', $page) }}" method="post">
        @csrf
        @method('patch')
        <article class="item">
            <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                <label for="title">Заголовок страницы</label>
                <h3> {{ $page->title }}</h3>
            </div>
            <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                <label for="description">Описание</label>
                <input type="text" class="form-control" id="description" name="description"
                       value="{{ old('description') ?? $page->description }}" required>
                @if($errors->has('description'))
                    <div class="mt-1 text-danger">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>

            <div class="form-group{{ $errors->has('body') ? ' is-invalid' : '' }}">
                <label for="body">Текст</label>
                <wysiwyg name="body" class="mb-3" content="{{ old('body') ?? $page->body }}" required></wysiwyg>
                @if($errors->has('body'))
                    <div class="mt-1 text-danger">
                        {{ $errors->first('body') }}
                    </div>
                @endif
            </div>
        </article>
        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection