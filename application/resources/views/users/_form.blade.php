<div class="form-group required">
    {!! Form::label('name',trans('auth.fullname'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('name',null, ['id' => 'name', 'class' =>'form-control ', 'required' => 'true']) !!}
        <p class="text-danger">{{$errors->first('name')}}</p>
    </div>
</div>
<div class="form-group required">
    {!! Form::label('email',trans('common.email'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('email',null, ['id' => 'email', 'class' =>'form-control ', 'required' => 'true']) !!}
        <p class="text-danger">{{$errors->first('email')}}</p>
    </div>
</div>
@if(!isset($userInfo))
<div class="form-group required">
    {!! Form::label('password',trans('common.password'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-5">
        {!! Form::password('password', ['id' => 'password', 'class' =>'form-control ', 'maxlength' => '50', 'required' => 'true']) !!}
        <p class="text-danger">{{$errors->first('password')}}</p>
    </div>
</div>
@endif
<div class="form-group">
    <div class="col-lg-5 col-lg-offset-3">
        {!! Form::submit($submit_button,['class' => 'btn btn-sm btn-primary pull-right'])!!}
    </div>
</div>
