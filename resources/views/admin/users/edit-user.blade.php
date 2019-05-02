@extends('layouts.adminator.master')

@section('title', tr('edit_user'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_user') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.users')}}"><i class="fa fa-user"></i> {{tr('users')}}</a></li>
    <li class="list-inline-item active">{{tr('edit_user')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('edit_user')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.users.create')}}"
                           class="btn btn-default pull-right">{{tr('add_user')}}</a>
                    </div>
                </div>

                <form class="form-horizontal" action="{{route('admin.save.user')}}" method="POST"
                      enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="box-body">
                        <input type="hidden" name="id" value="{{$user->id}}">

                        <div class="form-group">
                            <label for="username" class="col-sm-1 control-label">*{{tr('username')}}</label>

                            <div class="col-sm-10">
                                <input type="text" required pattern="[a-zA-Z0-9\s\-\.]{2,100}"
                                       title="{{tr('only_alphanumeric')}}" name="name" value="{{$user->name}}"
                                       class="form-control" id="username" placeholder="{{tr('name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-1 control-label">*{{tr('email')}}</label>
                            <div class="col-sm-10">
                                <input type="email" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,10}$"
                                       class="form-control" value="{{$user->email}}" id="email" name="email"
                                       placeholder="{{tr('email')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="col-sm-1 control-label">*{{tr('mobile')}}</label>

                            <div class="col-sm-10">
                                <input type="text" required minlength="4" maxlength="16" pattern="[0-9]{4,16}"
                                       name="mobile" value="{{$user->mobile}}" class="form-control" id="mobile"
                                       placeholder="{{tr('mobile')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 control-label">* {{tr('user_type')}}</label>

                            <div class="col-sm-10">
                                <select class="form-control" name="user_type" id="user_type" required>
                                    <option value="">Select User Type</option>
                                    <option value="1" {{ ($user->user_type  == 1) ? 'selected' : ''}}>Admin</option>
                                    <option value="2" {{ ($user->user_type  == 2) ? 'selected' : ''}}>Moderator</option>
                                    <option value="3" {{ ($user->user_type  == 3) ? 'selected' : ''}}>Director</option>
                                    <option value="4" {{ ($user->user_type  == 4) ? 'selected' : ''}}>Publisher</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-danger">{{tr('cancel')}}</button>
                        @if(Setting::get('admin_delete_control'))
                            <a href="#" class="btn btn-success pull-right" disabled>{{tr('submit')}}</a>
                        @else
                            <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                        @endif
                    </div>
                    <input type="hidden" name="timezone" value="" id="userTimezone">
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