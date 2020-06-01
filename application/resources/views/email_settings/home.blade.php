@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')

    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-9">
            <section class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$pageName}}</h3>
                </div>


                <div class="box-body">



                    {!! Form::open(['url' => "/email",'id'=>'foo','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No']) !!}

                    @include('email_settings._form',['submit_button' => 'Submit'])

                    {!! Form::close() !!}

                </div>
            </section>
        </div>

    </div>

    <script>
        $(function() {
            $('.mail_driver_select').click(function(e){
                var select_driver = $(this).val();
                if( select_driver == 'smtp'){
                    $('#smtp').show();
                } else if(select_driver == 'mail'){
                    $('#smtp').hide();
                }
            });
        })
    </script>

@endsection