@extends('layouts.app')




@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="w3-container">

                            <h1 class="w3-animate-bottom" style="text-align: center">Delete</h1>
                            {!! Form::model($roles,['method'=>'PATCH','action'=>['AdminCompanyController@update',$roles->id],'files'=>true]) !!}


                            {{csrf_field()}}

                            <div class="form-group">

                                {!! Form::label('name','name') !!}
                                {!! Form::text('name',null,['class'=>'form-control']) !!}

                            </div>
                            <div class="form-group">
                                <strong>Permission:</strong>
                                <br/>
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    <br/>
                                @endforeach
                            </div>


                            <div class="form-group">
                                {!! Form::submit('save changes',['class'=>'btn btn-primary col-sm-3']) !!}
                            </div>

                            {!! Form::close() !!}

                            {!! Form::open(['method'=>'DELETE','action'=>['RoleController@destroy',$roles->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-3']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@stop
