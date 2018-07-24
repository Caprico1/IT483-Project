@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1>Create News Article</h1>
                {!! Form::open(['route' => 'user.store', 'files' => 'true', 'method' => 'post']) !!}

                {!! Form::label('email','Email') !!}
                {!! Form::text('email', null,['class'=> 'form-control']) !!}

                {!! Form::label('name', 'Name')!!}
                {!! Form::textarea('name', null, ['class' => 'form-control']) !!}

                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}

                {!! Form::label('confirm_password', 'Confirm Password') !!}
                {!! Form::password('confirm_password', ['class' => 'form-control']) !!}

                {!! Form::submit('Submit', ['id' => 'faculty-create-submit', 'class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>


@endsection