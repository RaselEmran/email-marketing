<div class="form-group required">
    {!! Form::label('title',trans('common.title')) !!}
    {!! Form::text('title',null, ['id' => 'title', 'class' =>'form-control', 'required' => 'true']) !!}
    <p class="text-danger">{{$errors->first('title')}}</p>
</div>

<div class="form-group required">
    {!! Form::label('media',trans('common.media')) !!}
    {!! Form::file('media',null, ['id' => 'media', 'class' =>'form-control', 'required' => 'true']) !!}
    <p class="text-danger">{{$errors->first('caption')}}</p>
</div>

<div class="form-group">
    {!! Form::submit($submit_button,['class' => 'btn btn-sm btn-primary'])!!}
</div>