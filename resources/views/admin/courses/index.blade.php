@extends('layouts.app')


@section('content')


    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="row">
                <div class="col-md-6">
                    <h1>Course Index</h1>
                </div>

                <div class="col-md-6">
                    <a id="course-create" href="{{route('course.create')}}">
                        <button class="btn btn-primary">
                            Create Course
                        </button>
                    </a>
                </div>
            </div>
            <table class="table table-bordered">


                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Options</th>
                </tr>

                @foreach($courses as $course)
                <tr>

                        <td>{{$course->code}}</td>
                        <td>{{$course->name}}</td>
                        <td>
                            <a href="{{route('course.edit', $course->id)}}">
                                <button class="btn btn-primary">edit</button>
                            </a>
                        </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection