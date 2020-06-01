<div class="form-group required">

    {!! Form::label('site_name',trans('common.site_name'),['class'=>' col-md-3 control-label']) !!}

    <div class="col-md-7">
        {!! Form::text('site_name',configValue('site_name')?configValue('site_name'):'Social Oauth Login', ['id' => 'invoice_prefix', 'class' =>'form-control ', 'placeholder' => trans('common.enter').' '.trans('common.site_name')]) !!}
        {{$errors->first('site_name')}}

    </div>
</div>
<div class="form-group required">
    {!! Form::label('company_email',trans('common.app_email'),['class'=>' col-md-3 control-label']) !!}

    <div class="col-md-7">
        {!! Form::text('company_email',configValue('company_email')?configValue('company_email'):null, ['id' => 'company_email', 'class' =>'form-control ', 'placeholder' => trans('common.enter').' '.trans('common.app_email')]) !!}
        {{$errors->first('company_email')}}

    </div>
</div>

<div class="form-group required">

    {!! Form::label('company_address',trans('common.company_address'),['class'=>' col-md-3 control-label']) !!}

    <div class="col-md-7">
        {!! Form::text('company_address',configValue('company_address')?configValue('company_address'):null, ['id' => 'company_address', 'class' =>'form-control ', 'placeholder' => trans('common.enter').' '.trans('common.company_address'), 'maxlength' => '50',]) !!}
        {{$errors->first('company_address')}}

    </div>

</div>


    <div class="form-group required">

        {!! Form::label('sidebar_theme',trans('common.sidebar_theme'),['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::select('sidebar_theme',['blue'=>'Blue','black'=>'Black','yellow'=>'Yellow','green'=>'Green','purple'=>'Purple','red'=>'Red','blue-light'=>'Blue Light','black-light'=>'Black-Light','yellow-light'=>'Yellow-Light','green-light'=>'Green-Light','purple-light'=>'Purple-Light','red-light'=>'Red-Light'],configValue('sidebar_theme'), ['id' => 'sidebar_theme', 'class' =>'form-control select_box']) !!}
            {{$errors->first('sidebar_theme')}}

        </div>

    </div>
    <div class="form-group required">

        {!! Form::label(null,null,['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}

        </div>

    </div>
