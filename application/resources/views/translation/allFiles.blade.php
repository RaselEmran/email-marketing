@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-md-9">
            <section class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$pageName}}</h3>
                </div>
                <div class="box-body">


                    <table class="table">
                        <thead>
                        <tr>
                            <td>{!! trans('common.language') !!}</td>
                            <td>{!! trans('common.progress') !!}</td>
                            <td>{!! trans('common.done') !!}</td>
                            <td>{!! trans('common.total') !!}</td>
                            <td>{!! trans('common.action') !!}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($dirs as $dir)
                            <?php $done = \App\Http\Controllers\Translation\TranslationController::getLangDirNumber(Request::get('locale'), $dir);
                            $total = \App\Http\Controllers\Translation\TranslationController::getLangDirNumber('en_US', $dir); ?>
                            <tr>
                                <td>
                                    <a href="{{ url('/translation?locale='. Request::get('locale'). '&fileName='.$dir) }}">
                                        @if($dir == 'common')
                                            {{ 'Main Application' }}
                                        @elseif($dir == 'auth')
                                            {{ 'Authentication' }}
                                        @else
                                        {{$dir}}</a>
                                        @endif
                                </td>
                                <td>
                                    <div class="progress">
                                        <?php
                                        $view_status = (int) ($done / $total * 100);
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
                                <td>{!!  $done !!}</td>
                                <td>{!! $total !!}</td>
                                <td> <a href="{{ url('/translation?locale='. \Illuminate\Support\Facades\Input::get('locale'). '&fileName='.$dir) }}"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="{{trans('common.edit')}}"><i class="fa fa-edit"></i></button></a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

    </div>
@endsection