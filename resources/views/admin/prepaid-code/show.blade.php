@extends('layouts.adminator.master')

@section('title', tr('prepaid_code'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('prepaid_code') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.prepaid-code.index')}}"><i
                    class="fa fa-suitcase"></i> {{tr('prepaid_code')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('prepaid_code')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">

                        <h4 class="card-title">
                            {{ tr('prepaid_code') }}

                            <small class="category">Details of {{ $prepaidcode->title }}</small>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <a href="{{route('admin.prepaid-code.create')}}"
                                           class="btn btn-info btn-sm">{{tr('add_prepaid_code')}}</a>
                                        <a href="{{route('admin.prepaid-code.index')}}"
                                           class="btn btn-primary btn-sm">{{tr('prepaid_code')}}</a>
                                        <a href="{{route('admin.prepaid-code.edit', $prepaidcode->id)}}"
                                           class="btn btn-round btn-warning btn-sm">{{tr('edit_prepaid_code')}}
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
                                <tr>
                                    <th> Title</th>
                                    <td> {{ $prepaidcode->title }} </td>
                                </tr>
                                <tr>
                                    <th> Price</th>
                                    <td> {{ $prepaidcode->price }} </td>
                                </tr>
                                <tr>
                                    <th> Is Used</th>
                                    <td> {{ $prepaidcode->is_used }} </td>
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
