@extends('layouts.admin', ['app_title' => $respond->name])

@section('content')
    <form action="{{ route('admin.responds.update', $respond) }}" method="post">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md">
                <p class="font-weight-bold mb-2">Имя</p>
                <p class="mb-1">
                    {{ $respond->name }}
                </p>
                <p class="font-weight-bold mb-2">Почта</p>
                <p>
                    <a class="mb-1 dashed"
                       href="mailto:{{ $respond->email }}">{{ $respond->email }}</a>
                </p>
                <p class="font-weight-bold mb-2">Телефон</p>
                <p class="mb-1">{{ $respond->phone }}</p>
                <p class="font-weight-bold mb-2">Название вакансии</p>
                <p class="mb-1">{{ $vacancy->title }}</p>
                <p class="font-weight-bold mb-2">Заявка отправлена</p>
                <p class="mb-1">{{ $respond->created_at->format(('d.m.Y \в H:i')) }}</p>
                @if($respond->hasMedia('resume'))

                    <p class="font-weight-bold mb-2">Резюме</p>
                    <a href="{{ $respond->getFirstMediaUrl('resume') }}" download>{{ $respond->getFirstMedia('resume')->file_name }}</a>
                @endif
            </div>

            <div class="col-md">
                <select name="status" class="form-control w-auto">
                    @foreach(\App\Models\Page\Respond::$STATUSES as $status)
                        <option value="{{ $status }}"
                                {{ $respond->status == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection