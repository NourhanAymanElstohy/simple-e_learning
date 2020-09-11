@extends('admin.index')

@section('content')
    <h1 style="color:#3cb371"><strong>Courses</strong></h1>
    <div class="p-2">
        <a href="{{route('courses.create')}}"><button type="button" class="btn btn-success float-left">Create
                Course</button></a>
    </div>

    <table class="table table-striped table-bordered" style="width:80rem%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <th>{{$course->id}}</th>
                <td>{{$course->name}}</td>
                <td>{{$course->content}}</td>
                <td>{{$course->created_at ? $course->created_at->format('d-m-Y') : ''}}</td>
                <td>
                    <a href="{{route('courses.edit',['course' => $course->id])}}"
                        class="btn btn-primary float-center mr-2">Edit</a>
                    <form method="POST" action="{{route('courses.destroy',['course' => $course->id])}}"
                        class="float-right">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mr-2"
                            onclick="return confirm ('are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
