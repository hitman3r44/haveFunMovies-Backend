@extends('layouts.adminator.master')

@section('title',tr('edit_coupon'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_coupon') }}</h4>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}} </a></li>
    <li class="list-inline-item"><a href="{{route('admin.coupon.list')}}"><i class="fa fa-gift"></i>{{tr('coupons')}} </a></li>
    <li class="list-inline-item active">{{tr('edit_coupon')}}</li>

@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b style="font-size: 18px">{{tr('edit_coupon')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.coupon.list')}}"
                           class="btn btn-default pull-right"> {{tr('coupons')}}</a>
                    </div>

                </div>

                <form action="{{route('admin.save.coupon')}}" method="POST" class="form-horizontal" role="form">
                    @csrf
                    <input type="hidden" name="id" value="{{$edit_coupon->id}}">

                    <div class="box-body">

                        <div class="form-group">

                            <label for="title" class="col-sm-2 col-form-label"> * {{tr('title')}}</label>

                            <div class="col-sm-10">
                                <input type="text" name="title" role="title" min="5" max="20" class="form-control"
                                       placeholder="{{tr('enter_coupon_title')}}"
                                       value="{{$edit_coupon->title ?$edit_coupon->title : old('title') }}">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="coupon_code" class="col-sm-2 col-form-label"> * {{tr('coupon_code')}}</label>
                            <div class="col-sm-10">
                                <input type="text" name="coupon_code" min="5" max="10" class="form-control"
                                       pattern="[A-Z0-9]{1,10}" placeholder="{{tr('enter_coupon_code')}}"
                                       value="{{$edit_coupon->coupon_code ? $edit_coupon->coupon_code : old('coupon_code') }}"
                                       title="{{tr('validation')}}">
                                <p class="form-text">{{tr('note')}} : {{tr('coupon_code_note')}}</p>
                            </div>
                        </div>

                        <div class="form-group floating-label">
                            <label for="amount_type" class="col-sm-2 col-form-label"> * {{tr('amount_type')}}</label>
                            <div class="col-sm-10">
                                <select id="amount_type" name="amount_type" class="form-control select2">

                                    <option value="{{PERCENTAGE}}" {{$edit_coupon->amount_type == 0 ?'selected="selected"':''}}>{{tr('percentage_amount')}}</option>
                                    <option value="{{ABSOULTE}}" {{$edit_coupon->amount_type == 1 ?'selected="selected"':''}}>{{tr('absoulte_amount')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="amount" class="col-sm-2 col-form-label"> * {{tr('amount')}}</label>
                            <div class="col-sm-10">
                                <input type="number" name="amount" min="1" max="5000" step="any" class="form-control"
                                       placeholder="{{tr('amount')}}"
                                       value="{{$edit_coupon->amount ? $edit_coupon->amount : old('amount')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="expiry_date" class="col-sm-2 col-form-label"> * {{tr('expiry_date')}}</label>
                            <div class="col-sm-10">
                                <input type="text" id="expiry_date" name="expiry_date" class="form-control"
                                       placeholder="{{tr('expiry_date_coupon')}}"
                                       value="{{ $edit_coupon->expiry_date ? date('d-m-Y',strtotime($edit_coupon->expiry_date)) : old('expiry_date')}}"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 col-form-label">{{tr('description')}}</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" max="255"
                                          style="resize: none;">{{$edit_coupon->description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-danger">{{tr('cancel')}}</a>
                        <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
