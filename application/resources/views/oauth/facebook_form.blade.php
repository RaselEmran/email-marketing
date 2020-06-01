<div class="form-group {{ $errors->has('facebook_client_id') ? ' has-error' : '' }}">

    {!! Form::label('facebook_client_id',trans('common.client_id')) !!}
    {!! Form::text('facebook_client_id',isset($oauths['facebook_client_id'])?$oauths['facebook_client_id']:null, ['id' => 'facebook_client_id', 'class' =>'form-control', 'placeholder' => 'Enter'.' '.trans('common.facebook').' '.trans('common.client_id'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('facebook_client_id')}}
    </span>

</div>

<div class="form-group {{ $errors->has('facebook_client_secret') ? ' has-error' : '' }}">

    {!! Form::label('facebook_client_secret',trans('common.ClientSecret')) !!}
    {!! Form::text('facebook_client_secret',isset($oauths['facebook_client_secret'])?$oauths['facebook_client_secret']:null, ['id' => 'facebook_client_secret', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.facebook').' '.trans('common.ClientSecret'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('facebook_client_secret')}}
    </span>

</div>

<div class="form-group {{ $errors->has('facebook_redirect') ? ' has-error' : '' }}">

    {!! Form::label('facebook_redirect',trans('common.RedirectURL')) !!}
    {!! Form::text('facebook_redirect',isset($oauths['facebook_redirect'])?$oauths['facebook_redirect']:null, ['id' => 'facebook_redirect', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.facebook').' '.trans('common.RedirectURL')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('facebook_redirect')}}
    </span>

</div>
{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}