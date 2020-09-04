@extends('layouts.admin', ['app_title' => 'Записи на курсы'])

@section('content')
    <div class="d-flex align-items-center mb-3 mb-md-5">
        <h1 class="mb-0 h2">Записи на курсы</h1>
    </div>
    @forelse($feedbacks->groupBy('content.school') as $school => $items)
        <h3 class="{{ !$loop->first ? 'mt-5' : '' }}"><span class="text-primary">#</span> {{ $school }}</h3>

        @foreach($items->groupBy('content.student_class')->sortBy('content.student_class') as $class => $items)
            <h4>Класс: <strong class="text-primary">{{ $class }}</strong></h4>
            @foreach($items as $feedback)
                <article class="item">
                    <div class="item-id">{{ $feedback->id }}</div>

                    <div class="item-body">
                        <div class="col">
                            <h5>
                                <a href="{{ route('admin.feedback.edit', $feedback) }}" class="underline">
                                    {{ $feedback->content->student_first_name }} {{ $feedback->content->student_last_name }}
                                </a>
                            </h5>
                            <p class="mt-2 mb-0">
                                Дата заполнения {{ $feedback->created_at->format('d.m.Y \в H:i') }}
                                &bull;
                                <span class="{{ $feedback->status === 'confirmed' ? 'text-success' : ($feedback->status === 'declined' ? 'text-danger' : '') }}">>
                                {{ __('statuses.' . $feedback->status) }}
                                </span>
                            </p>
                        </div>
                        <div class="col-auto align-self-center">
                            <p class="mb-1">
                                <a href="{{ route('admin.feedback.edit', $feedback) }}"
                                   class="btn btn-sm btn-dark">
                                    <svg width="16" height="16" style="fill: #fff;">
                                        <use xlink:href="#pen"></use>
                                    </svg>
                                </a>
                            </p>
                            <div class="mb-0">
                                <a href="{{ route('admin.feedback.destroy', $feedback) }}"
                                   class="btn btn-sm btn-danger" onclick="confirmDelete({{ $feedback->id }})">
                                    <svg width="16" height="16" style="fill: #fff;">
                                        <use xlink:href="#delete"></use>
                                    </svg>
                                </a>
                            </div>
                            <form action="{{ route('admin.feedback.destroy', $feedback) }}"
                                  id="delete-form-{{ $feedback->id }}" method="post" style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        @endforeach
    @empty
        Записей на курсы пока нет!
    @endforelse
    {{ $feedbacks->links() }}
@endsection

@push('scripts')
    <script>
        function confirmDelete(id) {
            event.preventDefault();
            const agree = confirm('Уверены?');
            if (agree) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endpush
