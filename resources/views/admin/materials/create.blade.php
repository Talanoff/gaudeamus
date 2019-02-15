@extends('layouts.admin', ['app_title' => 'Новые материалы'])

@section('content')
    <form action="{{ route('admin.materials.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название материала</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                    <label for="description">Описание</label>
                    <textarea type="text" class="form-control" id="description" name="description"
                              value="{{ old('description') }}"></textarea>
                    @if($errors->has('description'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="course_id">Курс</label>
                    <select class="form-control" id="course_id" name="course_id" required>
                        <option value="">-----</option>
                        @foreach($courses as  $course)
                            <option value="{{ $course->id }}">
                                {{ $course->title }}
                            </option>
                        @endforeach
                    </select>
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

