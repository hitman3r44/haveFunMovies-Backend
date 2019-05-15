@extends('layouts.adminator.master')

@section('title', tr('view_moderator'))

@section('content-header', tr('view_moderator'))

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.moderators')}}"><i
                    class="fa fa-users"></i> {{tr('moderators')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-user"></i> {{tr('view_moderators')}}</li>
@endsection

@section('content')

    <div class="row">
        <div class="mt-5"></div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="pull-left">
                <h3 class="widget-user-username">{{$moderator->name}} </h3>
                <h5 class="widget-user-desc">{{tr('moderator')}}</h5>
                <a href="{{route('admin.edit.moderator',$moderator->id)}}"
                   class="btn btn-sm btn-warning">{{tr('edit')}} {{tr('moderator')}}</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pull-right no-padding col-md-6">
                <img class="rounded"
                     src="@if($moderator->picture) {{$moderator->picture}} @else {{asset('admin-css/dist/img/avatar.png')}} @endif"
                     alt="User Avatar">
            </div>
        </div>
    </div>


    <div class="row gap-20">
        <div class="col-md-6">
            <div class="card bgc-white p-20 bd">
                <div class="card-body no-padding">
                    <div class="card-title bg-gray">
                        User Info
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">{{tr('username')}} <span
                                        class="pull-right">{{$moderator->name}}</span></a></li>
                        <li class="list-group-item"><a href="#">{{tr('email')}} <span
                                        class="pull-right">{{$moderator->email}}</span></a></li>
                        <li class="list-group-item"><a href="#">{{tr('mobile')}} <span
                                        class="pull-right">{{$moderator->mobile}}</span></a></li>
                        <li class="list-group-item"><a href="#">{{tr('address')}} <span
                                        class="pull-right">{{$moderator->address}}</span></a></li>
                        <li class="list-group-item">
                            <a href="#">{{tr('status')}}
                                <span class="pull-right">
		                			@if($moderator->is_activated)
                                        <span class="label label-success">{{tr('approved')}}</span>
                                    @else
                                        <span class="label label-warning">{{tr('pending')}}</span>
                                    @endif
		                		</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            {{tr('is_user')}}
                            <span class="pull-right" style="margin-right: 20px;">
	                			@if($moderator->is_user)
                                    @if ($moderator->user)
                                        <a href="{{route('admin.users.view',$moderator->user->id)}}"><span
                                                    class="label label-success" ">{{tr('yes')}}</span>
                            </a>

                            @else

                                <span class="label label-success">{{tr('yes')}}</span>

                            @endif
                            @else
                                <a href="#"><span class="label label-warning">{{tr('no')}}</span></a>
                                @endif
                                </span>
                        </li>

                        <?php /*<li><a href="#">{{tr('paypal_email')}} <span class="pull-right">{{$moderator->paypal_email ? $moderator->paypal_email : "-"}}</span></a></li> */ ?>
                        <li class="list-group-item"><a href="#">{{tr('timezone')}} <span
                                        class="pull-right">{{$moderator->timezone}}</span></a></li>
                        <li class="list-group-item"><a href="#">{{tr('created_at')}} <span
                                        class="pull-right">{{convertTimeToUSERzone($moderator->created_at, Auth::user()->timezone, 'd-m-Y H:i a')}}</span></a>
                        </li>
                        <li class="list-group-item"><a href="#">{{tr('updated_at')}} <span
                                        class="pull-right">{{convertTimeToUSERzone($moderator->updated_at, Auth::user()->timezone, 'd-m-Y H:i a')}}</span></a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="col-md-6">
            <div class="card bgc-white p-20 bd">
                <div class="card-body no-padding">

                    <div class="card-title bg-gray">
                        {{tr('revenue_details')}}
                    </div>

                    <ul class="list-group">

                        <li class="list-group-item"><a href="{{route('admin.videos')}}">{{tr('total_videos')}} <span
                                        class="pull-right">{{$moderator->moderatorVideos ? $moderator->moderatorVideos->count() : "0.00"}}</span></a>
                        </li>

                        <li class="list-group-item"><a href="#">{{tr('total_earnings')}} <span
                                        class="pull-right">{{Setting::get('currency')}} {{$moderator->moderatorRedeem ? $moderator->moderatorRedeem->total_moderator_amount : "0.00"}}</span></a>
                        </li>

                        <li class="list-group-item"><a href="#">{{tr('total_ppv_amount')}} <span
                                        class="pull-right">{{Setting::get('currency')}} <?php echo total_moderator_video_revenue($moderator->id) ?> </span></a>
                        </li>

                        <li class="list-group-item"><a href="#">{{tr('total_viewer_count_amount')}} <span
                                        class="pull-right">{{Setting::get('currency')}} <?php echo redeem_amount($moderator->id) ?></span></a>
                        </li>

                        <li class="list-group-item"><a href="#">{{tr('total_admin_commission')}} <span
                                        class="pull-right">{{Setting::get('currency')}} {{$moderator->moderatorRedeem ? $moderator->moderatorRedeem->total_admin_amount : "0.00"}}</span></a>
                        </li>

                        <li class="list-group-item"><a href="#">{{tr('total_moderator_commission')}} <span
                                        class="pull-right">{{Setting::get('currency')}}{{$moderator->moderatorRedeem ? $moderator->moderatorRedeem->total_moderator_amount : "0.00"}}</span></a>
                        </li>

                        <li class="list-group-item"><a href="#">{{tr('wallet')}} <span
                                        class="pull-right">{{Setting::get('currency')}} {{$moderator->moderatorRedeem ? $moderator->moderatorRedeem->remaining : "0.00"}}</span></a>
                        </li>

                        <li class="list-group-item"><a href="#">{{tr('admin_paid_amount')}} <span
                                        class="pull-right">{{Setting::get('currency')}} {{$moderator->paid_amount}}</span></a>
                        </li>


                    </ul>
                </div>

            </div>

        </div>

    </div>

@endsection


