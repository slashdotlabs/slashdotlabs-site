<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Slash Dot Labs</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon-32x31.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x194.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase.css') }}">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/corporate.css') }}"> -->
        @yield('css_after')

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
            const baseURL = "{{ url('/') }}";
        </script>
    </head>
    <body>
        <div id="page-container" class="enable-page-overlay sidebar-inverse side-scroll page-header-fixed page-header-inverse main-content-boxed">
            @auth
                <!-- Sideoverlay -->
                @include('dashboard.partials.sideoverlay')
            @endauth

            <!-- Header -->
            @include('dashboard.partials.header')


         <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->

           @yield('modals')

            <!-- Footer -->
            @include('dashboard.partials.footer')
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="{{ mix('js/codebase.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <script src="{{ mix('js/laravel.app.js') }}"></script>

        <!-- Sweetalert -->
        @include('sweetalert::alert')

        @yield('js_after')
        <script src="{{ asset('js/pages/customer_forms.js') }}"></script>
    </body>
</html>
