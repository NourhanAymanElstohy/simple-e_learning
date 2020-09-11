@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(count($course->students) > 0)
                @foreach($course->students as $student)
                    <div class="card mr-3" style="width: 15rem;">
                    <div class="card-header text-center">
                        Student Photo
                    </div>
                    <div class="card-body">
                        <h5>Name: {{$student->name}}</h5>
                        <p class="card-text">Email: {{$student->email}}</p>
                    </div>
                </div>        
                @endforeach
            @else
                <h1>There are no students signed to this course</h1>
            @endif            
        </div>
    </div>
@endsection