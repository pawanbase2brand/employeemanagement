@extends('layouts.main')

@section('content')
<table class="border-separate border border-slate-400">
    <thead>
      <tr>
        <th class="border border-slate-300 ">#</th>
        <th class="border border-slate-300 ">Name</th>
        <th class="border border-slate-300 ">Email</th>
        <th class="border border-slate-300 ">Asign Role</th>
        <th class="border border-slate-300 ">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td class="border border-slate-300  p-3">{{$user->id}}</td>
                <td class="border border-slate-300 p-3 ">{{$user->name}}</td>
                <td class="border border-slate-300 p-3">{{$user->email}}</td>
                <td class="border border-slate-300 p-3"><a class="bg-emerald-800 hover:bg-emerald-500 text-white font-bold py-1 px-4 mt-15 rounded" href="{{route('users.role')}}/{{$user->id}}">Asign Role</a></td>
                <td class="border border-slate-300 p-3"><a class="bg-rose-800 hover:bg-rose-600 text-white font-bold py-1 px-4 mt-15 rounded" href="">Block User</a></td>
            </tr>
        @endforeach

    </tbody>
  </table>
 @endsection
