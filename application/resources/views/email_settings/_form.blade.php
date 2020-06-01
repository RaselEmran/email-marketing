<div id="php-mail">
    <div class="form-group required">

        <div class="col-md-3">
            <label class="radio-inline pull-right">
                Mail Driver
            </label>
        </div>
        <div class="col-md-7">
            <label class="radio-inline">
                <input type="radio" name="mail_driver" value="mail"
                       {{ (env('MAIL_DRIVER') == 'mail')? 'checked' : '' }} class="mail_driver_select"> {!! trans('common.phpmail') !!}
            </label>
            <label class="radio-inline">
                <input type="radio" name="mail_driver" value="smtp"
                       {{ (env('MAIL_DRIVER') == 'smtp')? 'checked' : '' }} class="mail_driver_select"> {!! trans('common.SMTP') !!}
            </label>
        </div>
    </div>
</div>


<div id="smtp" style="display:{{ (env('MAIL_DRIVER') == 'smtp')? 'block' : 'none' }}">
    <div class="form-group required">
        {!! Form::label('smtp_host',trans('common.smtp_host_name'),['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('smtp_host',isset($config['smtp_host'])?$config['smtp_host']:null, ['id' => 'smtp_host', 'class' =>'form-control', 'placeholder' => 'Enter'.' '.trans('common.smtp_host_name'),]) !!}
            {{$errors->first('smtp_host')}}

        </div>
    </div>


    <div class="form-group required">

        {!! Form::label('smtp_username',trans('common.smtp_username'),['class'=>'col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('smtp_username',isset($config['smtp_username'])?$config['smtp_username']:null, ['id' => 'smtp_username', 'class' =>'form-control ', 'placeholder' => 'Enter'.''.trans('common.smtp_username') ]) !!}
            {{$errors->first('smtp_username')}}

        </div>

    </div>

    <div class="form-group required">
        {!! Form::label('smtp_password',trans('common.SMTP Password'),['class'=>' col-md-3 control-label']) !!}
        <div class="col-md-7">
            <input type="password" name="smtp_password" value="{!! isset($config['smtp_password']) ? $config['smtp_password']:null !!}"
                   class="form-control" placeholder="your smtp password"/>
            {{$errors->first('smtp_password')}}
        </div>
    </div>

    <div class="form-group required">

        {!! Form::label('smtp_port',trans('common.SMTP Port') ,['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('smtp_port',isset($config['smtp_port'])?$config['smtp_port']:null, ['id' => 'smtp_port', 'class' =>'form-control','placeholder' => '587']) !!}
            {{$errors->first('smtp_port')}}

        </div>

    </div>

    <div class="form-group required">
        {!! Form::label('from_email',trans('common.from_email') ,['class'=>' col-md-3 control-label']) !!}
        <div class="col-md-7">
            {!! Form::text('from_email',isset($config['from_email'])?$config['from_email']:null, ['id' => 'from_email', 'class' =>'form-control','placeholder' => trans('common.from_email')]) !!}
            {{$errors->first('from_email')}}
        </div>
    </div>

    <div class="form-group required">
        {!! Form::label('name',trans('common.email_sender_name') ,['class'=>' col-md-3 control-label']) !!}
        <div class="col-md-7">
            {!! Form::text('name',isset($config['name'])?$config['name']:null, ['id' => 'name', 'class' =>'form-control', 'placeholder'=>trans('common.email_sender_name')]) !!}
            {{$errors->first('name')}}
        </div>
    </div>


</div>

<div class="form-group required">

    {!! Form::label(null,null,['class'=>' col-md-3 control-label']) !!}

    <div class="col-md-7">
        {!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}

    </div>

</div>
