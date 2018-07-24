@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1>Create News Article</h1>
                {!! Form::open(['route' => 'news.store', 'files' => 'true', 'method' => 'post']) !!}

                {!! Form::label('title','Title') !!}
                {!! Form::text('title', null,['class'=> 'form-control']) !!}

                {!! Form::label('content', 'Content')!!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}

                {!! Form::label('file', 'News Image') !!}
                {!! Form::file('file', ['class' => 'form-control']) !!}

                {!! Form::submit('Submit', ['id' => 'faculty-create-submit', 'class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>


@endsection