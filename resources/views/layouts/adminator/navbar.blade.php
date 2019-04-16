<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="{{route('admin.dashboard')}}" class="td-n">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"><img
                                            src="https://colorlib.com/polygon/adminator/assets/static/images/logo.png"
                                            alt=""></div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
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

            <li class="nav-item"><a class="sidebar-link" href="{{url('new/form')}}"><span class="icon-holder"><i
                                class="c-light-blue-500 ti-pencil"></i> </span><span class="title">Forms</span></a>
            </li>

            <li class="nav-item"><a class="sidebar-link" href="{{ url('new/chart') }}"><span class="icon-holder"><i
                                class="c-indigo-500 ti-bar-chart"></i> </span><span class="title">Charts</span></a>
            </li>

            <li class="nav-item dropdown"><a class="sidebar-link" href="{{url('new/ui-element')}}"><span class="icon-holder"><i
                                class="c-pink-500 ti-palette"></i> </span><span class="title">UI Elements</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i
                                class="c-orange-500 ti-layout-list-thumb"></i> </span><span
                            class="title">Tables</span> <span class="arrow"><i
                                class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="">Basic Table</a></li>
                    <li><a class="sidebar-link" href="{{url('new/data-table')}}">Data Table</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i
                                class="c-red-500 ti-files"></i> </span><span class="title">Pages</span> <span
                            class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="404.html">404</a></li>
                    <li><a class="sidebar-link" href="">500</a></li>
                    <li><a class="sidebar-link" href="{{url('new/signin')}}">Sign In</a></li>
                    <li><a class="sidebar-link" href="">Sign Up</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i
                                class="c-teal-500 ti-view-list-alt"></i> </span><span
                            class="title">Multiple Levels</span> <span class="arrow"><i
                                class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown"><a href="javascript:void(0);"><span>Menu Item</span></a></li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);"><span>Menu Item</span> <span class="arrow"><i
                                        class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0);">Menu Item</a></li>
                            <li><a href="javascript:void(0);">Menu Item</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>