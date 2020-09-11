@extends('admin.index')

@section('content')
    <form method="POST" action="{{route('courses.update', ['course'=>$course])}}" class="mb-4">
        @csrf
        @method('PUT')
        <h1 style="color:#3cb371"><strong>Edit Course</strong></h1>
        <div class="form-group mt-5">
            <label>Course Name</label>
        <input name="name" type="text" class="form-control" aria-describedby="emailHelp" value="{{$course->name}}">
        </div>

         <div class="form-group">
                <label for="order_notes">Course Content</label>
                <textarea name="content" class="form-control" id="" cols="30" rows="5">{{$course->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
@endsection