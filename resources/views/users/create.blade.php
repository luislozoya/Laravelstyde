@extends('layout')


@section('title', "Crear nuevo usuario")


@section('content')

    <div class="card">
        <h4 class="card-header">Cear usuario</h4>
        <div class="card-body">

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
            <form method="POST" action="{{url('usuarios')}}">
                {{--token para evitar insersion automatica--}}
                {{ csrf_field() }}
                {{--@if ($errors->has('name'))--}}
                {{--<p>{{ $errors->first('name') }}</p>--}}
                {{--@endif--}}

                <div class="form-group">
                    {{--<label for="exampleInputEmail1">Email address</label>--}}
                    {{--<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">--}}
                    {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}

                    <label for="name" >Nombre: </label>
                    <input type="text" class="form-control" name="name" placeholder="Pedro Perez" value="{{ old('name') }}">

                </div>

                <div class="form-group">
                    <label for="email" >Correo electronico: </label>
                    <input type="email" class="form-control" name="email" placeholder="pedro@example.com" value="{{ old('email') }}">
                </div>


                <div class="form-group">
                    <label for="password">Contraseña: </label>
                    <input type="passwords" class="form-control" name="password" placeholder="Mayor a 6 caracteres">
                </div>

                <button type="submit" class="btn btn-primary">Crear usuario</button>
                <a href="{{ route('users.index')}}" class="btn btn-link">Regresar al listado de usuarios</a>
            </form>
        </div>
    </div>

@endsection

