@extends('layouts.main')

@section('content')
<div class="text-xl">Assign Permissions to Roles</div><br>
<form action="{{route('roles.permissionToRole')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value={{$id}}>
    {{-- <select name="permissions">
        @foreach ($permissions as $permission )
            <option value="{{$permission->id}}">{{$permission->name}}</option>
        @endforeach
    </select> --}}
    @foreach ($permissions as $permission )
        <input type="checkbox" id="check{{$permission->id}}" name="check[]" value={{$permission->id}}>
        <label> {{$permission->name}}</label><br>
    @endforeach
    <br><br>
    <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-1 px-4 mt-15 rounded" type="submit">Submit</button>
</form>
@endsection
