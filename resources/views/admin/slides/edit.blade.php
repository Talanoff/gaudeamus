@extends('layouts.admin', ['app_title' => $slide->title])

@section('content')
    <form action="{{ route('admin.slides.update', $slide) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                @foreach(config('app.locales') as $locale)

                    <div class="form-group{{ $errors->has('content.' . $locale) ? ' is-invalid' : '' }}">
                        <label for="content">Описание</label>
                        <wysiwyg
                            name="content"
                            class="mb-3"
                            content="{{ old('content.' . $locale) ?? $slide->getTranslation('content', $locale) }}"
                        ></wysiwyg>

                        @if($errors->has('content.' . $locale))
                            <div class="mt-1 text-danger">
                                {{ $errors->first('content') }}
                            </div>
                        @endif
                    </div>

                @endforeach
            </div>
            <div class="col-md-4">
                <image-uploader name="slides" image-id="{{ optional($slide->getFirstMedia('slides'))->id }}" src="{{ $slide->getFirstMediaUrl('slides') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
