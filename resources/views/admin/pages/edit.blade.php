@extends('layouts.admin', ['app_title' => $page->title])

@section('content')
    <form action="{{ route('admin.pages.update', $page) }}" method="post">
        @csrf
        @method('patch')
        <article class="item">
            <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                <label for="title">Название материала</label>
                <input type="text" class="form-control" id="title" name="title"
                       value="{{ old('title') ?? $page->title }}" required>
                @if($errors->has('title'))
                    <div class="mt-1 text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group{{ $errors->has('body') ? ' is-invalid' : '' }}">
                <label for="body">Описание</label>
                <textarea type="text" class="form-control" id="body"
                          name="body">{{ old('body') ?? $page->body }}</textarea>
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