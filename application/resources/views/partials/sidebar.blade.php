<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if (Auth::check() && (isset(Auth::user()->photo)) && (Auth::user()->photo != ''))
                    @if(strpos(Auth::user()->photo, 'http') !== false)
                        <img src="{{ Auth::user()->photo }}" style="height: 45px; width: 45px;" class="img-circle" alt="User Image" />
                    @else
                        <img src="{{ url('upload/'.Auth::user()->photo) }}" style="height: 45px; width: 45px;" class="img-circle" alt="User Image" />
                    @endif
                @else
                    <img src={{ url('img/user2-160x160.jpg') }} class="img-circle" alt="User Image" />
                @endif
            </div>
            <div class="pull-left info">
                @if(Auth::check())
                <p>{{ Auth::user()->name }}</p>
                @else
                <p>John Doe</p>
                @endif
                    <!-- Status -->
                @if(Auth::check())
                <a href="#"><i class="fa fa-circle text-success"></i> {!! trans('common.online') !!}</a>
                @endif
            </div>
        </div>
    <?php $url = Request::segment(1); ?>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="{{ ($url == 'home' || $url == '')? "active" : ''}}"><a href="{{ url('home') }}"><i class='fa fa-dashboard'></i> <span>{!! trans('common.Dashboard') !!}</span></a></li>
            <li class="{{ ($url == 'users')? "active" : ''}}"><a href="{{ url('users') }}"><i class='fa fa-users'></i> <span>{!! trans('common.users') !!}</span></a></li>
            <li class="{{ ($url == 'email-list')? "active" : ''}}"><a href="{{ url('email-list') }}"><i class='fa fa-list'></i> <span>{!! trans('common.email-list') !!}</span></a></li>
            <li class="{{ ($url == 'template')? "active" : ''}}"><a href="{{ url('template') }}"><i class='fa fa-newspaper-o'></i> <span>{!! trans('common.template') !!}</span></a></li>
            <li class="{{ ($url == 'media')? "active" : ''}}"><a href="{{ url('media') }}"><i class='fa fa-picture-o'></i> <span>{!! trans('common.media') !!}</span></a></li>
            <li class="{{ ($url == 'send-mail')? "active" : ''}}"><a href="{{ url('send-mail') }}"><i class='fa fa-envelope'></i> <span>{!! trans('common.send-mail') !!}</span></a></li>
            <li class="{{ ($url == 'history')? "active" : ''}}"><a href="{{ url('history') }}"><i class='fa fa-list-alt'></i> <span>{!! trans('common.history') !!}</span></a></li>
            <li class="{{ ($url == 'activities')? "active" : ''}}"><a href="{{ url('activities') }}"><i class='fa fa-list-alt'></i> <span>{!! trans('common.Activities') !!}</span></a></li>
            @if(Auth::check() &&  Auth::user()->role == 'admin')
            <li class="treeview {{ (($url == 'oauth') || ($url == 'email') || ($url == 'theme')|| ($url == 'translation') || ($url == 'privacy')) ? "active" : ''}}">
                <a href="#"><i class='fa fa-cogs'></i> <span>{!! trans('common.Settings') !!}</span> <i class="fa fa-angle-right pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ ($url == 'email')? "active" : ''}}"><a href="{{ url('email') }}"><i class='fa fa-envelope-o'></i> <span>{!! trans('common.email').' '.trans('common.Settings') !!}</span></a></li>
                    <!-- <li class="{{ ($url == 'api')? "active" : ''}}"><a href="{{ url('api') }}"><i class='fa fa-envelope-o'></i> <span>{!! trans('common.api') !!}</span></a></li> -->
                    <li class="{{ ($url == 'oauth')? "active" : ''}}"><a href="{{ url('oauth') }}"><i class='fa fa-facebook'></i> <span>{!! trans('common.oauth').' '.trans('common.Settings') !!}</span></a></li>
                    <li class="{{ ($url == 'theme')? "active" : ''}}"><a href="{{ url('theme') }}"><i class='fa fa-codepen'></i> <span>{!! trans('common.Theme').' '.trans('common.Settings') !!}</span></a></li>
                    <li class="{{ ($url == 'translation')? "active" : ''}}"><a href="{{ url('translation') }}"><i class='fa fa-language'></i> <span>{!! trans('common.Translation') !!}</span></a></li>
                    <li class="{{ ($url == 'privacy')? "active" : ''}}"><a href="{{ url('privacy') }}"><i class='fa fa-archive'></i> <span>{!! trans('common.privacy') !!}</span></a></li>
                </ul>
            </li>
            @endif
            <li class="{{ ($url == 'backupDownload')? "active" : ''}}"><a href="{{ url('backupDownload') }}"><i class='fa fa-database'></i> <span>{!! trans('common.backup') !!}</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
