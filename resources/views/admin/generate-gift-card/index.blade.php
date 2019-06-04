@extends('layouts.adminator.master')

@section('title', tr('generate_gift_card'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('generate_gift_card') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}">
            <i class="fa fa-dashboard"></i>{{tr('home')}} </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.generate-gift-card.index')}}">
            <i class="fa fa-suitcase"></i> {{tr('generate_gift_card')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('generate_gift_card')}}</li>
@endsection

@section('styles')
    <style>
        .deleteGenerateGiftCard {
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
                        <h3>{{ tr('generate_gift_card') }}</h3>
                    </div>

                    <div class="col-md-6">
                        <a href="{{route('admin.generate-gift-card.create')}}"
                           class="btn btn-default pull-right">{{tr('add_generate_gift_card')}}</a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="table table-responsive">
                        <table id="dataTable" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                               width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{tr('gift_card_name')}}</th>
                                <th>{{tr('customer_name')}}</th>
                                <th>{{tr('uuid_code')}}</th>
                                <th>{{tr('sold_by')}}</th>
                                <th>{{tr('is_paid')}}</th>
                                <th>{{tr('action')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($generateGiftCard as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title}}</td>
                                    <td>{{ $item->receiver_name}}</td>
                                    <td>{{ $item->UUID}}</td>
                                    <td>{{ $item->giver_name }}</td>
                                    <td class="text-center">

                                        @if($item->is_paid)
                                            <span class="badge badge-success">{{tr('yes')}}</span>
                                        @else
                                            <span class="badge badge-warning">{{tr('no')}}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <ul class="admin-action btn btn-default">
                                            <li class="dropup">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    {{tr('action')}} <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li role="presentation">
                                                        <a role="menuitem"
                                                           href="{{ url('/admin/generate-gift-card/' . $item->id) }}"
                                                           title="View GenerateGiftCard"> {{tr('view')}}</a>
                                                    </li>
                                                    {{--                                                    <li role="presentation">--}}
                                                    {{--                                                        <a role="menuitem"--}}
                                                    {{--                                                           href="{{ url('/admin/generate-gift-card/' . $item->id . '/edit') }}"--}}
                                                    {{--                                                           title="View GenerateGiftCard"> {{tr('edit')}}</a>--}}
                                                    {{--                                                    </li>--}}
                                                    {{--                                                    <li role="presentation">--}}
                                                    {{--                                                        <a>--}}
                                                    {{--                                                            <form role="menuitem" method="POST"--}}
                                                    {{--                                                                  action="{{ url('/admin/generate-gift-card' . '/' . $item->id) }}"--}}
                                                    {{--                                                                  accept-charset="UTF-8" style="display:inline">--}}
                                                    {{--                                                                @csrf--}}
                                                    {{--                                                                @method('DELETE')--}}
                                                    {{--                                                                <input type="submit" class="deleteGenerateGiftCard"--}}
                                                    {{--                                                                       title="Delete GenerateGiftCard"--}}
                                                    {{--                                                                       onclick="return confirm('&quot;Confirm GenerateGiftCard delete?&quot;')"--}}
                                                    {{--                                                                       value="{{tr('delete')}} "" >--}}
                                                    {{--                                                            </form>--}}
                                                    {{--                                                        </a>--}}
                                                    {{--                                                    </li>--}}
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
