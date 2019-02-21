@extends('layouts.admin', ['app_title' => $gallery->title])

@section('content')
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') ?? $gallery->title }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <image-uploader name="gallery" src="{{ $gallery->getFirstMediaUrl('gallery') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
