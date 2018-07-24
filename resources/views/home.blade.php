@extends('layouts.app')

@section('content')
    <div class="container">

        {{--News Section--}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="container">
                    <h2>News Articles</h2>
                    <div id="newsCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach($latest_news as $index=> $news)
                                @if($index == 0)
                                    <li data-target="#newsCarousel" data-slide-to="{{$index}}" class="active"></li>
                                @else
                                    <li data-target="#newsCarousel" data-slide-to="{{$index}}"></li>
                                @endif

                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @foreach($latest_news as $index=>$news)
                                @if($index == 0)
                                    <div class="item active">
                                        <a href="{{route('news.show', $news->id)}}"><img class="carousel-image"
                                                                                         src="{{\Illuminate\Support\Facades\Storage::url('news/'.$news->news_image)}}"
                                                                                         alt="{{$news->title}}"></a>
                                        <div class="carousel-caption">
                                            <h3>{{$news->title}}</h3>
                                        </div>
                                    </div>
                                @else
                                    <div class="item">
                                        <a href="{{route('news.show', $news->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\Storage::url('news/'.$news->news_image)}}"
                                                    alt="{{$news->title}}"></a>
                                        <div class="carousel-caption">
                                            <h3>{{$news->title}}</h3>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#newsCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#newsCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">

        <div class="container">
            <div class="row">
                {{--Faculty--}}
                <div class="col-md-6">
                    <h2>Department Faculty</h2>

                    @foreach($all_faculty as $index => $faculty)
                        <div class="col-sm-6">
                            <a href="{{route('faculty.show', $faculty->id)}}"><img class="faculty-image"
                                                                                   src="{{Storage::url('/'.$faculty->image_url)}}"
                                                                                   alt="{{$faculty->first_name}} {{$faculty->last_name}}"></a>
                            <div class="desc">{{$faculty->first_name}} {{$faculty->last_name}}</div>
                        </div>
                    @endforeach
                </div>
                {{--Courses--}}
                <div class="col-md-6">
                    <h2>Courses</h2>
                    <input type="text" id="course-input" onkeyup="filterCourse()" placeholder="Filter Courses"
                           class="form-control">

                    <table id="courses" class="table table-bordered">

                        <thead>
                            <tr class="header">
                                <th>Course #</th>
                                <th>Course Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($courses) != 0)
                                @foreach($courses as $course)
                                    <tr>
                                        <td><a href="{{route('course.show', $course->id)}}">{{$course->code}}</a></td>
                                        <td>{{$course->name}}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <p>There are no courses to be displayed at this time.</p>
                            @endif
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>

    </div>


    <script>
        function filterCourse() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("course-input");
            filter = input.value.toUpperCase();
            table = document.getElementById("courses");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
