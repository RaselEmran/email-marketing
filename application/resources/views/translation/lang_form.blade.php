@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')

    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-10">
            {!! Form::open(['url' => "insertLang",'id'=>'project','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes']) !!}
            <section class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$pageName}}</h3>

                    <div class="box-tools pull-right">
                        <button type="submit" class="btn btn-primary">{{trans('common.submit')}}</button>
                    </div>
                </div>
                <div class="box-body">

                    {{--{{ $fileName }}--}}
                    {{--{{ $localeName }}--}}

                    <input type="hidden" name="locale" value="{{ $localeName }}">
                    <input type="hidden" name="fileName" value="{{ $fileName }}">

                    @foreach($langNames as $key => $langName)
                        <div class="form-group">
                            {!! Form::label($key, $langName,['class'=>' col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text($key, (!empty($trans[$key]) ?  $trans[$key]: null), ['id' => $key, 'class' =>'form-control ', 'placeholder' => 'Enter '. $langName, 'maxlength' => '50',]) !!}
                                {{$errors->first($key)}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            {!! Form::close() !!}
        </div>

    </div>
@endsection