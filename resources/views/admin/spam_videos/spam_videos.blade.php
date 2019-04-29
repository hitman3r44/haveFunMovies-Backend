@extends('layouts.adminator.master')

@section('title', tr('spam_videos'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('spam_videos') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item active"><i class="fa fa-flag"></i> {{tr('spam_videos')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">

                <div class="box-body">

                    @if(count($model) > 0)

                        <div class="table table-responsive">

                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">

                                <thead>
                                <tr>
                                    <th>{{tr('id')}}</th>
                                    <th>{{tr('category')}}</th>
                                    <th>{{tr('sub_category')}}</th>
                                    <th>{{tr('genre')}}</th>
                                    <th>{{tr('title')}}</th>
                                    <th>{{tr('user_count')}}</th>
                                    <th>{{tr('status')}}</th>
                                    <th>{{tr('action')}}</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($model as $i => $video)

                                    <tr>
                                        <td>{{showEntries($_GET, $i+1)}}</td>
                                        <td>{{$video->adminVideo->category->name}}</td>
                                        <td>{{$video->adminVideo->subCategory->name}}</td>
                                        <td>{{($video->adminVideo->genreName) ? $video->adminVideo->genreName->name : '-'}}</td>
                                        <td>{{substr($video->adminVideo->title , 0,25)}}...</td>
                                        <td>{{count($video->adminVideo->userFlags)}}</td>
                                        <td>
                                            @if($video->adminVideo->is_approved)
                                                <span class="label label-success">{{tr('approved')}}</span>
                                            @else
                                                <span class="label label-warning">{{tr('pending')}}</span>
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
                                                            @if(Setting::get('admin_delete_control'))

                                                                <a role="button" href="javascript:;"
                                                                   class="btn disabled"
                                                                   style="text-align: left">{{tr('delete')}}</a>

                                                            @else
                                                                <a role="menuitem" tabindex="-1"
                                                                   onclick="return confirm('Are you sure?')"
                                                                   href="{{route('admin.delete.video' , array('id' => $video->video_id))}}">{{tr('delete')}}</a>
                                                            @endif
                                                        </li>

                                                        <li class="divider" role="presentation"></li>

                                                        @if($video->adminVideo->is_approved)
                                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                       href="{{route('admin.video.decline',$video->video_id)}}">{{tr('decline')}}</a>
                                                            </li>
                                                        @else
                                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                       href="{{route('admin.video.approve',$video->video_id)}}">{{tr('approve')}}</a>
                                                            </li>
                                                        @endif

                                                        <li class="divider" role="presentation"></li>

                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.spam-videos.user-reports' , $video->video_id)}}">{{tr('user_reports')}}</a>
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
                        <div align="right" id="paglink"><?php echo $model->links(); ?></div>

                    @else
                        <h3 class="no-result">{{tr('no_result_found')}}</h3>
                    @endif

                </div>

            </div>

        </div>
    </div>

@endsection
