@extends('layouts.admin', ['app_title' => $faq->title])

@section('content')
    <form action="{{ route('admin.faq.update', $faq) }}" method="post" >
    @csrf
    @method('patch')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('question') ? ' is-invalid' : '' }}">
                    <label for="question">Вопрос</label>
                    <input type="text" class="form-control" id="question" name="question"
                           value="{{ old('question') ?? $faq->question }}" required>
                    @if($errors->has('question'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('question') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('answer') ? ' is-invalid' : '' }}">
                    <label for="answer">Ответ</label>
                    <textarea type="text" class="form-control" id="answer"
                              name="answer" required>{{ old('answer') ?? $faq->answer }}</textarea>
                    @if($errors->has('answer'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('answer') }}
                        </div>
                    @endif
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary">
                        Обновить
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection