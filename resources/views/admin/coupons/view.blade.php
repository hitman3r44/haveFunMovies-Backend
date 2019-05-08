@extends('layouts.adminator.master')

@section('title',tr('view_coupon'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_coupon') }}</h4>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>

    <li class="list-inline-item"><a href="{{route('admin.coupon.list')}}"><i class="fa fa-gift"></i>{{tr('coupons')}}
        </a></li>

    <li class="list-inline-item active">{{tr('view_coupon')}}</li>

@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{$view_coupon->title}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.edit.coupons',$view_coupon->id)}}"
                           class="btn btn-warning pull-right">{{tr('edit')}}</a>
                    </div>
                </div>

                <div class="box box-body">
                    <strong>{{tr('title')}}</strong>
                    <h5 class="pull-right">{{$view_coupon->title}}</h5>
                    <hr>

                    <strong>{{tr('coupon_code')}}</strong>
                    <h4 class="pull-right" style="border: 2px solid #20bd99">{{$view_coupon->coupon_code}}</h4>
                    <hr>

                    <strong>{{tr('amount_type')}}</strong>
                    @if($view_coupon->amount_type == 0)
                        <span class="label label-primary pull-right">{{tr('percentage')}}</span>
                    @else
                        <span class="label label-primary pull-right">{{tr('absoulte')}}</span>
                    @endif
                    <hr>
                    <strong>{{tr('amount')}}</strong>
                    @if($view_coupon->amount_type == 0)
                        <span class="label label-primary pull-right">{{$view_coupon->amount}} % </span>
                    @else
                        <span class="label label-primary pull-right">{{Setting::get('currency')}}{{$view_coupon->amount}}</span>
                    @endif
                    <hr>
                    <strong>{{tr('expiry_date')}}</strong>

                    <h5 class="pull-right">

                        {{date('d M y', strtotime($view_coupon->expiry_date))}}

                    </h5>
                    <hr>

                    <strong>{{tr('no_of_users_limit')}}</strong>

                    <h5 class="pull-right">

                        {{$view_coupon->no_of_users_limit}}

                    </h5>
                    <hr>
                    <strong>{{tr('per_users_limit')}}</strong>

                    <h5 class="pull-right">

                        {{$view_coupon->per_users_limit}}

                    </h5>
                    <hr>

                    <strong>{{tr('no_of_used_coupon')}}</strong>

                    <h5 class="pull-right">

                        {{$user_coupon}}

                    </h5>
                    <hr>

                    <strong>{{tr('status')}}</strong>
                    @if($view_coupon->status == 0)
                        <span class="label label-warning pull-right">{{tr('declined')}}</span>
                    @else
                        <span class="label label-success pull-right">{{tr('approved')}}</span>
                    @endif

                    <hr>
                    <strong>{{tr('created_at')}}</strong>
                    <h5 class="pull-right"> {{convertTimeToUSERzone($view_coupon->created_at, Auth::guard('admin')->user()->timezone, 'd-m-Y H:i a')}} </h5>

                    <hr>
                    <strong>{{tr('updated_at')}}</strong>
                    <h5 class="pull-right">{{convertTimeToUSERzone($view_coupon->updated_at, Auth::guard('admin')->user()->timezone, 'd-m-Y H:i a')}}</h5>

                    @if($view_coupon->description == '')

                    @else
                        <hr>
                        <strong>{{tr('description')}}</strong><br>
                        <?php echo $view_coupon->description ?>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection