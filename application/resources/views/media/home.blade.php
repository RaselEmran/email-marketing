@extends('app')

@section('main-content')

    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs">
            <li @if ($errors->has() || isset($media)) class="" @else class="active" @endif ><a href="#allMedia"
                                                                                                   data-toggle="tab">
                    {{ trans('common.all') . ' '. trans('common.media')}}</a></li>
            @if(Auth::user()->role == 'admin' || (isset($media) && ($media->id == Auth::id())))
                <li @if ($errors->has() || isset($media)) class="active" @else class="" @endif ><a
                            href="#media"
                            data-toggle="tab">{{ $title }}</a>
                </li>
            @endif
        </ul>
        <div class="tab-content no-padding">
            <!-- ************** general *************-->
            <div @if ($errors->has() || isset($media)) class="tab-pane" @else class="tab-pane active"
                 @endif id="allMedia">

                <table class="table table-hover" id="dataTables">
                    <thead>
                    <tr class="active">
                        <th class="col-sm-1">#</th>
                        <th>{!! trans('common.title') !!}</th>
                        <th>{!! trans('common.media') !!}</th>
                        <th>{!! trans('common.action') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($medias ) > 0)
                        @foreach($medias  as $key =>$list)
                            <tr>
                                <td>{!! $key+1 !!}</td>
                                <td>{{ $list->title }}</td>
                                <td><img src="{{ asset('upload/'. $list->path) }}" style="height: 100px; width: 120px" class="img-responsive"></td>

                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['media.destroy', $list->id], 'class' => 'delete-form']) !!}
                                    {!! btn_edit("media/$list->id/edit") !!}
                                    {!! btn_delete_submit() !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div @if ($errors->has() || isset($media)) class="tab-pane active" @else class="tab-pane"
                 @endif id="media">

                @if( !isset($media) )
                    {!! Form::open(['url' => "media",'id'=>'media', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}

                    @include('media._form',['submit_button' => 'Submit'])

                    {!! Form::close() !!}
                @else
                    {!! Form::model($media,['method' =>'PUT', 'url' => ["media",$media->id],'id'=>'media', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files' => true]) !!}

                    @include('media._form',['submit_button' => 'Update'])

                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>

@endsection