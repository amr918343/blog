<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="">
    @include('includes.styles')
    <title>{{ config('app.name') }}</title>

</head>

<body>
    <div id="app">
        @include('includes.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    @include('includes.scripts.jquery_and_bootstrap')
    @include('includes.scripts.post_notification_realtime')

    @yield('script')
</body>

</html>
