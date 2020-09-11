@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <p style="margin-top: 12rem">
            <h2 style="display: inline;">Welcome to Our Website
            Go to <a href="{{route('courses.index')}}" style="text-decoration: none;">Our Courses</a></h2>
            </p>
        </div>
    </div>
</div>
@endsection
