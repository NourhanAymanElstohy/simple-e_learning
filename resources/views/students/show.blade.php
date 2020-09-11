@extends('layouts.app')

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
    @endif
@endsection