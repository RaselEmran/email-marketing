@extends('auth.auth')

@section('htmlheader_title')
    Password reset
@endsection

@section('content')

    <body class="login-page">
    <div class="login-box">

        <!-- /.login-logo -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
            <div class="text-center">
                <div class="icon-object border-reset text-warning"><i class="fa fa-spinner"></i></div>
                <h5 style="font-size: 15px" class="content-group">Reset Password
                    <small class="display-block">All fields are required</small>
                </h5>
            </div>

            <form action="{{ url('/password/reset') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                           value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="New Password" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Retype Password"
                           name="password_confirmation"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-login btn-block">Reset Password <i
                                class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </form>

            <div class="content-divider text-muted form-group " style="margin-top: 10px"><span>I already have a membership</span>
            </div>
            <a href="{{ url('login') }}" style="padding: 6px" class="btn btn-default btn-block content-group">Log
                In</a>

            <div class="social-auth-links text-center">
                <p class="text-muted"> or sign in with </p>
                <ul class="list-inline social-btn text-center">
                    <li><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a></li>
                </ul>
            </div>

            <!-- /.social-auth-links -->
            <div class="content-divider text-muted form-group "><span>Don't have an account?</span></div>
            <a href="{{ url('register') }}" style="padding: 6px" class="btn btn-primary btn-block content-group">Sign
                up</a>

        </div>
        <!-- /.login-box-body -->

    </div>
    <!-- /.login-box -->

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
