@extends('layouts.app')




@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="w3-container">

                            <h1 class="w3-animate-bottom" style="text-align: center">Update Role</h1>
                            {!! Form::model($users,['method'=>'PATCH','action'=>['UserRoleController@update',$users->id],'files'=>true]) !!}


                            {{csrf_field()}}

                            <div class="form-group">

                                {!! Form::label('id','Id:') !!}
                                {!! Form::text('id',null,['class'=>'form-control','readonly']) !!}

                            </div>


                            <div class="form-group">

                                {!! Form::label('name','Name') !!}
                                {!! Form::text('name',null,['class'=>'form-control','readonly']) !!}

                            </div>

                            <div class="form-group">
                                <div class="form-group">

                                    {!! Form::label('role-id','Role:',['class'=>'col-md-4 control-label']) !!}

                                    {{--{!! Form::select('role_id',[''=>'Choose Company']+$roles,null,['class'=>'form-control']) !!}--}}
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}

                                </div>




                                <div class="form-group">
                                {!! Form::submit('save changes',['class'=>'btn btn-primary col-sm-3']) !!}
                            </div>

                            {!! Form::close() !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@stop
