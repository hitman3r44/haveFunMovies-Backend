@extends('layouts.adminator.master')

@section('title', tr('edit_sub_category'))


@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30">{{tr('edit_sub_category') }} - <span
                style="color:#1d880c !important">{{$sub_category->name}} </span></h4>
@endsection class="list-inline-item"

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.categories')}}"><i
                    class="fa fa-suitcase"></i> {{tr('categories')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.sub_categories' , array('category' => $category->id))}}"><i
                    class="fa fa-suitcase"></i> {{tr('sub_categories')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-suitcase"></i> {{tr('edit_sub_category')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('sub_categories')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.add.sub_category' , array('category' => $category->id))}}"
                           class="btn btn-default pull-right">{{tr('add_sub_category')}}</a>
                    </div>
                </div>

                <form class="form-horizontal" action="{{route('admin.save.sub_category')}}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="box-body">

                        <input type="hidden" name="category_id" value="{{$category->id}}">
                        <input type="hidden" name="id" value="{{$sub_category->id}}">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-form-label">*{{tr('name')}}</label>
                            <div class="col-sm-10">
                                <input type="text" required pattern="[a-zA-Z0-9\s\-\.]{2,100}"
                                       title="{{tr('only_alphanumeric')}}" class="form-control"
                                       value="{{$sub_category->name}}" id="name" name="name"
                                       placeholder="{{tr('name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 col-form-label">*{{tr('description')}}</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" value="{{$sub_category->description}}"
                                       id="description" name="description" placeholder="{{tr('description')}}">
                            </div>
                        </div>

                        @if($sub_category_images[0]->picture)

                            <div class="col-sm-12">
                                <label for="picture1" class="col-sm-2 col-form-label"></label>
                                <img style="height: 90px;margin-bottom: 15px; border-radius:2em;"
                                     src="{{$sub_category_images[0]->picture}}" id="image_preview">
                            </div>
                        @endif

                        <div class="form-group">

                            <label for="picture1" class="col-sm-2 col-form-label">{{tr('image')}}</label>

                            <div class="col-sm-10">

                                <input type="file" accept="image/png, image/jpeg" id="picture1" name="picture1"
                                       placeholder="{{tr('picture1')}}" onchange="loadFile(this,'image_preview')">
                                <p class="form-text">{{tr('image_validate')}} {{tr('image_square')}}</p>
                            </div>

                        </div>

                        <?php /*@if($sub_category_images[1]->picture)
                            <div class="col-sm-12">
                                <label for="picture1" class="col-sm-2 col-form-label"></label>
                                <img style="height: 90px;margin-bottom: 15px; border-radius:2em;" src="{{$sub_category_images[1]->picture}}">
                            </div>
                        @endif

                        <div class="form-group">

                            <label for="picture2" class="col-sm-2 col-form-label">{{tr('picture2')}}</label>

                            <div class="col-sm-10">
                                <input type="file" accept="image/png, image/jpeg" id="picture2" name="picture2" placeholder="{{tr('picture2')}}">
                                <p class="form-text">{{tr('image_validate')}} {{tr('image_square')}}</p>
                            </div>
                        </div>

                        @if($sub_category_images[2]->picture)
                            <div class="col-sm-12">
                                <label for="picture1" class="col-sm-2 col-form-label"></label>
                                <img style="height: 90px;margin-bottom: 15px; border-radius:2em;" src="{{$sub_category_images[2]->picture}}">
                            </div>
                        
                        @endif

                        <div class="form-group">

                            <label for="picture3" class="col-sm-2 col-form-label">{{tr('picture3')}}</label>

                            <div class="col-sm-10">
                                <input type="file" accept="image/png, image/jpeg" id="picture3" name="picture3" placeholder="{{tr('picture3')}}">
                                <p class="form-text">{{tr('image_validate')}} {{tr('image_square')}}</p>
                            </div>
                        </div> */?>

                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-danger">{{tr('reset')}}</button>
                        @if(Setting::get('admin_delete_control'))
                            <a href="#" class="btn btn-success pull-right" disabled>{{tr('submit')}}</a>
                        @else
                            <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                        @endif
                    </div>
                </form>

            </div>

        </div>

        <?php /* @if($category->is_series)

        <div class="col-md-4">

        <div class="box box-warning">

        <div class="box-header with-border">
        <h3 class="box-title">{{tr('add_genre')}}</h3>
        </div>

        <form class="form-horizontal" action="{{route('admin.save.genre')}}" method="POST" enctype="multipart/form-data" role="form">

        <div class="box-body">

        <input type="hidden" name="category_id" value="{{$category->id}}">
        <input type="hidden" name="id" value="{{$sub_category->id}}">

        <div class="form-group">
        <div class="col-sm-10">
        <input type="text" required class="form-control" name="genre" placeholder="{{tr('genre_placeholder')}}">
        </div>
        </div>

        </div>

        <div class="box-footer">
        <button type="reset" class="btn btn-danger">{{tr('reset')}}</button>
        <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
        </div>
        </form>

        </div>

        @if(count($genres) > 0)

        @foreach($genres as $genre)

        <div class="box">

        <div class="box-header with-border">
        <h3 class="box-title">{{$genre->name}}</h3>

        <a style="margin-left:5px" title="Delete" href="{{route('admin.delete.genre' , $genre->id)}}" class="btn btn-danger pull-right btn-sm">
        <i class="fa fa-trash"></i>
        </a>

        <!-- @if($genre->is_approved)

        <a title="Decline" href="{{route('admin.genre.approve' , array('id' => $genre->id , 'status' => 0))}}" class="btn btn-warning pull-right btn-sm">
        <i class="fa fa-times"></i>
        </a>
        @else
        <a title="Approve" href="{{route('admin.genre.approve' , array('id' => $genre->id , 'status' => 1))}}" class="btn btn-success pull-right btn-sm">
        <i class="fa fa-check"></i>
        </a>
        @endif -->


        </div>
        </div>

        @endforeach

        @endif

        </div>

        @endif

         */?>

    </div>

@endsection

@section('scripts')

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
