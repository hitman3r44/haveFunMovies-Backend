@extends('layouts.adminator.master')

@section('title', tr('search_videos').' In TMDB')

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('search_videos') }} In TMDB</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{request()->headers->get('referer')}}"><i
                    class="fa fa-video-camera"></i> {{tr('videos')}}</a></li>
    <li class="list-inline-item active"> {{tr('search_videos')}} By TMDB</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="bgc-white col-md-10 offset-1">
            <div class="">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">{{tr('search_videos')}}  </h6>
                    <div class="mT-30">
                        <form method="POST" id="search_video" action="{{route('admin.videos.search')}}">
                            <div class="form-group row">
                                <label for="movieTitle" class="col-sm-2 col-form-label">Search Movie</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="movieTitle"
                                           name="movie_name" required placeholder="Search Movie Title">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="offset-2 col-md-8" id="movie_response" style="overflow: hidden">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">

        function buttonDisable(btnObj, btn_content) {

            btnObj.prop('disabled', true);
            btnObj.html('<i class="fa fa-spinner fa-spin"></i> &nbsp;' + btn_content);
        }

        function buttonEnable(btnObj, btn_content) {

            btnObj.prop('disabled', false);
            btnObj.html(btn_content);
        }


        $(document).ready(function () {

            $('#search_video').on('submit', function (e) {
                e.preventDefault()
                btn = $(this).find('button[type="submit"]');
                btn_content = btn.html();
                buttonDisable(btn, btn_content);
                $('#movie_response').html('<div class="text-center"><i class="fa fa-circle-o-notch fa-spin" style=" font-size: 30px;margin-top: 22px;"></i></div>');

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        buttonEnable(btn, btn_content);
                        if (response.status == 1) {

                            $('#movie_response').html(response.html);

                        }else{
                            $('#movie_response').html('<div class="text-danger">'+ response.html + '</div>');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        buttonEnable(btn, btn_content);
                        console.log(textStatus, errorThrown);
                        $('#movie_response').html('');
                        alert('There is a error. Please try again');

                    }
                });
            });
        });
    </script>


@endsection


