@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <style type="text/css">
        .form-control-static {
            padding-top: 3px;
        }

        .control-label {
            font-weight: bold;

        }
    </style>
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-10">
            <section class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$pageName}}</h3>
                </div>
                <div class="box-body form-horizontal">

                    <div class="row">
                        <label for="inputEmail3" class="col-sm-2 control-label text-left">{!! trans('common.name') !!}
                            :</label>

                        <div class="col-sm-10">
                            <div class="form-control-static">
                                {{ $user->name }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputEmail3" class="col-sm-2 control-label text-left">{!! trans('common.email') !!}
                            :</label>

                        <div class="col-sm-10">
                            <div class="form-control-static">
                                {{ $user->email }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputEmail3" class="col-sm-2 control-label text-left">{!! trans('common.role') !!}
                            :</label>

                        <div class="col-sm-10">
                            <div class="form-control-static">
                                @if($user->role == 'admin')
                                    <span class="label label-warning">{{ trans('common.admin') }}</span>
                                @else
                                    <span class="label label-info">{{ trans('common.user') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputEmail3" class="col-sm-2 control-label text-left">{!! trans('common.status') !!}
                            :</label>

                        <div class="col-sm-10">
                            <div class="form-control-static">
                                @if($user->status == 'Active')
                                    <span class="label label-success">{{ $user->status }}</span>
                                @else
                                    <span class="label label-danger">{{ $user->status }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputEmail3"
                               class="col-sm-2 control-label text-left">{!! trans('common.create_at') !!}
                            :</label>

                        <div class="col-sm-10">
                            <div class="form-control-static">
                                <span class="label label-danger">{{ $user->created_at }}</span>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputEmail3" class="col-sm-2 control-label text-left">{!! trans('common.photo') !!}
                            :</label>

                        <div class="col-sm-10">
                            <div class="form-control-static">
                                @if(Request::segment(2) && (Request::segment(2) != Auth::id()) && (Auth::user()->role != 'admin')))
                                    <div class="fileinput-new thumbnail" style="width: 210px;">
                                        @if (isset($user->photo) && ($user->photo != ''))
                                            @if(strpos($user->photo, 'http') === false)
                                                {!! Html::image('upload/'.$user->photo) !!}
                                            @else
                                                <img src="{{ $user->photo }}" alt="User Image"/>
                                            @endif
                                        @else
                                            <img src="{{ url('img/default.png') }}"
                                                 alt="No Photo">
                                        @endif
                                    </div>
                                @else
                                    {!! Form::open(['url' => "profile",'id'=>'profile','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No','files' => true]) !!}
                                    <div class="form-group required">
                                        <div class="col-md-5">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 210px;">
                                                    @if (isset($user->photo) && ($user->photo != ''))
                                                        @if(strpos($user->photo, 'http') === false)
                                                            {!! Html::image('upload/'.$user->photo) !!}
                                                        @else
                                                            <img src="{{ $user->photo }}" alt="User Image"/>
                                                        @endif
                                                    @else
                                                        <img src="{{ url('img/default.png') }}"
                                                             alt="No Photo">
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="width: 210px;"></div>
                                                <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">
                                                        <input type="file" name="photo" value="upload"
                                                               data-buttonText="<?= trans('choose_file') ?>"
                                                               id="myImg"/>
                                                        <span class="fileinput-exists">{!! trans('common.Change') !!}</span>
                                                    </span>
                                                    <a href="#" class="btn btn-default fileinput-exists"
                                                       data-dismiss="fileinput">{!! trans('common.remove') !!}</a>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user" value="{{$user->id}}">

                                    <button type="submit" class="btn btn-primary">{!! trans('common.upload') !!}</button>
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>

    </div>
@endsection