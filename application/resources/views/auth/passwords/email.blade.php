@extends('auth.auth')

@section('htmlheader_title')
    {!! trans('auth.Password recovery') !!}
@endsection

@section('content')

    <body class="login-page">
    <div class="login-logo" style="margin-top: 60px">
        <a href="{{ url('/home') }}">{!! configValue('site_name') !!}</a>
    </div>
    <div class="login-box">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {!! trans('auth.input_error') !!}.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="login-box-body">
            <div class="text-center">
                <div class="icon-object border-warning text-warning"><i class="fa fa-spinner"></i></div>
                <h5 style="font-size: 15px" class="content-group">{!! trans('auth.Password recovery') !!} <small class="display-block">{!! trans('auth.password_send') !!}</small></h5>
            </div>
            {{--<p class="login-box-msg">Reset Password</p>--}}
            <form action="{{ url('/password/email') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="{!! trans('common.email') !!}" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-login btn-block">{!! trans('auth.reset_password') !!} <i class="fa fa-arrow-right"></i>
                    </button>
                </div>

            </form>
            <div class="content-divider text-muted form-group "><span>{!! trans('auth.remember_password') !!}</span></div>
            <a href="{{ url('login') }}" style="padding: 6px" class="btn btn-default btn-block content-group">{!! trans('auth.log_in') !!}</a>


        </div><!-- /.login-box-body -->


    </div><!-- /.login-box -->

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
