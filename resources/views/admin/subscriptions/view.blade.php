@extends('layouts.adminator.master')

@section('title', tr('view_subscription'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_subscription') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.subscriptions.index')}}"><i
                class="fa fa-key"></i> {{tr('subscriptions')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-eye"></i>&nbsp;{{tr('view_subscriptions')}}</li>
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

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{tr('subscription_header_view')}}</h3>
                    </div>

                    <div class="col-md-6">
                        <div class="pull-right">
                            <a href="{{route('admin.subscriptions.status' , $data->unique_id)}}"
                               class="btn btn-sm {{$data->status ? 'btn-warning' : 'btn-success'}}">
                                @if($data->status)
                                    <i class="fa fa-close"></i>&nbsp;&nbsp;{{tr('decline')}}
                                @else
                                    <i class="fa fa-check"></i>&nbsp;&nbsp;{{tr('approve')}}
                                @endif
                            </a>
                            <a href="{{route('admin.subscriptions.edit',$data->unique_id)}}"
                               class="btn btn-sm btn-warning"><i
                                    class="fa fa-pencil"></i> {{tr('edit')}}</a>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <strong><i class="fa fa-book margin-r-5"></i> {{tr('title')}}</strong>

                        <p class="text-muted">{{$data->title}}</p>

                        <hr>

                        <strong><i class="fa fa-book margin-r-5"></i> {{tr('description')}}</strong>

                        <p class="text-muted">{{$data->description}}</p>

                        <hr>

                        <strong><i class="fa fa-calendar margin-r-5"></i> {{tr('no_of_days')}}</strong>
                        <br>
                        <br>

                        <p>
                            <span class="badge badge-success"
                                  style="padding: 5px 10px;margin: 5px;font-size: 18px"><b>{{$data->plan}}</b></span>

                        </p>

                        <hr>

                        <strong><i class="fa fa-money margin-r-5"></i> {{tr('amount')}}</strong>

                        <br>
                        <br>

                        <p><span class="badge badge-danger"
                                 style="padding: 5px 10px;margin: 5px;font-size: 18px"><b>{{Setting::get('currency' , "$")}} {{$data->amount}}</b></span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-book margin-r-5"></i> {{tr('popular_status')}}</strong>
                        <br>
                        <br>
                        <p class="text-muted">
                            @if($data->popular_status)

                                <a href="{{route('admin.subscriptions.popular.status' , $data->unique_id)}}"
                                   class="btn  btn-sm btn-danger">
                                    {{tr('remove_popular')}}
                                </a>

                            @else

                                <a href="{{route('admin.subscriptions.popular.status' , $data->unique_id)}}"
                                   class="btn  btn-sm btn-success">

                                    {{tr('mark_popular')}}

                                </a>
                            @endif
                        </p>

                    </div>

                    <div class="col-md-6">

                        <strong><i class="fa fa-users margin-r-5"></i> {{tr('total_subscribers')}}</strong>

                        <p><span class="badge badge-danger"
                                 style="padding: 5px 10px;margin: 5px;font-size: 18px"><b>{{$total_subscribers}}</b></span>

                        <?php /*<hr>
						<strong><i class="fa fa-users margin-r-5"></i> {{tr('active_subscribers')}}</strong>

						<p class="text-muted"></p>

						<hr>
						<strong><i class="fa fa-users margin-r-5"></i> {{tr('expired_subscribers')}}</strong>

						<p class="text-muted"></p>

						<hr> 
						<strong><i class="fa fa-users margin-r-5"></i> {{tr('cancelled_subscribers')}}</strong>

						<p class="text-muted"></p> */ ?>

                        <hr>
                        <strong><i class="fa fa-money margin-r-5"></i> {{tr('total_earnings')}}</strong>

                        <p class="text-muted">{{$earnings}}</p>

                        <hr>
                        <strong><i class="fa fa-calendar margin-r-5"></i> {{tr('created_at')}}</strong>

                        <p class="text-muted">{{convertTimeToUSERzone($data->created_at, Auth::user()->timezone, 'd-m-Y H:i a')}}</p>

                        <hr>
                        <strong><i class="fa fa-calendar margin-r-5"></i> {{tr('updated_at')}}</strong>

                        <p class="text-muted">{{convertTimeToUSERzone($data->updated_at, Auth::user()->timezone, 'd-m-Y H:i a')}}</p>

                        <hr>

                    </div>
                </div>

            </div>
            <!-- /.box -->
        </div>

    </div>

@endsection


