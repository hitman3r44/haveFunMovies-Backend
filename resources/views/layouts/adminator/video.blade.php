<!Doctype html>
<html lang="{{ app()->getLocale() }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ config('app.name', 'Have Fun Movies') }}</title>

    <link rel="shortcut icon" href=" @if(Setting::get('site_icon')) {{ Setting::get('site_icon') }} @else {{asset('favicon.png') }} @endif">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">

    @yield('mid-styles')

    <style>
        ul.nav-right > li.dropdown.show.open > ul > li > a{
            font-size:14px !important;
        }
    </style>
    @yield('styles')

    <?php echo Setting::get('header_scripts'); ?>

</head>


<body class="app hold-transition skin-blue sidebar-mini">

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


<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!-- jQuery 2.2.0 -->
<script src="{{asset('admin-css/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('admin-css/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('admin-css/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('admin-css/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('admin-css/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

{{--<script src="{{asset('admin-css/plugins/select2/select2.full.min.js')}}"></script>--}}

<!-- Datapicker -->
<script src = "{{asset('admin-css/plugins/datepicker/bootstrap-datepicker.js')}}"></script>


<script src="{{asset('admin-css/plugins/iCheck/icheck.min.js')}}"></script>


<!-- page script -->
<script>

    $(document).ready(function(){
        $('#help-popover').popover({
            html : true,
            content: function() {
                return $('#help-content').html();
            }
        });
    });
</script>

@yield('scripts')

<script type="text/javascript">
    $("#{{$page}}").addClass("active");
    @if(isset($sub_page)) $("#{{$sub_page}}").addClass("active"); @endif
</script>

<script type="text/javascript">

    $(document).ready(function() {
        $('#expiry_date').datepicker({
            autoclose:true,
            format : 'dd-mm-yyyy',
            startDate: 'today',
        });
    });

</script>
<script type="text/javascript">

    $(function () {
        //Initialize Select2 Elements
        // $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd:mm:yyyy", {"placeholder": "hh:mm:ss"});
        //Datemask2 mm/dd/yyyy
        // $("#datemask2").inputmask("hh:mm:ss", {"placeholder": "hh:mm:ss"});
        //Money Euro
        $("[data-mask]").inputmask();

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue',
            increaseArea : '20%'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red',
            increaseArea : '20%'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green',
            increaseArea : '20%'

        });

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

    });
</script>

<?php echo Setting::get('body_scripts'); ?>


</body>

</html>
