<div class="form-group {{ $errors->has('linkedin_client_id') ? ' has-error' : '' }}">

    {!! Form::label('linkedin_client_id',trans('common.client_id')) !!}
    {!! Form::text('linkedin_client_id',isset($oauths['linkedin_client_id'])?$oauths['linkedin_client_id']:null, ['id' => 'linkedin_client_id', 'class' =>'form-control', 'placeholder' => 'Enter'.' '.trans('common.linkedin').' '.trans('common.client_id'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('linkedin_client_id')}}
    </span>

</div>

<div class="form-group {{ $errors->has('linkedin_client_secret') ? ' has-error' : '' }}">

    {!! Form::label('linkedin_client_secret',trans('common.ClientSecret')) !!}
    {!! Form::text('linkedin_client_secret',isset($oauths['linkedin_client_secret'])?$oauths['linkedin_client_secret']:null, ['id' => 'linkedin_client_secret', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.linkedin').' '.trans('common.ClientSecret'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('linkedin_client_secret')}}
    </span>

</div>
<div class="form-group {{ $errors->has('linkedin_redirect') ? ' has-error' : '' }}">

    {!! Form::label('linkedin_redirect',trans('common.RedirectURL')) !!}
    {!! Form::text('linkedin_redirect',isset($oauths['linkedin_redirect'])?$oauths['linkedin_redirect']:null, ['id' => 'linkedin_redirect', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.linkedin').' '.trans('common.RedirectURL')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('linkedin_redirect')}}
    </span>

</div>

{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}