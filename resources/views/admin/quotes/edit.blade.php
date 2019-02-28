@extends('layouts.admin', ['app_title' => $quote->title])

@section('content')
    <form action="{{ route('admin.quotes.update', $quote) }}" method="post">
        @csrf
        @method('patch')
        <article class="item">
            <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                <label for="title">Заголовок страницы</label>
                <h3> {{ $quote->title }}</h3>
            </div>
            <div class="form-group{{ $errors->has('quote') ? ' is-invalid' : '' }}">
                <label for="quote">Цитата</label>
                <input type="text" class="form-control" id="quote" name="quote"
                       value="{{ old('quote') ?? $quote->quote }}" required>
                @if($errors->has('quote'))
                    <div class="mt-1 text-danger">
                        {{ $errors->first('quote') }}
                    </div>
                @endif
            </div>

            <div class="form-group{{ $errors->has('author') ? ' is-invalid' : '' }}">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author"
                       value="{{ old('quote') ?? $quote->author }}" required>
                @if($errors->has('quote'))
                    <div class="mt-1 text-danger">
                        {{ $errors->first('quote') }}
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