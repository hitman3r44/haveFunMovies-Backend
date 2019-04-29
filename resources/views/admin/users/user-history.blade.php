@extends('layouts.adminator.master')

@section('title', tr('view_history'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_history') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.users')}}"><i class="fa fa-user"></i> {{tr('users')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.users.subprofiles', $sub_profile_details->user_id)}}"> <i
                    class="fa fa-user"></i> {{tr('sub_profiles')}}</a></li>
    <li class="list-inline-item active"> {{tr('view_history')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">

                <div class="box-body">

                    @if(count($data) > 0)
                        <div class="table table-responsive">

                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">

                                <thead>
                                <tr>
                                    <th>{{tr('id')}}</th>
                                    <th>{{tr('video')}}</th>
                                    <th>{{tr('date')}}</th>
                                    <th>{{tr('action')}}</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($data as $i => $history)

                                    <tr>
                                        <td>{{showEntries($_GET, $i+1)}}</td>
                                        <td>{{$history->title}}</td>
                                        <td>{{convertTimeToUSERzone($history->date, Auth::guard('admin')->user()->timezone, 'd-m-Y H:i a')}}</td>
                                        <td>
                                            <ul class="admin-action btn btn-default">
                                                <li class="dropup">

                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        {{tr('action')}}
                                                        <span class="caret"></span>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   onclick="return confirm('Are you sure?');"
                                                                                   href="{{route('admin.delete.history' , $history->user_history_id)}}">{{tr('delete_history')}}</a>
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
                        <div align="right" id="paglink"><?php echo $data->links(); ?></div>

                    @else
                        <h3 class="no-result">{{tr('no_history_found')}}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


