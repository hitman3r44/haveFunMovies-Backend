@extends('layouts.adminator.master')

@section('title', tr('email_settings'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('email_settings') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li  class="list-inline-item active"><i class="fa fa-gears"></i> {{tr('email_settings')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('email_settings')}}</b></h6>
                    </div>
                    <div class="col-4">

                    </div>
                </div>

                <form action="{{route('admin.email.settings.save')}}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="box-body">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="paypal_client_id">{{tr('MAIL_DRIVER')}}</label>
                                <input type="text" value="{{ $result['MAIL_DRIVER']}}" class="form-control" name="MAIL_DRIVER" id="MAIL_DRIVER" placeholder="Enter {{tr('MAIL_DRIVER')}}">
                            </div>

                            <div class="form-group">
                                <label for="MAIL_HOST">{{tr('MAIL_HOST')}}</label>
                                <input type="text" class="form-control" value="{{$result['MAIL_HOST']}}" name="MAIL_HOST" id="MAIL_HOST" placeholder="{{tr('MAIL_HOST')}}">
                            </div>

                            <div class="form-group">
                                <label for="MAIL_PORT">{{tr('MAIL_PORT')}}</label>
                                <input type="text" class="form-control" value="{{$result['MAIL_PORT']}}" name="MAIL_PORT" id="MAIL_PORT" placeholder="{{tr('MAIL_PORT')}}">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="MAIL_USERNAME">{{tr('MAIL_USERNAME')}}</label>
                                <input type="text" class="form-control" value="{{$result['MAIL_USERNAME'] }}" name="MAIL_USERNAME" id="MAIL_USERNAME" placeholder="{{tr('MAIL_USERNAME')}}">
                            </div>

                            <div class="form-group">
                                <label for="MAIL_PASSWORD">{{tr('MAIL_PASSWORD')}}</label>
                                <input type="password" class="form-control" name="MAIL_PASSWORD" id="MAIL_PASSWORD" placeholder="{{tr('MAIL_PASSWORD')}}">
                            </div>

                            <div class="form-group">
                                <label for="MAIL_PORT">{{tr('MAIL_ENCRYPTION')}}</label>
                                <input type="text" class="form-control" value="{{$result['MAIL_ENCRYPTION'] }}" name="MAIL_ENCRYPTION" id="MAIL_ENCRYPTION" placeholder="{{tr('MAIL_ENCRYPTION')}}">
                            </div>

                        </div>

                  </div>
                  <!-- /.box-body -->

                    <div class="box-footer">
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