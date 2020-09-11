@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
                <div class="card mr-3" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{$course->name}}</h5>
                        <p class="card-text">{{$course->content}}</p>
                        @if (in_array($course->id , $st_courses )) 
                            <a href="{{route('detach', $course->id)}}" class="btn btn-secondary mr-3">Droll</a>
                        @else
                            <a href="{{route('attach', $course->id)}}" class="btn btn-primary mr-3">Enroll</a>
                        @endif
                        <a href="{{route('courses.show', ['course' => $course])}}" class="btn btn-primary">Show Students</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection