@extends('layouts.app')


@section('content')


    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="row">
                <div class="col-md-6">
                    <h1>Faculty Index</h1>
                </div>

                <div class="col-md-6">
                    <a id="course-create" href="{{route('faculty.create')}}">
                        <button class="btn btn-primary">
                            Add Faculty
                        </button>
                    </a>
                </div>
            </div>
            <table class="table table-bordered">


                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Options</th>
                </tr>

                @foreach($faculty as $faculty_item)
                    <tr>
                        <td>{{$faculty_item->id}}</td>
                        <td>{{$faculty_item->first_name}} {{$faculty_item->last_name}}</td>
                        <td>{{$faculty_item->email}}>
                        <td>
                            <a href="{{route('faculty.edit', $faculty_item->id)}}">
                                <button class="btn btn-primary">edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection