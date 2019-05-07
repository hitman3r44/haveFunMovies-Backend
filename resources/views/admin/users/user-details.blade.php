@extends('layouts.adminator.master')

@section('title', tr('view_user'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_user') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.users')}}"><i class="fa fa-user"></i> {{tr('users')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-user"></i> {{tr('view_user')}}</li>
@endsection

@section('content')

    <style type="text/css">
        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 0;
            background: #fff;
            left: 0px;
            margin: 0;
            border-radius: 0px;
        }
    </style>

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('view_user')}}</b></h6>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="bg-gray">
                            <div class="pull-left">
                                <div class="row">
                                    <div class="widget-user-image col-md-4">
                                        <img class="rounded"
                                             src=" @if($user->picture) {{$user->picture}} @else {{asset('admin-css/dist/img/avatar.png')}} @endif"
                                             alt="User Avatar">
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="widget-user-username">{{$user->name}} </h3>
                                        <h5 class="widget-user-desc">{{tr('user')}}</h5>
                                        <a href="{{route('admin.users.edit' , array('id' => $user->id))}}"
                                           class="btn btn-sm btn-warning">{{tr('edit')}} {{tr('user')}}</a>
                                    </div>
                                </div>

                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-6">


                        <div class="list-group">
                            <a class="list-group-item list-group-item-action">{{tr('username')}} <span
                                        class="pull-right">{{$user->name}}</span></a>
                            <a class="list-group-item list-group-item-action">{{tr('email')}} <span
                                        class="pull-right">{{$user->email}}</span></a>
                            <a class="list-group-item list-group-item-action">{{tr('mobile')}} <span
                                        class="pull-right">{{$user->mobile}}</span></a>
                            <a class="list-group-item list-group-item-action">{{tr('validity_days')}}
                                <span class="pull-right">
		            				@if($user->user_type)
                                        <p style="color:#cc181e">
		                                	{{tr('no_of_days_expiry')}}
		                                	<b>{{get_expiry_days($user->id)}} days</b>
		                            	</p>
                                    @endif
		                        </span></a>
                            <a class="list-group-item list-group-item-action disabled">
                                {{tr('user_type')}}

                                <span class="pull-right" style="margin-right: 20px;">
                                    @if($user->user_type == 1) Admin
                                    @elseif($user->user_type == 2) Moderator
                                    @elseif($user->user_type == 3) Director
                                    @elseif($user->user_type == 4) Publisher
                                    @endif
	                		</span>
                            </a>
                            <a class="list-group-item list-group-item-action">{{tr('amount_paid')}} <span
                                        class="pull-right">{{$user->amount_paid ? $user->amount_paid : '0.00'}}</span></a>
                            <a class="list-group-item list-group-item-action">
                                {{tr('email_notification')}} <span class="pull-right">
				                @if($user->email_notification)
                                        <span class="label label-success">
				                 	{{tr('yes')}}</span>
                                    @else
                                        <span class="label label-warning">
				                 {{tr('no')}}</span>
                                    @endif </span>
                            </a>
                            <a class="list-group-item list-group-item-action">{{tr('no_of_account')}} <span
                                        class="pull-right">{{$user->no_of_account}}</span></a>
                            <a class="list-group-item list-group-item-action">{{tr('device_type')}} <span
                                        class="pull-right">{{$user->device_type}}</span></a>

                            <a class="list-group-item list-group-item-action">{{tr('login_by')}} <span
                                        class="pull-right">{{$user->login_by}}</span></a>

                            <a class="list-group-item list-group-item-action">{{tr('social_unique_id')}} <span
                                        class="pull-right">{{$user->social_unique_id ? $user->social_unique_id : "-"}}</span></a>


                            <a class="list-group-item list-group-item-action">{{tr('timezone')}} <span
                                        class="pull-right">{{$user->timezone ? $user->timezone : "-"}}</span></a>


                            <a class="list-group-item list-group-item-action">{{tr('created_at')}} <span
                                        class="pull-right">{{convertTimeToUSERzone($user->created_at, Auth::guard('admin')->user()->timezone, 'd-m-Y H:i a')}}</span></a>


                            <a class="list-group-item list-group-item-action">{{tr('updated_at')}} <span
                                        class="pull-right">{{convertTimeToUSERzone($user->updated_at, Auth::guard('admin')->user()->timezone, 'd-m-Y H:i a')}}</span></a>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection


