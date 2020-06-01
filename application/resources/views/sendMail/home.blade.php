@extends('app')

@section('main-content')
    <div class="ajax-overlay"><p><i class="fa fa-spin fa-refresh fa-5x"></i></p></div>
    <div class="nav-tabs-custom">
    <?php
        $checkActiveTab = 'emails';
        if(old('email_identifier') == 'group'){
            $checkActiveTab = 'group';
        }
    ?>

        <ul class="nav nav-tabs">
            <li @if($checkActiveTab == 'emails') class="active"  @endif><a href="#send-mail" data-toggle="tab">Send Email</a></li>
            <li @if($checkActiveTab == 'group') class="active"  @endif><a href="#sendEmailbyList" data-toggle="tab">Send Email by Email List</a></li>
        </ul>
        <div class="tab-content no-padding">

            <div class="tab-pane @if($checkActiveTab == 'emails') active  @endif" id="send-mail">


                {!! Form::open(['url' => "send-mail",'id'=>'send-mail','class'=>'form-horizontal send-email-form', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}


                @include('sendMail.single_form',['submit_button' => 'Send e-mail'])

                {!! Form::close() !!}

            </div>


            <div class="tab-pane @if($checkActiveTab == 'group') active  @endif" id="sendEmailbyList">


                {!! Form::open(['url' => "send-mail",'id'=>'send-mail','class'=>'form-horizontal send-email-form', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}


                @include('sendMail._form',['submit_button' => 'Send e-mail'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <script>
        $('.send-email-form').submit(function(e){
//            e.preventDefault();
            $('.ajax-overlay').show();
            return true;
        });

        $(function(){
            $('.timezone').val(-new Date().getTimezoneOffset()/60);

            var curr_date = new Date();

            var hour = curr_date.getHours();
            var am_pm = 'am';
            if(curr_date.getHours() >= 12){
                hour = curr_date.getHours() - 12;
                am_pm = 'pm';
            }
            var d = curr_date.getDate()+'-'+(curr_date.getMonth()+1)+'-'+curr_date.getFullYear()+ ' '+hour+':'+curr_date.getMinutes()+ ' ' + am_pm;

            $('.confirm-swl').click(function(e){
                e.preventDefault();
                var href = $(this).attr('href');
                var that = this;

                swal({
                    title: "Are you sure?",
                    text: "You want to send email ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: true,

                }, function(result){
                    if(result){
                        if(typeof href !== 'undefined'){
                            window.location.href = href;
                        } else {
                            $(that).closest("form").submit();
                        }
                    }
                });
            });
            $('.datetime').combodate({
                minYear: 2016,
                maxYear: 2026,
                minuteStep: 1,
                value: d
            });
        });

//        $(function(){
//            $('.confirm-swl').click(function(e){
//                e.preventDefault();
//                var href = $(this).attr('href');
//                var that = this;
//
//                swal({
//                    title: "Are you sure?",
//                    text: "You want to send email ?",
//                    type: "warning",
//                    showCancelButton: true,
//                    confirmButtonColor: "#DD6B55",
//                    confirmButtonText: "Yes",
//                    closeOnConfirm: true,
//
//                }, function(result){
//                    if(result){
//                        if(typeof href !== 'undefined'){
//                            window.location.href = href;
//                        } else {
//                            $(that).closest("form").submit();
//                        }
//                    }
//                });
//            });
//            $('.datetime').combodate({
//                minYear: 2016,
//                maxYear: 2026
//            });
//        });

        $('#schedule').click(function(e){
            e.preventDefault();
            if($('#datetime_div').is(':hidden')) {
                $('#datetime_div').slideDown('slow');
            } else {
                $('#datetime_div').slideUp('slow');
            }
        });

        $('.schedule_group').click(function(e){
            e.preventDefault();
            if($('#datetime_group_div').is(':hidden')) {
                $('#datetime_group_div').slideDown('slow');
                $('#remove_schedule_group').slideDown('slow');
                $('#div_schedule_group').slideUp('slow');
                $('#send_later_identifier_group').val(1);
            } else {
                $('#div_schedule_group').slideDown('slow');
                $('#datetime_group_div').slideUp('slow');
                $('#remove_schedule_group').slideUp('slow');
                $('#send_later_identifier_group').val(0);
            }
        });

        $('.schedule_email').click(function(e){
            e.preventDefault();
//            alert(-new Date().getTimezoneOffset());
            if($('#datetime_email_div').is(':hidden')) {
                $('#datetime_email_div').slideDown('slow');
                $('#remove_schedule_email').slideDown('slow');
                $('#div_schedule_email').slideUp('slow');
                $('#send_later_identifier_email').val(1);
            } else {
                $('#div_schedule_email').slideDown('slow');
                $('#datetime_email_div').slideUp('slow');
                $('#remove_schedule_email').slideUp('slow');
                $('#send_later_identifier_email').val(0);
            }
        });
    </script>

@endsection