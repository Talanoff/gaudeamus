@if (session('message'))
    <div class="alert alert-success notification">
        {!! session('message') !!}
    </div>
@endif
