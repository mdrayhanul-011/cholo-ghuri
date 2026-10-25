<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'en' ? 'bn-Latn' : 'bn-BD' }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Cholo-Ghuri'))</title>
    <meta name="description" content="@yield('meta_description', 'Bilingual Bangladesh Travel and Tourism Platform')">

    {{-- SEO Alternates & Canonicals --}}
    @yield('seo_tags')

    {{-- Bootstrap 5 & Vanilla JS Assets via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        @yield('header')
    </header>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer>
        @yield('footer')
    </footer>

    @stack('scripts')
</body>
</html>
