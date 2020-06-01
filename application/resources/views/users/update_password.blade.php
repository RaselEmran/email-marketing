@extends('app')

@section('main-content')
    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#update_password" data-toggle="tab">{{ trans('common.update'). ' ' . trans('common.password') }}</a></li>
        </ul>
        <div class="tab-content no-padding">
            <!-- ************** general *************-->
            <div class="tab-pane active" id="update_password">
                <div class="row">
                    {!! Form::open(['url' => "users/update_password/".Request::segment(3),'id'=>'client','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No']) !!}
                    <div class="form-group required">
                        {!! Form::label('previous_password',trans('common.previous'). ' ' . trans('common.password'),['class'=>' col-lg-3 control-label company-label']) !!}
                        <div class="col-lg-5">
                            {!! Form::password('previous_password',['id' => 'previous_password', 'class' =>'form-control ', 'maxlength' => '50', 'required' => 'true']) !!}
                            <span class="text-danger">{{ $errors->first('previous_password') }}</span>
                        </div>
                    </div>
                    <div class="form-group required">
                        {!! Form::label('new_password',trans('common.new'). ' ' . trans('common.password'),['class'=>' col-lg-3 control-label company-label']) !!}
                        <div class="col-lg-5">
                            {!! Form::password('new_password',['id' => 'new_password', 'class' =>'form-control ', 'maxlength' => '50', 'required' => 'true']) !!}
                            <span class="text-danger">{{ $errors->first('new_password') }}</span>
                        </div>
                    </div>

                    <div class="form-group required">
                        {!! Form::label('retype_password',trans('common.retype'). ' ' . trans('common.password'),['class'=>' col-lg-3 control-label company-label']) !!}
                        <div class="col-lg-5">
                            {!! Form::password('retype_password',['id' => 'retype_password', 'class' =>'form-control ', 'maxlength' => '50', 'required' => 'true']) !!}
                            <span class="text-danger">{{ $errors->first('retype_password') }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-5 col-lg-offset-3">
                            {!! Form::submit('Submit',['class' => 'btn btn-sm btn-primary pull-right'])!!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
