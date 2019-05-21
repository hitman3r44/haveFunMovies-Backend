@extends('layouts.adminator.master')

@section('title',tr('view_advertisement'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_advertisement') }}</h4>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.advertisement.list')}}"><i class="fa fa-gift"></i>{{tr('advertisements')}}</a></li>
    <li class="list-inline-item active">{{tr('view_advertisement')}}</li>

@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{$view_advertisement->title}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.edit.advertisement',$view_advertisement->id)}}"
                           class="btn btn-warning pull-right">{{tr('edit')}}</a>
                    </div>
                </div>

                <div class="box box-body">
                    <strong>{{tr('title')}}</strong>
                    <h5 class="pull-right">{{$view_advertisement->title}}</h5>

                    <hr>
                    <strong>{{tr('min_play_time')}}</strong>
                    <h4 class="pull-right" style="border: 2px solid #20bd99">{{$view_advertisement->min_play_time}}</h4>

                    <hr>
                    <strong>{{tr('max_play_time')}}</strong>
                    <h4 class="pull-right" style="border: 2px solid #20bd99">{{$view_advertisement->max_play_time}}</h4>

                    <hr>
                    <strong>{{tr('already_played_time')}}</strong>
                    <h4 class="pull-right" style="border: 2px solid #20bd99">{{$view_advertisement->already_played_time}}</h4>

                    <hr>
                    <strong>{{tr('end_playing_date_table_header')}}</strong>
                    <h5 class="pull-right">{{date('d M y', strtotime($view_advertisement->start_playing_date))}}</h5>

                    <hr>
                    <strong>{{tr('end_playing_date_table_header')}}</strong>
                    <h5 class="pull-right">{{date('d M y', strtotime($view_advertisement->end_playing_date))}}</h5>

                    <hr>
                    <strong>{{tr('amount')}}</strong>
                    <h4 class="pull-right" style="border: 2px solid #20bd99">{{$view_advertisement->total_amount}}</h4>

                    <hr>
                    <strong>{{tr('per_view_cost')}}</strong>
                    <h4 class="pull-right" style="border: 2px solid #20bd99">{{$view_advertisement->per_view_cost}}</h4>

                    <hr>
                    <strong>{{tr('is_published')}}</strong>
                    @if($view_advertisement->is_published == 0)
                        <span class="label label-warning pull-right">{{tr('declined')}}</span>
                    @else
                        <span class="label label-success pull-right">{{tr('approved')}}</span>
                    @endif

                    <hr>
                    <strong>{{tr('is_expired')}}</strong>
                    @if($view_advertisement->is_expired == 0)
                        <span class="label label-warning pull-right">{{tr('declined')}}</span>
                    @else
                        <span class="label label-success pull-right">{{tr('approved')}}</span>
                    @endif

                    <hr>
                    <strong>{{tr('created_at')}}</strong>
                    <h5 class="pull-right"> {{convertTimeToUSERzone($view_advertisement->created_at, Auth::user()->timezone, 'd-m-Y H:i a')}} </h5>
                    <hr>

                    <strong>{{tr('updated_at')}}</strong>
                    <h5 class="pull-right">{{convertTimeToUSERzone($view_advertisement->updated_at, Auth::user()->timezone, 'd-m-Y H:i a')}}</h5>

                    @if(!empty($view_advertisement->video))
                        <hr>
                        <strong>{{tr('view_videos')}}</strong>
                        <h5 class="pull-right"><a href="{{$view_advertisement->video}}" class="link-black" target="_blank">Show Current Video</a></h5>
                    @endif

                    @if($view_advertisement->description == '')

                    @else
                        <hr>
                        <strong>{{tr('description')}}</strong><br>
                        <?php echo $view_advertisement->description ?>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
