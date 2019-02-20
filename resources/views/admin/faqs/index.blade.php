@extends('layouts.admin', ['app_title' => 'Вопросы'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Вопросы</h1>
        <div class="ml-3">
            <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">
                Создать новый вопрос
            </a>
        </div>
    </div>
    @forelse($faqs as $faq)
        <article class="item">
            <div class="item-id">{{ $faq->id }}</div>
            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.faq.edit', $faq) }}" class="underline">
                            {{ $faq->question }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $faq->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.faq.edit', $faq) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.faq.destroy', $faq) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $faq->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.faq.destroy', $faq) }}"
                          id="delete-form-{{ $faq->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Вопросы пока не созданы!
    @endforelse

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
