@extends('admin.index')

@section('content')
    @if(count($student->courses) > 0)
        @foreach($student->courses as $course)
            <div class="card" style="width: 18rem;">
            <div class="card-header text-center bg-primary text-light">
                Course #{{$course->id}} {{$course->name}}
            </div>
            <div class="card-body">
                <p class="card-text">{{$course->content}} </p>
            </div>
        </div>        
        @endforeach

    @else
    <h2>There is No Courses {{$student->name}} enroll in</h2>
    @endif
@endsection
