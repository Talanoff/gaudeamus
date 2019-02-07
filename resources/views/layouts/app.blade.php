<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gaudeamus') . (isset($app_title) ? ' | ' . $app_title : '') }}</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@includeIf('partials.app.layout.icons')

<div id="app" v-cloak>
    @includeIf('partials.app.layout.header')

    <main id="app-main">
        @yield('content')
    </main>

    @includeIf('partials.app.layout.footer')
</div>

<script src="{{ asset('js/app.js') }}" async defer></script>
</body>
</html>
