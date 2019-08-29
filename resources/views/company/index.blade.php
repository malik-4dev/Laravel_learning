@extends('layouts.app')

@section('content')




    <div class="container ">
        <div class="row">
            <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="w3-container">
                            <h1 class="w3-animate-right " style="text-align:center">Companies</h1>
                            <div class="w3-tooltip">
                                <h2  style="text-align:center"><a class="btn btn-info text-light" href="{{route('company.create')}}">Create New
                                        Company</a></h2>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="table-primary">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Added By</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($companies))
                                @foreach($companies as $company)

                                    <tr>
                                        <td>{{$company->id}}</td>
                                        <td>
                                            <div>
                                                <a href="{{route('company.edit',$company->id)}}">{{$company->name}}</a>
                                            </div>
                                        </td>

                                        <td>{{$company->email}}</td>
                                        <td><img src="{{asset('images/'.$company->photo)}}" class="rounded-top" alt="" width="100"
                                                 height="100"></td>
                                        <td>{{$company->created_at}}</td>
                                        <td>{{$company->updated_at}}</td>
                                        <td>{{$company->user->name}}</td>
                                        {{--<td><a href="{{route('branch.show',$company->id)}}">View Branches</a></td>--}}
                                       <td width="300px" style="display: inline">

                                           {{--<a class="btn btn-primary" href="--}}{{--{{ route('users.edit',$user->id) }}--}}{{--">Delete</a>--}}
                                           <a class="btn btn-info" href="{{route('company.edit',$company->id)}}">Edit</a>

                                       </td>


                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <div class="col-sm-6 col-sm-offset-5">{{$companies->render()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>









@endsection



