<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ config('app.name', 'Have Fun Movies') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
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


                    <div class="row">
                        <div class="col-md-6">
                            @yield('content-header')
                        </div>
                        <div class="col-md-6 mt-2">
                            <ul class="list-inline c-grey-900 pull-right mr-2">
                                @yield('breadcrumb')
                            </ul>
                        </div>
                    </div>

                    @include('layouts.adminator.message')

                    @yield('content')

                </div>
            </div>
        </main>
        @include('layouts.adminator.footer')
    </div>
</div>

{{--<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

<script>
    $(document).ready(function () {

        $('#help-popover').popover({
            html: true,
            content: function () {
                return $('#help-content').html();
            }
        });

        // $('#datepicker').datepicker({
        //     autoclose: true,
        //     format: 'dd-mm-yyyy',
        //     startDate: 'today',
        // });
    });

    $("#{{$page}}").addClass("active");

    @if(isset($sub_page)) $("#{{$sub_page}}").addClass("active"); @endif

</script>

<script type="text/javascript">

    $(function () {
        // $(".select2").select2();
        //
        // $("#datemask").inputmask("dd:mm:yyyy", {"placeholder": "hh:mm:ss"});
        // $("[data-mask]").inputmask();
        // $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        //     checkboxClass: 'icheckbox_minimal-blue',
        //     radioClass: 'iradio_minimal-blue',
        //     increaseArea: '20%'
        // });
        // $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        //     checkboxClass: 'icheckbox_minimal-red',
        //     radioClass: 'iradio_minimal-red',
        //     increaseArea: '20%'
        // });
        // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        //     checkboxClass: 'icheckbox_flat-green',
        //     radioClass: 'iradio_flat-green',
        //     increaseArea: '20%'
        //
        // });
        // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        //     checkboxClass: 'icheckbox_flat-green',
        //     radioClass: 'iradio_flat-green'
        // });
    });
</script>

{{--{!! Setting::get('body_scripts'); !!}--}}

@yield('script')
</body>

</html>