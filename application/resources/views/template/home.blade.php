@extends('app')

@section('main-content')
    <style>
        .note-group-select-from-files {
            display: none;
        }
    </style>

    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs">
            <li @if ($errors->has() || isset($template)) class="" @else class="active" @endif >
                <a href="#allTemplate" data-toggle="tab">
                    {{ trans('common.all') . ' '. trans('common.template')}}</a>
            </li>
            @if(Auth::user()->role == 'admin' || (isset($template) && ($template->id == Auth::id())))
                <li @if ($errors->has() || isset($template)) class="active" @else class="" @endif ><a
                            href="#template"
                            data-toggle="tab">{{ $title }}</a>
                </li>
            @endif
        </ul>
        <div class="tab-content no-padding">
            <!-- ************** general *************-->
            <div @if ($errors->has() || isset($template)) class="tab-pane" @else class="tab-pane active"
                 @endif id="allTemplate">

                <table class="table table-hover" id="dataTables">
                    <thead>
                    <tr class="active">
                        <th class="col-sm-1">#</th>
                        <th>{!! trans('common.name') !!}</th>
                        <th>{!! trans('common.action') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($templates ) > 0)
                        @foreach($templates  as $key =>$list)
                            <tr>
                                <td>{!! $key+1 !!}</td>
                                <td>
                                    <a href="#" data-toggle="modal"
                                       data-target="#template_detail_{{ $list->id }}"
                                       data-toggle='tooltip' data-placement='top' title='{{ trans('common.detail') }}'>{{ $list->name }}
                                    </a>
                                </td>
                                <td>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['template.destroy', $list->id], 'class' => 'delete-form']) !!}
                                    {{--{!! btn_show("template/$list->id")  !!}--}}
                                    <a href="#" data-toggle="modal"
                                       data-target="#template_detail_{{ $list->id }}" class='btn btn-info btn-xs'
                                       data-toggle='tooltip' data-placement='top' title='{{ trans('common.detail') }}'><i
                                                class='fa fa-list-alt'></i></a>
                                    {!! btn_edit("template/$list->id/edit") !!}
                                    {!! btn_delete_submit() !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div @if ($errors->has() || isset($template)) class="tab-pane active" @else class="tab-pane"
                 @endif id="template">

                @if( !isset($template) )
                    {!! Form::open(['url' => "template",'id'=>'template', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}

                    @include('template._form',['submit_button' => 'Submit'])

                    {!! Form::close() !!}
                @else
                    {!! Form::model($template,['method' =>'PUT', 'url' => ["template",$template->id],'id'=>'template', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files' => true]) !!}

                    @include('template._form',['submit_button' => 'Update'])

                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>

    @foreach($templates as $list)
        <div class="modal fade" id="template_detail_{{ $list->id }}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"
                            id="myModalLabel">{{ $list->name . ' ' . trans('common.template') }}</h4>
                    </div>
                    <div class="modal-body">
                        {!! $list->template !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="myModalLabel">{{ trans('common.media'). ' ' . trans('common.import')}}</h4>
                </div>
                <div class="modal-body">
                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs">
                            <li @if ($errors->has()) class="" @else class="active" @endif >
                                <a href="#allMedia" data-toggle="tab" id="allMediaDiv">
                                    {{ trans('common.all') . ' '. trans('common.media')}}</a>
                            </li>
                                <li @if ($errors->has()) class="active" @else class="" @endif ><a
                                            href="#uploadImage"
                                            data-toggle="tab">{{ trans('common.upload'). ' ' . trans('common.image') }}</a>
                                </li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- ************** general *************-->
                            <div @if ($errors->has()) class="tab-pane" @else class="tab-pane active"
                                 @endif id="allMedia">
                                <table class="table table-hover" id="dataTables_media">
                                    <thead>
                                    <tr class="active">
                                        <th class="col-sm-1">#</th>
                                        <th>{!! trans('common.title') !!}</th>
                                        <th>{!! trans('common.media') !!}</th>
                                        <th>{!! trans('common.action') !!}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div @if ($errors->has()) class="tab-pane active" @else class="tab-pane"
                                 @endif id="uploadImage">
                                {!! Form::open(['url' => "media",'id'=>'media_modal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}

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
                                        {!! Form::submit('Upload & Import',['class' => 'btn btn-sm btn-primary submit_btn'])!!}
                                        {!! Form::submit('Upload',['class' => 'btn btn-sm btn-primary submit_btn'])!!}
                                    </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <script>
            var count_row = 0;

            $(document).ready(function () {
                $('#summernote').summernote({
                    height: 300
                });
//                $('#dataTables_media').DataTable();
            });

            function loadModal(){
                count_row = 0;
                var img_base_path = '{{ asset('upload') }}';
                $.ajax({
                    url: "{{ url('loadMedia') }}",
                    method: 'post',
                    dataType: 'json',
                    data:{
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function (data){
                        var t = $('#dataTables_media').DataTable();
                            t.rows().remove().draw();
                        for(var i = 0; i < data.length; i++){
                            t.row.add( [
                                (i + 1),
                                data[i].title,
                                '<img id="img_'+data[i].id+'" src="'+ img_base_path+ '/' + data[i].path +'" style="height: 80px; width: 100px" class="img-responsive">',
                                '<button class="btn btn-primary btn-sm" onclick="useMedia('+ data[i].id +')">Use</button>',
                            ]).draw();
                            count_row++;
                        }
                        $('#imageUploadModal').modal('show');
                    }
                });
            }

            function useMedia(media_id) {
                $('#imageUploadModal').modal('hide');
                var img_path = $('#img_' + media_id).attr('src');
                console.log(img_path);
                $('#summernote').summernote('editor.insertImage', img_path);
            }

            $('.submit_btn').click(function(e){
                e.preventDefault();
                var formData = new FormData($('#media_modal')[0]);
                var that = this;
                $.ajax({
                    url: "{{ url('media') }}",
                    method: 'post',
                    dataType: 'json',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var img_base_path = '{{ asset('upload') }}';
                        if(data.success){
                            if($(that).attr('value') == 'Upload & Import') {
                                $('#imageUploadModal').modal('hide');
                                $('#allMediaDiv').click();
                                $('#summernote').summernote('editor.insertImage', img_base_path + '/' + data.media_info.path);
                            } else {
                                var t = $('#dataTables_media').DataTable();
                                    t.row.add( [
                                        ++count_row,
                                        data.media_info.title,
                                        '<img id="img_'+data.media_info.id+'" src="'+ img_base_path+ '/' + data.media_info.path +'" style="height: 80px; width: 100px" class="img-responsive">',
                                        '<button class="btn btn-primary btn-sm" onclick="useMedia('+ data.media_info.id +')">Use</button>',
                                    ]).draw();
                                $('#allMediaDiv').click();
                            }
                            $('#title').val('');
                            $('#title').removeClass("focused");
                            $('#media').val('');
                        } else {
                            swal("Something Wrong!!!");
                        }
                    },
                    error: function(){
                        swal("Something Wrong!!!");
                    }
                });
            });

        </script>

@endsection