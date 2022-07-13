@extends('layouts.main')

@section('content')
<div class="text-xl">Assign Roles to Users</div><br>
<form action="{{route('users.store')}}" method="post">
    @csrf
    <input type="hidden" name="id" value={{$id}}>
    <select name="roles">
        @foreach ($roles as $role )
            <option value="{{$role->name}}">{{$role->name}}</option>
        @endforeach
    </select>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 mt-15 rounded" type="submit">Submit</button>
</form>
@endsection
