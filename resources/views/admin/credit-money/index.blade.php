@extends('layouts.adminator.master')

@section('title', tr('credit_money'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('credit_money') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}">
            <i class="fa fa-dashboard"></i>{{tr('home')}} </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.credit-money.index')}}">
            <i class="fa fa-suitcase"></i> {{tr('credit_money')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('credit_money')}}</li>
@endsection

@section('styles')
    <style>
        .deleteCreditMoney{
            border: none;background: #fff; padding: 0px; color: #333 !important;
        }
    </style>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{ tr('credit_money') }}</h3>
                    </div>

                    <div class="col-md-6">
                        <a href="{{route('admin.credit-money.create')}}"
                           class="btn btn-default pull-right">{{tr('add_credit_money')}}</a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="table table-responsive">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                               width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Retailer Id</th>
                                <th>Amount</th>
                                <th>Given By</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($creditmoney as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->receiver_name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->giver_name }}</td>
                                    <td>
                                        <ul class="admin-action btn btn-default">
                                            <li class="dropup">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    {{tr('action')}} <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">

                                                    <li role="presentation">
                                                        <a role="menuitem"
                                                           href="{{ url('/admin/credit-money/' . $item->id) }}"
                                                           title="View CreditMoney"> {{tr('view')}}</a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a role="menuitem"
                                                           href="{{ url('/admin/credit-money/' . $item->id . '/edit') }}"
                                                           title="View CreditMoney">{{tr('edit')}}
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a>
                                                            <form  method="POST" action="{{ url('/admin/credit-money' . '/' . $item->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit" class="deleteCreditMoney" title="Delete CreditMoney" style=""
                                                                       onclick="return confirm('&quot;Confirm delete?&quot;')"
                                                                       value="{{tr('delete')}}"/>
                                                            </form>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
