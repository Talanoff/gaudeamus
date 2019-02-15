@extends('layouts.admin', ['app_title' => 'Навая вакансия'])

@section('content')
    <form action="{{ route('admin.vacancies.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название вакансии</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                    <label for="body">Описание</label>
                    <textarea type="text" class="form-control" id="description" name="description"
                              value="{{ old('description') }}" required></textarea>
                    @if($errors->has('description'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <image-uploader name="vacancy"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection
