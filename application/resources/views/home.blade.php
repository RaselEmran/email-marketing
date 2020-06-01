@extends('app')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{trans('common.total')}}</span>
                    <span class="info-box-number">{!! count($activeUsers)+count($bannedUsers) !!}</span>
                    <a href="{{ url('users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion-ios-person-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{!! trans('common.active_users') !!}</span>
                    <span class="info-box-number">{{ count($activeUsers) }}</span>
                    <a href="{{ url('users/active') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-user-times"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">banned user</span>
                    <span class="info-box-number">{{ count($bannedUsers) }}</span>
                    <a href="{{ url('users/banned') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-sm-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Recent Registartion</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin" id="DataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Eamil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($activeUsers) > 0)
                                @foreach($activeUsers as $key => $User)
                                    <tr>
                                        <td><a href="{{ url('profile/'.$User->id) }}">{!! $key+1 !!}</a></td>
                                        <td><i class="fa fa-{{ $User->platform }}"></i>  <a href="{{ url('profile/'.$User->id) }}">{!! $User->name !!}</a></td>
                                        <td>{!! (isset($User->email))? $User->email : '' !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>{!! trans('common.no_data') !!}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Recent Banned</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin" id="DataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Eamil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($bannedUsers) > 0)
                                @foreach($bannedUsers as $key => $User)
                                    <tr>
                                        <td><a href="{{ url('profile/'.$User->id) }}">{!! $key+1 !!}</a></td>
                                        <td><i class="fa fa-{{ $User->platform }}"></i> <a href="{{ url('profile/'.$User->id) }}">{!! $User->name !!}</a></td>
                                        <td>{!! (isset($User->email))? $User->email : '' !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>{!! trans('common.no_data') !!}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

            </div>
        </div>
    </div>
@endsection
