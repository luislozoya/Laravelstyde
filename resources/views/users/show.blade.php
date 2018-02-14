@extends('layout')

{{-- Lo que esta entre comillas es codigo php no de blade por eso no se ponen {{}} --}}
@section('title', "Usuario {$id}")


@section('content')

    <h1>Usuario #{{$id}}</h1>

    <li>{{$data}}</li>

    <hr>

   {{-- <ul>
        @forelse ($users as $user)
            <li><{{$user}}</li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
--}}
@endsection

