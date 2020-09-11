@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <img src="/upload/profile_pic/{{$student->image}}" alt="" style="width:150px; height: 150px; border-radius: 50%; float: left">
            <h2 class="ml-3" style="margin-top: 4rem;">{{$student->name}}'s Profile</h2>
        </div>
        <div class="row mb-5">
            <p class="ml-2">Edit Profile picture</p>
            <form enctype="multipart/form-data" action="{{route('students.update', $student->id)}}" method="POST" >
                @csrf 
                @method('PUT')
                <input type="file" value="{{$student->image}}" class="ml-3 d-inline" name="image">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>
        </div>
        <div class="row mb-2 mt-5">
            <h2>My Enrolled Courses</h2>
        </div>
        <div class="row">
            @if(count($student->courses) > 0)
                @foreach($student->courses as $course)
                    <div class="card mr-3" style="width: 15rem;">
                    <div class="card-header text-center bg-primary text-light">
                        Course #{{$course->id}} {{$course->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$course->content}} </p>
                    </div>
                </div>        
                @endforeach
            @endif
        </div>
    </div>
@endsection