@include('menu.top_landing')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

@yield('menu.top_landing')

<div class="container-fluid landing-background">
    <div class="row background-black-filter">
        <main role="main" class="col-md-12 py-3 px-4">
            <div id="app">
                @yield('content')
            </div>
            <div class="landing-footer text-white fixed-bottom pl-5 pb-5">
                &copy; {{ date('Y', time()) }} | {{ env('APP_NAME') }}
            </div>
        </main>
    </div>
</div>

</body>
</html>
