<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/back.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    @include('admin.partials.navbar')
    <div class="container-fluid">
        @include('admin.partials.aside-navbar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 py-4">
            @yield('mainContent')
        </main>
    </div>
</body>
</html>
