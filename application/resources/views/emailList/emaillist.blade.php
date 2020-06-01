@extends('app')

@section('main-content')
    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#allEmailList" data-toggle="tab">
                    {{ $group->name. "'s " .trans('common.group') . ' '. trans('common.email-list')}}</a></li>
        </ul>
        <div class="tab-content no-padding">
            <!-- ************** general *************-->
            <div class="tab-pane active" id="allEmailList">
                <div class="col-md-12" style="margin-bottom: 10px;">
                    <button class="btn btn-sm btn-primary pull-right" onclick="addMore()">Add More</button>
                </div>
                <table class="table table-hover" id="dataTables_email">
                    <thead>
                    <tr class="active">
                        <th class="col-sm-1">#</th>
                        <th>{!! trans('common.name') !!}</th>
                        <th>{!! trans('common.email') !!}</th>
                        <!-- <th>{!! trans('common.freeemailverify') !!}</th> -->
                        <!-- <th>{!! trans('common.bulkemailchecker') !!}</th> -->
                        <!-- <th>{!! trans('common.emaillistverify') !!}</th> -->
                        <th>{!! trans('common.action') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($group->emaillist as $key =>$emailList)
                            <tr>
                                <td>{!! $key+1 !!}</td>
                                <td><a class="field_editable" href="#" data-name="name" rel="{{ csrf_token() }}"
                                       data-type="text" data-pk="{{ $emailList->id }}"
                                       data-url="{{ url('/update_email_info') }}"
                                       data-title="Enter Name">{{ $emailList->name }}</a></td>
                                <td><a class="field_editable" href="#" data-name="email" rel="{{ csrf_token() }}"
                                       data-type="text" data-pk="{{ $emailList->id }}"
                                       data-url="{{ url('/update_email_info') }}"
                                       data-title="Enter Email">{{ $emailList->email }}</a></td>
                                <!-- <td>
                                    @if($emailList->free_email_check == 1)
                                        <a href="#" data-toggle="modal" class="label label-success" data-target="#free_email_detail_{{ $emailList->id }}" data-toggle='tooltip' data-placement='top' title='@lang('common.detail')'> <i class="fa fa-check"></i> </a>
                                    @elseif($emailList->free_email_check == 2)
                                        <a href="#" data-toggle="modal" class="label label-danger" data-target="#free_email_detail_{{ $emailList->id }}" data-toggle='tooltip' data-placement='top' title='@lang('common.detail')'> <i class="fa fa-times"></i> </a>
                                    @endif
                                </td>
                                <td>
                                    @if($emailList->bulk_check == 1)
                                        <a href="#" data-toggle="modal" class="label label-info" data-target="#bulk_detail_{{ $emailList->id }}" data-toggle='tooltip' data-placement='top' title='@lang('common.detail')'> <i class="fa fa-check"></i> </a>
                                    @elseif($emailList->bulk_check == 2)
                                        <a href="#" data-toggle="modal" class="label label-danger" data-target="#bulk_detail_{{ $emailList->id }}" data-toggle='tooltip' data-placement='top' title='@lang('common.detail')'> <i class="fa fa-times"></i> </a>
                                    @endif
                                </td>
                                <td>
                                    @if($emailList->email_list_check == 1)
                                        <a href="#" data-toggle="modal" class="label label-info" data-target="#email_list_detail_{{ $emailList->id }}" data-toggle='tooltip' data-placement='top' title='@lang('common.detail')'> <i class="fa fa-check"></i> </i>
                                    @elseif($emailList->email_list_check == 2)
                                        <a href="#" data-toggle="modal" class="label label-danger" data-target="#email_list_detail_{{ $emailList->id }}" data-toggle='tooltip' data-placement='top' title='@lang('common.detail')'> <i class="fa fa-times"></i> </a>
                                    @endif
                                </td> -->
                                <td>
                                    <a href="{{ url('email-delete/'.$emailList->id) }}" class='btn btn-danger btn-xs delete-swl' data-toggle='tooltip' data-placement='top' title='{{ trans('common.delete') }}'><i class='fa fa-trash-o'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach($group->emaillist as $key =>$emailList)
        @if(($emailList->bulk_check == 1) || ($emailList->bulk_check == 2))
            <div class="modal fade" id="bulk_detail_{{ $emailList->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"
                                id="myModalLabel">@lang('common.bulkemailchecker') @lang('common.detail')</h4>
                        </div>
                        <div class="modal-body" style="word-wrap: break-word">
                            {!! str_replace(',', '<br/>', $emailList->bulk_value) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(($emailList->email_list_check == 1) || ($emailList->email_list_check == 2))
            <div class="modal fade" id="email_list_detail_{{ $emailList->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"
                                id="myModalLabel">@lang('common.emaillistverify') @lang('common.detail')</h4>
                        </div>
                        <div class="modal-body" style="word-wrap: break-word">
                            {!! str_replace(',', '<br/>', $emailList->email_list_value) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(($emailList->free_email_check == 1) || ($emailList->free_email_check == 2))
            <div class="modal fade" id="free_email_detail_{{ $emailList->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"
                                id="myModalLabel">@lang('common.bulkemailchecker') @lang('common.detail')</h4>
                        </div>
                        <div class="modal-body" style="word-wrap: break-word">
                            {!! str_replace(',', '<br/>', $emailList->free_email_value) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <script>
        var newRow = 1;

        $(function(){
            $('.field_editable').editable({
                params: function (params) {
                    params._token = $(this).attr('rel');
                    return params;
                },
                ajaxOptions: {
                    success: function (data) {
                        swal({
                                    title:data.type,
                                    text: data.msg,
                                },
                                function(){
                                    window.location.reload();
                                });
                    }
                }
            });
        });

        function addMore(){
            var t = $('#dataTables_email').DataTable();
                t.row.add([
                    0,
                    '<input class="input-sm form-control" id="new-name-'+newRow+'" name="name" type="text">',
                    '<input class="form-control" name="email" id="new-email-'+newRow+'" type="text">',
                    '<button class="btn btn-success btn-xs" onclick="saveNewEmail('+newRow+')" data-toggle="tooltip" data-placement="top" title="{{ trans('common.save') }}"><i class="fa fa-send-o"></i></button> ',
                    '',
                    '',
                    ''
                ]).draw();
            newRow ++;
        }

        function saveNewEmail(rowIndex){
            var group_id = "{{ $group->id }}";
            var name = $('#new-name-'+rowIndex).val();
            var email = $('#new-email-'+rowIndex).val();
            if(typeof email !== 'undefined') {
                if(typeof name === 'undefined'){
                    name = '';
                }

                $.ajax({
                    url: "{{ url('save-email') }}",
                    method: 'post',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        email: email,
                        group_id: group_id
                    },
                    success: function (data) {
                        if(data.type){
                            swal({
                                title: "Congrats",
                                text: data.msg,
                                type: "success",
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "OK",
                                closeOnConfirm: false

                            }, function(result){
                                if(result){
                                    window.location.reload();
                                }
                            });
                        } else {
                            swal("Warning", data.msg, "warning");
                        }
                    },
                    error: {}
                });
            } else {
                swal('Email field is required.');
            }
        }
    </script>

@endsection