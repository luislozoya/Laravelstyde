@extends('layout')

@section('title', "Usuarios")

@section('content')


    <h1><?= e($title) ?></h1>

    <p>paragraph.</p>
    <p>horizontal line</p>
    <hr>

    <!--Nueva forma-->
    <ul>
        @forelse ($users as $user)
            <li>
                {{$user->name}}, {{$user ->email}}
                {{--Otra forma comilla simple--}}
                {{--<a href="{{url('/usuarios/'.$user->id)}} ">Ver detalles</a>--}}
                {{--Otra forma comillas dobles--}}
                <a href="{{url("/usuarios/{$user->id}")}} ">Ver detalles</a>
                {{--con asignación de nombres en las rutas (web.php)--}}
                <a href="{{route('users.show',['id'=> $user ->id])}} ">Ver detalles</a>

            </li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>

@endsection

@section('sidebar')
    @parent

    <h2>Barra lateral personalizada</h2>
@endsection