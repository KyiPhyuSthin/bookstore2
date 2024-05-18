<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title> Book Shelf </title>
    @vite('resources/js/website/app.js')

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/ajax-helpers.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/vue.global.js') }}"></script>
    <script src="{{ asset('js/localstorage-helper.js') }}"></script>
</head>

<body>
    @include('website.layouts.header')
    <main class="bg-gray-100 py-6 px-4 md:px-12">
        @yield("body-content")
    </main>
    @include("website.layouts.footer")
</body>

@yield('script_index')

</html>
