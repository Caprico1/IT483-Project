@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>{{$course->code}} : {{$course->name}}</h1>

                <h2>Description</h2>
                <p>{{$course->description}}</p>

                <h2>Prerequisites</h2>
                <ul>
                    @foreach($course->prerequisites as $prerequisite)
                        <li>{{$prerequisite->course_code}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection