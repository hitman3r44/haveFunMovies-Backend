@extends('layouts.adminator.master')

@section('title', tr('view_genre'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('view_genre') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.categories')}}"><i class="fa fa-suitcase"></i>{{tr('categories')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.sub_categories', array('category' => $genre->category_id))}}"><i class="fa fa-suitcase"></i> {{tr('sub_categories')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.genres' , array('sub_category' => $genre->sub_category_id))}}"><i class="fa fa-suitcase"></i> {{tr('genres')}}</a></li>
    <li class="list-inline-item active">{{tr('view_genre')}}</li>
@endsection 

@section('content')

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{$genre->genre_name}} <small>{{tr('created_time')}} - {{$genre->genre_date}}</small></h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('admin.edit.edit_genre' , array('sub_category_id' => $genre->sub_category_id,'genre_id' => $genre->genre_id))}}">
                            <button class="btn btn-success btn-sm" type="button">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </a>
                    </div>

                <div class="mt-5">

                    <div class="row">

                        <div class="col-lg-6">

                            <h5><i class="fa fa-suitcase margin-r-5"></i> {{tr('category')}}</h5>

                            <p class="text-muted">
                                {{$genre->category_name}}
                            </p>

                            <hr>

                        </div>

                        <div class="col-lg-6">

                            <h5><i class="fa fa-suitcase margin-r-5"></i> {{tr('sub_category')}}</h5>

                            <p class="text-muted">
                                {{$genre->sub_category_name}}
                            </p>

                            <hr>

                        </div>

                        <div class="col-lg-6">

                            <h4 class="text-uppercase"><i class="fa fa-video-camera margin-r-5"></i> {{tr('trailer_video')}}</h4>

                            <div class="image" id="main_video_setup_error" style="display:none">
                                <img src="{{asset('error.jpg')}}" alt="{{Setting::get('site_name')}}" style="width: 100%">
                            </div>

                            <div class="">
                                <?php $url = $genre->video; ?>
                                <div id="main-video-player"></div>
                              
                            </div>

                            <div class="embed-responsive embed-responsive-16by9" id="flash_error_display_main" style="display: none;">
                               <div style="width: 100%;background: black; color:#fff;height:350px;">
                                     <div style="text-align: center;padding-top:25%">{{tr('flash_miss_error')}}<a target="_blank" href="https://get.adobe.com/flashplayer/" class="underline">{{tr('adobe')}}</a>.</div>
                               </div>
                            </div>
                        </div>
                 
                    </div>

                   
                </div>

            </div>

        </div>


    </div>

@endsection




@section('scripts')
    
     <script src="{{asset('jwplayer/jwplayer.js')}}"></script>

    <script>jwplayer.key="{{Setting::get('JWPLAYER_KEY')}}";</script>

    <script type="text/javascript">
        
        jQuery(document).ready(function(){


                console.log('Inside Video');
                    
                console.log('Inside Video Player');


                    var playerInstance = jwplayer("main-video-player");

                   // alert(playerInstance);

                     playerInstance.setup({
                            file: "{{$genre->video}}",
                            image: "{{$genre->default_image}}",
                            width: "100%",
                            aspectratio: "16:9",
                            primary: "flash",
                            controls : true,
                            "controlbar.idlehide" : false,
                            controlBarMode:'floating',
                            "controls": {
                              "enableFullscreen": false,
                              "enablePlay": false,
                              "enablePause": false,
                              "enableMute": true,
                              "enableVolume": true
                            },
                            // autostart : true,
                            "sharing": {
                                "sites": ["reddit","facebook","twitter"]
                              },
                              tracks : [{
                                  file : "{{$genre->subtitle}}",
                                  kind : "captions",
                                  default : true,
                                }]
                        });


                    playerInstance.on('error', function() {

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

                                confirm('The video format is not supported in this browser. Please option some other browser.');
                            
                    });

              
        });

    </script>

@endsection
