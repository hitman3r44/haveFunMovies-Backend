@extends('layouts.adminator.video')

@section('title', tr('add_video'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('add_video') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{request()->headers->get('referer')}}"><i
                    class="fa fa-video-camera"></i>{{tr('videos')}}</a></li>
    <li class="list-inline-item active"> {{tr('add_video')}}</li>
@endsection

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/plugins/jquery.steps-1.1.0/jquery.steps.css')}}">

@endsection

@section('content')

   <div class="row">
       <div class="col-md-12">
           @if(env('QUEUE_DRIVER') != 'redis')

               {{ logger(tr('warning_error_queue')) }}

           @endif

           @if(checkSize())
               <div class="alert alert-warning">
                   <button type="button" class="close" data-dismiss="alert">×</button>
                   {{tr('max_upload_size')}} <b>{{ini_get('upload_max_filesize')}}</b>&nbsp;&amp;&nbsp;{{tr('post_max_size')}}
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

                <div class="main-content" style="padding: 15px 10px 10px;">

                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="display: none"
                            id="error_popup">popup
                    </button>

                    <!-- popup -->


                    <div id="example">

                        <div class="example-wizard panel panel-primary">
                            <div class="">
                                <!-- Example Wizard START -->
                                <div id="j-bs-wizard-example">
                                    <ul class="nav nav-tabs nav-justified" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#first" role="tab" data-toggle="tab">{{tr('video_details')}}</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#second" role="tab" data-toggle="tab">{{tr('category')}}</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#third" role="tab" data-toggle="tab">{{tr('sub_category')}}</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#fourth" role="tab"
                                               data-toggle="tab">{{tr('upload_video_image')}}</a>
                                        </li>
                                    </ul>
                                    <form method="post" enctype="multipart/form-data" id="upload_video_form"
                                          action="{{route('admin.videos.save')}}">
                                        <div class="tab-content">
                                            <!-- tab1 -->
                                            <div role="tabpanel" class="tab-pane fade in active" id="first">
                                                <p class="note-sec">{{tr('note')}}: <span class="asterisk"><i
                                                                class="fa fa-asterisk"></i></span> {{tr('mandatory_field_notes')}}

                                                    <input type="hidden" name="admin_video_id" id="admin_video_id"
                                                           value="{{$model->id}}">

                                                    <!--  <a href="#" data-toggle="tooltip" title="Hooray!" data-placement="right">Note</a> -->
                                                </p>
                                                <ul class="form-style-7">
                                                    <li>
                                                        <label for="title">{{tr('title')}} <span class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span> </label>
                                                        <input type="text" name="title" maxlength="100" maxlength="255" required
                                                               value="{{$model->title}}" id='title'>
                                                    </li>
                                                    <li>
                                                        <label for="age">{{tr('age')}} <span class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span></label>
                                                        <input type="text" name="age" maxlength="3"
                                                               value="{{$model->age}}" id='age'>
                                                    </li>
                                                    <li>
                                                        <label for="duration">{{tr('trailer_duration')}} <span
                                                                    class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span>(hh:mm:ss)</label>
                                                        <input type="text" name="trailer_duration" maxlength="8"
                                                               data-inputmask="'alias': 'hh:mm:ss'" data-mask
                                                               value="{{$model->trailer_duration}}"
                                                               id="trailer_duration">
                                                    </li>

                                                    <li>
                                                        <label for="duration">{{tr('main_video_duration')}} <span
                                                                    class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span>(hh:mm:ss)</label>
                                                        <input type="text" name="duration" maxlength="8"
                                                               data-inputmask="'alias': 'hh:mm:ss'" data-mask
                                                               value="{{$model->duration}}" id="duration">
                                                    </li>

                                                <!-- <li>
                                                <label for="description">{{tr('description')}} <span class="asterisk"><i class="fa fa-asterisk"></i></span></label>

                                                <textarea name="description" rows="4" class="height-122" id="description">{{$model->description}}</textarea>
                                            </li>-->

                                                    <li class="height-54">
                                                        <label for="reviews">{{tr('ratings')}} <span class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span></label>
                                                        <div class="starRating">
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
                                                    </li>

                                                    <li class="height-54">
                                                        <label for="reviews">{{tr('publish_type')}} <span
                                                                    class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span></label>


                                                        <div class="publish">
                                                            <div class="radio radio-primary radio-inline">
                                                                <input type="radio" id="now" value="{{PUBLISH_NOW}}"
                                                                       name="publish_type"
                                                                       onchange="checkPublishType(this.value)" {{($model->id) ?  (($model->status) ? "checked" : '' ) : 'checked' }} >
                                                                <label for="now"> {{tr('now')}} </label>
                                                            </div>

                                                            <div class="radio radio-primary radio-inline">
                                                                <input type="radio" id="later" value="{{PUBLISH_LATER}}"
                                                                       name="publish_type"
                                                                       onchange="checkPublishType(this.value)" {{($model->id) ?  ((!$model->status) ? "checked" : '' ) : '' }} >
                                                                <label for="later"> {{tr('later')}} </label>
                                                            </div>
                                                        </div>
                                                    </li>


                                                    <li id="time_li" style="display: none;width: 98%;">
                                                        <label for="time">{{tr('publish_time')}} <span class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span></label>
                                                        <input type="text" name="publish_time" id="datepicker"
                                                               value="{{$model->publish_time}}" readonly>
                                                    </li>

                                                    <li>
                                                        <label for="description">{{tr('description')}} <span
                                                                    class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span></label>
                                                        <textarea name="description"
                                                                  rows="4">{{$model->description}}</textarea>
                                                    </li>

                                                    <li>
                                                        <label for="details">{{tr('details')}} <span class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span></label>

                                                        <textarea name="details" rows="4"
                                                                  id='details'>{{$model->details}}</textarea>

                                                    </li>

{{--                                                    <li style="width: 98%" class="cast-list">--}}

{{--                                                        <label for="details">{{tr('cast_crews')}} </label>--}}

{{--                                                        <select id="cast_crews" name="cast_crew_ids[]" class="select2"--}}
{{--                                                                multiple>--}}

{{--                                                            @foreach($cast_crews as $cast_crew)--}}
{{--                                                                <option value="{{$cast_crew->id}}"--}}
{{--                                                                        @if(in_array($cast_crew->id, $video_cast_crews)) selected @endif>{{$cast_crew->name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </li>--}}

                                                </ul>

                                                <div class="clearfix"></div>

                                                <br>

                                            </div>
                                            <!-- tab1 -->
                                            <!-- tab2 -->
                                            <div role="tabpanel" class="tab-pane fade" id="second">
                                                <div class="row">
                                                    @foreach($categories as $category)
                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                                            <a class="category"
                                                               onclick="saveCategory({{$category->id}}, {{REQUEST_STEP_2}})"
                                                               style="cursor: pointer;">
                                                                <div class="category-sec select-box category_list {{($category->id == $model->category_id) ? 'active' : ''}}"
                                                                     id="category_{{$category->id}}">
                                                                    <div class="ribbon"><span><i
                                                                                    class="fa fa-check"></i></span>
                                                                    </div>
                                                                    <img src="{{$category->picture}}"
                                                                         class="category-sec-img">
                                                                </div>
                                                                <h4 class="category-sec-title">{{$category->name}}</h4>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                    <input type="hidden" name="category_id" id="category_id"
                                                           value="{{$model->category_id}}"/>
                                                </div>
                                            </div>
                                            <!-- tab2 -->
                                            <!-- tab3-->
                                            <div role="tabpanel" class="tab-pane fade" id="third">
                                                <div class="row" id="sub_category">

                                                    @if($model->category_id)

                                                        @foreach($sub_categories as $sub_category)
                                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                                                <a class="category"
                                                                   onclick="saveSubCategory({{$sub_category->id}}, {{REQUEST_STEP_3}})"
                                                                   style="cursor: pointer;">
                                                                    <div class="category-sec select-box sub_category_list {{($sub_category->id == $model->sub_category_id) ? 'active' : ''}}"
                                                                         id="sub_category_{{$sub_category->id}}">
                                                                        <div class="ribbon"><span><i
                                                                                        class="fa fa-check"></i></span>
                                                                        </div>
                                                                        <img src="{{$sub_category->picture}}"
                                                                             class="category-sec-img">
                                                                    </div>
                                                                    <h4 class="category-sec-title">{{$sub_category->name}}</h4>
                                                                </a>
                                                            </div>
                                                        @endforeach

                                                    @endif

                                                </div>

                                                <input type="hidden" name="sub_category_id" id="sub_category_id"
                                                       value="{{$model->sub_category_id}}"/>
                                            </div>
                                            <!-- tab3 -->
                                            <!-- tab4 -->
                                            <div role="tabpanel" class="tab-pane fade" id="fourth">

                                                <p class="note-sec">{{tr('note')}}:
                                                    <span class="asterisk"><i
                                                                class="fa fa-asterisk"></i></span> {{tr('mandatory_field_notes')}}
                                                </p>
                                                <!-- select -->
                                                <ul class="form-style-7">
                                                    <li id="genre_id">

                                                        <label for="genre">{{tr('select_genre')}}
                                                            <span class="asterisk"><i class="fa fa-asterisk"></i></span>
                                                        </label>
                                                        <select class="form-control" id="genre" disabled
                                                                name="genre_id">
                                                            <option value="">{{tr('select_genre')}}</option>
                                                        </select>
                                                    </li>

                                                    <li style="border:0 !important;padding-left: 0 !important;padding-top: 17px;">

                                                        <label class="label-cls">{{tr('video_type')}} <span
                                                                    class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span> </label>

                                                        <div class="margin-videotype">
                                                            <div class="radio radio-primary radio-inline">
                                                                <input type="radio" id="video_upload_link"
                                                                       value="{{VIDEO_TYPE_UPLOAD}}" name="video_type"
                                                                       onchange="videoUploadType(this.value,0)" {{$model->id ? ($model->video_type == VIDEO_TYPE_UPLOAD ? 'checked': ''):'checked'}}>
                                                                <label for="video_upload_link"> {{tr('video_upload_link')}} </label>
                                                            </div>
                                                            <div class="radio radio-inline radio-primary" id="youtube">
                                                                <input type="radio" id="youtube_link"
                                                                       value="{{VIDEO_TYPE_YOUTUBE}}" name="video_type"
                                                                       onchange="videoUploadType(this.value,0)" {{$model->id ? ($model->video_type == VIDEO_TYPE_YOUTUBE ? 'checked': ''):''}}>
                                                                <label for="youtube_link"> {{tr('youtube')}} </label>
                                                            </div>
                                                            <div class="radio radio-inline radio-primary"
                                                                 id="other_link">
                                                                <input type="radio" id="other_links"
                                                                       value="{{VIDEO_TYPE_OTHER}}" name="video_type"
                                                                       onchange="videoUploadType(this.value,0)" {{$model->id ? ($model->video_type == VIDEO_TYPE_OTHER ? 'checked': ''):''}}>
                                                                <label for="other_links"> {{tr('other_link')}} </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                                <!-- radio and checkbox -->
                                                <div class="row manual_video_upload">
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="mb-30">
                                                            <div>
                                                                {{--<label class="label-cls">{{tr('compress_video')}}<span--}}
                                                                            {{--class="asterisk"><i--}}
                                                                                {{--class="fa fa-asterisk"></i></span>--}}
                                                                {{--</label>--}}
                                                            </div>
                                                            {{--<div class="radio radio-primary radio-inline">--}}
                                                                {{--<input type="radio" id="COMPRESS_ENABLED"--}}
                                                                       {{--name="compress_video"--}}
                                                                       {{--value="{{COMPRESS_ENABLED}}">--}}
                                                                {{--<label for="COMPRESS_ENABLED"> {{tr('yes')}} </label>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="radio radio-inline radio-primary">--}}
                                                                {{--<input type="radio" id="COMPRESS_DISABLED"--}}
                                                                       {{--name="compress_video"--}}
                                                                       {{--value="{{COMPRESS_DISABLED}}" checked>--}}
                                                                {{--<label for="COMPRESS_DISABLED"> {{tr('no')}} </label>--}}
                                                            {{--</div>--}}
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="mb-30">
                                                            <div>
                                                                <label class="label-cls">{{tr('video_upload_type')}}
                                                                    <span class="asterisk"><i
                                                                                class="fa fa-asterisk"></i></span>
                                                                </label>
                                                            </div>
                                                            @if(check_s3_configure())
                                                                <div class="radio radio-primary radio-inline">
                                                                    <input type="radio" id="s3"
                                                                           value="{{VIDEO_UPLOAD_TYPE_s3}}"
                                                                           name="video_upload_type">
                                                                    <label for="s3">{{tr('s3')}}</label>
                                                                </div>
                                                            @endif
                                                            <div class="radio radio-inline radio-primary">
                                                                <input type="radio" id="direct"
                                                                       value="{{VIDEO_UPLOAD_TYPE_DIRECT}}"
                                                                       name="video_upload_type" checked>
                                                                <label for="direct">{{tr('direct')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="mb-30">
                                                            <div>
                                                                <label class="label-cls">{{tr('main_resize_video_resolutions')}}
                                                                    <span class="asterisk"><i
                                                                                class="fa fa-asterisk"></i></span>
                                                                </label>
                                                            </div>

                                                            @foreach(getVideoResolutions() as $key => $resolution)
                                                                <div class="checkbox checkbox-inline checkbox-primary"
                                                                     style="{{$key == 0 ? '' : ''}}">
                                                                    <input type="checkbox"
                                                                           id="main_{{$resolution->value}}"
                                                                           value="{{$resolution->value}}"
                                                                           name="video_resolutions[]"
                                                                           @if(in_array($resolution->value, $model->trailer_video_resolutions)) checked @endif>
                                                                    <label for="main_{{$resolution->value}}">{{$resolution->value}} </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="mb-30">
                                                            <div>
                                                                <label class="label-cls">{{tr('trailer_resize_video_resolutions')}}
                                                                    <span class="asterisk"><i
                                                                                class="fa fa-asterisk"></i></span>
                                                                </label>
                                                            </div>
                                                            @foreach(getVideoResolutions() as $i => $resolution)
                                                                <div class="checkbox checkbox-inline checkbox-primary"
                                                                     style="{{$i == 0 ? '' : 'padding-left:10px'}}">
                                                                    <input type="checkbox"
                                                                           id="trailer_{{$resolution->value}}"
                                                                           value="{{$resolution->value}}"
                                                                           name="trailer_video_resolutions[]"
                                                                           @if(in_array($resolution->value, $model->trailer_video_resolutions))  checked @endif>
                                                                    <label for="trailer_{{$resolution->value}}">{{$resolution->value}} </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>


                                                </div>
                                                <!-- upload  video section -->

                                                <ul class="form-style-7 manual_video_upload">

                                                    <!-- video -->

                                                    <li>
                                                        <label for="title">{{tr('video')}} <span class="asterisk"><i
                                                                        class="fa fa-asterisk"></i></span> </label>
                                                        <p class="img-note mb-10">{{tr('video_validate')}}</p>
                                                        <div class="">
                                                            <div class="">
                                                                <label class="">
                                                                <!-- <div class="btn btn-primary btn-sm">{{tr('browse')}}</div> -->
                                                                    <input type="file" name="video"
                                                                           accept="video/mp4,video/x-matroska"
                                                                           id="video" @if(!$model->id) required @endif/>
                                                                </label>
                                                            </div>
                                                            <!--   <div id="file_input_text_div" class="mdl-textfield mdl-js-textfield textfield-demo">
                                                                  <input class="file_input_text mdl-textfield__input" type="text" readonly id="file_input_text" />
                                                                  <label class="mdl-textfield__label" for="file_input_text"></label>
                                                              </div> -->
                                                        </div>

                                                    </li>

                                                    <li>
                                                        <label for="title">{{tr('trailer_video')}}</label>

                                                        <p class="img-note mb-10">{{tr('video_validate')}}</p>

                                                        <div class="">
                                                            <div class="">
                                                                <label class="">
                                                                <!-- <div class="btn btn-primary btn-sm">{{tr('browse')}}</div> -->
                                                                    <input type="file" name="trailer_video"
                                                                           accept="video/mp4,video/x-matroska"
                                                                           id="trailer_video"/>
                                                                </label>
                                                            </div>
                                                            <!--  <div id="file_input_text_div" class="mdl-textfield mdl-js-textfield textfield-demo">
                                                                 <input class="file_input_text mdl-textfield__input" type="text" readonly id="file_input_text" />
                                                                 <label class="mdl-textfield__label" for="file_input_text"></label>
                                                             </div> -->
                                                        </div>

                                                    </li>

                                                    <li>

                                                        <label for="title">{{tr('subtitle')}}</label>
                                                        <p class="img-note mb-10">{{tr('subtitle_validate')}}</p>
                                                        <div class="">
                                                            <div class="">
                                                                <label class="">
                                                                <!--  <div class="btn btn-primary btn-sm">{{tr('browse')}}</div> -->
                                                                    <input id="video_subtitle" type="file"
                                                                           name="video_subtitle"
                                                                           onchange="checksrt(this, this.id)"/>
                                                                </label>
                                                            </div>
                                                            <!--  <div id="file_input_text_div" class="mdl-textfield mdl-js-textfield textfield-demo">
                                                                 <input class="file_input_text mdl-textfield__input" type="text" readonly id="file_input_text" />
                                                                 <label class="mdl-textfield__label" for="file_input_text"></label>
                                                             </div> -->
                                                        </div>

                                                    </li>

                                                    <li>

                                                        <label for="title">{{tr('subtitle')}}</label>
                                                        <p class="img-note mb-10">{{tr('subtitle_validate')}}</p>
                                                        <div class="">
                                                            <div class="">
                                                                <label class="">
                                                                <!-- <div class="btn btn-primary btn-sm">{{tr('browse')}}</div> -->
                                                                    <input id="trailer_subtitle" type="file"
                                                                           name="trailer_subtitle"
                                                                           onchange="checksrt(this, this.id)"
                                                                           id="trailer_subtitle"/>
                                                                </label>
                                                            </div>
                                                            <!--  <div id="file_input_text_div" class="mdl-textfield mdl-js-textfield textfield-demo">
                                                                 <input class="file_input_text mdl-textfield__input" type="text" readonly id="file_input_text" />
                                                                 <label class="mdl-textfield__label" for="file_input_text"></label>
                                                             </div> -->
                                                        </div>

                                                    </li>

                                                </ul>

                                                <!-- upload  video section -->
                                                <ul class="form-style-7 others">
                                                    <!-- video -->
                                                    <li>
                                                        <label for="trailer_video">
                                                            {{tr('trailer_video')}}
                                                            <span class="asterisk"><i class="fa fa-asterisk"></i></span>
                                                        </label>
                                                        <input type="url" name="trailer_video" maxlength="256"
                                                               id="other_trailer_video">
                                                    </li>

                                                    <li>
                                                        <label for="video">{{tr('video')}}
                                                            <span class="asterisk"><i class="fa fa-asterisk"></i></span>
                                                        </label>
                                                        <input type="url" name="video" maxlength="256" id="other_video">
                                                    </li>

                                                </ul>

                                                <div class="clearfix"></div>

                                                <div style="margin-bottom: 10px;">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="checkbox checkbox-inline checkbox-primary">
                                                                <input type="checkbox" value="1"
                                                                       name="send_notification" @if(!$model->id) checked
                                                                       @endif id="send_notification">
                                                                <label for="send_notification">{{tr('send_notification')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- select image section -->
                                                <div>
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

                                                            <!-- <div id="default_image"></div> -->

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

                                                            <!-- <div id="other_image1"></div> -->

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

                                                            <!-- <div id="other_image2"></div> -->

                                                            <p class="img-note">{{tr('video_image_validate')}} {{tr('rectangle_image')}}</p>
                                                        </div>
                                                    </div>


                                                    <div class="progress">
                                                        <div class="bar"></div>
                                                        <div class="percent">0%</div>
                                                    </div>


                                                    <div class="clearfix"></div>

                                                    @if(Setting::get('admin_delete_control') == 1)

                                                        <button disabled class="btn  btn-primary finish-btn"
                                                                type="submit" id="finish_video"><i
                                                                    class="fa fa-arrow-right" aria-hidden="true"></i>
                                                            &nbsp; Finish
                                                        </button>

                                                    @else
                                                        <button class="btn  btn-primary finish-btn" type="submit"
                                                                id="finish_video"><i class="fa fa-arrow-right"
                                                                                     aria-hidden="true"></i> &nbsp;
                                                            Finish
                                                        </button>
                                                    @endif
                                                </div>


                                            </div>
                                            <!-- tab4 -->
                                        </div>
                                        <input type="hidden" name="timezone"
                                               value="{{ Auth::guard('admin')->user()->timezone }}">
                                    </form>
                                </div>
                                <!-- Example Wizard END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay">
        <div id="loading-img"></div>
    </div>

   <div class="modal fade error-popup" id="myModal" role="dialog">

       <div class="modal-dialog">

           <div class="modal-content">

               <div class="modal-body">

                   <div class="media">

                       <div class="media-left">

                           <img src="{{asset('images/warning.jpg')}}" class="media-object"
                                style="width:60px">

                       </div>

                       <div class="media-body">

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

   <form id="example-advanced-form" action="#">
       <h3>{{tr('video_details')}}</h3>
       <fieldset>
           <legend>Account Information</legend>

           <label for="userName-2">User name *</label>
           <input id="userName-2" name="userName" type="text" class="required">
           <label for="password-2">Password *</label>
           <input id="password-2" name="password" type="text" class="required">
           <label for="confirm-2">Confirm Password *</label>
           <input id="confirm-2" name="confirm" type="text" class="required">
           <p>(*) Mandatory</p>
       </fieldset>

       <h3>Profile</h3>
       <fieldset>
           <legend>Profile Information</legend>

           <label for="name-2">First name *</label>
           <input id="name-2" name="name" type="text" class="required">
           <label for="surname-2">Last name *</label>
           <input id="surname-2" name="surname" type="text" class="required">
           <label for="email-2">Email *</label>
           <input id="email-2" name="email" type="text" class="required email">
           <label for="address-2">Address</label>
           <input id="address-2" name="address" type="text">
           <label for="age-2">Age (The warning step will show up if age is less than 18) *</label>
           <input id="age-2" name="age" type="text" class="required number">
           <p>(*) Mandatory</p>
       </fieldset>

       <h3>Warning</h3>
       <fieldset>
           <legend>You are to young</legend>

           <p>Please go away ;-)</p>
       </fieldset>

       <h3>Finish</h3>
       <fieldset>
           <legend>Terms and Conditions</legend>

           <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
       </fieldset>
   </form>

@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/moment.min.js')}}"></script>
    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('admin-css/plugins/jquery.form.js')}}"></script>

    <script src="{{asset('assets/plugins/jquery.steps-1.1.0/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery.validate/jquery.validate.min.js')}}"></script>


    <script>
        var form = $("#example-advanced-form").show();

        form.steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex)
                {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age-2").val()) < 18)
                {
                    return false;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Used to skip the "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
                {
                    form.steps("next");
                }
                // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    form.steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                alert("Submitted!");
            }
        }).validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password-2"
                }
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).ready(function () {
            //Initialize tooltips
            $('.nav-tabs > li a[title]').tooltip();

            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });
        });

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }

        /**
         * Function Name : saveVideoDetails()
         * To save first step of the job details
         *
         * @var step        Step Position 1
         *
         * @return Json response
         */
        function saveVideoDetails(step) {
            var title = $("#title").val();
            var datepicker = $("#datepicker").val();
            var duration = $("#duration").val();

            var rating5 = $("#rating5").val();
            var rating4 = $("#rating4").val();
            var rating3 = $("#rating3").val();
            var rating2 = $("#rating2").val();
            var rating1 = $("#rating1").val();

            var age = $("#age").val();

            var description = $("#description").val();
            var reviews = $("#reviews").val();

            var is_banner = $("#is_banner").val();

            if (title == '') {
                alert('Title Should not be blank');
                return false;
            }
            if (datepicker == '') {
                alert('Publish Time Should not be blank');
                return false;
            }
            if (duration == '') {
                alert('Duration Should not be blank');
                return false;
            }

            if (is_banner == 1) {

            } else {

                if(age == '') {

                    alert('Age Should not be blank');
                    return false;

                } else {

                    if (/^[0-9 +]+$/.test(age)) {


                    } else {

                        $("#age").val("");

                        alert("Age Wrong Format");

                        return false;

                    }
                }

            }


            /* if (rating == '') {
                  alert('Ratings Should not be blank');
                  return false;
             }*/
            if (description == '') {
                alert('Description Should not be blank');
                return false;
            }
            if (reviews == '') {
                alert('Reviews Should not be blank');
                return false;
            }

            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            $("#"+step).click();
        }


        /**
         * Function Name : saveCategory()
         * To save second step of the job details
         *
         * @var category_id Category Id (Dynamic values)
         * @var step        Step Position 2
         *
         * @return Json response
         */
        function saveCategory(category_id, step) {
            var categoryId = $("#category_id").val(category_id);

            $(".category_list").removeClass('active');

            $("#category_"+category_id).addClass('active');
            displaySubCategory(category_id, step);
        }

        /**
         * Function Name : displaySubCategory()
         * To Display all sub categories based on category id
         *
         * @var category_id    Selected Category id
         *
         * @return Json Response
         */
        function displaySubCategory(category_id,step) {
            $("#sub_category").html("<p class='text-center'><i class='fa fa-spinner'></i></p>");
            $.ajax ({
                type : 'post',
                url : cat_url,
                data : {option: category_id},
                success : function(data) {
                    $("#sub_category").html("");
                    // console.log(data);return false;
                    if (data == undefined) {
                        alert("Oops Something went wrong. Kindly contact your administrator.");
                        return false;
                    }
                    if (data.length == 0) {
                        alert('No sub categories available. Kindly contact support team.');
                        return false;
                    }
                    var subcategory = '';
                    for(var i=0; i < data.length; i++) {
                        var value = data[i];
                        subcategory += '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">'+
                            '<a class="category" onclick="saveSubCategory('+value.id+', '+step3+')">'+
                            '<div class="category-sec select-box sub_category_list" id="sub_category_'+value.id+'">'+
                            '  <div class="ribbon"><span><i class="fa fa-check"></i></span></div>'+
                            '<img src="'+value.picture+'" class="category-sec-img">'+
                            '</div><h4 class="category-sec-title">'+value.name+'</h4>'+
                            '</a>'+
                            '</div>';
                    }
                    $("#sub_category").append(subcategory);

                    //$(".j-bs-wizard--action-btn-next").click();
                },
                error : function(data) {
                    alert("Oops Something went wrong. Kindly contact your administrator.");
                }
            });
        }

        /**
         * Function Name : saveSubCategory()
         * To save third step of the job details
         *
         * @var sub_category_id     Sub Category Id (Dynamic values)
         * @var step                Step Position 3
         *
         * @return Json response
         */
        function saveSubCategory(sub_category_id, step) {
            var subCategoryId = $("#sub_category_id").val(sub_category_id);

            $(".sub_category_list").removeClass('active');

            $("#sub_category_"+sub_category_id).addClass('active');

            $("#"+step).click();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax ({
                type : 'post',
                url : sub_cat_url,
                data : {option: sub_category_id},
                success : function(data) {
                    $('#genre').empty();

                    $('#genre').append("<option value=''>Select genre</option>");

                    $("#trailer_video").attr('required', true);

                    if(data.length != 0) {

                        $("#genre_id").show();

                        document.getElementById("genre").disabled=false;

                        $("#genre").attr('required', true);

                        $("#trailer_video").attr('required', false);

                    } else {

                        $("#genre_id").hide();

                        document.getElementById("genre").disabled=true;


                        if (video_id) {

                            $("#trailer_video").attr('required', false);

                        }
                    }

                    $.each(data, function(index, element) {
                        $('#genre').append("<option value='"+ element.id +"'>" + element.name + "</option>");
                    });
                },
                error : function(data) {
                    alert("Oops Something went wrong. Kindly contact your administrator.");
                }
            });
        }


        function loadGenre() {
            var subCategoryId = $("#sub_category_id").val();
            // var genre_id = $("#genre").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax ({
                type : 'post',
                url : sub_cat_url,
                data : {option: subCategoryId},
                success : function(data) {
                    console.log(data);
                    $('#genre').empty();

                    $('#genre').append("<option value=''>Select genre</option>");

                    if(data.length != 0) {
                        $("#genre_id").show();
                        document.getElementById("genre").disabled=false;
                    } else {
                        $("#genre_id").hide();
                        document.getElementById("genre").disabled=true;
                    }

                    $.each(data, function(index, element) {
                        $('#genre').append("<option value='"+ element.id +"'>" + element.name + "</option>");
                    });
                    $("#genre").val(genreId);
                },
                error : function(data) {
                    alert("Oops Something went wrong. Kindly contact your administrator.");
                }
            });
        }


        var bar = $('.bar');
        var percent = $('.percent');

        var error = false;

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('form').ajaxForm({

            beforeSend: function(xhr,opts) {

                var title = $("#title").val();
                var age = $("#age").val();
                var trailer_duration = $("#trailer_duration").val();
                var duration = $("#duration").val();
                var description = $("#description").val();
                var ratings = $("input[name='ratings']:checked").val();
                var publish_type = $("input[name='publish_type']:checked").val();
                var datepicker = $("#datepicker").val();
                var details = $("#details").val();
                var category_id = $("#category_id").val();
                var sub_category_id = $("#sub_category_id").val();

                var default_image =  document.getElementById("default_image").files.length;

                var other_image1 =  document.getElementById("other_image1").files.length;

                var other_image2 =  document.getElementById("other_image2").files.length;

                var err = '';

                if (title == '') {

                    err = "Title should not be blank";

                }

                if (age == '' && err == '') {

                    err = "Age should not be blank";

                }

                if (age != '' && err == '') {

                    if (/^[0-9 +]+$/.test(age)) {


                    } else {

                        $("#age").val("");

                        err = "Age wrong format..!";

                    }

                }


                if (trailer_duration == '' && err == '') {

                    err = "Trailer Duration should not be blank";

                }

                if (duration == '' && err == '') {

                    err = "Duration should not be blank";

                }

                if (description == '' && err == '') {

                    err = "Description should not be blank";

                }

                if ((ratings <= 0 || ratings == undefined) && err == '') {

                    err = "Ratings should not be blank";

                }

                if (publish_type == 2 && datepicker == '' && err == '') {

                    err = "Publish Time should not be blank";

                }

                if (details == '' && err == '') {

                    err = "Details should not be blank";

                }

                if (category_id == '' && err == '') {

                    err = "Selete any one of the category from the list.";

                }

                if (sub_category_id == '' && err == '') {

                    err = "Selete any one of the sub category from the list.";

                }

                if (!video_id || video_id <= 0 || video_id == null) {

                    if (default_image <= 0 && err == '') {

                        err = "Please Choose Default Image.";

                    }

                    if (other_image1 <= 0 && err == '') {

                        err = "Please Choose first other Image.";

                    }

                    if (other_image2 <= 0 && err == '') {

                        err = "Please Choose second other Image .";

                    }

                }

                if (err) {

                    $("#error_messages_text").html(err);

                    $("#error_popup").click();

                    xhr.abort();

                    return false;
                }

                $(".loader-form").show();
                var percentVal = '0%';
                bar.width(percentVal)
                percent.html(percentVal);
                $("#finish_video").text("Wait Progressing...");
                $("#finish_video").attr('disabled', true);
                $("#error_message").html("");

            },
            uploadProgress: function(event, position, total, percentComplete) {
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
            complete: function(xhr) {

                if(!error)  {
                    bar.width("100%");
                    percent.html("100%");
                    $("#finish_video").text("Redirecting...");
                    $("#finish_video").attr('disabled', true);

                    console.log(error);
                    console.log("complete"+xhr);
                } else {
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                }
            },
            error : function(xhr) {

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
            success : function(xhr) {


                $("#finish_video").text("Finish");

                $("#finish_video").attr('disabled', false);

                $(".loader-form").hide();

                if (xhr.response.success) {

                    window.location.href= view_video_url+xhr.response.data.id;

                } else {

                    error = true;

                    $("#error_messages_text").html(xhr.response.error_messages);

                    $("#error_popup").click();

                    return false;
                }
            }
        });

        function loadFile(event, id){
            // alert(event.files[0]);
            var reader = new FileReader();

            reader.onload = function(){
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
            e = $('#'+id);
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
        }

        function checksrt(e,id) {

            console.log(e.files[0].type);

            console.log(e.files[0].type == '');

            if(e.files[0].type == "application/x-subrip" || e.files[0].type == '') {


            } else {

                alert("Please select '.srt' files");

                clearSelectedFiles(id);

            }

            return false;
        }


    </script>



    {{--<script src="{{asset('assets/js/upload-video.js')}}"></script>--}}

    <script type="text/javascript">

        // $('.multipleSelect').select2();

        var banner_image = "{{$model->is_banner}}";

        var cat_url = "{{ url('select/sub_category')}}";
        var step3 = "{{REQUEST_STEP_3}}";
        var sub_cat_url = "{{ url('select/genre')}}";
        var final = "{{REQUEST_STEP_FINAL}}";

        var video_id = "{{$model->id}}";
        var genreId = "{{$model->genre_id}}";

        var video_type = "{{$model->video_type}}";

        var view_video_url = "{{url('admin/view/video')}}?id=";

        $('#datepicker').datetimepicker({
            minTime: "00:00:00",
            minDate: moment(),
            autoclose: true,
            format: 'dd-mm-yyyy hh:ii',
        });

        $('.manual_video_upload').show();

        $('.others').hide();

        $("#video_upload").change(function () {

            $(".manual_video_upload").show();

            $(".others").hide();

        });

        $("#youtube").change(function () {

            $(".others").show();

            $(".manual_video_upload").hide();

        });

        $("#other_link").change(function () {

            $(".others").show();

            $(".manual_video_upload").hide();

        });

        function videoUploadType(value, autoload_status) {

            // On initialization, show others videos section

            $(".others").show();

            $("#other_video").attr('required', true);

            $("#other_trailer_video").attr('required', true);

            if (autoload_status == 0) {

                $("#video").attr('required', true);

                $("#trailer_video").attr('required', true);

            }

            $(".manual_video_upload").hide();

            $("#other_video").val("{{$model->video}}");

            $("#other_trailer_video").val("{{$model->trailer_video}}");

            if (value == "{{VIDEO_TYPE_UPLOAD}}") {

                $("#other_video").val("");

                $("#other_trailer_video").val("");

                $(".manual_video_upload").show();

                $(".others").hide();

                $("#other_video").attr('required', false);

                $("#other_trailer_video").attr('required', false);

                // If admin editing the video means remove the required fields for video & trailer video (If already in VIDEO_TYPE_UPLOAD)

                @if($model->video_type == VIDEO_TYPE_UPLOAD)

                $("#video").attr('required', false);

                $("#trailer_video").attr('required', false);

                @endif

            }

            if ((value == "{{VIDEO_TYPE_OTHER}}" || value == "{{VIDEO_TYPE_YOUTUBE}}") && autoload_status == 0) {

                $("#other_video").val("");

                $("#other_trailer_video").val("");

                if (("{{$model->video_type}}" == value) || ("{{$model->video_type}}" == value)) {

                    $("#other_video").val("{{$model->video}}");

                    $("#other_trailer_video").val("{{$model->trailer_video}}");

                }

                $("#video").attr('required', false);

                $("#trailer_video").attr('required', false);
            }

            if ((value == "{{VIDEO_TYPE_OTHER}}" || value == "{{VIDEO_TYPE_YOUTUBE}}") && autoload_status == 0) {

                $("#other_video").val("");

                $("#other_trailer_video").val("");
            }

        }

        @if($model->id && !$model->status)

        checkPublishType("{{PUBLISH_LATER}}");

        $("#datepicker").val("{{$model->publish_time}}");

        @endif

        @if($model->id)

        videoUploadType("{{$model->video_type}}", 1);

        //saveCategory("{{$model->category_id}}", "{{REQUEST_STEP_3}}");

        @endif

        function checkPublishType(val) {
            $("#time_li").hide();
            //$("#datepicker").prop('required',false);
            $("#datepicker").val("");
            if (val == 2) {
                $("#time_li").show();
                // $("#datepicker").prop('required',true);
            }
        }

    </script>

    <script>
        $('form').submit(function () {
            window.onbeforeunload = null;
        });


        window.onbeforeunload = function () {
            return "Data will be lost if you leave the page, are you sure?";
        };

        loadGenre(genreId);

        window.setTimeout(function () {

            @if($model->genre_id)

            $("#genre select").val("{{$model->genre_id}}");

            @endif

        }, 2000);


    </script>








    //*********************************************************************
    {{--<script>--}}
        {{--var form = $("#VisaRecommendationForm").show();--}}
        {{--form.find('#save_as_draft').css('display','none');--}}
        {{--form.find('#submitForm').css('display', 'none');--}}
        {{--form.find('.actions').css('top','-15px !important');--}}
        {{--form.steps({--}}
            {{--headerTag: "h3",--}}
            {{--bodyTag: "fieldset",--}}
            {{--transitionEffect: "slideLeft",--}}
            {{--onStepChanging: function (event, currentIndex, newIndex) {--}}
                {{--if(newIndex == 1) {--}}
                    {{--var visaCategoryIsSelect = $('input[name=app_type_mapping_id]:checked').length;--}}
                    {{--if(visaCategoryIsSelect != 1){--}}
                        {{--//$(".visaTypeTab").css({"border": "1px solid red"});--}}
                        {{--alert('Sorry! You must select any one of the Visa types.');--}}
                        {{--return false;--}}
                    {{--}--}}
                {{--}--}}

                {{--if(newIndex == 2){}--}}

                {{--// Always allow previous action even if the current form is not valid!--}}
                {{--if (currentIndex > newIndex){--}}
                    {{--return true;--}}
                {{--}--}}
                {{--// Forbid next action on "Warning" step if the user is to young--}}
                {{--if (newIndex === 3 && Number($("#age-2").val()) < 18)--}}
                {{--{--}}
                    {{--return false;--}}
                {{--}--}}
                {{--// Needed in some cases if the user went back (clean up)--}}
                {{--if (currentIndex < newIndex)--}}
                {{--{--}}
                    {{--// To remove error styles--}}
                    {{--form.find(".body:eq(" + newIndex + ") label.error").remove();--}}
                    {{--form.find(".body:eq(" + newIndex + ") .error").removeClass("error");--}}
                {{--}--}}
                {{--form.validate().settings.ignore = ":disabled,:hidden";--}}
                {{--return form.valid();--}}
            {{--},--}}
            {{--onStepChanged: function (event, currentIndex, priorIndex) {--}}
                {{--if (currentIndex != 0) {--}}
                    {{--form.find('#save_as_draft').css('display','block');--}}
                    {{--form.find('.actions').css('top','-42px');--}}
                {{--} else {--}}
                    {{--form.find('#save_as_draft').css('display','none');--}}
                    {{--form.find('.actions').css('top','-15px');--}}
                {{--}--}}

                {{--if(currentIndex == 5) {--}}
                    {{--form.find('#submitForm').css('display','block');--}}

                    {{--$('#submitForm').on('click', function (e) {--}}
                        {{--form.validate().settings.ignore = ":disabled";--}}
                        {{--//console.log(form.validate().errors()); // show hidden errors in last step--}}
                        {{--return form.valid();--}}
                    {{--});--}}
                {{--} else {--}}
                    {{--form.find('#submitForm').css('display','none');--}}
                {{--}--}}
            {{--},--}}
            {{--onFinishing: function (event, currentIndex) {--}}
                {{--form.validate().settings.ignore = ":disabled";--}}
                {{--//console.log(form.validate().errors()); // show hidden errors in last step--}}
                {{--return form.valid();--}}
            {{--},--}}
            {{--onFinished: function (event, currentIndex) {--}}
                {{--errorPlacement: function errorPlacement(error, element) {--}}
                    {{--element.before(error);--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}


@endsection


