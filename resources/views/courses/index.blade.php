@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{$course->name}}</h5>
                            <p class="card-text">{{$course->content}}</p>
                            <a href="#" class="btn btn-primary">Enroll</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection