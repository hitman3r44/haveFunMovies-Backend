<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name', 'Have Fun Movies') }}@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body class="app">

        @include('layouts.adminator.spinner')
            <div>
                @include('layouts.adminator.navbar')

                <div class="page-container">

                    @include('layouts.adminator.topbar')

                    <main class="main-content bgc-grey-100">
                        <div id="mainContent">
                            <div class="container-fluid">

                                @yield('content-header')

                                @include('layouts.adminator.message')

                                @yield('content')

                            </div>
                        </div>
                    </main>
                    @include('layouts.adminator.footer')
                </div>
            </div>

        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        @yield('script')
    </body>

</html>