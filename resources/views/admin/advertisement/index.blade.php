@extends('layouts.adminator.master')

@section('title',tr('advertisements'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('advertisements') }}</h4>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item active">{{tr('advertisements')}}</li>

@endsection

@section('content')
    <div class="col-md-12">
        <div class="bgc-white p-20 bd">
            <div class="row bgc-grey-600 p-10">

                <div class="col-md-6 text-white">
                    <h3>{{tr('advertisements')}}</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('admin.add.advertisement')}}"
                       class="btn btn-default pull-right">{{tr('add_advertisement')}}</a>
                </div>
            </div>

            <div class="box-body">

                @if(count($advertisements) > 0)

                    <div class="table table-responsive">

                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>{{tr('id')}}</th>
                                <th>{{tr('title')}}</th>
                                <th>{{tr('min_play_time')}}</th>
                                <th>{{tr('max_play_time')}}</th>
                                <th>{{tr('already_played_time')}}</th>
                                <th>{{tr('start_playing_date_table_header')}}</th>
                                <th>{{tr('end_playing_date_table_header')}}</th>

                                <th>{{tr('amount')}}</th>
                                <th>{{tr('per_view_cost')}}</th>
                                <th>{{tr('is_published')}}</th>
                                <th>{{tr('is_expired')}}</th>

                                <th>{{tr('action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($advertisements as $i=>$value)
                                <tr>
                                    <td>{{showEntries($_GET, $i+1)}}</td>

                                    <td>
                                        <a href="{{route('admin.advertisement.view',$value->id)}}">{{$value->title}}</a>
                                    </td>

                                    <td>
                                        @if($value->min_play_time == null)
                                        {{0}}
                                        @else
                                            {{$value->min_play_time}}
                                        @endif
                                    </td>

                                    <td>
                                        @if($value->max_play_time == null)
                                            {{0}}
                                        @else
                                            {{$value->max_play_time}}
                                        @endif
                                    </td>

                                    <td>
                                        @if($value->already_played_time == null)
                                            {{0}}
                                        @else
                                            {{$value->already_played_time}}
                                        @endif
                                    </td>

                                    <td>
                                        @if($value->start_playing_date == null)
                                            {{tr('n/a')}}
                                        @else
                                            {{date('d M y', strtotime($value->start_playing_date))}}
                                        @endif
                                    </td>

                                    <td>
                                        @if($value->end_playing_date == null)
                                            {{tr('n/a')}}
                                        @else
                                            {{date('d M y', strtotime($value->end_playing_date))}}
                                        @endif
                                    </td>

                                    <td>{{Setting::get('currency')}} {{$value->total_amount}}</td>
                                    <td>{{$value->per_view_cost}}</td>

                                    <td>
                                        @if($value->is_published ==0)
                                            <span class="label label-warning">{{tr('declined')}}</span>
                                        @else
                                            <span class="label label-success">{{tr('approved')}}</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($value->is_expired ==0)
                                            <span class="label label-warning">{{tr('no')}}</span>
                                        @else
                                            <span class="label label-success">{{tr('yes')}}</span>
                                        @endif
                                    </td>

                                    {{--                                    Action--}}
                                    <td>
                                        <ul class="admin-action btn btn-default">
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    {{tr('action')}} <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">

                                                    <li role="presentation">
                                                        <a class="menuitem" tabindex="-1"
                                                           href="{{route('admin.edit.advertisement',$value->id)}}">{{tr('edit')}}</a>
                                                    </li>

                                                    <li role="presentation">
                                                        <a class="menuitem" tabindex="-1"
                                                           href="{{route('admin.advertisement.view',$value->id)}}">{{tr('view')}}</a>
                                                    </li>

                                                    <li role="presentation">
                                                        <a class="menuitem" tabindex="-1"
                                                           href="{{route('admin.delete.advertisement',$value->id)}}"
                                                           onclick="return confirm('Are You Sure?')">{{tr('delete')}}</a>
                                                    </li>

                                                    <li role="presentation">
                                                        @if($value->is_published == 0)
                                                            <a class="menuitem" tabindex="-1"
                                                               href="{{route('admin.advertisement.status',['id'=>$value->id,'is_published'=>1])}}"
                                                               onclick="return confirm('Are You Sure?')">{{tr('publish')}} </a>
                                                        @else
                                                            <a class="menuitem" tabindex="-1"
                                                               href="{{route('admin.advertisement.status',['id'=>$value->id,'is_published'=>0])}}"
                                                               onclick="return confirm('Are You Sure')">{{tr('unpublish')}}</a>
                                                        @endif
                                                    </li>

                                                    <li role="presentation">
                                                        @if($value->is_expired == 0)
                                                            <a class="menuitem" tabindex="-1"
                                                               href="{{route('admin.advertisement.status',['id'=>$value->id,'is_expired'=>1])}}"
                                                               onclick="return confirm('Are You Sure?')">{{tr('make_expired')}} </a>
                                                        @else
                                                            <a class="menuitem" tabindex="-1"
                                                               href="{{route('admin.advertisement.status',['id'=>$value->id,'is_expired'=>0])}}"
                                                               onclick="return confirm('Are You Sure')">{{tr('decline_expired')}}</a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                        @else
                            <h3 class="no-result">{{tr('advertisement_result_not_found_error')}}</h3>
                        @endif
                    </div>
            </div>
        </div>
    </div>
    </div>

@endsection

