@extends('app')

@section('htmlheader_title')
    Home
    @endsection
            <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

@section('main-content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{!! trans('common.only_privacy') !!}</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url' => "/privacy",'id'=>'oauth','class'=>'', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes']) !!}
            {!! Form::textarea('privacy',configValue('privacy')?configValue('privacy'):null, ['id' => 'editor1', 'class' =>'form-control']) !!}
            <br/>
            {!! Form::submit('update',['class' => 'btn btn-primary'])!!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{!! trans('common.term&condition') !!}</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url' => "/storeTerms",'id'=>'oauth','class'=>'', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes']) !!}
            {!! Form::textarea('termCondition',configValue('termCondition')?configValue('termCondition'):null, ['id' => 'editor2', 'class' =>'form-control']) !!}
            <br/>
            {!! Form::submit('update',['class' => 'btn btn-primary'])!!}
            {!! Form::close() !!}
        </div>
    </div>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
            CKEDITOR.replace('editor2');
        });
    </script>
@endsection