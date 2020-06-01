<div class="form-group {{ $errors->has('google_client_id') ? ' has-error' : '' }}">

    {!! Form::label('google_client_id',trans('common.client_id')) !!}
    {!! Form::text('google_client_id',isset($oauths['google_client_id'])?$oauths['google_client_id']:null, ['id' => 'google_client_id', 'class' =>'form-control', 'placeholder' => 'Enter'.' '.trans('common.google').' '.trans('common.client_id'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('google_client_id')}}
    </span>

</div>

<div class="form-group {{ $errors->has('google_client_secret') ? ' has-error' : '' }}">

    {!! Form::label('google_client_secret',trans('common.ClientSecret')) !!}
    {!! Form::text('google_client_secret',isset($oauths['google_client_secret'])?$oauths['google_client_secret']:null, ['id' => 'google_client_secret', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.google').' '.trans('common.ClientSecret'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('google_client_secret')}}
    </span>

</div>
<div class="form-group {{ $errors->has('google_redirect') ? ' has-error' : '' }}">

    {!! Form::label('google_redirect',trans('common.RedirectURL')) !!}
    {!! Form::text('google_redirect',isset($oauths['google_redirect'])?$oauths['google_redirect']:null, ['id' => 'google_redirect', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.google').' '.trans('common.RedirectURL')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('google_redirect')}}
    </span>

</div>

{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}