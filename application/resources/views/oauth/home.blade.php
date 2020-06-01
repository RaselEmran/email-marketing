@extends('app')


@section('main-content')
    <div class="row" style="margin-top: 25px">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked navbar-custom-nav">

                <li class="<?php echo (Request::get('platform') == 'facebook') || (Request::get('platform') == '')? 'active' : null; ?>">
                    <a href="{{ url('/oauth?platform=facebook') }}">
                        <i class="fa fa-facebook"></i>
                        {!! trans('common.facebook') !!}
                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'google' ? 'active' : null; ?>">
                    <a href="{{ url('/oauth?platform=google') }}">
                        <i class="fa fa-google"></i>
                        {!! trans('common.google') !!}

                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'twitter' ? 'active' : null; ?>">
                    <a href="{{ url('/oauth?platform=twitter') }}">
                        <i class="fa fa-twitter"></i>
                        {!! trans('common.twitter') !!}
                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'linkedin' ? 'active' : null; ?>">
                    <a href="{{ url('/oauth?platform=linkedin') }}">
                        <i class="fa fa-linkedin"></i>
                        {!! trans('common.linkedin') !!}
                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'github' ? 'active' : null; ?>">
                    <a href="{{ url('/oauth?platform=github') }}">
                        <i class="fa fa-github"></i>
                        {!! trans('common.github') !!}
                    </a>
                </li>

            </ul>
        </div>

        <div class="col-md-6">
            <section class="box box-default" style="margin-top: 0px">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$pageName}}</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => "/oauth",'id'=>'oauth','class'=>'', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes']) !!}
                    @if(Request::get('platform'))
                        @include("oauth.". Request::get('platform') . "_form",['submit_button' => 'Submit'])
                    @else
                        @include("oauth.facebook_form",['submit_button' => 'Submit'])
                    @endif
                    {!! Form::close() !!}
                </div>
            </section>
        </div>

    </div>
@endsection