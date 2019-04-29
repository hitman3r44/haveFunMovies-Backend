@extends('layouts.adminator.master')

@section('title', tr('user_reports'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('help') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item active"><i class="fa fa-question-circle"></i> {{tr('help')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('help')}}</b></h6>
                    </div>
                </div>

                <div class="box-body">

                    <div class="card">


                        <div class="card-head style-primary">
                            <header>{{tr('hi_there')}}</header>
                        </div>

                        <div class="card-body help">
                            <p>
                                {{tr('thanks_for_choosing_streamhash')}}
                            </p>

                            <p>
                                {{tr('any_changes_your_site')}}
                            </p>

                            <a href="https://www.facebook.com/StreamHash/" target="_blank"><img
                                        class="aligncenter size-full wp-image-159 help-image"
                                        src="{{asset('helpsocial/Facebook.png')}}" alt="Facebook-100" width="100"
                                        height="100"/></a>
                            &nbsp;

                            <a href="https://twitter.com/StreamHash" target="_blank"><img
                                        class="size-full wp-image-155 alignleft help-image"
                                        src="{{asset('helpsocial/twitter.png')}}" alt="Twitter" width="100"
                                        height="100"/></a>
                            &nbsp;

                            <a href="skype:contact@streamhash.com?chat" target="_blank"> <img
                                        class="wp-image-158 alignleft help-image"
                                        src="{{asset('helpsocial/skype.png')}}" alt="skype" width="100"
                                        height="100"/></a>
                            &nbsp;

                            <a href="mailto:contact@streamhash.com" target="_blank"><img
                                        class="size-full wp-image-153 alignleft help-image"
                                        src="{{asset('helpsocial/mail.png')}}" alt="Message-100" width="100"
                                        height="100"/></a>

                            &nbsp;


                            <p>{{tr('help_notes_streamhash')}}</p>

                            <a href="#" target="_blank"><img class="aligncenter help-image size-full wp-image-160"
                                                             src="{{asset('helpsocial/Money-Box-100.png')}}"
                                                             alt="Money Box-100" width="100" height="100"/></a>

                            <p>{{tr('cheers')}}</p>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>



@endsection
