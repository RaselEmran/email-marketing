<div class="form-group {{ $errors->has('twitter_client_id') ? ' has-error' : '' }}">

    {!! Form::label('twitter_client_id',trans('common.client_id')) !!}
    {!! Form::text('twitter_client_id',isset($oauths['twitter_client_id'])?$oauths['twitter_client_id']:null, ['id' => 'twitter_client_id', 'class' =>'form-control', 'placeholder' => 'Enter'.' '.trans('common.twitter').' '.trans('common.client_id'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('twitter_client_id')}}
    </span>

</div>

<div class="form-group {{ $errors->has('twitter_client_secret') ? ' has-error' : '' }}">

    {!! Form::label('twitter_client_secret',trans('common.ClientSecret')) !!}
    {!! Form::text('twitter_client_secret',isset($oauths['twitter_client_secret'])?$oauths['twitter_client_secret']:null, ['id' => 'twitter_client_secret', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.twitter').' '.trans('common.ClientSecret'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('twitter_client_secret')}}
    </span>

</div>
<div class="form-group {{ $errors->has('twitter_redirect') ? ' has-error' : '' }}">

    {!! Form::label('twitter_redirect',trans('common.RedirectURL')) !!}
    {!! Form::text('twitter_redirect',isset($oauths['twitter_redirect'])?$oauths['twitter_redirect']:null, ['id' => 'twitter_redirect', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.twitter').' '.trans('common.RedirectURL')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('twitter_redirect')}}
    </span>

</div>
{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}