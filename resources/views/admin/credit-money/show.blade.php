@extends('layouts.adminator.master')

@section('title', tr('credit_money'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('credit_money') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}} </a> > </li>
    <li class="list-inline-item"><a href="{{route('admin.credit-money.index')}}"><i class="fa fa-suitcase"></i> {{tr('credit_money')}}</a> > </li>
    <li class="list-inline-item active">{{tr('credit_money')}}</li>
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
                                credit_money

                                <small class="category">Details of  credit_money </small>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <a href="{{route('admin/credit-money.create')}}"
                                                class="btn btn-info btn-sm">{{tr('add_credit_money')}}</a>
                                            <a href="{{route('admin/credit-money.index')}}"
                                                class="btn btn-primary btn-sm">{{tr('credit_money')}}</a>
                                            <a href="{{route('admin/credit-money.edit', $credit_money->id)}}"
                                                class="btn btn-round btn-standard btn-sm">tr('edit_credit_money')
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
                                        <tr><th> Retailer Id </th><td> {{ $credit_money->retailer_id }} </td></tr><tr><th> Amount </th><td> {{ $credit_money->amount }} </td></tr><tr><th> Given By </th><td> {{ $credit_money->given_by }} </td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end content-->
                    </div><!--  end card  -->
                 </div>
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
@endsection
