@extends('layouts.adminator.master')

@section('title', tr('edit_gift_card'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_gift_card') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}">
        <i class="fa fa-dashboard"></i>{{tr('home')}} </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.gift-card.index')}}">
        <i class="fa fa-suitcase"></i> {{tr('giftcard')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('edit_gift_card')}}</li>
@endsection

@section('content')

 <div class="row gap-20">
    <div class="col-md-10">
        <div class="bgc-white p-20 bd">
            <div class="row bgc-grey-400 p-10">
                <div class="col-8">
                    <h6 class="c-grey-900"><b>{{tr('edit_gift_card')}}</b></h6>
                </div>
                <div class="col-4">
                    <a href="{{route('admin.gift-card.create')}}" class="btn btn-default pull-right">{{tr('add_gift_card')}}</a>
                </div>
            </div>
            <form class="form-horizontal" action="{{ route('admin.gift-card.update', $giftcard->id) }}" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                @method('PUT')
                @csrf
                <div class="box-body">
                    @include ('admin.gift-card.form', ['submitButtonText' => 'Update'])
                </div>
            </form>
        </div>
    </div>
 </div>
@endsection
