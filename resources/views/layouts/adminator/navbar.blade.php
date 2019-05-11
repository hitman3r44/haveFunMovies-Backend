<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="{{route('admin.dashboard')}}" class="td-n">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img
                                            src="{{ URL::to('/') }}/images/haveFunMoviesAdminLogo.png"
                                            alt=""></div>
                            </div>
                            <div class="peer peer-greed">

                                <h5 class="lh-1 mB-0 logo-text">{{ ucwords(Auth::guard('admin')->user()->name) }}</h5>
                                <span class="mt-5 lh-1 mB-0 logo-text">{{ \App\Helpers\Helper::getUserType(Auth::guard('admin')->user()->user_type) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle"><a href="#" class="td-n"><i
                                    class="ti-arrow-circle-left"></i></a></div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
                <a class="sidebar-link" href="{{route('admin.dashboard')}}" default><span
                            class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span
                            class="title">Dashboard</span></a>
            </li>

            <li class="nav-item dropdown" id="users">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-user"></i>
                    </span>
                    <span class="title">{{tr('users')}}</span> <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.users.create')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('add_user')}}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.users')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('view_users')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{url('admin/role')}}">
                            <span class="icon-holder">
                                <i class="fa fa-list-ul"></i>
                            </span>
                    <span class="title">{{tr('role')}}</span>
                </a>
            </li>

            <li class="nav-item dropdown" id="categories">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-suitcase"></i>
                    </span>
                    <span class="title">{{tr('categories')}}</span> <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.add.category')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('add_category')}}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.categories')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('view_categories')}}</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item dropdown" id="videos">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-video-camera"></i>
                    </span>
                    <span class="title">{{tr('videos')}}</span> <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.videos.create')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('add_video')}}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.videos')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('view_videos')}}</span>
                        </a>
                    </li>
                    @if(Setting::get('is_spam'))
                        <li  id="spam_videos" class="nav-item">
                            <a class="sidebar-link" href="{{route('admin.spam-videos')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                                <span class="title">{{tr('spam_videos')}}</span>
                            </a>
                        </li>
                    @endif
                    <li  id="view-banner-videos" class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.videos',['banner'=>BANNER_VIDEO])}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('banner_videos')}}</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item dropdown" id="subscriptions">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-key"></i>
                    </span>
                    <span class="title">{{tr('subscriptions')}}</span> <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.subscriptions.create')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('add_subscription')}}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.subscriptions.index')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('view_subscriptions')}}</span>
                        </a>
                    </li>
                </ul>
            </li>

{{--            <li class="nav-item dropdown" id="coupons">--}}
{{--                <a class="dropdown-toggle" href="javascript:void(0);">--}}
{{--                    <span class="icon-holder">--}}
{{--                        <i class="c-indigo-500 fa fa-gift"></i>--}}
{{--                    </span>--}}
{{--                    <span class="title">{{tr('coupons')}}</span> <span class="arrow">--}}
{{--                        <i class="ti-angle-right"></i>--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li id="create" class="nav-item">--}}
{{--                        <a class="sidebar-link" href="{{route('admin.add.coupons')}}">--}}
{{--                            <span class="icon-holder">--}}
{{--                                <i class="c-light-blue-500 fa fa-circle-o"></i>--}}
{{--                            </span>--}}
{{--                            <span class="title">{{tr('add_coupon')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li id=view_coupons" class="nav-item">--}}
{{--                        <a class="sidebar-link" href="{{route('admin.coupon.list')}}">--}}
{{--                            <span class="icon-holder">--}}
{{--                                <i class="c-light-blue-500 fa fa-circle-o"></i>--}}
{{--                            </span>--}}
{{--                            <span class="title">{{tr('view_coupon')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

            <li class="nav-item dropdown" id="payments">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-credit-card"></i>
                    </span>
                    <span class="title">{{tr('payments')}}</span> <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li id="revenue_system" class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.revenue.system')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">{{tr('revenue_system')}}</span>
                        </a>
                    </li>

{{--                    <li id=user-payments" class="nav-item">--}}
{{--                        <a class="sidebar-link" href="{{route('admin.user.payments')}}">--}}
{{--                            <span class="icon-holder">--}}
{{--                                <i class="c-light-blue-500 fa fa-circle-o"></i>--}}
{{--                            </span>--}}
{{--                            <span class="title">{{tr('subscription_payments')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    @if(Setting::get('is_payper_view'))--}}

{{--                        <li id=video-subscription" class="nav-item">--}}
{{--                            <a class="sidebar-link" href="{{route('admin.user.video-payments')}}">--}}
{{--                            <span class="icon-holder">--}}
{{--                                <i class="c-light-blue-500 fa fa-circle-o"></i>--}}
{{--                            </span>--}}
{{--                                <span class="title">{{tr('ppv_payments')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                </ul>
            </li>

{{--            @if(Setting::get('redeem_control'))--}}
{{--                <li id="redeems" class="nav-item">--}}
{{--                    <a class="sidebar-link" href="{{ route('admin.moderators.redeems') }}">--}}
{{--                    <span class="icon-holder">--}}
{{--                        <i class="c-indigo-500 fa fa-trophy"></i>--}}
{{--                    </span>--}}
{{--                        <span class="title">{{tr('redeems')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}

            @if(Setting::get('admin_language_control') == 0)
                <li id="languages" class="nav-item">
                    <a class="sidebar-link" href="{{ route('admin.languages.index') }}">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-globe"></i>
                    </span>
                        <span class="title">{{tr('languages')}}</span>
                    </a>
                </li>
            @endif

{{--            <li class="nav-item dropdown" id="settings">--}}
{{--                <a class="dropdown-toggle" href="javascript:void(0);">--}}
{{--                    <span class="icon-holder">--}}
{{--                        <i class="c-indigo-500 fa fa-gears"></i>--}}
{{--                    </span>--}}
{{--                    <span class="title">{{tr('settings')}}</span> <span class="arrow">--}}
{{--                        <i class="ti-angle-right"></i>--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li id="site_settings" class="nav-item">--}}
{{--                        <a class="sidebar-link" href="{{route('admin.settings')}}">--}}
{{--                            <span class="icon-holder">--}}
{{--                                <i class="c-light-blue-500 fa fa-circle-o"></i>--}}
{{--                            </span>--}}
{{--                            <span class="title">{{tr('site_settings')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li id=home_page_settings" class="nav-item">--}}
{{--                        <a class="sidebar-link" href="{{route('admin.homepage.settings')}}">--}}
{{--                            <span class="icon-holder">--}}
{{--                                <i class="c-light-blue-500 fa fa-circle-o"></i>--}}
{{--                            </span>--}}
{{--                            <span class="title">{{tr('home_page_settings')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li id="custom-push" class="nav-item">--}}
{{--                <a class="sidebar-link" href="{{route('admin.push')}}">--}}
{{--                    <span class="icon-holder">--}}
{{--                        <i class="c-indigo-500 fa fa-send"></i>--}}
{{--                    </span>--}}
{{--                    <span class="title">{{tr('custom_push')}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li id="email_templates" class="nav-item">
                <a class="sidebar-link" href="{{route('admin.templates')}}">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-envelope"></i>
                    </span>
                    <span class="title">{{tr('email_templates')}}</span>
                </a>
            </li>


            <li class="nav-item dropdown" id="viewpages">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-picture-o"></i>
                    </span>
                    <span class="title">{{tr('pages')}}</span> <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li id="add_page" class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.pages.create')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">Add Page</span>
                        </a>
                    </li>

                    <li id=view_pages" class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.pages.index')}}">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 fa fa-circle-o"></i>
                            </span>
                            <span class="title">View Page</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li id="profile" class="nav-item">
                <a class="sidebar-link" href="{{route('admin.profile')}}">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-diamond"></i>
                    </span>
                    <span class="title">{{tr('account')}}</span>
                </a>
            </li>

            <li id="mail_camp" class="nav-item">
                <a class="sidebar-link" href="{{route('admin.add.mailcamp')}}">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-envelope"></i>
                    </span>
                    <span class="title">{{tr('mail_camp')}}</span>
                </a>
            </li>

{{--            <li id="help" class="nav-item">--}}
{{--                <a class="sidebar-link" href="{{route('admin.help')}}">--}}
{{--                    <span class="icon-holder">--}}
{{--                        <i class="c-indigo-500 fa fa-question-circle"></i>--}}
{{--                    </span>--}}
{{--                    <span class="title">{{tr('help')}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item">
                <a class="sidebar-link" href="{{route('admin.logout')}}">
                    <span class="icon-holder">
                        <i class="c-indigo-500 fa fa-sign-out"></i>
                    </span>
                    <span class="title">{{tr('sign_out')}}</span>
                </a>
            </li>

        </ul>
    </div>
</div>
