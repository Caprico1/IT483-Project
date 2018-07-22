@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1>Create Course</h1>
                {!! Form::open(['route' => 'course.store', 'method' => 'post']) !!}

                {!! Form::label('name', 'Course Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}

                {!! Form::label('code', 'Course Code') !!}
                {!! Form::text('code', null, ['class' => 'form-control']) !!}

                {!! Form::label('description', 'Course Description') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

                {{--prerequisites--}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Prerequisites
                    </div>
                    <div class="panel-body">
                        <input id="pre-req-value" type="text" class="form-control"><button type="button" name="add-prereq">Add</button>
                    </div>

                    <div id="prerequisites">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::submit('Submit', [ 'id' => 'course-create-submit', 'class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>


    <script>
        $(document).ready(function(){
            $("button[name='add-prereq']").click(function(){
                var code = $('#pre-req-value').val();

                if (code !== ''){
                    $("#prerequisites").append(
                        '<div id="' + code +'">' +
                        '<input type="text" name="prerequisites[]" value="' + code + '" class="form-control" readonly><button  onclick="removePreReq(' + '\''+code + '\''+ ')" type="button" class="btn btn-danger" value="Remove">REMOVE</button>' +
                        '</div>'
                    );
                }
            });
        });

        function removePreReq(code){
            $('#' + code).remove();
        }
    </script>
@endsection