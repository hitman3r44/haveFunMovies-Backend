@extends('layouts.adminator.master')

@section('title', tr('view_video'))

@section('content-header')
    <div class="col-md-4">
        <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_video') }}</h4>
    </div>
{{--    <div class="col-md-8">--}}

{{--        <a href="#" id="help-popover" class="btn btn-danger" style="font-size: 14px;font-weight: 600"--}}
{{--           title="Any Help ?">HELP ?</a>--}}

{{--        <div id="help-content" style="display: none">--}}

{{--            <ul class="popover-list">--}}
{{--                <li><b>{{tr('redeems')}} - </b>{{tr('moderator_earnings')}}</li>--}}
{{--                <li><b>{{tr('viewers_cnt')}} - </b>{{tr('total_watch_count')}} </li>--}}
{{--                <li><b>{{tr('ppv_created_by')}} - </b>{{tr('admin_moderator_names')}} </li>--}}
{{--            </ul>--}}

{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('styles')

    <style>

        hr {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .box-title {
            line-height: 1.5;
        }

        .ppv-amount-label {

            font-size: 16px;

        }

        .ppv-amount-label label {
            padding: 8px 15px;
        }

        .info-box {
            box-shadow: 1px 0px 3px 3px rgba(0, 0, 0, 0.1);
        }

        #revenue-section {
            margin-top: 20px !important;
        }

    </style>


@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
@endsection

@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.videos')}}"><i class="fa fa-video-camera"></i> {{tr('videos')}}
        </a></li>
    <li class="list-inline-item active">{{tr('video')}}</li>
@endsection

@section('content')

    <?php $url = $trailer_url = ""; ?>

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-400 p-10">
                    <div class="col-md-6">
                        <div class='pull-left'>

                            <h3 class="box-title">
                                <b>{{$video->title}}</b>
                            </h3>
                            <p> {{tr('created_at')}}
                                : {{convertTimeToUSERzone($video->video_date, Auth::user()->timezone, 'd-m-Y h:i A')}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">

{{--                        <div class='pull-right'>--}}
{{--                            <a href="{{route('admin.videos.edit' , array('id' => $video->video_id))}}"--}}
{{--                               class="btn bg-orange text-uppercase">--}}
{{--                                <i class="fa fa-pencil"></i>--}}
{{--                                <b>{{tr('edit')}}</b>--}}
{{--                            </a>                            --}}
{{--                        </div>--}}

                    </div>
                </div>

                <div class="box-body">

                    @if( $video->is_pay_per_view)

                        <h3 style="margin-top: 0">{{tr('pay_per_view')}}</h3>

                        <hr>

                        <section id="revenue-section">

                            <div class="row">

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-blue"><i class="fa fa-money"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">{{tr('total')}}</span>
                                            <span class="info-box-number">
                                                {{Setting::get('currency')}} {{$video->admin_amount + $video->user_amount}}
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">{{tr('admin_amount')}}</span>
                                            <span class="info-box-number">
                                                {{Setting::get('currency')}} {{$video->admin_amount ? $video->admin_amount : 0.00}}
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">{{tr('moderator_amount')}}</span>
                                            <span class="info-box-number">
                                                {{Setting::get('currency')}} {{$video->user_amount ? $video->user_amount : 0.00}}
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                            </div>

                            <hr>

                        </section>

                    @endif


                    <a class="btn bg-maroon btn-flat margin">

                        <i class="fa fa-thumbs-up"></i>
                        {{number_format_short($video->getScopeLikeCount->count())}} {{tr('likes')}}
                    </a>

                    <a class="btn bg-orange btn-flat margin">

                        <i class="fa fa-thumbs-down"></i>
                        {{number_format_short($video->getScopeDisLikeCount->count())}} {{tr('dislikes')}}
                    </a>

                    <a class="btn bg-navy btn-flat margin">

                        <i class="fa fa-eye"></i>
                        {{$video->watch_count ? number_format_short($video->watch_count) : 0}} {{tr('viewers_cnt')}}
                    </a>

                    <a class="btn bg-olive btn-flat margin">

                        <i class="fa fa-money"></i>
                        {{Setting::get('currency')}} {{$video->redeem_amount ? $video->redeem_amount : 0}} {{tr('redeems')}}
                    </a>

                    <a class="btn bg-red btn-flat margin">

                        <i class="fa fa-male"></i>
                        {{$video->age}} {{tr('age')}}
                    </a>

                    <!-- VIDEO STATUS -->

                    @if ($video->compress_status < OVERALL_COMPRESS_COMPLETED)

                        {{--<a class="btn bg-warning btn-flat margin text-uppercase">--}}
                        {{--{{tr('compress')}}--}}

                        {{--</a>--}}

                    @else

                        @if($video->is_approved == VIDEO_APPROVED)

                            <a class="btn bg-green btn-flat margin text-uppercase">
                                {{tr('approved')}}
                            </a>
                        @else

                            <a class="btn bg-warning btn-flat margin text-uppercase">
                                {{tr('pending')}}
                            </a>
                        @endif
                    @endif

                <!-- VIDEO STATUS -->

                    @if($video->status == VIDEO_PUBLISHED)

                        <a class="btn bg-blue btn-flat margin text-uppercase">

                            {{tr('published')}}

                        </a>

                    @else

                        <a class="btn bg-blue btn-flat margin text-uppercase">

                            {{tr('not_yet_published')}}

                        </a>

                    @endif

                    <hr>

                    <section id="video-details-with-images">

                        <div class="row">

                            <div class="col-lg-12 row">

                                <div class="col-lg-6">

                                    <h4 class="text-uppercase"><b>{{tr('details')}}</b></h4>

                                    <!-- start -->

                                    <strong><i class="fa fa-suitcase margin-r-5"></i> {{tr('category')}}</strong>

                                    <p class="text-muted">
                                        {{$video->category_name}}
                                    </p>

                                    <hr>

                                    <!-- end -->

                                    <!-- start -->

                                    <strong><i class="fa fa-suitcase margin-r-5"></i> {{tr('sub_category_genre')}}</strong>

                                    <p class="text-muted">
                                        {{$video->genre_name}}
                                    </p>

                                    <hr>

                                    <!-- end -->

                                    <!-- start -->

                                    <strong><i class="fa fa-video-camera margin-r-5"></i> {{tr('video_type')}}</strong>

                                    <p class="text-muted">

                                        @if($video->video_type == 1)
                                            {{tr('video_upload_link')}}
                                        @endif

                                        @if($video->video_type == 2)
                                            {{tr('youtube')}}
                                        @endif

                                        @if($video->video_type == 3)
                                            {{tr('other_link')}}
                                        @endif

                                    </p>

                                    <hr>

                                    <!-- end -->

                                    <!-- start -->

                                    @if ($video->video_upload_type == 1 || $video->video_upload_type == 2)

                                        <strong><i class="fa fa-video-camera margin-r-5"></i> {{tr('video_upload_type')}}
                                        </strong>

                                        <p class="text-muted">
                                            @if($video->video_upload_type == 1)
                                                {{tr('s3')}}
                                            @endif

                                            @if($video->video_upload_type == 2)
                                                {{tr('direct')}}
                                            @endif
                                        </p>

                                        <hr>

                                    @endif

                                <!-- end -->

                                    <!-- start -->


                                    <hr>

                                    <!-- end -->

                                    <!-- start -->

                                    <strong><i class="fa fa-clock-o margin-r-5"></i> {{tr('duration')}}</strong>

                                    <p class="text-muted">
                                        {{$video->duration}}
                                    </p>

                                    <hr>

                                    <!-- end -->

                                    <!-- start -->

                                    <strong><i class="fa fa-clock-o margin-r-5"></i> {{tr('publish_time')}}</strong>

                                    <p class="text-muted">
                                        {{$video->publish_time}}
                                    </p>

                                    <hr>

                                    <!-- end -->

                                    <strong><i class="fa fa-star margin-r-5"></i> {{tr('ratings')}}</strong>

                                    <p class="text-muted">
                                    <span class="starRating-view">
                                        <input id="rating5" type="radio" name="ratings" value="5"
                                               @if($video->ratings == 5) checked @endif>
                                        <label for="rating5">5</label>

                                        <input id="rating4" type="radio" name="ratings" value="4"
                                               @if($video->ratings == 4) checked @endif>
                                        <label for="rating4">4</label>

                                        <input id="rating3" type="radio" name="ratings" value="3"
                                               @if($video->ratings == 3) checked @endif>
                                        <label for="rating3">3</label>

                                        <input id="rating2" type="radio" name="ratings" value="2"
                                               @if($video->ratings == 2) checked @endif>
                                        <label for="rating2">2</label>

                                        <input id="rating1" type="radio" name="ratings" value="1"
                                               @if($video->ratings == 1) checked @endif>
                                        <label for="rating1">1</label>
                                    </span>

                                    </p>

                                    <hr>
                                    <p class="text-muted">
                                        <strong><i class="fa fa-upload margin-r-5"></i> {{tr('uploaded_by')}} :
                                        </strong>
                                        <a href="{{route('admin.users.view',$video->uploaded_by)}}">{{$video->user->name}}</a>
                                    </p>

                                    <hr>

{{--                                    <strong><i class="fa fa-male margin-r-5"></i> {{tr('cast_crews')}}</strong>--}}

{{--                                    <p class="text-muted">--}}
{{--                                        {{$video_cast_crews ? implode(', ', $video_cast_crews) : '-'}}--}}
{{--                                    </p>--}}

{{--                                    <hr>--}}
                                    <!-- end -->

                                    @if(Setting::get('is_payper_view') && $video->amount > 0)

                                        <h4 class="text-uppercase text-red">
                                            <b>{{tr('pay_per_view')}} {{tr('details')}}</b></h4>

                                        <hr>

                                        <!-- start -->

                                        <strong><i class="fa fa-file-text-o margin-r-5"></i> {{tr('type_of_user')}}
                                        </strong>

                                        <p class="text-muted">
                                            @if($video->type_of_user == NORMAL_USER)
                                                {{tr('normal_user')}}
                                            @elseif($video->type_of_user == PAID_USER)
                                                {{tr('paid_user')}}
                                            @elseif($video->type_of_user == BOTH_USERS)
                                                {{tr('both_user')}}
                                            @else
                                                -
                                            @endif
                                        </p>

                                        <hr>

                                        <!-- end -->

                                        <!-- start -->

                                        <strong><i class="fa fa-file-text-o margin-r-5"></i> {{tr('type_of_subscription')}}
                                        </strong>

                                        <p class="text-muted">
                                            @if($video->type_of_subscription == ONE_TIME_PAYMENT)
                                                {{tr('one_time_payment')}}
                                            @elseif($video->type_of_subscription == RECURRING_PAYMENT)
                                                {{tr('recurring_payment')}}
                                            @else
                                                -
                                            @endif
                                        </p>

                                        <hr>

                                        <!-- end -->

                                        <!-- start -->

                                        <strong><i class="fa fa-file-text-o margin-r-5"></i> {{tr('amount')}}</strong>

                                        <p class="text-muted">
                                            {{Setting::get('currency')}} {{$video->amount}}
                                        </p>

                                        <hr>

                                        <!-- end -->

                                    @endif

                                </div>

                                <!-- Images start -->

                                <div class="col-lg-6">

                                    <h4 class="text-uppercase"><i
                                                class="fa fa-file-picture-o margin-r-5"></i> {{tr('images')}}</h4>


                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0"
                                                class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                        </ol>

                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="{{isset($video->default_image) ? $video->default_image : ''}}"
                                                     alt="{{tr('default_image')}}">

                                                <div class="carousel-caption">
                                                    {{tr('default_image')}}
                                                </div>
                                            </div>

                                            @foreach($video_images as $i => $image)

                                                <div class="item">
                                                    <img src="{{$image->image}}" alt="">

                                                    <div class="carousel-caption">
                                                        Other Image {{$i+2}}
                                                    </div>
                                                </div>

                                            @endforeach

                                        </div>

                                        <a class="left carousel-control" href="#carousel-example-generic"
                                           data-slide="prev">
                                            <span class="fa fa-angle-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic"
                                           data-slide="next">
                                            <span class="fa fa-angle-right"></span>
                                        </a>

                                    </div>

                                    @if($video->is_banner)

                                        <div class="row margin-bottom" style="margin-top: 10px;">

                                            <div class="col-md-12">

                                                <p class="text-uppercase">{{tr('banner_image')}}</p>


                                                <img alt="Photo" src="{{$video->banner_image}}"
                                                     class="img img-thumbnail" width="470" style="height: 250px">

                                            </div>

                                        </div>

                                    @endif

                                    <hr>

                                    <div class="row margin-bottom" style="margin-top: 10px;">

                                        <strong><i class="fa fa-file-text-o margin-r-5"></i> {{tr('description')}}
                                        </strong>

                                        <p style="margin-top: 10px;">{{$video->description}}.</p>

                                    </div>


                                </div>

                                <!-- Images End -->

                            </div>

                        </div>

                        <hr>

                    </section>

                <!-- <section id="description-and-reviews">

                        <div class="row">
                            <div class="col-lg-12">
                                
                              <strong><i class="fa fa-file-text-o margin-r-5"></i> {{tr('description')}}</strong>

                              <p style="margin-top: 10px;">{{$video->description}}.</p>

                            </div>
                        </div>

                        <hr>

                    </section> -->

                    <section id="video-detailed-description">

                        @if($video->details)

                            <div class="row">

                                <div class="col-lg-12">

                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> {{tr('details')}}</strong>

                                    <p style="margin-top: 10px;"><?= $video->details ?></p>
                                </div>
                            </div>

                            <hr>

                        @endif

                    </section>

                    <section id="video-player-section">

                        <div class="row">

                            <!-- <div class="col-lg-12"> -->

                            @if($video->trailer_video)

                                <div class="col-lg-6">

                                    <h5 class="text-uppercase"><i class="fa fa-video-camera margin-r-5"></i> {{tr('trailer_video')}}</h5>

                                    <div class="image" id="trailer_video_setup_error" style="display:none">
{{--                                        <img src="{{asset('error.jpg')}}" alt="{{Setting::get('site_name')}}" style="width: 100%">--}}
                                        <iframe width="420" height="315" src="{{$video->trailer_video}}" frameborder="0" allowfullscreen></iframe>
                                    </div>


                                    <div class="">
                                        @if($video->video_upload_type == 1)
                                            <?php $trailer_url = $video->trailer_video; ?>
                                            <div id="trailer-video-player"></div>
                                        @else
                                            @if(check_valid_url($video->trailer_video))
                                                <iframe width="420" height="315" src="{{$video->trailer_video}}"
                                                        frameborder="0"
                                                        allowfullscreen>
                                                </iframe>
                                            @else
                                                <div class="image">
                                                    <img src="{{asset('error.jpg')}}"
                                                         alt="{{Setting::get('site_name')}}" style="width: 100%">
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="embed-responsive embed-responsive-16by9"
                                         id="flash_error_display_trailer" style="display: none;">
                                        <div style="width: 100%;background: black; color:#fff;height:350px;">
                                            <div style="text-align: center;padding-top:25%">{{tr('flash_miss_error')}}
                                                <a target="_blank" href="https://get.adobe.com/flashplayer/"
                                                   class="underline">{{tr('adobe')}}</a>.
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endif

                            <div class="col-lg-6">

                                <h5 class="text-uppercase"><i
                                            class="fa fa-video-camera margin-r-5"></i> {{tr('full_video')}}</h5>

                                <div class="image" id="main_video_setup_error" style="display:none">
                                    <img src="{{asset('error.jpg')}}" alt="{{Setting::get('site_name')}}"
                                         style="width: 100%">
                                </div>

                                <div class="">
                                    @if($video->video_upload_type == 1)

                                        <?php $url = $video->video; ?>

                                            <iframe width="420" height="315" src="{{$video->video}}"
                                                    frameborder="0"
                                                    allowfullscreen>
                                            </iframe>
                                    @else
                                        @if(check_valid_url($video->video))


{{--                                            <div class="title m-b-md">--}}
{{--                                                <video width="420" height="315" frameborder="0" controls>--}}
{{--                                                    <source src="{{$video->video}}" autobuffer autoloop loop controls type="video/mp4">--}}
{{--                                                    Your browser does not support the video tag.--}}
{{--                                                </video>--}}
{{--                                            </div>--}}

                                            <div id="main-video-player"></div>
                                        @else
                                            <div class="image">
                                                <img src="{{asset('error.jpg')}}" alt="{{Setting::get('site_name')}}"
                                                     style="width: 100%">
                                            </div>
                                        @endif

                                    @endif
                                </div>
                                <div class="embed-responsive embed-responsive-16by9" id="flash_error_display_main"
                                     style="display: none;">
                                    <div style="width: 100%;background: black; color:#fff;height:350px;">
                                        <div style="text-align: center;padding-top:25%">{{tr('flash_miss_error')}} <a
                                                    target="_blank" href="https://get.adobe.com/flashplayer/"
                                                    class="underline">{{tr('adobe')}}</a>.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- </div> -->

                        </div>

                    </section>

                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>

    <script src="{{asset('jwplayer/jwplayer.js')}}"></script>

    <script>jwplayer.key = "{{Setting::get('JWPLAYER_KEY')}}";</script>

    <script type="text/javascript">


        jQuery(document).ready(function () {

            var is_mobile = false;

            var isMobile = {
                Android: function () {
                    return navigator.userAgent.match(/Android/i);
                },
                BlackBerry: function () {
                    return navigator.userAgent.match(/BlackBerry/i);
                },
                iOS: function () {
                    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                },
                Opera: function () {
                    return navigator.userAgent.match(/Opera Mini/i);
                },
                Windows: function () {
                    return navigator.userAgent.match(/IEMobile/i);
                },
                any: function () {
                    return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                }
            };


            function getBrowser() {

                // Opera 8.0+
                var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

                // Firefox 1.0+
                var isFirefox = typeof InstallTrigger !== 'undefined';

                // Safari 3.0+ "[object HTMLElementConstructor]"
                var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) {
                    return p.toString() === "[object SafariRemoteNotification]";
                })(!window['safari'] || safari.pushNotification);

                // Internet Explorer 6-11
                var isIE = /*@cc_on!@*/false || !!document.documentMode;

                // Edge 20+
                var isEdge = !isIE && !!window.StyleMedia;

                // Chrome 1+
                var isChrome = !!window.chrome && !!window.chrome.webstore;

                // Blink engine detection
                var isBlink = (isChrome || isOpera) && !!window.CSS;

                var b_n = '';

                switch (true) {

                    case isFirefox :

                        b_n = "Firefox";

                        break;
                    case isChrome :

                        b_n = "Chrome";

                        break;

                    case isSafari :

                        b_n = "Safari";

                        break;
                    case isOpera :

                        b_n = "Opera";

                        break;

                    case isIE :

                        b_n = "IE";

                        break;

                    case isEdge :

                        b_n = "Edge";

                        break;

                    case isBlink :

                        b_n = "Blink";

                        break;

                    default :

                        b_n = "Unknown";

                        break;

                }

                return b_n;

            }


            if (isMobile.any()) {

                var is_mobile = true;

            }


            var browser = getBrowser();


            if ((browser == 'Safari') || (browser == 'Opera') || is_mobile) {

                var video = "{{$ios_video}}";

                var trailer_video = "{{$ios_trailer_video}}";

            } else {

                var video = "{{$videoStreamUrl}}";

                var trailer_video = "{{$trailerstreamUrl}}";

            }


            @if($video->video)


            var playerInstance = jwplayer("main-video-player");

                    @if($videoPath)

            var videoPath = "{{$videoPath}}";
            var videoPixels = "{{$video_pixels}}";

            var path = [];

            var splitVideo = videoPath.split(',');

            var splitVideoPixel = videoPixels.split(',');


            for (var i = 0; i < splitVideo.length; i++) {
                path.push({file: splitVideo[i], label: splitVideoPixel[i]});
            }

            playerInstance.setup({
                sources: path,
                image: "{{$video->default_image}}",
                width: "100%",
                aspectratio: "16:9",
                primary: "flash",
                controls: true,
                "controlbar.idlehide": false,
                controlBarMode: 'floating',
                "controls": {
                    "enableFullscreen": false,
                    "enablePlay": false,
                    "enablePause": false,
                    "enableMute": true,
                    "enableVolume": true
                },
                autostart : false,
                autoplay : false,
                "sharing": {
                    "sites": ["reddit", "facebook", "twitter"]
                },

                tracks: [{
                    file: "{{$video->video_subtitle}}",
                    kind: "captions",
                    default: true,
                }]
            });

            @else


            playerInstance.setup({
                file: video,
                image: "{{$video->default_image}}",
                width: "100%",
                aspectratio: "16:9",
                primary: "flash",
                controls: true,
                "controlbar.idlehide": false,
                controlBarMode: 'floating',
                "controls": {
                    "enableFullscreen": false,
                    "enablePlay": false,
                    "enablePause": false,
                    "enableMute": true,
                    "enableVolume": true
                },
                autostart : false,
                autoplay : false,
                "sharing": {
                    "sites": ["reddit", "facebook", "twitter"]
                },

                tracks: [{
                    file: "{{$video->video_subtitle}}",
                    kind: "captions",
                    default: true,
                }]
            });

            @endif

            playerInstance.on('setupError', function () {

                jQuery("#main-video-player").css("display", "none");
                // jQuery('#trailer_video_setup_error').hide();


                var hasFlash = false;
                try {
                    var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
                    if (fo) {
                        hasFlash = true;
                    }
                } catch (e) {
                    if (navigator.mimeTypes
                        && navigator.mimeTypes['application/x-shockwave-flash'] != undefined
                        && navigator.mimeTypes['application/x-shockwave-flash'].enabledPlugin) {
                        hasFlash = true;
                    }
                }

                if (hasFlash == false) {
                    jQuery('#flash_error_display_main').show();
                    return false;
                }

                jQuery('#main_video_setup_error').css("display", "block");

                // confirm('The video format is not supported in this browser. Please option some other browser.');

            });

                    @endif

            @if($video->trailer_video)

            var playerInstance = jwplayer("trailer-video-player");

                    @if($trailer_video_path)

            var trailerVideoPath = "{{$trailer_video_path}}";
            var trailerVideoPixels = "{{$trailer_pixels}}";

            var trailerPath = [];

            var splitTrailer = trailerVideoPath.split(',');

            var splitTrailerPixel = trailerVideoPixels.split(',');


            for (var i = 0; i < splitTrailer.length; i++) {

                trailerPath.push({file: splitTrailer[i], label: splitTrailerPixel[i]});
            }

            playerInstance.setup({
                sources: trailerPath,
                image: "{{$video->default_image}}",
                width: "100%",

                aspectratio: "16:9",
                primary: "flash",
                tracks: [{
                    file: "{{$video->trailer_subtitle}}",
                    kind: "captions",
                    default: true,
                }]
            });

            @else

            playerInstance.setup({
                file: trailer_video,
                image: "{{$video->default_image}}",
                width: "100%",

                aspectratio: "16:9",
                primary: "flash",
                tracks: [{
                    file: "{{$video->trailer_subtitle}}",
                    kind: "captions",
                    default: true,
                }]
            });


            @endif

            playerInstance.on('setupError', function () {

                jQuery("#trailer-video-player").css("display", "none");
                // jQuery('#trailer_video_setup_error').hide();


                var hasFlash = false;
                try {
                    var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
                    if (fo) {
                        hasFlash = true;
                    }
                } catch (e) {
                    if (navigator.mimeTypes
                        && navigator.mimeTypes['application/x-shockwave-flash'] != undefined
                        && navigator.mimeTypes['application/x-shockwave-flash'].enabledPlugin) {
                        hasFlash = true;
                    }
                }

                if (hasFlash == false) {
                    jQuery('#flash_error_display_trailer').show();
                    return false;
                }

                jQuery('#trailer_video_setup_error').css("display", "block");

                // confirm('The video format is not supported in this browser. Please option some other browser.');

            });
            @endif
        });

    </script>

@endsection

