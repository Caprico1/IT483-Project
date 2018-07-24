@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{\Illuminate\Support\Facades\Storage::url($faculty->image_url)}}" class="news-image" alt="{{$faculty->first_name}} {{$faculty->last_name}}">
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>{{$faculty->first_name}} {{$faculty->last_name}}</h1>
                @if($faculty->title)
                    <p>Title: {{$faculty->title}}</p>
                @endif
                <p>Office: {{$faculty->office}}</p>
                <p>Email: {{$faculty->email}}</p>
                <p>Phone: {{$faculty->phone}}</p>

            </div>
        </div>
    </div>

@endsection