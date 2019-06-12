@extends('layouts.adminator.master')

@section('title',tr('edit_genre'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_genre') }}</h4>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}} </a></li>
    <li class="list-inline-item"><a href="{{route('admin.genre.list')}}"><i class="fa fa-gift"></i>{{tr('genres')}} </a></li>
    <li class="list-inline-item active">{{tr('edit_genre')}}</li>

@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b style="font-size: 18px">{{tr('edit_genre')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.genre.list')}}"
                           class="btn btn-default pull-right"> {{tr('genres')}}</a>
                    </div>

                </div>

                <form action="{{route('admin.save.genre')}}" method="POST" class="form-horizontal" role="form">
                    @csrf
                    <input type="hidden" name="id" value="{{$edit_genre->id}}">

                    <div class="box-body">

                        <div class="form-group">

                            <label for="title" class="col-sm-2 col-form-label"> * {{tr('title')}}</label>

                            <div class="col-sm-10">
                                <input type="text" name="title" role="title" min="5" max="20" class="form-control"
                                       placeholder="{{tr('enter_genre_title')}}"
                                       value="{{$edit_genre->name ? $edit_genre->name : old('title') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 col-form-label">{{tr('description')}}</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" max="255"
                                          style="resize: none;">{{$edit_genre->description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-danger">{{tr('cancel')}}</a>
                        <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
