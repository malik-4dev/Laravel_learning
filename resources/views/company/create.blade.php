@extends('layouts.app')




@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="w3-container">

                            <h1 class="w3-animate-bottom" style="text-align: center">New Company</h1>
                            {!! Form::open(['method'=>'POST','action'=>'AdminCompanyController@store','files'=>true]) !!}


                            {{csrf_field()}}

                            <div class="form-group">

                                {!! Form::label('name','name') !!}
                                {!! Form::text('name',null,['class'=>'form-control']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                                @endif

                            </div>

                            <div class="form-group">

                                {!! Form::label('email','Email:') !!}
                                {!! Form::text('email',null,['class'=>'form-control']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                                @endif

                            </div>


                            <div input class="form-group">

                                {!! Form::label('photo','Photo:') !!}
                                {!! Form::file('photo',['class'=>'form-control']) !!}

                                @if ($errors->has('photo'))
                                    <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
                                @endif
                            </div>


                            <div class="form-group">
                                {!! Form::submit('Create',['class'=>'btn btn-primary col-sm-3']) !!}
                            </div>
                            @if(Session::has('create_companie'))
                                <p class="alert alert-info">{{ Session::get('companies') }}</p>
                            @endif

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--@include('includes.blogerror')--}}



@stop
