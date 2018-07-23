@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1>Edit Faculty Member</h1>
                {!! Form::open(['route' => 'faculty.store', 'files' => 'true', 'method' => 'post']) !!}

                {!! Form::label('firstName','First Name') !!}
                {!! Form::text('firstName', $faculty->first_name,['class'=> 'form-control']) !!}

                {!! Form::label('lastName','Last Name') !!}
                {!! Form::text('lastName', $faculty->last_name,['class'=> 'form-control']) !!}

                {!! Form::label('title','Title') !!}
                {!! Form::text('title', $faculty->title,['class'=> 'form-control']) !!}

                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', $faculty->email, ['class' => 'form-control']) !!}

                {!! Form::label('office', 'Office') !!}
                {!! Form::text('office', $faculty->office, ['class' => 'form-control']) !!}

                {!! Form::label('phone', 'Phone Number') !!}
                {!! Form::text('phone', $faculty->phone, ['class' => 'form-control']) !!}


                {!! Form::label('current_image', 'Current Image') !!}
                <br>
                <img src="{{\Illuminate\Support\Facades\Storage::url($faculty->image_url)}}" alt="" class="admin-faculty-image">
                <br>
                {!! Form::label('file', 'Faculty Image') !!}
                {!! Form::file('file', ['class' => 'form-control']) !!}

                {!! Form::submit('Submit', ['id' => 'faculty-create-submit', 'class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>


@endsection