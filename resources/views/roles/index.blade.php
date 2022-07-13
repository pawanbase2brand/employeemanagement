@extends('layouts.main')

@section('content')
<h1><u>Roles Available</u></h1><br><br>
    @foreach ($roles as $role )
        {{$role->name}}<br>
    @endforeach
    <br>
    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-15 rounded" href="{{route('roles.create')}}">Create Roles</a>
@endsection
