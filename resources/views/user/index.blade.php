@extends('layouts.app')

@section('content')




    <div class="container ">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="w3-container">
                                <h1 class="w3-animate-right " style="text-align:center">Users</h1>
                            </div>

                            <table class="table w3-table-all  table-bordered">
                                <thead>
                                <tr class="w3-red">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($users))
                                    @foreach($users as $user)

                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a>
                                                </div>
                                            </td>

                                            <td>@if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>{{$user->updated_at}}</td>
                                            <td width="300px" style="display: inline">

                                                {{--<a class="btn btn-primary" href="--}}{{--{{ route('users.edit',$user->id) }}--}}{{--">Delete</a>--}}
                                                <a class="btn btn-info" href="{{route('users.edit',$user->id)}}">Edit</a>

                                            </td>




                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-5">{{$users->render()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









@endsection



