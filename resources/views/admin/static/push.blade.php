@extends('layouts.adminator.master')

@section('title', tr('custom_push'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('custom_push') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item active"><i class="fa fa-send"></i> {{tr('custom_push')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">

                <form class="form-horizontal" action="{{route('admin.send.push')}}" method="POST"
                      enctype="multipart/form-data" role="form">
                    @csrf

                    <div class="box-body">

                        <div class="form-group">
                            <label for="message" class="col-sm-1 control-label">{{tr('message')}}</label>

                            <div class="col-sm-10">
                                <input type="text" required name="message" class="form-control" id="message"
                                       placeholder="{{tr('enter')}} {{tr('message')}}">
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-danger">{{tr('reset')}}</button>
                        <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection
