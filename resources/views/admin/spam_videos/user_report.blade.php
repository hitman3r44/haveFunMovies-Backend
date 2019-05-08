@extends('layouts.adminator.master')

@section('title', tr('user_reports'))

@section('content-header')
    <div class="row">
        <div class="col-md-4">
            <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('user_reports') }}</h4>
        </div>
        <div class="col-md-8">
            @if($video_details)
                <a href="{{route('admin.view.video', array('id' => $video_details->id))}}">
                    - {{$video_details->title}} </a>
            @endif
        </div>
    </div>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.spam-videos')}}"><i
                    class="fa fa-flag"></i>{{tr('spam_videos')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-suitcase"></i> {{tr('user_reports')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">

                <div class="box-body">

                    @if(count($model) > 0)

                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>{{tr('id')}}</th>
                                <th>{{tr('username')}}</th>
                                <th>{{tr('reason')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($model as $i => $reason)
                                <tr>
                                    <td>{{showEntries($_GET, $i+1)}}</td>
                                    <td>{{$reason->userVideos->name}}</td>
                                    <td>{{$reason->reason}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                        <div align="right" id="paglink"><?php echo $model->links(); ?></div>

                    @else

                        <h3 class="no-result">{{tr('no_result_found')}}</h3>

                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection
