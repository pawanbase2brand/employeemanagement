@extends('layouts.main')

@section('content')
<form action="{{route('project.store')}}" method="post">
    <div class="form-group">
        <label >Project Title</label>
        <input type="text" class="form-control" id="title"  placeholder="Enter Project Title">
      </div>
      <div class="form-group">
        <label >Project Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter Task To Be Done">
      </div>


      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
