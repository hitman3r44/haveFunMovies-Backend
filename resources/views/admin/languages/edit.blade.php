@extends('layouts.adminator.master')

@section('title', tr('edit_language'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_language') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.languages.index')}}"><i
                    class="fa fa-globe"></i>{{tr('languages')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-globe"></i>&nbsp; {{tr('edit_language')}}</li>
@endsection

@section('styles')

    <link rel="stylesheet" href="{{asset('common/css/imageHover.css')}}">

@endsection


@section('content')
    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('edit_language')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{(Setting::get('admin_language_control')) ? '' : route('admin.languages.index')}}"
                           style="float:right" class="btn btn-default">{{tr('languages')}}</a>
                    </div>
                </div>

                <form action="{{route('admin.languages.save')}}" method="POST" enctype="multipart/form-data"
                      role="form">
                    @csrf
                    <div class="box-body">

                        <input type="hidden" name="id" value="{{$model->id}}">

                        <div class="form-group">
                            <label for="name">{{tr('short_name')}}</label>
                            <input type="text" class="form-control" name="folder_name" id="folder_name"
                                   placeholder="{{tr('example')}} : {{tr('en_tn')}}" required maxlength="4"
                                   value="{{$model->folder_name}}">
                        </div>

                        <div class="form-group">
                            <label for="name">{{tr('language')}}</label>
                            <div>
                                <input type="text" class="form-control" name="language" id="language"
                                       placeholder="{{tr('example')}} : {{tr('hindi_english')}}" required maxlength="64"
                                       value="{{$model->language}}">
                            </div>
                        </div>

                        <div class="form-group col-lg-2">

                            <label for="name">{{tr('file')}}</label>
                            <input type="file" id="file" name="file" placeholder="{{tr('picture')}}">
                            <br>
                            <ul class="ace-thumbnails clearfix">
                                <li>
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <img style="width:100px;height:90px" alt="Php"
                                                 src="{{asset('common/img/php.png')}}">
                                        </div>
                                    </div>
                                    <div class="tools tools-bottom">
                                        <a href="{{route('admin.languages.download', $model->folder_name)}}">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-danger">{{tr('reset')}}</button>
                        @if(Setting::get('admin_language_control') || Setting::get('admin_delete_control'))
                            <button type="button" class="btn btn-success pull-right" disabled></button>
                        @else
                            <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                        @endif
                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection

