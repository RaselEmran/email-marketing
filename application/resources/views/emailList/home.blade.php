@extends('app')
@section('main-content')
<style>
.badge-success {
background-color: #398439;
}
.badge-danger {
background-color: #d43f3a;
}
</style>
<div class="ajax-overlay"><p><i class="fa fa-spin fa-refresh fa-5x"></i></p></div>
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs">
        <li @if ($errors->has() || isset($groupList)) class="" @else class="active" @endif ><a href="#allEmailList"
            data-toggle="tab">
        {{ trans('common.all') . ' '. trans('common.email-list')}}</a></li>
        @if(Auth::user()->role == 'admin' || (isset($groupList) && ($groupList->id == Auth::id())))
        <li @if ($errors->has() || isset($groupList)) class="active" @else class="" @endif ><a
            href="#eamilList"
        data-toggle="tab">{{ $title }}</a>
    </li>
    @endif
</ul>
<div class="tab-content no-padding">
    <!-- ************** general *************-->
    <div @if ($errors->has() || isset($groupList)) class="tab-pane" @else class="tab-pane active"
        @endif id="allEmailList">
        <table class="table table-hover" id="dataTables">
            <thead>
                <tr class="active">
                    <th class="col-sm-1">#</th>
                    <th>{!! trans('common.name') !!}</th>
                    <!-- <th>{!! trans('common.freeemailverify') !!}</th> -->
                    <!-- <th>{!! trans('common.bulkemailchecker') !!}</th> -->
                    <!-- <th>{!! trans('common.emaillistverify') !!}</th> -->
                    <th>{!! trans('common.action') !!}</th>
                </tr>
            </thead>
            <tbody>
                @if(count($groups) > 0)
                @foreach($groups as $key =>$group)
                <tr>
                    <td><a href="{{ url('email-list/'.$group->id) }}" data-toggle='tooltip' data-placement='top' title='{{ trans('common.detail') }}'>{!! $key+1 !!}</a></td>
                    <td><a href="{{ url('email-list/'.$group->id) }}" data-toggle='tooltip' data-placement='top' title='{{ trans('common.detail') }}'>{{ $group->name }}</a> <span class="badge" data-toggle='tooltip' data-placement='top' title='{{ trans('common.email') }}'>{{ count($group->emaillist) }}</span></td>
                    <!-- <td>
                        @if($group->free_email_check == 1)
                        <span class="label label-warning"><i class="fa fa-calendar" data-toggle='tooltip' data-placement='top' title='{{ trans('common.checked_at'). ' ' . date('d-m-Y', $group->free_email_check_date) }}'></i></span>
                        <span class="badge badge-success" data-toggle='tooltip' data-placement='top' title='{{ trans('common.valid') }}'>{{ validEmailNumber($group->id, 'free_email_check') }}</span>
                        <span class="badge badge-danger" data-toggle='tooltip' data-placement='top' title='{{ trans('common.invalid') }}'>{{ invalidEmailNumber($group->id, 'free_email_check') }}</span>
                        <a class="free_email_swl btn btn-info btn-xs" href='{{ url("real-email/freeemailverify/$group->id") }}' data-toggle='tooltip' data-placement='top' title='{{ trans('common.recheck') }}'><i class="fa fa-check" aria-hidden="true"></i></a>
                        <a class="del_inv_swl btn btn-danger btn-xs" href='{{ url("delete-invalid-email/free_email_check/$group->id") }}' data-toggle='tooltip' data-placement='top' title='{{ trans('common.delete_invalid_email') }}'><i class="fa fa-trash" aria-hidden="true"></i></a>
                        @else
                        <a class="free_email_swl btn btn-info btn-xs" href='{{ url("real-email/freeemailverify/$group->id") }}' data-toggle='tooltip' data-placement='top' title='{{ trans('common.validate') }}'><i class="fa fa-check" aria-hidden="true"></i></a>
                        @endif
                        {{--@if($group->status = 1)--}}
                        {{--<span class="label label-success">Active</span>--}}
                        {{--@elseif($group->status = 0)--}}
                        {{--<span class="label label-danger">Inactive</span>--}}
                        {{--@endif--}}
                    </td>
                    <td>
                        @if($group->bulk_check == 1)
                        <span class="label label-warning"><i class="fa fa-calendar" data-toggle='tooltip' data-placement='top' title='{{ trans('common.checked_at'). ' ' . date('d-m-Y', $group->bulk_check_date) }}'> </i> </span>
                        <span class="badge badge-success" data-toggle='tooltip' data-placement='top' title='{{ trans('common.valid') }}'>{{ validEmailNumber($group->id, 'bulk_check') }}</span>
                        <span class="badge badge-danger" data-toggle='tooltip' data-placement='top' title='{{ trans('common.invalid') }}'>{{ invalidEmailNumber($group->id, 'bulk_check') }}</span>
                        <a class="chk_swl btn btn-info btn-xs" id='https://bulkemailchecker.com' href='{{ url("real-email/bulkemailchecker/$group->id") }}' data-toggle='tooltip' data-placement='top' title='{{ trans('common.recheck') }}'><i class="fa fa-check" aria-hidden="true"></i></a>
                        <a class="del_inv_swl btn btn-danger btn-xs" href='{{ url("delete-invalid-email/bulk_check/$group->id") }}' data-toggle='tooltip' data-placement='top' title='{{ trans('common.recheck') }}'><i class="fa fa-check" aria-hidden="true"></i></a>
                        @else
                        <a class="chk_swl btn btn-info btn-xs" id='https://bulkemailchecker.com' href='{{ url("real-email/bulkemailchecker/$group->id") }}' data-toggle='tooltip' data-placement='top' title='{{ trans('common.validate') }}'><i class="fa fa-check" aria-hidden="true"></i></a>
                        @endif
                    </td>
                    <td>
                        @if($group->email_list_check == 1)
                        <span class="label label-warning"><i class="fa fa-calendar" data-toggle='tooltip' data-placement='top' title='{{ trans('common.checked_at'). ' ' . date('d-m-Y', $group->email_list_verify_date) }}'> </i> </span>
                        <span class="badge badge-success" data-toggle='tooltip' data-placement='top' title='{{ trans('common.valid') }}'>{{ validEmailNumber($group->id, 'email_list_check') }}</span>
                        <span class="badge badge-danger" data-toggle='tooltip' data-placement='top' title='{{ trans('common.invalid') }}'>{{ invalidEmailNumber($group->id, 'email_list_check') }}</span>
                        <a class="chk_swl btn btn-info btn-xs" id='https://app.emaillistverify.com' href='{{ url("real-email/emaillistverify/$group->id") }}' data-toggle='tooltip' data-placement='top' title='{{ trans('common.recheck') }}'><i class="fa fa-check" aria-hidden="true"></i></a>
                        <a class="del_inv_swl btn btn-danger btn-xs" href='{{ url("delete-invalid-email/email_list_check/$group->id") }}' data-toggle='tooltip' data-placement='top' title='{{ trans('common.recheck') }}'><i class="fa fa-check" aria-hidden="true"></i></a>
                        @else
                        <a class="chk_swl btn btn-info btn-xs" id='https://app.emaillistverify.com' href='{{ url("real-email/emaillistverify/$group->id") }}' data-toggle='tooltip' data-placement='top' title='{{ trans('common.validate') }}'><i class="fa fa-check" aria-hidden="true"></i></a>
                        @endif
                    </td> -->
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['email-list.destroy', $group->id], 'class' => 'delete-form']) !!}
                        {!! btn_show("email-list/$group->id") !!}
                        {!! btn_edit("email-list/$group->id/edit") !!}
                        {!! btn_delete_submit_group() !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div @if ($errors->has() || isset($groupList)) class="tab-pane active" @else class="tab-pane"
        @endif id="eamilList">
        @if( !isset($groupList) )
        {!! Form::open(['url' => "email-list",'id'=>'email-list','class'=>'form-horizontal send-email-form', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}
        @include('emailList._form',['submit_button' => 'Submit'])
        {!! Form::close() !!}
        @else
        {!! Form::model($groupList,['method' =>'PUT', 'url' => ["email-list",$groupList->id],'id'=>'email-list','class'=>'form-horizontal send-email-form', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files' => true]) !!}
        @include('emailList._form',['submit_button' => 'Update'])
        {!! Form::close() !!}
        @endif
    </div>
</div>
</div>
<script>
$('.send-email-form').submit(function(e) {
//            e.preventDefault();
$('.ajax-overlay').show();
return true;
});
$(function (){
$('.chk_swl').click(function(e){
e.preventDefault();
var href = $(this).attr('href');
var link = $(this).attr('id');
var link_text = '';
if (link.indexOf("bulkemailchecker") >= 0) {
var link_text = "Please make sure you have enough credit at <a target='_blank' href='" + link + "'>bulkemailchecker</a>!"
} else if (link.indexOf("emaillistverify") >= 0){
var link_text = "Please make sure you have enough credit at <a target='_blank' href='" + link + "'>emaillistverify</a>!"
}
var that = this;
swal({
title: "This is paid service !",
text: link_text,
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Yes",
closeOnConfirm: false,
html: true
}, function(result){
if(result){
if(typeof href !== 'undefined'){
window.location.href = href;
}
}
});
});
$('.del_inv_swl').click(function(e){
e.preventDefault();
var href = $(this).attr('href');
var that = this;
swal({
title: "Are you sure?",
text: "Delete Invalid Email",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Delete",
closeOnConfirm: false,
html: true
}, function(result){
if(result){
if(typeof href !== 'undefined'){
window.location.href = href;
}
}
});
});
$('.free_email_swl').click(function(e){
e.preventDefault();
var href = $(this).attr('href');
var that = this;
swal({
title: "Are you sure?",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Yes",
closeOnConfirm: false,
html: true
}, function(result){
if(result){
if(typeof href !== 'undefined'){
window.location.href = href;
}
}
});
});
});
</script>
@endsection