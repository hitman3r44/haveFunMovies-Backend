@extends('layouts.adminator.master')

@section('title', tr('edit_template'))
@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_template') }}</h4>
@endsection
class="list-inline-item"
@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.templates')}}"><i class="fa fa-book"></i>{{tr('templates')}}
        </a></li>
    <li class="list-inline-item active"><i class="fa fa-book"></i> {{tr('edit_template')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{tr('edit_template')}}</h3>
                    </div>

                    <div class="col-md-6">
                        <a href="{{route('admin.templates')}}"
                           class="btn btn-default pull-right">{{tr('templates')}}</a>
                    </div>
                </div>

                <form action="{{route('admin.save.template')}}" method="POST" enctype="multipart/form-data" role="form">

                    <div class="box-body">

                        <input type="hidden" name="id" value="{{$template->id}}">

                        <div class="form-group floating-label">
                            <label for="select2">{{tr('template_type')}}</label>
                            <input type="hidden" required class="form-control" name="template_type" id="template_type"
                                   placeholder="{{tr('enter')}} {{tr('template_type')}}"
                                   value="{{$template->template_type}}">

                            <input type="text" required class="form-control" id="template_type" readonly
                                   value="{{getTemplateName($template->template_type)}}">

                        </div>

                        <div class="form-group">
                            <label for="heading">{{tr('heading')}}</label>
                            <input type="text" required class="form-control" name="subject" id="heading"
                                   placeholder="{{tr('enter')}} {{tr('heading')}}" value="{{$template->subject}}">
                        </div>

                        <div class="form-group">
                            <label for="description">{{tr('description')}}</label>

                            <textarea id="ckeditor" required name="description" class="form-control"
                                      placeholder="{{tr('enter')}} {{tr('description')}}">{{$template->description}}</textarea>

                        </div>

                    </div>

                    <div class="box-footer">
                        <a href="" class="btn btn-danger">{{tr('cancel')}}</a>
                        @if(Setting::get('admin_delete_control'))
                            <a href="#" class="btn btn-success pull-right" disabled>{{tr('submit')}}</a>
                        @else
                            <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                        @endif
                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection

