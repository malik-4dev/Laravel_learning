@extends('layouts.app')

@section('content')




    <div class="container ">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="w3-container">
                                <h1 class="w3-animate-right " style="text-align:center">Roles</h1>
                                <div class="w3-tooltip">
                                    <h2 style="text-align:center"><a href="{{route('roles.create')}}">Create New
                                            Role</a></h2>
                                </div>
                            </div>

                            <table class="table w3-table-all  table-bordered">
                                <thead>
                                <tr class="w3-red">
                                    <th>Id</th>
                                    <th>Role Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($roles))
                                    @foreach($roles as $role)

                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{route('roles.edit',$role->id)}}">{{$role->name}}</a>
                                                </div>
                                            </td>

                                            <td>{{$role->created_at}}</td>
                                            <td>{{$role->updated_at}}</td>
                                            <td width="300px" style="display: inline">

                                            <td width="300px" style="display: inline">

                                                {{--<a class="btn btn-primary" href="--}}{{--{{ route('users.edit',$user->id) }}--}}{{--">Delete</a>--}}
                                                <a class="btn btn-info" href="{{route('roles.edit',$role->id)}}">Edit</a>

                                            </td>


                                            </td>




                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-5">{{$roles->render()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









@endsection



