@extends('auth.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="register-page">
    <div class="register-logo" style="margin-top: 60px">
        <a href="{{ url('/home') }}">{!! configValue('site_name') !!}</a>
    </div>
    <div class="register-box">


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {!! trans('auth.input_error') !!} <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif(Session::has('login_error_msg'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ Session::get('login_error_msg') }}</li>
                </ul>
            </div>
        @endif

        <div class="register-box-body">
            <div class="text-center">
                <div class="icon-object border-success text-success" style="padding: 17px 21px;margin: 0px"><i class="fa fa-plus" style="font-size: 22px"></i></div>
                <h4 style="letter-spacing: -.015em;font-size: 15px" class="content-group">{!! trans('auth.Create account') !!} <small class="display-block">{!! trans('auth.required_field') !!}</small></h4>
            </div>


            <form action="{{ url('/register') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="{!! trans('auth.fullname') !!}" name="name"
                           value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="{!! trans('common.email') !!}" name="email"
                           value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{!! trans('common.password') !!}" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder=" {!! trans('common.Retype').' '.trans('common.password') !!}"
                           name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <div class="checkbox icheck " style="margin-top: 20px;margin-bottom: 20px">
                    <label>
                        <input type="checkbox"> {!! trans('auth.agrre_the') !!} <a target="_blank" href="{{ url('termsCondition') }}">{!! trans('auth.terms') !!}</a> {!! trans('common.and') !!} <a target="_blank" href="{{ url('privacyPolicy') }}">{!! trans('common.privacy_policy') !!}</a>
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-login btn-block">{!! trans('auth.Register') !!} <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p class="text-muted"> {!! trans('auth.or sign in with') !!}  </p>
                <ul class="list-inline social-btn text-center">
                    <li><a href="{{ url('facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ url('google') }}" class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="{{ url('twitter') }}" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ url('linkedin') }}" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="{{ url('github') }}" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a></li>
                </ul>
            </div>
            <!-- /.social-auth-links -->
            <div class="content-divider text-muted form-group "><span>{!! trans('auth.already_member') !!}</span></div>
            <a href="{{ url('/login') }}" style="padding: 6px" class="btn btn-default btn-block content-group">{!! trans('auth.log_in') !!}</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    @include('auth.scripts')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    </body>

@endsection
