@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1>Edit News Article</h1>
                {!! Form::open(['route' => 'news.store', 'files' => 'true', 'method' => 'post']) !!}

                {!! Form::label('title','Title') !!}
                {!! Form::text('title', $news_item->title,['class'=> 'form-control']) !!}

                {!! Form::label('content', 'Content')!!}
                {!! Form::textarea('content', $news_item->content, ['class' => 'form-control']) !!}

                {!! Form::label('current_image', 'Current Image') !!}
                <br>
                    <img src="{{\Illuminate\Support\Facades\Storage::url('news/'.$news_item->news_image)}}" alt="" class="admin-faculty-image">
                <br>

                {!! Form::label('file', 'News Image') !!}
                {!! Form::file('file', ['class' => 'form-control']) !!}

                {!! Form::submit('Submit', ['id' => 'faculty-create-submit', 'class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>


@endsection