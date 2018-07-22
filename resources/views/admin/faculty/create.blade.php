@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1>Add Faculty Member</h1>
                {!! Form::open(['route' => 'faculty.store', 'files' => 'true', 'method' => 'post']) !!}

                {!! Form::label('firstName','First Name') !!}
                {!! Form::text('firstName', null,['class'=> 'form-control']) !!}

                {!! Form::label('lastName','Last Name') !!}
                {!! Form::text('lastName', null,['class'=> 'form-control']) !!}

                {!! Form::label('title','Title') !!}
                {!! Form::text('title', null,['class'=> 'form-control']) !!}

                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}

                {!! Form::label('office', 'Office') !!}
                {!! Form::text('office', null, ['class' => 'form-control']) !!}

                {!! Form::label('phone', 'Phone Number') !!}
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}

                {!! Form::label('file', 'Faculty Image') !!}
                {!! Form::file('file', ['class' => 'form-control']) !!}

                {!! Form::submit('Submit', ['id' => 'faculty-create-submit', 'class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>


@endsection