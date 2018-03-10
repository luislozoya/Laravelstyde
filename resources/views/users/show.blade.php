@extends('layout')

{{-- Lo que esta entre comillas es codigo php no de blade por eso no se ponen {{}} --}}
{{--@section('title', "Usuario {$id}")--}}
@section('title', "Usuario {$user->id}")


@section('content')

    {{--<h1>Usuario #{{$id}}</h1>--}}
    <h1>Usuario #{{$user->id}}</h1>

    {{--<li>{{$data}}</li>--}}

    <li>Nombre del usuario: {{$user->name}}</li>
    <p>Correo electónico: {{$user->email}}</p>

    {{--Con cadena--}}
    <p>
        <a href="{{url('/usuarios')}}">Regresar a url usuarios</a>
    </p>

    {{--Con objetos y funciones--}}
    <p>
        <a href="{{url()->previous()}}">Regresar a url anterior</a>
    </p>

    {{--Con helper action no es recomendable--}}
    <p>
        <a href="{{action('UserController@index')}}">Regresar a url usuarios (index)</a>
    </p>

    {{--agregando en rutas web.php ->name('users.index');--}}
    <p>
        <a href="{{ route('users.index')}}">Regresar al listado de usuarios *posible mejor</a>
    </p>


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

