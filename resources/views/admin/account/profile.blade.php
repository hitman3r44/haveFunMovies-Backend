@extends('layouts.adminator.master')

@section('title', tr('profile'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('profile') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item active"><i class="fa fa-diamond"></i> {{tr('account')}}</li>
@endsection

@section('content')


    <div class="row gap-20">
        <div class="col-md-4">

            <div class="bgc-white p-20 bd">

                <div class="box box-primary">

                    <div class="box-body box-profile">

                        <img class="profile-user-img img-responsive img-circle"
                             src="@if(Auth::user()->picture) {{Auth::user()->picture}} @else {{asset('placeholder.png')}} @endif"
                             alt="User profile picture">

                        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                        <p class="text-muted text-center">{{ \App\Helpers\Helper::getUserType(Auth::user()->user_type) }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>{{tr('username')}}</b> <a
                                        class="pull-right">{{Auth::user()->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{tr('email')}}</b> <a
                                        class="pull-right">{{Auth::user()->email}}</a>
                            </li>

                            <li class="list-group-item">
                                <b>{{tr('mobile')}}</b> <a
                                        class="pull-right">{{Auth::user()->mobile}}</a>
                            </li>

                            <li class="list-group-item">
                                <b>{{tr('address')}}</b> <a
                                        class="pull-right">{{Auth::user()->address}}</a>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="bgc-white p-20 bd">

                <div class="nav-tabs-custom">
                    <div class="card-header tab-card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="active nav-item">
                                <a class="nav-link" data-toggle="tab" href="#adminprofile" role="tab" aria-controls="One" aria-selected="true">{{tr('update_profile')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#image" role="tab" aria-controls="Two" aria-selected="false">{{tr('upload_image')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  data-toggle="tab" href="#password" role="tab" aria-controls="Three" aria-selected="false">{{tr('change_password')}}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content mt-5">

                        <div class="active tab-pane" id="adminprofile">

                            <form class="form-horizontal"
                                  action="{{(Setting::get('admin_delete_control') == 1) ? '' : route('admin.save.profile')}}"
                                  method="POST" enctype="multipart/form-data" role="form">
                                @csrf

                                <input type="hidden" name="id" value="{{Auth::user()->id}}">

                                <div class="form-group">
                                    <label for="name" required
                                           class="col-sm-2 col-form-label">{{tr('username')}}</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{Auth::user()->name}}"
                                               pattern="[a-zA-Z]+" placeholder="{{tr('username')}}" required
                                               title="{{tr('only_for_alpha_values')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 col-form-label">{{tr('email')}}</label>

                                    <div class="col-sm-10">
                                        <input type="email" required
                                               value="{{Auth::user()->email}}" name="email"
                                               class="form-control" id="email" placeholder="{{tr('email')}}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 col-form-label">{{tr('mobile')}}</label>

                                    <div class="col-sm-10">
                                        <input type="text" value="{{Auth::user()->mobile}}"
                                               name="mobile" class="form-control" id="mobile"
                                               placeholder="{{tr('mobile')}}" pattern="[0-9]{4,16}">
                                        <small style="color:brown">{{tr('mobile_note')}}</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address"
                                           class="col-sm-2 col-form-label">{{tr('address')}}</label>

                                    <div class="col-sm-10">
                                        <input type="text" value="{{Auth::user()->address}}"
                                               name="address" class="form-control" id="address"
                                               placeholder="{{tr('address')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        @if(Setting::get('admin_delete_control') == 1)
                                            <button type="submit" class="btn btn-danger"
                                                    disabled>{{tr('submit')}}</button>
                                        @else
                                            <button type="submit"
                                                    class="btn btn-danger">{{tr('submit')}}</button>
                                        @endif
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="tab-pane" id="image">

                            <form class="form-horizontal"
                                  action="{{(Setting::get('admin_delete_control') == 1) ? '' : route('admin.save.profile')}}"
                                  method="POST" enctype="multipart/form-data" role="form">
                                @csrf

                                <input type="hidden" name="id" value="{{Auth::user()->id}}">

                                @if(Auth::user()->picture)
                                    <img style="height: 90px; margin-bottom: 15px; border-radius:2em;"
                                         src="{{Auth::user()->picture}}" id="image_preview">
                                @else
                                    <img style="margin-left: 15px;margin-bottom: 10px"
                                         class="profile-user-img img-responsive img-circle"
                                         src="{{asset('placeholder.png')}}" id="image_preview">
                                @endif

                                <div class="form-group">
                                    <label for="picture"
                                           class="col-sm-2 col-form-label">{{tr('picture')}}</label>

                                    <div class="col-sm-10">

                                        <input type="file" required accept="image/png,image/jpeg" name="picture"
                                               id="picture" onchange="loadFile(this,'image_preview')">
                                        <p class="form-text">{{tr('image_validate')}} {{tr('image_square')}}</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        @if(Setting::get('admin_delete_control') == 1)
                                            <button type="submit" class="btn btn-danger"
                                                    disabled>{{tr('submit')}}</button>
                                        @else
                                            <button type="submit"
                                                    class="btn btn-danger">{{tr('submit')}}</button>
                                        @endif
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="tab-pane" id="password">

                            <form class="form-horizontal"
                                  action="{{ (Setting::get('admin_delete_control') == 1) ? '' : route('admin.change.password')}}"
                                  method="POST" enctype="multipart/form-data" role="form">
                                @csrf

                                <input type="hidden" name="id" value="{{Auth::user()->id}}">

                                <div class="form-group">
                                    <label for="old_password"
                                           class="col-sm-3 col-form-label">{{tr('old_password')}}</label>

                                    <div class="col-sm-8">
                                        <input required type="password" class="form-control" name="old_password"
                                               id="old_password" placeholder="{{tr('old_password')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password"
                                           class="col-sm-3 col-form-label">{{tr('new_password')}}</label>

                                    <div class="col-sm-8">
                                        <input required type="password" class="form-control" name="password"
                                               id="password" placeholder="{{tr('new_password')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password"
                                           class="col-sm-3 col-form-label">{{tr('confirm_password')}}</label>

                                    <div class="col-sm-8">
                                        <input required type="password" class="form-control"
                                               name="confirm_password" id="confirm_password"
                                               placeholder="{{tr('confirm_password')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        @if(Setting::get('admin_delete_control') == 1)
                                            <button type="submit" class="btn btn-danger"
                                                    disabled>{{tr('submit')}}</button>
                                        @else
                                            <button type="submit"
                                                    class="btn btn-danger">{{tr('submit')}}</button>
                                        @endif
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">

        function loadFile(event, id) {

            $('#' + id).show();

            var reader = new FileReader();

            reader.onload = function () {

                var output = document.getElementById(id);

                output.src = reader.result;

            };

            reader.readAsDataURL(event.files[0]);
        }

    </script>
@endsection
