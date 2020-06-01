@extends('app')

@section('main-content')
    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#allEmailList" data-toggle="tab">
                    {{ trans('common.history')}}</a></li>
        </ul>
        <div class="tab-content no-padding">
            <!-- ************** general *************-->
            <div class="tab-pane active" id="allEmailList">

                <table class="table table-hover" id="dataTables">
                    <thead>
                    <tr class="active">
                        <th class="col-sm-1">#</th>
                        <th>{!! trans('common.sender') !!}</th>
                        <th>{!! trans('common.email-list') !!}</th>
                        <th>{!! trans('common.template') !!}</th>
                        <th>{!! trans('common.subject') !!}</th>
                        <th>{!! trans('common.time') !!}</th>
                        <th>{!! trans('common.action') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($emailHistories as $key => $emailHistory)
                        <tr>
                            <td>{!! $key+1 !!}</td>
                            <td>{{ \App\User::find($emailHistory->sender_id)->email }}</td>
                            <td>{{ count(json_decode($emailHistory->email_list)). ' emails' }}</td>
                            <td>
                                <?php $template_history = \App\Models\Template\Template::find($emailHistory->template_id); ?>
                                @if($template_history)
                                    {{ $template_history->name }}
                                @else
                                    {{ trans('common.empty') }}
                                @endif
                            </td>
                            <td>{{ $emailHistory->subject }}</td>
                            <td>{{ $emailHistory->created_at }}</td>
                            <td>
                                <a href="#" data-toggle="modal"
                                   data-target="#history_detail_{{ $emailHistory->id }}" class='btn btn-info btn-xs'
                                   data-toggle='tooltip' data-placement='top' title='{{ trans('common.detail') }}'><i
                                            class='fa fa-list-alt'></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach($emailHistories as $emailHistory)
        <div class="modal fade" id="history_detail_{{ $emailHistory->id }}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"
                            id="myModalLabel">{{ trans('common.history'). ' ' . trans('common.detail')}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 form-horizontal">
                                <div class="form-group">
                                    <label for="field-1"
                                           class="col-sm-2 control-label">{!! trans('common.subject') !!}</label>

                                    <div class="col-sm-9">
                                        <span class="form-control">{{ $emailHistory->subject }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1"
                                           class="col-sm-2 control-label">{!! trans('common.email-list') !!}</label>

                                    <div class="col-sm-9">
                                        <textarea class="form-control">{{ $emailHistory->email_list }}</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1"
                                           class="col-sm-2 control-label">{!! trans('common.template') !!}</label>

                                    <div class="col-sm-9">
                                        <?php $template_modal = \App\Models\Template\Template::find($emailHistory->template_id); ?>
                                        @if($template_modal)
                                            {!! $template_modal->template !!}
                                        @else
                                            {{ trans('common.empty') }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection