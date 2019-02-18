@extends('layouts.admin', ['app_title' => 'Новый тэг'])

@section('content')
    <form action="{{ route('admin.tags.store') }}" method="post">
        @csrf


        <div class="row">
            <div class="col">
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
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection
