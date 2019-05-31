@extends('layouts.adminator.master')

@section('title', tr('edit_category'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_category') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.categories')}}"><i
                    class="fa fa-suitcase"></i> {{tr('categories')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('edit_category')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('edit_category')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.add.category')}}"
                           class="btn btn-default pull-right">{{tr('add_category')}}</a>
                    </div>
                </div>

                @if(Setting::get('admin_delete_control'))

                    <form class="form-horizontal" role="form">
                        @csrf

                        @else

                            <form class="form-horizontal" action="{{route('admin.save.category')}}" method="POST" enctype="multipart/form-data" role="form">
                                @csrf
                                @endif

                                <div class="box-body">

                                    <input type="hidden" name="id" value="{{$category->id}}">

                                    <div class="form-group">
                                        <label for="name" class="col-sm-1 col-form-label">*{{tr('name')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control"
                                                   pattern="[a-zA-Z0-9\s\-\.]{2,100}"
                                                   title="{{tr('only_alphanumeric')}}" value="{{$category->name}}"
                                                   id="name" name="name"
                                                   placeholder="{{tr('enter')}} {{tr('category')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label for="picture" class="col-sm-1 col-form-label">{{tr('picture')}}</label>

                                        @if($category->picture)
                                            <img style="height: 90px;margin-bottom: 15px; border-radius:2em;"
                                                 src="{{$category->picture}}" id="image_preview">
                                        @endif

                                        <div class="col-sm-10" style="margin-left:70px !important">

                                            <input type="file" accept="image/png, image/jpeg" id="picture"
                                                   name="picture" placeholder="{{tr('picture')}}"
                                                   onchange="loadFile(this,'image_preview')">
                                            <p class="form-text">{{tr('image_validate')}} {{tr('image_square')}}</p>
                                        </div>

                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="is_series" value="1" class="form-check-input"
                                                   @if($category->is_series) checked @endif> {{tr('is_series')}}
                                        </label>
                                    </div>

                                </div>

                                <div class="box-footer">
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">{{tr('cancel')}}</a>

                                    @if(Setting::get('admin_delete_control'))
                                        <a href="#" class="btn btn-success pull-right" disabled>{{tr('submit')}}</a>
                                    @else
                                        <button type="submit"
                                                class="btn btn-success pull-right">{{tr('submit')}}</button>
                                    @endif
                                </div>
                            </form>

            </div>

        </div>

    </div>

@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/iCheck/icheck.min.js')}}"></script>

    <script type="text/javascript">

        function loadFile(event, id) {

            $('#' + id).show();

            var reader = new FileReader();

            reader.onload = function () {

                var output = document.getElementById(id);

                output.src = reader.result;
            };

            reader.readAsDataURL(event.files[0]);
        }

    </script>
@endsection
