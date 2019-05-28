@extends('layouts.adminator.master')

@section('title', tr('add_prepaid_code'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('add_prepaid_code') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}">
        <i class="fa fa-dashboard"></i>{{tr('home')}} </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.prepaid-code.index')}}">
        <i class="fa fa-suitcase"></i> {{tr('prepaid_code')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('add_prepaid_code')}}</li>
@endsection

@section('content')

 <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('add_prepaid_code')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.prepaid-code.index')}}"
                           class="btn btn-default pull-right">{{tr('prepaid_code')}}</a>
                    </div>
                </div>

                <form class="form-horizontal" action="{{route('admin.prepaid-code.store') }}" method="POST" accept-charset="UTF-8"
                    enctype="multipart/form-data" role="form">
                        @csrf
                    <div class="box-body">

                        <div class="form-group row">
                            <label for = "title" class="col-sm-2 control-label"> * {{tr('title')}}</label>

                            <div class="col-md-9">
                                <div class="col-sm-10">
                                    <input type="text" name="title" role="title" min="5" max="20" class="form-control" value="{{ old('title') }}" required placeholder="{{tr('enter_gift_card_title')}}">
                                    {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-3 col-form-label">Price</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input class="form-control" name="price" type="number" id="price" value="">
                                    {!! $errors->first('price', '<small class="text-danger">:message</small>') !!}
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="box-footer text-center">
                            <input class="btn btn-fill btn-primary" type="submit" value="{{tr('submit')}}">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
