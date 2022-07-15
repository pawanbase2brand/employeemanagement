@extends('layouts.main')

@section('content')
    <form action="{{route('permissions.store')}}" method="post">
        @csrf
        <label for=""></label>
        <input type="text" name="name" id="name" placeholder="Enter Permission">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
    </form>
    <br><br>
    <div class="text-xl">Available Permissions </div><br>
    @foreach ($permissions as $permission )
        {{$permission->name}}
        <br>
    @endforeach
@endsection
