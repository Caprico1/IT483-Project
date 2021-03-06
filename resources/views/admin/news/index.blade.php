@extends('layouts.app')


@section('content')


    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="row">
                <div class="col-md-6">
                    <h1>News Index</h1>
                </div>

                <div class="col-md-6">
                    <a id="course-create" href="{{route('news.create')}}">
                        <button class="btn btn-primary">
                            Create News Article
                        </button>
                    </a>
                </div>
            </div>
            <table class="table table-bordered">


                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Options</th>
                </tr>

                @foreach($all_news as $news_item)
                    <tr>
                        <td>{{$news_item->id}}</td>
                        <td>{{$news_item->title}}
                        <td>
                            <a href="{{route('news.edit', $news_item->id)}}">
                                <button class="btn btn-primary">edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection