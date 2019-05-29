@extends('layouts.adminator.master')

@section('title', tr('prepaid_code'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('prepaid_code') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}">
            <i class="fa fa-dashboard"></i>{{tr('home')}} </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.prepaid-code.index')}}">
            <i class="fa fa-suitcase"></i> {{tr('prepaid_code')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('prepaid_code')}}</li>
@endsection

@section('styles')
    <style>
        .deletePrepaidCode {
            border: none;
            background: #fff;
            padding: 0px;
            color: #333 !important;
        }
    </style>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{ tr('prepaid_code') }}</h3>
                    </div>

                    <div class="col-md-6">
                        <a href="{{route('admin.prepaid-code.create')}}"
                           class="btn btn-default pull-right">{{tr('add_prepaid_code')}}</a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="table table-responsive">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                               width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{tr('prepaid_plan')}}</th>
                                <th>{{tr('price')}}</th>
                                <th>{{tr('is_used')}}</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prepaidcode as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ ($item->is_used == 1) ? 'Yes' : 'No' }}</td>

                                    <td>
                                        <ul class="admin-action btn btn-default">
                                            <li class="dropup">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    {{tr('action')}} <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
{{--                                                    <li role="presentation">--}}
{{--                                                        <a role="menuitem"--}}
{{--                                                           href="#"--}}
{{--                                                           title="View PrepaidCode"> Pay</a>--}}
{{--                                                    </li>--}}
                                                    <li role="presentation">
                                                        <a role="menuitem"
                                                           href="{{ url('/admin/prepaid-code/' . $item->id) }}"
                                                           title="View PrepaidCode"> {{tr('view')}}</a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a role="menuitem"
                                                           href="{{ url('/admin/prepaid-code/' . $item->id . '/edit') }}"
                                                           title="View PrepaidCode"> {{tr('edit')}}</a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a>
                                                            <form role="menuitem" method="POST"
                                                                  action="{{ url('/admin/prepaid-code' . '/' . $item->id) }}"
                                                                  accept-charset="UTF-8" style="display:inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit" class="deletePrepaidCode"
                                                                       title="Delete PrepaidCode"
                                                                       onclick="return confirm('&quot;Confirm PrepaidCode delete?&quot;')"
                                                                       value="{{tr('delete')}}">
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
