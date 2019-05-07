@extends('layouts.adminator.master')

@section('title', tr('moderators'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('add_moderator') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a> > </li>
    <li class="list-inline-item active"><i class="fa fa-users"></i> {{tr('moderators')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{tr('add_moderator')}}</h3>
                    </div>

                    <div class="col-md-6">
                        <a href="{{route('admin.add.moderator')}}"
                           class="btn btn-default pull-right">{{tr('moderators')}}</a>

                        @if(count($admins) > 0 )

                            <ul class="admin-action btn btn-default pull-right" style="margin-right: 20px">

                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        {{tr('export')}} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1"
                                               href="{{route('admin.moderators.export' , ['format' => 'xls'])}}">
                                                <span class="text-red"><b>{{tr('excel_sheet')}}</b></span>
                                            </a>
                                        </li>

                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1"
                                               href="{{route('admin.moderators.export' , ['format' => 'csv'])}}">
                                                <span class="text-blue"><b>{{tr('csv')}}</b></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        @endif
                    </div>
                </div>
                <div class="box-body">

                    @if(count($admins) > 0)

                        <div class="table table-responsive">

                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">

                                <thead>
                                <tr>
                                    <th>{{tr('id')}}</th>
                                    <th>{{tr('username')}}</th>
                                    <th>{{tr('email')}}</th>
                                    <th>{{tr('mobile')}}</th>
                                    <th>{{tr('address')}}</th>
                                    <th>{{tr('total_videos')}}</th>
                                    <th>{{tr('total')}}</th>
                                    <th>{{tr('status')}}</th>
                                    <th>{{tr('action')}}</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($admins as $i => $moderator)

                                    <tr>
                                        <td>{{showEntries($_GET, $i+1)}}</td>
                                        <td>
                                            <a href="{{route('admin.moderator.view',$moderator->id)}}">{{$moderator->name}}</a>
                                        </td>
                                        <td>{{$moderator->email}}</td>
                                        <td>{{$moderator->mobile}}</td>
                                        <td>{{$moderator->address}}</td>
                                        <td>
                                            <a href="{{route('admin.moderator.videos.list',$moderator->id)}}">{{$moderator->moderatorVideos ? $moderator->moderatorVideos->count() : "0.00"}}</a>
                                        </td>
                                        <td>{{Setting::get('currency')}} {{$moderator->total}}</td>

                                        <td>
                                            @if($moderator->is_activated)
                                                <span class="badge badge-success">{{tr('approved')}}</span>
                                            @else
                                                <span class="badge badge-warning">{{tr('pending')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="admin-action btn btn-default">
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        {{tr('action')}} <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">

                                                        <li role="presentation">
                                                            @if(Setting::get('admin_delete_control'))
                                                                <a role="button" href="javascript:;"
                                                                   class="btn disabled"
                                                                   style="text-align: left">{{tr('edit')}}</a>
                                                            @else
                                                                <a role="menuitem" tabindex="-1"
                                                                   href="{{route('admin.edit.moderator',$moderator->id)}}">{{tr('edit')}}</a>
                                                            @endif
                                                        </li>

                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.moderator.view',$moderator->id)}}">{{tr('view')}}</a>
                                                        </li>

                                                        <li role="presentation" class="divider"></li>
                                                        @if($moderator->is_activated)
                                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                       onclick="return confirm(&quot;{{tr('moderator_decline_confirmation' , $moderator->name)}}&quot;);"
                                                                                       href="{{route('admin.moderator.decline',$moderator->id)}}">{{tr('decline')}}</a>
                                                            </li>
                                                        @else
                                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                       onclick="return confirm(&quot;{{tr('moderator_approve_confirmation' , $moderator->name)}}&quot;);"
                                                                                       href="{{route('admin.moderator.approve',$moderator->id)}}">{{tr('approve')}}</a>
                                                            </li>
                                                        @endif

                                                        <li role="presentation">

                                                            @if(Setting::get('admin_delete_control'))

                                                                <a role="button" href="javascript:;"
                                                                   class="btn disabled"
                                                                   style="text-align: left">{{tr('delete')}}</a>

                                                            @else

                                                                <a role="menuitem" tabindex="-1"
                                                                   onclick="return confirm(&quot;{{tr('admin_moderator_delete_confirmation' , $moderator->name)}}&quot;);"
                                                                   href="{{route('admin.delete.moderator', $moderator->id)}}">{{tr('delete')}}</a>
                                                            @endif

                                                        </li>

                                                        <li role="presentation" class="divider"></li>

                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.moderators.redeems',['id'=>$moderator->id])}}">{{tr('redeems')}}</a>
                                                        </li>

                                                        <li>

                                                        <li role="presentation">
                                                            <a role="menuitem" tabindex="-1"
                                                               href="{{route('admin.videos' , array('moderator_id' => $moderator->id))}}">{{tr('videos')}}</a>
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
                        <div align="right" id="paglink"><?php echo $admins->links(); ?></div>
                    @else
                        <h3 class="no-result">{{tr('no_result_found')}}</h3>
                    @endif

                </div>

            </div>

        </div>
    </div>

@endsection
