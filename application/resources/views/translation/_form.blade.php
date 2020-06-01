

    <div class="form-group required">

        {!! Form::label('company_name','Company Name',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('company_name',null, ['id' => 'company_name', 'class' =>'form-control ', 'placeholder' => 'Enter Company Name', 'maxlength' => '50',]) !!}
            {{$errors->first('company_name')}}

        </div>

    </div>
    <div class="form-group required">

        {!! Form::label('contact_person','Contact Person',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('contact_person',null, ['id' => 'contact_person', 'class' =>'form-control ', 'placeholder' => 'Enter Contact Person', 'maxlength' => '50',]) !!}
            {{$errors->first('contact_person')}}

        </div>

    </div>

    <div class="form-group required">

        {!! Form::label('company_address','Company Address',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('company_address',null, ['id' => 'company_address', 'class' =>'form-control ', 'placeholder' => 'Enter Company Address', 'maxlength' => '50',]) !!}
            {{$errors->first('company_address')}}

        </div>

    </div>

    <div class="form-group required">

        {!! Form::label('country','Country',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('country',null, ['id' => 'country', 'class' =>'form-control ', 'placeholder' => 'Enter Country Name', 'maxlength' => '50',]) !!}
            {{$errors->first('country')}}

        </div>

    </div>

    <div class="form-group required">

        {!! Form::label('city','City',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('city',null, ['id' => 'city', 'class' =>'form-control ', 'placeholder' => 'Enter City Name', 'maxlength' => '50',]) !!}
            {{$errors->first('city')}}

        </div>

    </div>

    <div class="form-group required">

        {!! Form::label('zip_code','Zip Code',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('zip_code',null, ['id' => 'zip_code', 'class' =>'form-control ', 'placeholder' => 'Enter Zip Code', 'maxlength' => '50',]) !!}
            {{$errors->first('zip_code')}}

        </div>

    </div>
    <div class="form-group required">

        {!! Form::label('company_phone','Company Phone',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('company_phone',null, ['id' => 'company_phone', 'class' =>'form-control ', 'placeholder' => 'Enter Company Phone', 'maxlength' => '50',]) !!}
            {{$errors->first('company_phone')}}

        </div>

    </div>
    <div class="form-group required">

        {!! Form::label('company_email','Company Email',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('company_email',null, ['id' => 'company_email', 'class' =>'form-control ', 'placeholder' => 'Enter Name', 'maxlength' => '50',]) !!}
            {{$errors->first('company_email')}}

        </div>

    </div>
    <div class="form-group required">

        {!! Form::label('company_website','Company Website',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('company_website',null, ['id' => 'company_website', 'class' =>'form-control ', 'placeholder' => 'Enter Company Website', 'maxlength' => '50',]) !!}
            {{$errors->first('company_website')}}

        </div>

    </div>
    <div class="form-group required">

        {!! Form::label('company_vat','Company Vat',['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('company_vat',null, ['id' => 'company_vat', 'class' =>'form-control ', 'placeholder' => 'Enter Company Vat', 'maxlength' => '50',]) !!}
            {{$errors->first('company_vat')}}

        </div>

    </div>


    {!! Form::submit($submit_button,['class' => 'btn btn-success'])!!}