@extends('layouts.adminator.master')

@section('title', tr('edit_generate_prepaid_code'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_generate_prepaid_code') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}">
        <i class="fa fa-dashboard"></i>{{tr('home')}} </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.generate-prepaid-code.index')}}">
        <i class="fa fa-suitcase"></i> {{tr('generate_prepaid_code')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('edit_generate_prepaid_code')}}</li>
@endsection

@section('content')

 <div class="row gap-20">
    <div class="col-md-10">
        <div class="bgc-white p-20 bd">
            <div class="row bgc-grey-400 p-10">
                <div class="col-8">
                    <h6 class="c-grey-900"><b>{{tr('edit_generate_prepaid_code')}}</b></h6>
                </div>
                <div class="col-4">
                    <a href="{{route('admin.generate-prepaid-code.create')}}" class="btn btn-default pull-right">{{tr('add_generate_prepaid_code')}}</a>
                </div>
            </div>
            <form class="form-horizontal" action="{{ route('admin.generate-prepaid-code.update', $generateprepaidcode->id) }}" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                @method('PUT')
                @csrf
                <div class="box-body">
                    @include ('admin.generate-prepaid-code.form', ['submitButtonText' => 'Update'])
                </div>
            </form>
        </div>
    </div>
 </div>
@endsection
