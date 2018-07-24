@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{\Illuminate\Support\Facades\Storage::url('news/'. $news_item->news_image)}}" class="news-image" alt="{{$news_item->title}}">
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="row">
                    <h1>Title: {{$news_item->title}}</h1>
                </div>

                <div class="row">
                    <h2>Content:</h2>
                </div>

                <div class="row">
                    <p>{{$news_item->content}}</p>
                </div>
            </div>
        </div>
    </div>


@endsection