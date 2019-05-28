@extends('layouts.adminator.master')

@section('title', tr('add_video'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('add_video') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> {{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{request()->headers->get('referer')}}"><i
                    class="fa fa-video-camera"></i> {{tr('videos')}}</a></li>
    <li class="list-inline-item active"> {{tr('add_video')}}</li>
@endsection



@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/imgareaselect-default.css')}}">

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(env('QUEUE_DRIVER') != 'redis')

                {{ logger(tr('warning_error_queue')) }}

                {{--<div class="alert alert-warning">--}}
                {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
                {{--{{tr('warning_error_queue')}}--}}
                {{--</div>--}}
            @endif

            @if(checkSize())
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{tr('max_upload_size')}}
                    <b>{{ini_get('upload_max_filesize')}}</b>&nbsp;&amp;&nbsp;{{tr('post_max_size')}}
                    <b>{{ini_get('post_max_size')}}</b>
                </div>
            @endif

            @if(Setting::get('ffmpeg_installed') == FFMPEG_NOT_INSTALLED)
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{tr('ffmpeg_warning_notes')}}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd">

                <form action="{{route('admin.videos.save.tmdb')}}" method="POST" class="form-horizontal"
                      id="tmdb_video_upload"
                      enctype="multipart/form-data" role="form">
                    @csrf

                    <div class="box-body">

                        {{--                        Hidden Fields--}}
                        @if($tmdbVideo->hasData())
                            <input type="hidden" name="tmdb_video_id" id="tmdb_video_id"
                                   value="{{$tmdbVideo->getID()}}">
                        @endif
                        <input type="hidden" name="admin_video_id" id="admin_video_id" value="{{$model->id}}">
                        <input type="hidden" name="user_time_zone" value="" id="user_time_zone">

                        <div class="row">
                            <div class="col-md-8">
                                {{--                        Title--}}
                                <div class="form-group">
                                    <label for="title" class="control-label"> * {{tr('title')}}</label>
                                    <div class="col-sm-12">
                                        <input type="text" role="title" name="title" maxlength="255"
                                               value="{{$model->title}}" id="title" class="form-control" required
                                               placeholder="Enter Movie title">
                                    </div>
                                </div>

                                {{--                        category--}}
                                <div class="form-group">
                                    <label for="category_id" class="control-label">
                                        * {{tr('category')}}</label>
                                    <div class="col-sm-12">
                                        <select name="category_id" class="form-control input-md" id="category_id"
                                                required>
                                            <option value=""></option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{--                        sub_category--}}
                                <div class="form-group">
                                    <label for="sub_category_id" class="control-label">
                                        * {{tr('sub_category')}}/{{tr('genre')}} </label>
                                    <div class="col-sm-12">
                                        <select name="sub_category_id" class="form-control input-md select2"
                                                id="sub_category_id" required>
                                            <option value=""></option>
                                            @foreach($genres as $genre)
                                                <option value="{{$genre->tmdb_genre_id}}" {{ ($model->genre_id == $genre->tmdb_genre_id) ? 'selected' : ''}}>{{$genre->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{--                        description--}}
                                <div class="form-group">
                                    <label for="description" class="control-label">
                                        * {{tr('description')}}</label>
                                    <div class="col-sm-12">
                                        <textarea name="description" id="description"
                                                  class="form-control">{{ $model->description }}</textarea>
                                    </div>
                                </div>

                            </div> <!--col-md-8 -->


                            <div class="col-md-4">

                                {{--                        ratings--}}
                                <div class="form-group row ">
                                    <label for="ratings" class="col-sm-2 mt-2 control-label"> {{tr('ratings')}}</label>
                                    <div class="col-sm-10">

                                        <div class="row starRating">

                                            <input id="rating5" type="radio" name="ratings" value="5"
                                                   @if($model->ratings == 5) checked @endif>
                                            <label for="rating5">5</label>

                                            <input id="rating4" type="radio" name="ratings" value="4"
                                                   @if($model->ratings == 4) checked @endif>
                                            <label for="rating4">4</label>

                                            <input id="rating3" type="radio" name="ratings" value="3"
                                                   @if($model->ratings == 3) checked @endif>
                                            <label for="rating3">3</label>

                                            <input id="rating2" type="radio" name="ratings" value="2"
                                                   @if($model->ratings == 2) checked @endif>
                                            <label for="rating2">2</label>

                                            <input id="rating1" type="radio" name="ratings" value="1"
                                                   @if($model->ratings == 1) checked @endif>
                                            <label for="rating1">1</label>
                                        </div>
                                    </div>
                                </div>

                                {{--                        main_video_duration--}}
                                <div class="form-group row">

                                    <label for="ratings"
                                           class="col-sm-4 control-label"> {{tr('main_video_duration')}}</label>
                                    <div class="col-sm-7">
                                        @if($model->duration != null)
                                            {{$model->duration}}
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>&nbsp;
                            </div>
                            <div class="col-md-8">

                                {{--                        video--}}
                                <div class="form-group">
                                    <label for="video" class="control-label">{{tr('video')}}</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="video" accept="video/mp4,video/x-matroska"
                                               class="form-control-file" id="video" @if(!$model->id) required @endif/>
                                        <small class="form-text text-muted">{{tr('video_validate')}}</small>
                                    </div>
                                </div>

                                {{--                        trailer_video--}}
                                <div class="form-group">
                                    <label for="trailer_video" class="control-label">{{tr('trailer_video')}}</label>

                                    <small class="form-text">Current Trailer : @if(!empty($model->trailer_video)) <a
                                                class="text-navy"
                                                href="{{$model->trailer_video}}">{{$model->trailer_video}}</a> @else
                                            N/A @endif</small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                {{--                        subtitle--}}
                                <div class="form-group">
                                    <label for="trailer_video" class="control-label">{{tr('subtitle')}}</label>
                                    <div class="col-sm-12">
                                        <input id="video_subtitle" class="form-control-file" type="file"
                                               name="video_subtitle" onchange="checksrt(this, this.id)"/>
                                        <small class="form-text text-muted">{{tr('subtitle_validate')}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>&nbsp;
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-4 image-upload">

                                        <label>{{tr('default_image')}} <span class="asterisk"><i
                                                        class="fa fa-asterisk"></i></span> </label>

                                        <input type="file" id="default_image"
                                               accept="image/png, image/jpeg, image/jpg"
                                               name="default_image"
                                               placeholder="{{tr('default_image')}}"
                                               style="display:none"
                                               onchange="loadFile(this,'default_img')">

                                        <img src="{{$model->default_image ? $model->default_image : asset('images/default.png')}}"
                                             onclick="$('#default_image').click();return false;"
                                             id="default_img">
                                        <p class="img-note">{{tr('video_image_validate')}} {{tr('rectangle_image')}}</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 image-upload">
                                        <label>{{tr('other_image1')}} <span class="asterisk"><i
                                                        class="fa fa-asterisk"></i></span> </label>

                                        <input type="file" id="other_image1"
                                               accept="image/png, image/jpeg, image/jpg"
                                               name="other_image1"
                                               placeholder="{{tr('other_image1')}}"
                                               style="display:none"
                                               onchange="loadFile(this,'other_img1')">

                                        <img src="{{count($videoimages) >= 1 ? $videoimages[0]->image :  asset('images/default.png')}}"
                                             onclick="$('#other_image1').click();return false;"
                                             id="other_img1">

                                        <p class="img-note">{{tr('video_image_validate')}} {{tr('rectangle_image')}}</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 image-upload">
                                        <label>{{tr('other_image2')}} <span class="asterisk"><i
                                                        class="fa fa-asterisk"></i></span> </label>

                                        <input type="file" id="other_image2"
                                               accept="image/png, image/jpeg, image/jpg"
                                               name="other_image2"
                                               placeholder="{{tr('other_image2')}}"
                                               style="display:none"
                                               onchange="loadFile(this,'other_img2')">

                                        <img src="{{count($videoimages) >= 2 ? $videoimages[1]->image :  asset('images/default.png')}}"
                                             onclick="$('#other_image2').click();return false;"
                                             id="other_img2">

                                        <p class="img-note">{{tr('video_image_validate')}} {{tr('rectangle_image')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>&nbsp;
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" id="finish_video"
                                            class="btn btn-success pull-left">{{tr('add_video')}}</button>
                                </div>
                                <div class="col-md-6 col-md-offset-4">

                                   <div class="row">
                                       <div class="progress mt-3" style="height: 15px; width:100%">
                                           <div class="progress-bar bg-success" role="progressbar" style="width:0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                               <span id="percentage_digit">0%</span>
                                           </div>
                                       </div>
                                   </div>


                                    {{--<div class="layer w-100 mT-10">--}}
                                        {{--<span id="percentage_digit"--}}
                                              {{--class="pull-right c-grey-600 fsz-sm ml-2"> 0% </span>--}}
                                        {{--<div class="progress mT-10">--}}
                                            {{--<div class="progress-bar bgc-green-500" role="progressbar"--}}
                                                 {{--aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"--}}
                                                 {{--style="width:10%">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"
            style="display: none" id="error_popup">popup
    </button>
    <!-- popup -->
    <div class="modal fade error-popup" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('images/warning.jpg')}}" class="media-object"
                                 style="width:60px">
                        </div>
                        <div class="media-body ml-3">
                            <h4 class="media-heading">Information</h4>
                            <p id="error_messages_text"></p>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary top" data-dismiss="modal">Okay
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/moment.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/jquery.form.js')}}"></script>

    <script src="{{asset('assets/js/jquery.imgareaselect.js')}}"></script>

    <script src="{{asset('assets/js/jstz.min.js')}}"></script>

    <script type="text/javascript">

        var view_video_url = "{{url('admin/view/video')}}?id=";

        var bar = $('.progress-bar');
        var percent = $('#percentage_digit');

        var error = false;

        $(document).ready(function () {

            $("#user_time_zone").val(jstz.determine().name());


            $('form#tmdb_video_upload').submit(function () {
                window.onbeforeunload = null;
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('form#tmdb_video_upload').ajaxForm({

                beforeSend: function (xhr, opts) {

                    var title = $("#title").val();
                    var description = $("#description").val();
                    var category_id = $("#category_id").val();
                    var sub_category_id = $("#sub_category_id").val();
                    var default_image = document.getElementById("default_img").getAttribute('src');
                    var other_image1 = document.getElementById("other_img1").getAttribute('src');
                    var other_image2 = document.getElementById("other_img2").getAttribute('src');

                    var err = '';

                    if (title == '') err = "Title should not be blank";

                    if (description == '' && err == '') err = "Description should not be blank";

                    if (category_id == '' && err == '') err = "Selete any one of the category from the list.";

                    if (sub_category_id == '' && err == '') err = "Selete any one of the sub category from the list.";

                    if (default_image <= 0 && err == '') err = "Please Choose Default Image.";

                    if (other_image1 <= 0 && err == '') err = "Please Choose first other Image.";

                    if (other_image2 <= 0 && err == '') err = "Please Choose second other Image.";


                    if (err) {
                        console.log("Sumit before sent" + xhr);

                        $("#error_messages_text").html(err);

                        $("#error_popup").click();

                        xhr.abort();

                        return false;
                    }

                    $(".loader-form").show();
                    percent.html('0%');
                    $("#finish_video").text("Wait Progressing...");
                    $("#finish_video").attr('disabled', true);
                    $("#error_message").html("");

                },
                uploadProgress: function (event, position, total, percentComplete) {
                    console.log(total);
                    console.log(position);
                    console.log(event);
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                    if (percentComplete == 100) {
                        $("#finish_video").text("Video Uploading...");
                        $(".loader-form").show();
                        $("#finish_video").attr('disabled', true);
                    }
                },
                complete: function (xhr) {

                    if (!error) {
                        bar.width("100%");
                        percent.html("100%");
                        $("#finish_video").text("Redirecting...");
                        $("#finish_video").attr('disabled', true);

                        console.log(error);
                        console.log("complete" + xhr);
                    } else {
                        var percentVal = '0%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                    }
                },
                error: function (xhr) {

                    bar.width("0%");
                    percent.html('0%');

                    $(".loader-form").fadeOut();
                    $(".loader-form").css('display', 'none');
                    $("#finish_video").text("Finish");
                    $("#finish_video").attr('disabled', false);
                    $("#error_messages_text").html("While Uploading Video some error occured. Please Try Again. Make sure upload file is meets with server upload limit.");
                    $("#error_popup").click();
                    error = true;
                    return false;
                    // console.log(xhr);
                },
                success: function (xhr) {


                    $("#finish_video").text("Finish");

                    $("#finish_video").attr('disabled', false);

                    $(".loader-form").hide();
                    if (xhr.success === true) {
                        window.location.href = view_video_url + xhr.data.id;

                    } else {

                        error = true;

                        var error_msg = xhr;

                        if (typeof xhr.error_messages !== 'undefined') {
                            error_msg = xhr.error_messages
                        }
                        $("#error_messages_text").html(error_msg);

                        $("#error_popup").click();

                        return false;
                    }
                }
            });

        });


        function loadFile(event, id) {
            // alert(event.files[0]);
            var reader = new FileReader();

            reader.onload = function () {
                var output = document.getElementById(id);
                // alert(output);
                output.src = reader.result;
                //$("#imagePreview").css("background-image", "url("+this.result+")");
            };
            reader.readAsDataURL(event.files[0]);
        }

        /**
         * Clear the selected files
         * @param id
         */
        function clearSelectedFiles(id) {
            e = $('#' + id);
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
        }
    </script>


@endsection


