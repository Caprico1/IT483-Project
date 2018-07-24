@extends('layouts.app')


@section('content')


    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="row">
                <div class="col-md-6">
                    <h1>User Index</h1>
                </div>

                <div class="col-md-6">
                    <a id="course-create" href="{{route('user.create')}}">
                        <button class="btn btn-primary">
                            Create User
                        </button>
                    </a>
                </div>
            </div>
            <table class="table table-bordered">


                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>email</th>
                </tr>

                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}
                        <td>
                            <a href="{{route('news.edit', $user->id)}}">
                                <button class="btn btn-primary">edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection