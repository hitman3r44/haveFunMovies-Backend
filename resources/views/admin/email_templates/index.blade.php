@extends('layouts.adminator.master')

@section('title',tr('email_templates'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('email_templates') }}</h4>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item active">{{tr('email_templates')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{tr('email_templates')}}</h3>
                    </div>

                    <div class="col-md-6">
                        <a href="{{route('admin.add.category')}}"
                           class="btn btn-default pull-right">{{tr('add_category')}}</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table table-responsive">

                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>{{tr('id')}}</th>
                                <th>{{tr('template')}}</th>
                                <th>{{tr('subject')}}</th>
                                <th>{{tr('action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($templates as $i=>$value)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{getTemplateName($value->template_type)}}</td>
                                    <td>{{$value->subject}}</td>

                                    <td>
                                        <ul class="admin-action btn btn-default">
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    {{tr('action')}} <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu">

                                                    <li role="presentation">
                                                        <a class="menuitem" tabindex="-1"
                                                           href="{{route('admin.edit.template',['id'=>$value->id])}}">{{tr('edit')}}</a>
                                                    </li>

                                                    <li role="presentation">
                                                        <a class="menuitem" tabindex="-1"
                                                           href="{{route('admin.view.template', ['id'=>$value->id])}}">{{tr('view')}}</a>
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
                </div>
            </div>
        </div>
    </div>
@endsection

