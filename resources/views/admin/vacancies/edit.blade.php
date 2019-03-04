@extends('layouts.admin', ['app_title' => $vacancy->title])

@section('content')
    <form action="{{ route('admin.vacancies.update', $vacancy) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название вакансии</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') ?? $vacancy->title }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('city') ? ' is-invalid' : '' }}">
                    <label for="city">Город</label>
                    <input type="text" class="form-control" id="city" name="city"
                           value="{{ old('city') ?? $vacancy->city }}">
                    @if($errors->has('city'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                    <label for="description">Описание</label>
                    <wysiwyg name="description" class="mb-3"
                             content="{{ old('description') ?? $vacancy->description  }}" required></wysiwyg>
                    @if($errors->has('description'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('responsibilities') ? ' is-invalid' : '' }}">
                    <label for="responsibilities">Основные обязанности</label>
                    <wysiwyg name="responsibilities" class="mb-3"
                             content="{{ old('responsibilities') ?? $vacancy->responsibilities  }}" required></wysiwyg>
                    @if($errors->has('responsibilities'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('responsibilities') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('requirements') ? ' is-invalid' : '' }}">
                    <label for="requirements">Требования к соискателю</label>
                    <wysiwyg name="requirements" class="mb-3"
                             content="{{ old('requirements') ?? $vacancy->requirements  }}" required></wysiwyg>
                    @if($errors->has('requirements'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('requirements') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('work_day') ? ' is-invalid' : '' }}">
                    <label for="work_day">Полный рабочий день</label>
                    <input type="text" class="form-control" id="work_day" name="work_day"
                           value="{{ old('work_day') ?? $vacancy->work_day }}">
                    @if($errors->has('work_day'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('work_day') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('part_time') ? ' is-invalid' : '' }}">
                    <label for="part_time">Частичная занятость</label>
                    <input type="text" class="form-control" id="part_time" name="part_time"
                           value="{{ old('part_time') ?? $vacancy->part_time }}">
                    @if($errors->has('part_time'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('part_time') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('contact') ? ' is-invalid' : '' }}">
                    <label for="contact">Контактное лицо</label>
                    <input type="text" class="form-control" id="contact" name="contact"
                           value="{{ old('contact') ?? $vacancy->contact }}" required>
                    @if($errors->has('contact'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('contact') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="{{ old('phone') ?? $vacancy->phone }}" required>
                    @if($errors->has('phone'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>


            </div>
            <div class="col-md-4">
                <image-uploader name="vacancy" src="{{ $vacancy->getFirstMediaUrl('vacancy') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
