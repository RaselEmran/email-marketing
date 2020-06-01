
    <div class="form-group {{ $errors->has('github_client_id') ? ' has-error' : '' }}">

        {!! Form::label('github_client_id',trans('common.client_id')) !!}
        {!! Form::text('github_client_id',isset($oauths['github_client_id'])?$oauths['github_client_id']:null, ['id' => 'github_client_id', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.github').' '.trans('common.client_id')]) !!}
        <span class="text-danger help-block">
        {{$errors->first('github_client_id')}}
    </span>

    </div>

    <div class="form-group {{ $errors->has('github_client_secret') ? ' has-error' : '' }}">

        {!! Form::label('github_client_secret',trans('common.ClientSecret')) !!}
        {!! Form::text('github_client_secret',isset($oauths['github_client_secret'])?$oauths['github_client_secret']:null, ['id' => 'github_client_secret', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.github').' '.trans('common.ClientSecret')]) !!}
        <span class="text-danger help-block">
        {{$errors->first('github_client_secret')}}
    </span>

    </div>
    <div class="form-group {{ $errors->has('github_redirect') ? ' has-error' : '' }}">

        {!! Form::label('github_redirect',trans('common.RedirectURL')) !!}
        {!! Form::text('github_redirect',isset($oauths['github_redirect'])?$oauths['github_redirect']:null, ['id' => 'github_redirect', 'class' =>'form-control', 'placeholder' => 'Enter '.trans('common.github').' '.trans('common.RedirectURL')]) !!}
        <span class="text-danger help-block">
        {{$errors->first('github_redirect')}}
    </span>

    </div>

    {!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}