@extends('layouts.adminator.master')

@section('title', tr('add_gift_card'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('add_gift_card') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}">
        <i class="fa fa-dashboard"></i>{{tr('home')}} </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.gift-card.index')}}">
        <i class="fa fa-suitcase"></i> {{tr('gift_card')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('add_gift_card')}}</li>
@endsection

@section('content')

 <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('add_gift_card')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.gift-card.index')}}"
                           class="btn btn-default pull-right">{{tr('gift_card')}}</a>
                    </div>
                </div>

                <form class="form-horizontal" action="{{route('admin.gift-card.store') }}" method="POST" accept-charset="UTF-8"
                    enctype="multipart/form-data" role="form">
                        @csrf
                    <div class="box-body">
                        <div class="form-group row">
                            <label for="code" class="col-md-3 col-form-label">{{ 'Code' }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input class="form-control" name="code" type="text" id="code" value="{{ $uniqueId}}" required>
                                    {!! $errors->first('code', '<small class="text-danger">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-3 col-form-label">{{ 'Price' }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input class="form-control" name="price" type="number" id="price" value=""
                                           required>
                                    {!! $errors->first('price', '<small class="text-danger">:message</small>') !!}
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="box-footer text-center">
                            <input class="btn btn-fill btn-primary" type="submit" value="Generate">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
