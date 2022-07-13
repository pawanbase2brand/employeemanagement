@extends('layouts.main')

@section('content')
    <form action="{{route('roles.store')}}" method="post">
        @csrf
        <label for=""></label>
        <input type="text" name="name" id="name" placeholder="Enter Role">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
    </form>
    <br><br>
    <div class="text-xl">Available Roles </div><br>
    @foreach ($roles as $role )
        {{$role->name}}
        <br>
    @endforeach
@endsection
