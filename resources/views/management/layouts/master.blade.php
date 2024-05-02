<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title> Book Store Admin Panel </title>
    @vite('resources/js/management/app.js')

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
</head>

<body>
    <div class="grid min-h-screen w-full lg:grid-cols-[280px_1fr]">
        @include("management.layouts.sidebar")

        <div class="flex flex-col">
            @include("management.layouts.navbar")

            <main class="flex-1 grid gap-8 p-6 md:p-8">
                @yield("body-content")
            </main>
        </div>
    </div>
</body>

@yield('script_index')

</html>
