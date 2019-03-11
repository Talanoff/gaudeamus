@extends('layouts.admin', ['app_title' => 'Отзывы'])

@section('content')
    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Отзывы</h1>
    </div>
    @forelse($reviews as $review)
        <article class="item">
            <div class="item-id">{{ $review->id }}</div>

            <div class="item-body">
                <div class="col-auto">
                    @if ($review->author)
                        <img src="{{ $review->author->avatar }}" class="rounded-circle"
                             alt="{{ $review->author_name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-avatar.png') }}" class="rounded-circle"
                             alt="{{ $review->author_name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.reviews.edit', $review) }}" class="underline">
                            {{ $review->author_name  }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $review->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.reviews.edit', $review) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.reviews.destroy', $review) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $review->id }})">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#delete"></use>
                            </svg>
                        </a>
                    </p>
                    <form action="{{ route('admin.reviews.destroy', $review) }}"
                          id="delete-form-{{ $review->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Отзывов пока нет!
    @endforelse
    {{ $reviews->links() }}
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