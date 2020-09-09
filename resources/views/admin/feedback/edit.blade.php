@extends('layouts.admin', ['app_title' => 'Запись'])

@section('content')
    <form action="{{ route('admin.feedback.update', $feedback) }}" method="post">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md">
                <h4 class="mb-3">{{ $feedback->content->school }}</h4>

                <p>
                    <strong>Студент:</strong> {{ $feedback->content->student_first_name }} {{ $feedback->content->student_last_name }}
                </p>
                <p><strong>Школа и класс:</strong> №{{ $feedback->content->student_school }}, {{ $feedback->content->student_class }}</p>
                <p><strong>Время окончания занятий:</strong> {{ $feedback->content->learning_ends }}</p>
                <p><strong>Тестирование:</strong> {{ $feedback->content->testing_needed }}</p>
                <p><strong>Оценка по англ.:</strong> {{ $feedback->content->student_rating }}</p>

                @php
                    $sections = array_filter((array)$feedback->content->sections, function($item) { return $item[0] || $item[1]; });
                    $contacts = array_filter((array)$feedback->content->contact, function($item) { return $item->name; })
                @endphp

                @if (count($sections))
                    <p class="mb-1"><strong>Секции:</strong></p>
                    @foreach($sections as $day => $section)
                        <p class="mb-1">{{ $day }} &mdash; {{ $section[0] ?? 'н/д' }} - {{ $section[1] ?? 'н/д' }}</p>
                    @endforeach
                @endif

                <hr>

                <p class="mb-1"><strong>Контакты:</strong></p>
                @foreach($contacts as $contact)
                    <p class="mb-1">{{ $loop->iteration }}. {{ $contact->position }}</p>
                    <p class="mb-1"><strong>{{ $contact->name }}</strong></p>
                    <p>{{ $contact->phone }}, {{ $contact->email }}</p>
                @endforeach

                <hr>

                <p class="font-weight-bold mb-2">Дата заполнения</p>
                <p class="mb-1">{{ $feedback->created_at->format(('d.m.Y \в H:i')) }}</p>
            </div>

            <div class="col-md-auto">
                <select name="status" class="form-control w-auto">
                    @foreach(\App\Models\Page\Feedback::$STATUSES as $status)
                        <option value="{{ $status }}" {{ $feedback->status == $status ? 'selected' : '' }}>
                            {{ __('statuses.' . $status) }}
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
