@extends('layouts.adminator.focused')

@section('title', tr('login'))

<style type="text/css">
    body {
        background: #000 !important;

    }
</style>

@section('content')

    <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
    <form role="form" method="POST" action="{{ url('/admin/login') }}">
        {{ csrf_field() }}
        <input type="hidden" name="timezone" value="" id="userTimezone">

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="text-normal text-dark">Username</label>
            <input type="email" class="form-control " value="" name="email" required placeholder="{{tr('email')}}">

            @if ($errors->has('email'))
                <span class="help-block text-danger"> <strong>{{ $errors->first('email') }}</strong> </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="text-normal text-dark">Password</label>
            <input type="password" class="form-control" value="" required name="password" placeholder="{{tr('password')}}">

            @if ($errors->has('password'))
                <span class="help-block text-danger"> <strong>{{ $errors->first('password') }}</strong> </span>
            @endif
        </div>
        <div class="form-group">
            <div class="peers ai-c jc-sb fxw-nw">
                <div class="peer">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('scripts')

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/jstz.min.js')}}"></script>
    <script>

        $(document).ready(function() {

            var dMin = new Date().getTimezoneOffset();
            var dtz = -(dMin/60);
            // alert(dtz);
            $("#userTimezone").val(jstz.determine().name());
        });

    </script>
@endsection

