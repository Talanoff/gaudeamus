@extends('layouts.admin', ['page_title' => 'Настройки'])

@section('content')

    <section id="content">
        <form action="{{ route('admin.settings.update') }}" method="post">
            @csrf
            @method('patch')

            <div class="row">
                @foreach($settings as $key => $group)
                    <div class="col-md-6">
                        <h4>
                            <span class="text-primary mr-1">#{{ $loop->iteration }}</span>
                            {{ $key }}
                        </h4>
                        <div class="mb-4">
                            @foreach($group as $item)
                                <div class="form-group">
                                    <label for="{{ $item->name }}">{{ ucfirst($item->name) }}</label>
                                    <input type="text" class="form-control" id="{{ $item->name }}"
                                           name="settings[{{$item->name}}]"
                                           value="{{ old('settings.'.$item->name) ?? $item->value }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="btn btn-primary">Сохранить</button>
        </form>
    </section>

@endsection