@extends('layouts.adminator.master')

@section('title', tr('generate_prepaid_code'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('generate_prepaid_code') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.generate-prepaid-code.index')}}"><i
                    class="fa fa-suitcase"></i> {{tr('generate_prepaid_code')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('generate_prepaid_code')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <h4 class="card-title">
                            {{tr('generate_prepaid_code_title')}}
                            <div class="pull-right">
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <a href="{{route('admin.generate-prepaid-code.create')}}"
                                           class="btn btn-info btn-sm">{{tr('add_generate_prepaid_code')}}</a>
                                        <a href="{{route('admin.generate-prepaid-code.index')}}"
                                           class="btn btn-primary btn-sm">{{tr('generate_prepaid_code')}}</a>
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
                                    <th> {{tr("prepaid_plan")}}</th>
                                    <td> {{ $generatePrepaidCode->prepaidCode->code }} </td>
                                </tr>
                                <tr>
                                    <th> {{tr("customer_id")}}</th>
                                    <td> {{ $generatePrepaidCode->customer_id }} </td>
                                </tr>
                                <tr>
                                    <th> {{tr("sold_by")}}</th>
                                    <td> {{ $generatePrepaidCode->soldBy->name }} </td>
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
