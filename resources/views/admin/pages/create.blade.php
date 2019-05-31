@extends('layouts.adminator.master')

@section('title', tr('pages'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('pages') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item active"><i class="fa fa-book"></i> {{tr('pages')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('add_page')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.pages.index')}}" style="float:right"
                           class="btn btn-default">{{tr('pages')}}</a>
                    </div>
                </div>

                <form action="{{route('admin.pages.save')}}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="box-body">

                        <div class="form-group floating-label">

                            <label for="select2">*{{tr('page_type')}}</label>

                            <select id="select2" name="type" class="form-control" required>

                                <option value="" selected="true">{{tr('choose')}} {{tr('page_type')}}</option>
                                <option value="about">{{tr('about')}}</option>
                                <option value="terms">{{tr('terms')}}</option>
                                <option value="privacy">{{tr('privacy')}}</option>
                                <option value="contact">{{tr('contact')}}</option>
                                <option value="help">{{tr('help')}}</option>
                                <option value="faq">{{tr('faq')}}</option>
                                <option value="others">{{tr('others')}}</option>

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="heading">*{{tr('heading')}}</label>
                            <input type="text" class="form-control" name="heading" required id="heading"
                                   placeholder="{{tr('enter_heading')}}">
                        </div>

                        <div class="form-group">
                            <label for="description">*{{tr('description')}}</label>

                            <textarea id="ckeditor" name="description" class="form-control" required
                                      placeholder="{{tr('enter_text')}}"></textarea>

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

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection


