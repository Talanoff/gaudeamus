@extends('layouts.admin', ['app_title' => 'Новая статья'])

@section('content')
    <form action="{{ route('admin.articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название статьи</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('body') ? ' is-invalid' : '' }}">
                    <label for="body">Описание</label>
                    <textarea type="text" class="form-control" id="body" name="body"
                              value="{{ old('body') }}" required></textarea>
                    @if($errors->has('body'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>
                @if ($tags->count())
                    <hr class="my-5">

                    <h4 class="mb-4">Тэги</h4>

                    <div class="row">
                        @forelse($tags as $tag)
                            <div class="col-md-6 mb-3">
                                <div class="custom-control custom-checkbox item">
                                    <div class="item-id" style="top: -10px">{{ $tag->id }}</div>
                                    <input type="checkbox" class="custom-control-input"
                                           id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                                    <label class="custom-control-label nowrap"
                                           for="tag-{{ $tag->id }}">
                                        {{ $tag->title }}
                                    </label>
                                </div>
                            </div>
                        @empty
                            ...
                        @endforelse
                    </div>

                 @endif
            </div>
            <div class="col-md-4">
                <image-uploader name="article"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection
