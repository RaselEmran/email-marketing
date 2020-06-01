<div class="form-group required">
    {!! Form::label('emails',trans('common.emails') .' ' . trans('common.addresses'),['class'=>' col-lg-3 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::textarea('emails',null, ['id' => 'emails', 'class' =>'form-control ', 'required' => 'true']) !!}
        <p class="text-danger">{{$errors->first('emails')}}</p>
    </div>
</div>

<div class="form-group required">
    {!! Form::label('template', trans('common.template'),['class'=> 'col-lg-3 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::select('template', $templates, 'template', [ 'class'=>'form-control', 'placeholder' => 'Pick Template'])!!}
        <p class="text-danger">{{$errors->first('template')}}</p>
    </div>
</div>

<div class="form-group required">
    {!! Form::label('subject',trans('common.subject'),['class'=>' col-lg-3 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('subject',null, ['id' => 'subject', 'class' =>'form-control ', 'required' => 'true']) !!}
        <p class="text-danger">{{$errors->first('subject')}}</p>
    </div>
</div>
<input type="hidden" name="email_identifier" value="emails">

<div class="form-group" id="div_schedule_email">
    <div class="col-lg-6 control-label">
        <span class="label label-warning"><a href="#" class="schedule_email" style="color: white; font-size: 10px;">{{ trans('common.send_later') }}</a></span>
    </div>
</div>

<div class="form-group" id="datetime_email_div" style="display: none">
    {!! Form::label('datetime',trans('common.datetime'),['class'=>' col-lg-3 control-label']) !!}
    <div class="col-lg-5">
        <input class="datetime" data-format="DD-MM-YYYY h:mm a" data-template="DD / MM / YYYY hh : mm a" name="datetime" type="text">

        <p class="text-danger">{{$errors->first('datetime')}}</p>
    </div>
</div>

<div class="form-group" style="display: none" id="remove_schedule_email">
    <div class="col-lg-6 control-label">
        <span class="label label-danger"><a href="#" class="schedule_email" style="color: white; font-size: 10px;">{{ trans('common.remove_send_later') }}</a></span>
    </div>
</div>

<input type="hidden" id="send_later_identifier_email" name="send_later_email" value="0">

<input type="hidden" class="timezone" name="timezone" value="0">

<div class="form-group">
    <div class="col-lg-5 col-lg-offset-3">
        {!! Form::reset('Reset',['class' => 'btn btn-sm btn-info'])!!}
        {!! Form::submit($submit_button,['class' => 'btn btn-sm btn-primary pull-right confirm-swl'])!!}
    </div>
</div>