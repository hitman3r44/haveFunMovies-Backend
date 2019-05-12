@extends('layouts.adminator.master')

@section('title', tr('view_cast_crew'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_cast_crew') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.cast_crews.index')}}"><i
                    class="fa fa-users"></i> {{tr('cast_crews')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-eye"></i>&nbsp;{{tr('view_cast_crew')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{$model->name}}</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('admin.cast_crews.edit', array('id'=>$model->unique_id))}}"
                           class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> {{tr('edit')}}</a>
                    </div>

                    <hr>

                    <div class="row margin-bottom">

                        <div class="col-sm-12">

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="header">

                                        <h4><b>{{tr('name')}}</b></h4>

                                        <p>{{$model->name}}</p>

                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="header">

                                        <h4><b>{{tr('picture')}}</b></h4>

                                        <img src="{{$model->image}}" style="width: 100%;max-height:300px;">

                                    </div>

                                </div>


                                <div class="col-sm-12">

                                    <h3><b>{{tr('content')}}</b></h3>

                                    <p><?= $model->description ?></p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection

