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

					{!! Form::open(['url' => "theme",'id'=>'foo','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No']) !!}

					@include('Theme._form',['submit_button' => 'Submit'])

					{!! Form::close() !!}

				</div>
			</section>
		</div>

	</div>
@endsection