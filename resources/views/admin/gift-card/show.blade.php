@extends('layouts.adminator.master')

@section('title', tr('giftcard'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('giftcard') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}} </a> > </li>
    <li class="list-inline-item"><a href="{{route('admin.gift-card.index')}}"><i class="fa fa-suitcase"></i> {{tr('giftcard')}}</a> > </li>
    <li class="list-inline-item active">{{tr('giftcard')}}</li>
@endsection

@section('content')
         <div class="row gap-20">
                <div class="col-md-12">
                 <div class="bgc-white p-20 bd">
                    <div class="card">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">
                                GiftCard

                                <small class="category">Details of  %%modelNameCap%% </small>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <a href="{{route('admin.gift-card.create')}}"
                                                class="btn btn-info btn-sm">{{tr('add_gift_card')}}</a>
                                            <a href="{{route('admin.gift-card.index')}}"
                                                class="btn btn-primary btn-sm">{{tr('giftcard')}}</a>
                                            <a href="{{route('admin.gift-card.edit', $giftcard->id)}}"
                                                class="btn btn-round btn-standard btn-sm">tr('edit_gift_card')
                                            </a>
                                          </div>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive col-md-8 offset-md-2">
                                <table class="table">
                                    <tbody>
                                        <tr><th> Code </th><td> {{ $giftcard->code }} </td></tr><tr><th> Price </th><td> {{ $giftcard->price }} </td></tr><tr><th> Is Used </th><td> {{ $giftcard->is_used }} </td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end content-->
                    </div><!--  end card  -->
                 </div>
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
@endsection
