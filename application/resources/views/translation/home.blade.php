@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <section class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$pageName}}</h3>
                </div>
                <div class="box-body">

                    {!! Form::open(['url' => "/translation",'id'=>'project','class'=>'form-inline pull-right', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes']) !!}

                    <div class="form-group required {{ $errors->has('locale') ? ' has-error' : '' }}">
                        {!! Form::select('locale', $locals, null, ['id' => 'locale', 'class' =>'form-control select_box']) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">{{trans('common.add') .' '.  trans('common.translation')}}</button>

                    {!! Form::close() !!}

                    <table class="table">
                        <thead>
                        <tr>
                            <td>{!! trans('common.icon') !!}</td>
                            <td>{!! trans('common.language') !!}</td>
                            <td>{!! trans('common.progress') !!}</td>
                            <td>{!! trans('common.done') !!}</td>
                            <td>{!! trans('common.total') !!}</td>
                            <td>{!! trans('common.action') !!}</td>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($languages as $language)
                            <tr>
                                <td class="col-sm-1"><img src="{{ url('img/flags/'. strtolower(explode('_', \App\Models\Translation\Language::langDetail($language->locale)->locale)[1] . '.svg')) }}" style="width: 11px;height: 16px"></td>
                                <td>{!!  \App\Models\Translation\Language::langDetail($language->locale)->name !!}</td>

                                <td >
                                    <div class="progress">
                                        <?php
                                        $view_status = (int) (\App\Http\Controllers\Translation\TranslationController::getLangDirNumber($language->locale) / $totalTrans * 100);
                                        $status = 'danger';
                                        if ($view_status > 20) {
                                            $status = 'warning';
                                        } if ($view_status > 50) {
                                            $status = 'primary';
                                        } if ($view_status > 80) {
                                            $status = 'success';
                                        }
                                        ?>
                                        <div class="progress-bar progress-bar-{!! $status !!}" role="progressbar" aria-valuenow="{!! $view_status !!}" aria-valuemin="0" aria-valuemax="100" style="width: {!! $view_status !!}%;">
                                            {!! $view_status !!}%
                                        </div>
                                    </div>

                                    </td>
                                <td class="col-sm-1">{!!  \App\Http\Controllers\Translation\TranslationController::getLangDirNumber($language->locale) !!}</td>
                                <td class="col-sm-1">{!!  $totalTrans or '' !!}</td>

                                <td class="col-sm-2">

                                    <a href="{{  url('/updateLanguage/'. $language->id )}}"><button class="btn {{ $language->status == 1 ? 'btn-success' :'btn-danger' }} btn-xs" data-toggle="tooltip" data-placement="top" title="{{trans('common.change')}}"><i class="fa fa-check"></i></button></a>
                                    <a href="{{  url('/translation?locale=' . $language->locale)}}"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="{{trans('common.edit')}}"><i class="fa fa-edit"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </section>
        </div>

    </div>
@endsection