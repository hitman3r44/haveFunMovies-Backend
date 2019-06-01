@extends('layouts.adminator.master')

@section('title', tr('generate_gift_card'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('generate_gift_card') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.generate-gift-card.index')}}"><i
                class="fa fa-suitcase"></i> {{tr('generate_gift_card')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('generate_gift_card')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <h4 class="card-title">
                            {{tr('generate_gift_card_title')}}
                            <div class="pull-right">
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <a href="{{route('admin.generate-gift-card.create')}}"
                                           class="btn btn-info btn-sm">{{tr('add_generate_gift_card')}}</a>
                                        <a href="{{route('admin.generate-gift-card.index')}}"
                                           class="btn btn-primary btn-sm">{{tr('generate_gift_card')}}</a>
                                    </div>
                                </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive col-md-8 offset-md-2">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th> {{tr("gift_card_plan")}}</th>
                                    <td> {{ $generateGiftCard->giftCard->code }} </td>
                                </tr>
                                <tr>
                                    <th> {{tr("customer_id")}}</th>
                                    <td> {{ $generateGiftCard->customer_id }} </td>
                                </tr>
                                <tr>
                                    <th> {{tr("sold_by")}}</th>
                                    <td> {{ $generateGiftCard->soldBy->name }} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end content-->
                </div><!--  end card  -->
            </div>
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->
@endsection
