@extends('layout')


@section('title', "Crear nuevo usuario")


@section('content')

    <h1>Editar usuario</h1>

    @if ($errors ->any())
        <div class="alert alert-danger">
            <h6>Por favor corrige los errores debajo:</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--cambiada la ruta con el mismo nombre ver web.php para informacion
    <form method="POST" action="{{url('usuarios/crear')}}">
    --}}
    <form method="POST" action="{{url("usuarios/{$user->id}")}}">
        {{ method_field('PUT') }}

        {{--token para evitar insersion automatica--}}
        {{ csrf_field() }}

        <label for="name" >Nombre: </label>
        <input type="text" name="name" placeholder="Pedro Perez" value="{{ old('name', $user->name) }}">
        <br>
        <label for="email" >Correo electronico: </label>
        <input type="email" name="email" placeholder="pedro@example.com" value="{{ old('email', $user->email) }}">
        <br>
        <label for="password">Contraseña: </label>
        <input type="passwords" name="password" placeholder="Mayor a 6 caracteres">
        <br>
        <button type="submit">Actualizar usuario</button>
    </form>

    <p>
        <a href="{{ route('users.index')}}">Regresar al listado de usuarios</a>
    </p>


@endsection

