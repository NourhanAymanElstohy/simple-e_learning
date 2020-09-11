@extends('admin.index')

@section('content')
    <h1 style="color:#3cb371"><strong>Courses</strong></h1>
    <div class="p-2">
        <a href="{{route('students.create')}}"><button type="button" class="btn btn-success float-left">Add
            Student</button>
        </a>
    </div>

    <table class="table table-striped table-bordered mt-5" style="width:80rem%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <th>{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->created_at ? $student->created_at->format('d-m-Y') : ''}}</td>
                <td>
                    <a href="{{route('students.edit',['student' => $student->id])}}"
                        class="btn btn-primary float-center mr-2">Edit</a>
                    <form method="POST" action="{{route('students.destroy',['student' => $student->id])}}"
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
