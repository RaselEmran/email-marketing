<?php
$url = Request::segment(1);
if ($url == '' || $url == 'home') {
    $breadCrumb = trans('common.Dashboard');
} else if ($url == 'users') {
    $breadCrumb = trans('common.users');
} else if ($url == 'activities') {
    $breadCrumb = trans('common.Activities');
} else if ($url == 'email-list') {
    $breadCrumb = trans('common.email-list');
} else if ($url == 'template') {
    $breadCrumb = trans('common.template');
} else if ($url == 'media') {
    $breadCrumb = trans('common.media');
} else if ($url == 'send-mail') {
    $breadCrumb = trans('common.send-mail');
} else if ($url == 'history') {
    $breadCrumb = trans('common.history');
} else if ($url == 'oauth') {
    $breadCrumb = trans('common.Oauth') . ' ' . trans('common.Settings');
    if (Request::get('platform') == 'facebook' || Request::get('platform') == '') {
        $platform = trans('common.facebook');
    } else if (Request::get('platform') == 'google') {
        $platform = trans('common.google');
    } else if (Request::get('platform') == 'twitter') {
        $platform = trans('common.twitter');
    } else if (Request::get('platform') == 'linkedin') {
        $platform = trans('common.linkedin');
    } else if (Request::get('platform') == 'github') {
        $platform = trans('common.github');
    }
} else if ($url == 'email') {

    $breadCrumb =  trans('common.Oauth') . ' ' . trans('common.Settings');
    $subMenu = 'Email Settings';
} else if ($url == 'theme') {
    $breadCrumb =  trans('common.Oauth') . ' ' . trans('common.Settings');
    $subMenu =  trans('common.Theme') . ' ' . trans('common.Settings');
} else if ($url == 'translation') {
    $breadCrumb =  trans('common.Oauth') . ' ' . trans('common.Settings');
    $subMenu =  trans('common.Translation') ;
} else if ($url == 'profile') {
    $breadCrumb =  trans('common.Profile');
} else if ($url == 'privacy') {
    $breadCrumb =  trans('common.privacy');
} else {
    $breadCrumb = 'N/A';
}
?>
<ol class="breadcrumb">
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">{{ $breadCrumb }}</li>
    @if(isset($platform))
        <li class="active">{{ $platform }} </li>
    @elseif(isset($subMenu))
        <li class="active">{{ $subMenu }} </li>
    @endif
</ol>

