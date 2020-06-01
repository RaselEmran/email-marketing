<div class="form-group required">
    {!! Form::label('bulkemailchecker',trans('common.bulkemailchecker'),['class'=>' col-md-3 control-label']) !!}

    <div class="col-md-7">
        {!! Form::text('bulkemailchecker',($bulkEmailChecker && (env('APP_ENV', false) != 'demo') ) ? $bulkEmailChecker->key : null, ['id' => 'bulkemailchecker', 'class' =>'form-control', 'placeholder' => 'Enter'.' '.trans('common.bulkemailchecker'),]) !!}
        {{$errors->first('bulkemailchecker')}}

    </div>
</div>


<div class="form-group required">

    {!! Form::label('emaillistverify',trans('common.emaillistverify'),['class'=>'col-md-3 control-label']) !!}

    <div class="col-md-7">
        {!! Form::text('emaillistverify', ($emailListVerify && (env('APP_ENV', false) != 'demo')) ? $emailListVerify->key : null, ['id' => 'emaillistverify', 'class' =>'form-control ', 'placeholder' => 'Enter'.''.trans('common.emaillistverify') ]) !!}
        {{$errors->first('emaillistverify')}}

    </div>
</div>

<div class="form-group required">

    {!! Form::label(null,null,['class'=>' col-md-3 control-label']) !!}

    <div class="col-md-7">
        {!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}

    </div>

</div>