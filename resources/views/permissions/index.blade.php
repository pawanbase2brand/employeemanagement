@extends('layouts.main')

@section('content')
@if($permissions->isNotEmpty())
<table class="border-separate border border-slate-400">
    <thead>
      <tr>
        <th class="border border-slate-300 ">#</th>
        <th class="border border-slate-300 ">Permissions</th>
        <th class="border border-slate-300 ">Delete Permissions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
            <tr>
                <td class="border border-slate-300  p-3">{{$permission->id}}</td>
                <td class="border border-slate-300 p-3 ">{{$permission->name}}</td>
                <td class="border border-slate-300 p-3"><a class="bg-rose-800 hover:bg-rose-600 text-white font-bold py-2 px-4 mt-15 rounded" href="{{route('permissions.destroy')}}/{{$permission->id}}">Delete Permission</a></td>
            </tr>
        @endforeach

    </tbody>
  </table>
  <br><br>

    {{-- {{$permissions}} --}}
@else
    <p>There are no permissions defined, please create Permissions First</p>
    <br><br>

@endif

<a class="bg-stone-900 hover:bg-stone-700 text-white font-bold py-2 px-4 mt-15 rounded" href="{{route('permissions.create')}}">Create Permissions</a>

@endsection
