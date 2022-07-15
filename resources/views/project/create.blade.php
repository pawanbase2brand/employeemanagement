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
      <div class="form-group">
        <label >Allocate Task to Developer/Designer</label>
        <select name="task" id="task">

        </select>
      </div>

      <div class="form-group">
        <label >Estimated Time</label>
        <select name="estimated-time" id="estimated-time">
            <option value="1">1</option>
            <option value="1">2</option>
            <option value="1">3</option>
            <option value="1">4</option>
            <option value="1">5</option>
            <option value="1">6</option>
            <option value="1">7</option>
            <option value="1">8</option>
            <option value="1">9</option>
            <option value="1">10</option>
        </select>/hours
      </div>

      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
