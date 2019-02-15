@extends('layouts.admin', ['app_title' => $review->author_name])

@section('content')
    <form action="{{ route('admin.reviews.update', $review) }}" method="post">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md">
                <p class="font-weight-bold mb-2">Автор</p>
                <h1 class="h5 mb-1">
                    {{ $review->author_name }}
                </h1>

                @if ($review->author)
                    <p>
                        <a class="dashed"
                           href="mailto:{{ $review->author->email }}">{{ $review->author->email }}</a>
                    </p>
                @else
                    <p class="text-muted">Не зарегестрированный пользователь</p>
                @endif

                <p>{{ $review->created_at->formatLocalized('%d %b %Y, %H:%M') }}</p>
            </div>

            <div class="col-md">
                <select name="status" class="form-control w-auto">
                    @foreach(\App\Models\Article\Review::$STATUSES as $status)
                        <option value="{{ $status }}"
                                {{ $review->status == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="mt-4">{{ $review->message }}</p>
        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection