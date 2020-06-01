<div class="form-group required">
    {!! Form::label('group_name', trans('common.new') . ' '.  trans('common.group_name'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('name',null, ['id' => 'name', 'class' =>'form-control', 'autocomplete' => 'off']) !!}
        <p class="text-danger">{{$errors->first('name')}}</p>
    </div>
</div>

@if(count($groups) > 0)
<span class="col-lg-offset-3">Or</span>

<div class="form-group required">
    {!! Form::label('group_name',trans('common.select'). ' '.  trans('common.group_name'),['class'=> 'col-lg-3 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::select('existing_group_name', $groupNames, 'existing_group_name', [ 'class'=>'form-control', 'placeholder' => trans('common.select') . ' ' . trans('common.group_name')])!!}
        <p class="text-danger">{{$errors->first('existing_group_name')}}</p>
    </div>
</div>
@endif

@if(! isset($groupList))
<div class="form-group required">
    {!! Form::label('emails',trans('common.emails'),['class'=>' col-lg-3 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::textarea('emails',null, ['id' => 'emails', 'class' =>'form-control', 'placeholder'=>"support@xcoder.io, info@xcoder.io, help@xcoder.io"]) !!}
        <p class="text-danger">{{$errors->first('emails')}}</p>
    </div>
</div>

<div class="form-group required">
    {!! Form::label('upload_file',trans('common.upload_file'),['class'=>' col-lg-3 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::file('excel_file',null, ['id' => 'upload_file', 'class' =>'form-control ']) !!}
        <p class="text-danger">{{$errors->first('excel_file')}}</p>
        <span><a href="{{url('download_sample')}}">Download Sample Email List</a></span>
    </div>
</div>
@endif

<div class="form-group">
    <div class="col-lg-5 col-lg-offset-3">
        {!! Form::submit($submit_button,['class' => 'btn btn-sm btn-primary pull-right'])!!}
    </div>
</div>
