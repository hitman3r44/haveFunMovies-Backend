@extends('layouts.adminator.master')

@section('title', tr('add_moderator'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('add_moderator') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a> > </li>
    <li class="list-inline-item"><a href="{{route('admin.moderators')}}"><i class="fa fa-users"></i> {{tr('moderators')}}</a> > </li>
    <li class="list-inline-item active">{{tr('add_moderator')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('add_moderator')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.moderators')}}"
                           class="btn btn-default pull-right">{{tr('moderators')}}</a>
                    </div>
                </div>

                <form class="form-horizontal" action="{{route('admin.save.moderator')}}" method="POST"
                      enctype="multipart/form-data" role="form">

                    <div class="mT-30">

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">*{{tr('username')}}</label>

                            <div class="col-sm-10">
                                <input type="text" required pattern="[a-zA-Z0-9\s\-\.]{2,100}"
                                       title="{{tr('only_alphanumeric')}}" name="name" class="form-control"
                                       id="username" placeholder="{{tr('name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">*{{tr('email')}}</label>
                            <div class="col-sm-10">
                                <input type="email" maxlength="255"
                                       pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,10}$" required
                                       class="form-control" id="email" name="email" placeholder="{{tr('email')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 control-label">*{{tr('mobile')}}</label>

                            <div class="col-sm-10">
                                <input type="text" required name="mobile" class="form-control" id="mobile"
                                       placeholder="{{tr('mobile')}}" minlength="4" maxlength="16"
                                       pattern="[0-9]{4,16}">
                                <small style="color:brown">{{tr('mobile_note')}}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">*{{tr('password')}}</label>

                            <div class="col-sm-10">
                                <input type="password" required name="password" class="form-control" minlength="6"
                                       id="password" placeholder="{{tr('password')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username"
                                   class="col-sm-2  control-label">*{{tr('password_confirmation')}}</label>

                            <div class="col-sm-10">
                                <input type="password" minlength="6" required name="password_confirmation"
                                       class="form-control" id="username" placeholder="{{tr('password_confirmation')}}">
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="timezone" value="" id="userTimezone">

                    <div class="box-footer">
                        <button type="reset" class="btn btn-danger">{{tr('cancel')}}</button>
                        @if(Setting::get('admin_delete_control'))
                            <a href="#" class="btn btn-success pull-right" disabled>{{tr('submit')}}</a>
                        @else
                            <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                        @endif
                    </div>


                </form>

            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{asset('assets/js/jstz.min.js')}}"></script>
    <script>

        $(document).ready(function () {

            var dMin = new Date().getTimezoneOffset();
            var dtz = -(dMin / 60);
            // alert(dtz);
            $("#userTimezone").val(jstz.determine().name());
        });

    </script>

@endsection