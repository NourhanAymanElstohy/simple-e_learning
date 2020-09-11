@extends('admin.index')

@section('content')
    <form method="POST" action="{{route('courses.store')}}" class="mb-4">
        @csrf
        <h1 style="color:#3cb371"><strong>Create New categorie</strong></h1>
        <div class="form-group mt-5">
            <label> Course Name</label>
            <input name="name" type="text" class="form-control" aria-describedby="emailHelp">
        </div>

         <div class="form-group">
                <label for="order_notes">Course Content</label>
                <textarea name="content" class="form-control" id="" cols="30" rows="5"></textarea>
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