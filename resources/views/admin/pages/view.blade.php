@extends('layouts.adminator.master')

@section('title', tr('view_page'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_page') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.pages.index')}}"><i class="fa fa-book"></i> {{tr('pages')}}</a></li>
    <li class="list-inline-item active"> {{tr('view_page')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{$data->heading}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.pages.edit',$data->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> {{tr('edit')}}</a>
                    </div>
                </div>

                <div class="box-body">

                    <strong><i class="fa fa-book margin-r-5"></i> {{tr('title')}}</strong>

                    <p class="text-muted">{{$data->heading}}</p>

                    <hr>

                    <strong><i class="fa fa-book margin-r-5"></i> {{tr('description')}}</strong>

                    <p class="text-muted"><?= $data->description?></p>

                    <hr>

                </div>

            </div>
            <!-- /.box -->
        </div>

    </div>
@endsection


