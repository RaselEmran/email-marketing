<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! configValue('site_name') !!}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         {!! getLang(env('locale', trans('common.Languages'))) !!}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(\App\Models\Translation\Language::where('status',1)->get() as $lang)
                            <li>
                                <a href="{!! url('lang/'.$lang->locale) !!}"
                                   title="{!! \App\Models\Translation\Language::langDetail($lang->locale)->name !!}">
                                    <img style="width: 15px;height: 16px"
                                         src="{{ url('img/flags/'.strtolower(explode('_',$lang->locale)[1]).'.svg')}}"
                                         alt="{!! $lang->locale !!}"> {!!\App\Models\Translation\Language::langDetail($lang->locale)->name !!}
                                </a>
                            </li>
                        @endforeach
                        <li><a href="{!! url('translation') !!}">{!! trans('common.add_new_languages') !!}</a></li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @if (Auth::check() && isset(Auth::user()->photo) && (Auth::user()->photo != ''))
                            @if(strpos(Auth::user()->photo, 'http') !== false)
                                <img src="{{ Auth::user()->photo }}" class="user-image" alt="User Image"/>
                            @else
                                <img src="{{ url('upload/'.Auth::user()->photo) }}" class="user-image" alt="User Image"/>
                            @endif
                        @else
                            <img src="{{ url('img/user2-160x160.jpg') }}" class="user-image" alt="User Image"/>
                            @endif
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            @if(Auth::check())
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            @else
                                <span class="hidden-xs">John Doe</span>
                            @endif
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            @if (Auth::check() && isset(Auth::user()->photo) && (Auth::user()->photo != ''))
                            @if(strpos(Auth::user()->photo, 'http') !== false)
                                    <img src="{{ Auth::user()->photo }}" class="img-circle"
                                         alt="User Image"/>
                                @else
                                    <img src="{{ url('upload/'.Auth::user()->photo) }}" class="img-circle"
                                         alt="User Image"/>
                                @endif

                            @else
                                <img src="{{ url('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"/>
                            @endif
                            @if(Auth::check())
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>{!! trans('common.Member since') !!} {{ date('M Y', strtotime(Auth::user()->created_at)) }}</small>
                                </p>
                            @endif
                        </li>
                        <!-- Menu Body -->
                        @if(Auth::check())
                            <li class="user-body">
                                <div class="col-xs-7 text-center pull-left">
                                    <a href="{{ url('users/update_password') }}">{{ trans('common.change'). ' ' . trans('common.password') }}</a>
                                </div>
                                <div class="col-xs-4 text-center pull-right">
                                    <a href="{{ url('activities/'.Auth::id()) }}">{!! trans('common.Activities') !!}</a>
                                </div>
                            </li>
                            @endif
                                    <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('profile') }}"
                                       class="btn btn-default btn-flat">{!! trans('common.Profile') !!}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}"
                                       class="btn btn-default btn-flat">{!! trans('common.Sign out') !!}</a>
                                </div>
                            </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a style="visibility: hidden" href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>