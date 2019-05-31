@extends('layouts.adminator.master')

@section('title', tr('banner_videos'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('banner_videos') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item active"><i class="fa fa-university"></i> {{tr('banner_videos')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{tr('banner_videos')}}</h3>
                    </div>
                    <div class="col-md-6"></div>

                    <div class="box-body">

                        @if(count($videos) > 0)
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
                                        <th>{{tr('description')}}</th>
                                        @if(Setting::get('theme') == 'default')
                                            <th>{{tr('slider_video')}}</th>
                                        @endif
                                        <th>{{tr('status')}}</th>
                                        <th>{{tr('change')}}</th>
                                        <th>{{tr('action')}}</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($videos as $i => $video)

                                        <tr>
                                            <td>{{showEntries($_GET, $i+1)}}</td>
                                            <td>{{$video->category_name}}</td>
                                            <td>{{$video->sub_category_name}}</td>
                                            <td>@if($video->genre_name) {{$video->genre_name}} @else - @endif</td>
                                            <td>
                                                <a href="{{route('admin.view.video' , array('id' => $video->video_id))}}"> {{substr($video->title , 0,25)}}
                                                    ...</a></td>
                                            <td>{{substr($video->description , 0, 25)}}...</td>
                                            @if(Setting::get('theme') == 'default')
                                                <td>
                                                    @if($video->is_home_slider == 0 && $video->is_approved && $video->status)
                                                        <a href="{{route('admin.slider.video' , $video->video_id)}}"><span
                                                                    class="badge badge-danger">{{tr('set_slider')}}</span></a>
                                                    @elseif($video->is_home_slider)
                                                        <span class="badge badge-success">{{tr('slider')}}</span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>

                                            @endif
                                            <td>
                                                @if($video->is_approved)
                                                    <span class="badge badge-success">{{tr('approved')}}</span>
                                                @else
                                                    <span class="badge badge-warning">{{tr('pending')}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(Setting::get('admin_delete_control') == 1)
                                                    <button class="btn btn-primary btn-xs"
                                                            disabled>{{tr('remove_banner')}}</button>
                                                @else
                                                    <a class="btn btn-primary btn-xs"
                                                       href="{{route('admin.change.video' ,$video->video_id )}}">{{tr('remove_banner')}}</a>
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
                                                                       style="text-align: left">{{tr('edit')}}</a>
                                                                @else
                                                                    <a role="menuitem" tabindex="-1"
                                                                       href="{{route('admin.edit.video' , array('id' => $video->video_id))}}">{{tr('edit')}}</a>
                                                                @endif
                                                            </li>

                                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                       target="_blank"
                                                                                       href="{{route('admin.view.video' , array('id' => $video->video_id))}}">{{tr('view')}}</a>
                                                            </li>

                                                            <li class="divider" role="presentation"></li>

                                                            @if($video->is_approved)
                                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                           href="{{route('admin.video.decline',$video->video_id)}}">{{tr('decline')}}</a>
                                                                </li>
                                                            @else
                                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                           href="{{route('admin.video.approve',$video->video_id)}}">{{tr('approve')}}</a>
                                                                </li>
                                                            @endif

                                                            <li class="divider" role="presentation"></li>

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
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

                                <div align="right" id="paglink"><?php echo $videos->links(); ?></div>

                                @else
                                    <h3 class="no-result">{{tr('no_video_found')}}</h3>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
