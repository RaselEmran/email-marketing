<div class="form-group required">
    {!! Form::label('name',trans('common.name')) !!}
    {!! Form::text('name',null, ['id' => 'name', 'class' =>'form-control', 'required' => 'true']) !!}
    <p class="text-danger">{{$errors->first('name')}}</p>
</div>

<div class="form-group required">
    {!! Form::label('template',trans('common.template')) !!}
    <span class="btn btn-link"><a href="#" onclick="loadModal()">{{ trans('common.media'). ' ' . trans('common.import')}}</a></span>
    {!! Form::textarea('template',null, ['id' => 'summernote', 'class' =>'form-control', 'required' => 'true']) !!}
    <p class="text-danger">{{ $errors->first('template') }}</p>
    <span class="text-danger">Use this variable {USERNAME} to show user name</span>
</div>

<div class="form-group">
    {!! Form::submit($submit_button,['class' => 'btn btn-sm btn-primary'])!!}
</div>