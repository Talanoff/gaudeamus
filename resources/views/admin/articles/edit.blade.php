@extends('layouts.admin', ['app_title' => $article->title])

@section('content')
    <form action="{{ route('admin.articles.update', $article) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title">Название статьи</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title') ?? $article->title }}" required>
                    @if($errors->has('title'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('body') ? ' is-invalid' : '' }}">
                    <label for="body">Описание</label>
                    <wysiwyg name="body" class="mb-3" content="{{ old('body') ?? $article->body }}" required></wysiwyg>
                    @if($errors->has('body'))
                        <div class="mt-1 text-danger">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>

                <hr class="my-5">

                <h4 class="mb-4">Тэги</h4>

                <div class="row">
                    @forelse($tags as $tag)
                        <div class="col-md-6 mb-3">
                            <div class="custom-control custom-checkbox item">
                                <div class="item-id" style="top: -10px">{{ $tag->id }}</div>
                                <input type="checkbox" class="custom-control-input"
                                       id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}"
                                        {{ $article->tags->pluck('id')->contains($tag->id) ? 'checked' : '' }}>
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
            </div>
            <div class="col-md-4">
                <image-uploader name="article" image-id="{{ optional($article->getFirstMedia('article'))->id }}"
                                src="{{ $article->getFirstMediaUrl('article') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
