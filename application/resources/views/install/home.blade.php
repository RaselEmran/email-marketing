<html>
<head>
    <meta charset="UTF-8">
    <title> Email Marketing | Installation </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
</head>
<style>
    body {
        background-color: #F2F2F2;

    }

    .room {
        background-color: #fff;
        margin-bottom: 20px;
        box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);

    }

    table {
        font-size: 14px
    }

    tbody > tr > td .label {
        line-height: 1.5384616;
    }

    table a {
        color: #333;
    }
</style>

<body>
<div class="container" style="margin-top:50px ">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 " style=" padding-top: 10px;">
            <div class="panel panel-primary room">
                <div class="panel-heading">
                    <strong>
                         Email Marketing | Installation
                    </strong>
                </div>
                {{--<-- system requirements Start-->--}}
                <div class="panel-body" id="extensions">
                    <h4 class="text-center">System Requirements</h4>
                    <hr style="margin: 0px"/>
                    @if(Session::has('extensions_error'))
                        <div style="padding-top: 10px; padding-bottom: 10px;">
                            <p class="text-danger text-center">{{ Session::get('extensions_error') }}</p>
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Extensions</td>
                            <td>Result</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>PHP 5.5.9 +</td>
                            @if($php_version['actual'])
                                <td><span class="label label-success">PHP {{ $php_version['version'] }}</span></td>
                            @else
                                <td><span class="label label-danger">PHP {{ $php_version['version'] }}</span></td>
                            @endif
                        </tr>
                        @foreach($extensions as $ext)
                            <tr>
                                <td><a target="_blank" href="{{ $ext['link'] }}"> {{ $ext['name'] }}</a></td>
                                @if($ext['expected'] === $ext['actual'])
                                    <td>
                                        <span class="label label-success">{{ ($ext['actual'] === true)? 'Enable' : 'Disable' }}</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="label label-danger">{{  ($ext['actual'] === true)? 'Enable' : 'Disable' }}</span>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="form-group last" style="display: @if($extensions_problem) none; @endif ">
                        <div class="pull-right ">
                            <button type="submit" class="btn btn-primary btn-sm"
                                    onclick="next('extensions', '{{ $extensions_problem }}')" id="submit">Next <i
                                        class="glyphicon glyphicon-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                {{--<-- system requirements End-->--}}
                {{--=== **************** ======--}}

                {{--<-- system requirements Start-->--}}
                <div class="panel-body" id="folders">
                    <h4 class="text-center">Permissions</h4>
                    <hr style="margin: 0px"/>
                    @if(Session::has('folders_error'))
                        <div style="padding-top: 10px; padding-bottom: 10px;">
                            <p class="text-danger text-center">{{ Session::get('folders_error') }}</p>
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Directory</td>
                            <td>Result</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($folderWritable as $folderWri)
                            <tr>
                                <td>{{ $folderWri['path'] }}</td>
                                @if($folderWri['writable'])
                                    <td><span class="label label-success">Writable</span></td>
                                @else
                                    <td><span class="label label-danger">not writable</span></td>
                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="form-group last" style="display: @if($folders_problem) none @endif">
                        <div class="pull-right ">
                            <button type="submit" class="btn btn-primary btn-sm"
                                    onclick="next('folders', '{{ $folders_problem }}')" id="submit">Next <i
                                        class="glyphicon glyphicon-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                {{--<-- system requirements End-->--}}
                {{--=== **************** ======--}}

                {{--<-- Database Configuration Start-->--}}
                <div class="panel-body" id="database">

                    <h4 class="text-center">Database Configuration</h4>
                    <hr style="margin: 0px"/>
                    @if(Session::has('connection_error'))
                        <div style="padding-top: 10px;">
                            <p class="text-danger text-center">{{ Session::get('connection_error') }}</p>
                        </div>
                    @endif
                    <form action="{{  url('install/store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label text-right">Hostname</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" name="host" id="host"
                                       value="{{ (old('host'))? old('host') :'localhost' }}" placeholder="">

                                <p class="text-danger">{{$errors->first('host')}}</p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="database_name" class="col-md-3 control-label text-right">Database Name</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" name="database_name" id="database_name"
                                       value="{{ old('database_name') }}" placeholder="">

                                <p class="text-danger">{{$errors->first('database_name')}}</p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="username" class="col-md-3 control-label text-right">Username</label>

                            <div class="col-md-9">
                                <input type="text" name="username" class="form-control" id="username"
                                       value="{{ old('username') }}" placeholder="">

                                <p class="text-danger">{{$errors->first('username')}}</p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="col-md-3 control-label text-right">Password</label>

                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="">

                                <p class="text-danger">{{$errors->first('password')}}</p>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-8">
                                <button type="submit" class="btn btn-success btn-sm" id="submit">Install</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer"><a target="_blank" href="http://www.xcoder.io" style="color: #333"> ©
                        xcoder.io</a>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(function () {
        @if(Session::has('extensions_error'))
            $('#folders').addClass('hidden');
        $('#database').addClass('hidden');
        @elseif(Session::has('folders_error'))
            $('#extensions').addClass('hidden');
        $('#database').addClass('hidden');
        @elseif(Session::has('connection_error'))
            $('#extensions').addClass('hidden');
        $('#folders').addClass('hidden');
        @else
            $('#folders').addClass('hidden');
        $('#database').addClass('hidden');
        @endif

    });

    function next(check_type, problem) {
        if ((check_type == 'extensions') && (!problem)) {
            $('#extensions').addClass('hidden');
            $('#folders').removeClass('hidden');
            if (!$('#database').hasClass('hidden')) {
                $('#database').addClass('hidden');
            }
        } else if ((check_type == 'folders') && (!problem)) {
            if (!$('#extensions').hasClass('hidden')) {
                $('#extensions').addClass('hidden');
            }
            $('#folders').addClass('hidden');
            $('#database').removeClass('hidden');
        }
    }
</script>

</body>
</html>


