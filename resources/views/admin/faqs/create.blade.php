@extends('layouts.admin', ['app_title' => 'Новый вопрос'])

@section('content')
    <form action="{{ route('admin.faq.store') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('question') ? ' is-invalid' : '' }}">
                    <label for="question">Вопрос</label>
                    <input type="text" class="form-control" id="question" name="question"
                           value="{{ old('question') }}" required>
                    @if($errors->has('question'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('question') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('answer') ? ' is-invalid' : '' }}">
                    <label for="answer">Ответ</label>
                    <wysiwyg name="answer" class="mb-3"
                             content="{{ old('answer') }}" required></wysiwyg>
                    @if($errors->has('answer'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('answer') }}
                        </div>
                    @endif
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

