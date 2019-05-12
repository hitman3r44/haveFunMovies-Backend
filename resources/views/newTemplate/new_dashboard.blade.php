@extends('layouts.adminator.master')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item  w-100">
            <div class="row gap-20">
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">
                                <a href="{{route('admin.users')}}">{{tr('total_users')}}</a></h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                <div class="peer"><span
                                            class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{$user_count}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1"><a href="{{route('admin.moderators')}}">{{tr('total_moderator')}}</a></h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                <div class="peer"><span
                                            class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">{{$provider_count}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1"><a href="{{route('admin.videos')}}">{{tr('total_videos')}}</a></h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                <div class="peer"><span
                                            class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">{{$video_count}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1"><a href="{{route('admin.user.payments')}}">{{tr('total_revenue')}}</a></h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                                <div class="peer"><span
                                            class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">{{Setting::get('currency')}} {{number_format_short(($total_revenue > 0 && $total_revenue != '') ? $total_revenue : 0)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-12">
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="layers">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">{{tr('registered_users')}}</h6>
                            </div>
                            <div class="layer w-100">
                                <div id="world-map-marker"></div>
                            </div>
                        </div>
                    </div>
                    <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
                        <div class="layers">
                            <div class="layer w-100">
                                <div class="layers">
                                    <div class="layer w-100">
                                        <h5 class="mB-5">{{$get_registers['web']}}</h5>
                                        <small class="fw-600 c-grey-700">{{tr('total_web')}}</small>
                                        <span class="pull-right c-grey-600 fsz-sm">{{ get_percentage($get_registers['web'], $get_registers['total']) }}%</span>
                                        <div class="progress mT-10">
                                            <div class="progress-bar bgc-deep-purple-500" role="progressbar"
                                                 aria-valuenow="{{ get_percentage($get_registers['web'], $get_registers['total']) }}"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{ get_percentage($get_registers['web'], $get_registers['total']) }}%">
                                                <span class="sr-only">{{ get_percentage($get_registers['web'], $get_registers['total']) }}% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer w-100 mT-15">
                                        <h5 class="mB-5">{{$get_registers['android']}}</h5>
                                        <small class="fw-600 c-grey-700">{{tr('total_android')}}</small>
                                        <span class="pull-right c-grey-600 fsz-sm">{{ get_percentage($get_registers['android'], $get_registers['total']) }}%</span>
                                        <div class="progress mT-10">
                                            <div class="progress-bar bgc-green-500" role="progressbar"
                                                 aria-valuenow="{{ get_percentage($get_registers['android'], $get_registers['total']) }}"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{ get_percentage($get_registers['android'], $get_registers['total']) }}%">
                                                <span class="sr-only">{{ get_percentage($get_registers['android'], $get_registers['total']) }}% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer w-100 mT-15">
                                        <h5 class="mB-5">{{$get_registers['ios']}}</h5>
                                        <small class="fw-600 c-grey-700">{{tr('total_ios')}}</small>
                                        <span class="pull-right c-grey-600 fsz-sm">{{ get_percentage($get_registers['android'], $get_registers['total']) }}%</span>
                                        <div class="progress mT-10">
                                            <div class="progress-bar bgc-light-blue-500" role="progressbar"
                                                 aria-valuenow="{{ get_percentage($get_registers['android'], $get_registers['total']) }}"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{ get_percentage($get_registers['android'], $get_registers['total']) }}%">
                                                <span class="sr-only">{{ get_percentage($get_registers['android'], $get_registers['total']) }}% Complete</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="peers pT-20 mT-20 bdT fxw-nw@lg+ jc-sb ta-c gap-10">
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size="80" data-percent="75"
                                             data-bar-color="#f44336"><span></span></div>
                                        <h6 class="fsz-sm">New Users</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size="80" data-percent="50"
                                             data-bar-color="#2196f3"><span></span></div>
                                        <h6 class="fsz-sm">New Purchases</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size="80" data-percent="90"
                                             data-bar-color="#ff9800"><span></span></div>
                                        <h6 class="fsz-sm">Bounce Rate</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-6">
            <div class="bd bgc-white">
                <div class="layers">
                    <div class="layer w-100 pX-20 pT-20">
                        <h6 class="lh-1">Monthly Stats</h6>
                    </div>
                    <div class="layer w-100 p-20">
                        <canvas id="line-chart" height="220"></canvas>
                    </div>
                    <div class="layer bdT p-20 w-100">
                        <div class="peers ai-c jc-c gapX-20">
                            <div class="peer"><span class="fsz-def fw-600 mR-10 c-grey-800">10% <i
                                            class="fa fa-level-up c-green-500"></i></span>
                                <small class="c-grey-500 fw-600">APPL</small>
                            </div>
                            <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">2% <i
                                            class="fa fa-level-down c-red-500"></i></span>
                                <small class="c-grey-500 fw-600">Average</small>
                            </div>
                            <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">15% <i
                                            class="fa fa-level-up c-green-500"></i></span>
                                <small class="c-grey-500 fw-600">Sales</small>
                            </div>
                            <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">8% <i
                                            class="fa fa-level-down c-red-500"></i></span>
                                <small class="c-grey-500 fw-600">Profit</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-6">
            <div class="bd bgc-white p-20">
                <div class="layers">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">{{tr('latest_users')}}</h6>
                    </div>
                    <div class="layer w-100">
                        <ul class="list-task list-group" data-role="tasklist">
                            @foreach($recent_users as $user)
                                <li class="list-group-item bdw-0" data-role="task">
                                    <div class="checkbox checkbox-circle checkbox-info peers ai-c">

                                        <img style="width:60px;height:60px; margin-right:5px;" class="rounded-circle" src="@if($user->picture) {{$user->picture}} @else {{asset('placeholder.png')}} @endif" alt="User Image">

                                        <label class="peers peer-greed js-sb ai-c">
                                            <span class="peer peer-greed"><a href="{{route('admin.users.view' , $user->id)}}">{{$user->name}}</a> </span>
                                            <span class="peer">
                                            <span class="badge badge-pill fl-r badge-success lh-0 p-10">{{$user->created_at->diffForHumans()}}</span>
                                        </span>
                                        </label>
                                    </div>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection