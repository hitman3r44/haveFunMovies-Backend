@extends('layouts.adminator.master')

@section('title', tr('payment_settings'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('payment_settings') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li  class="list-inline-item active"><i class="fa fa-gears"></i> {{tr('payment_settings')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('payment_settings')}}</b></h6>
                    </div>
                    <div class="col-4">

                    </div>
                </div>

                <form action="{{route('admin.save.settings')}}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="paypal_client_id">{{tr('paypal_client_id')}}</label>
                            <input type="text" value="{{ Setting::get('paypal_client_id')}}" class="form-control" name="paypal_client_id" id="paypal_client_id" placeholder="Enter {{tr('paypal_client_id')}}">
                        </div>

                        <div class="form-group">
                            <label for="paypal_secret">{{tr('paypal_secret')}}</label>
                            <input type="text" class="form-control" value="{{Setting::get('paypal_secret')  }}" name="paypal_secret" id="paypal_secret" placeholder="{{tr('paypal_secret')}}">
                        </div>

                        <div class="form-group">
                            <label for="paypal_email">{{tr('paypal_email')}}</label>
                            <input type="text" class="form-control" value="{{Setting::get('paypal_email')  }}" name="paypal_email" id="paypal_email" placeholder="{{tr('paypal_email')}}">
                        </div>

                        <div class="form-group">
                            <label for="amount">{{tr('amount')}}</label>
                            <input type="text" class="form-control" value="{{Setting::get('amount')  }}" name="amount" id="amount" placeholder="{{tr('amount')}}">
                        </div>

                        <div class="form-group">
                            <label for="expiry_days">{{tr('expiry_days')}}</label>
                            <input type="text" class="form-control" value="{{Setting::get('expiry_days')  }}" name="expiry_days" id="expiry_days" placeholder="{{tr('expiry_days')}}">
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