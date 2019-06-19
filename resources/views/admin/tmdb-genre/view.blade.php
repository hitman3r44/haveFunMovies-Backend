@extends('layouts.adminator.master')

@section('title',tr('view_genre'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_genre') }}</h4>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>

    <li class="list-inline-item"><a href="{{route('admin.genre.list')}}"><i class="fa fa-gift"></i>{{tr('genres')}}
        </a></li>

    <li class="list-inline-item active">{{tr('view_genre')}}</li>

@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{$view_genre->name}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.edit.genres',$view_genre->id)}}"
                           class="btn btn-warning pull-right">{{tr('edit')}}</a>
                    </div>
                </div>

                <div class="box box-body">
                    <strong>{{tr('title')}}</strong>
                    <h5 class="pull-right">{{$view_genre->name}}</h5>
                    <hr>

                    <strong>{{tr('status')}}</strong>
                    @if($view_genre->status == 0)
                        <span class="badge badge-warning pull-right">{{tr('declined')}}</span>
                    @else
                        <span class="badge badge-success pull-right">{{tr('approved')}}</span>
                    @endif

                    <hr>
                    <strong>{{tr('created_at')}}</strong>
                    <h5 class="pull-right"> {{convertTimeToUSERzone($view_genre->created_at, Auth::user()->timezone, 'd-m-Y H:i a')}} </h5>

                    <hr>
                    <strong>{{tr('updated_at')}}</strong>
                    <h5 class="pull-right">{{convertTimeToUSERzone($view_genre->updated_at, Auth::user()->timezone, 'd-m-Y H:i a')}}</h5>

                    @if($view_genre->description == '')

                    @else
                        <hr>
                        <strong>{{tr('description')}}</strong><br>
                        <?php echo $view_genre->description ?>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
