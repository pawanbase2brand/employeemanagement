@extends('layouts.main')

@section('content')
<h1><u>Roles Available</u></h1><br><br>
@if(session()->has('status'))
    <div class="alert alert-success">
        {{ session()->get('status') }}
    </div>
@endif
<table class="border-separate border border-slate-400">
    <thead>
      <tr>
        <th class="border border-slate-300 ">#</th>
        <th class="border border-slate-300 ">Roles</th>
        <th class="border border-slate-300 ">Assign Permissions</th>
        <th class="border border-slate-300 ">Delete Roles</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td class="border border-slate-300  p-3">{{$role->id}}</td>
                <td class="border border-slate-300 p-3 ">{{$role->name}}</td>
                <td class="border border-slate-300 p-3"><a class="bg-emerald-800 hover:bg-emerald-500 text-white font-bold py-2 px-4 mt-15 rounded" href="{{route('roles.assignPermissionToRole')}}/{{$role->id}}">Asign Permissions to role</a></td>
                <td class="border border-slate-300 p-3"><a class="bg-rose-800 hover:bg-rose-600 text-white font-bold py-2 px-4 mt-15 rounded" onclick="return confirm('Do you want to Delete?')" href="{{route('roles.destroy')}}/{{$role->id}}">Delete roles</a></td>
            </tr>
        @endforeach

    </tbody>
  </table>
    <br>
    <a class="bg-stone-900 hover:bg-stone-700 text-white font-bold py-2 px-4 mt-15 rounded" href="{{route('roles.create')}}">Create Roles</a>

        <script>
            $(document).ready(function(){
                $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                    $(".alert").slideUp(600);
                });
            })
        </script>
        @endsection
