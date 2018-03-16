@extends('layout')

@section('title', "Usuarios")

@section('content')


    <h1><?= e($title) ?></h1>

    <p>paragraph.</p>
    <p>horizontal line</p>
    <hr>

    <p>
        <a href=" {{route('users.create')}}">Nuevo usuario</a>

    </p>

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
                {{--<a href="{{route('users.show',['id'=> $user ->id])}} ">Ver detalles</a> |--}}
                {{--<a href="{{route('users.show',['id'=> $user])}} ">Ver detalles</a> |--}}
                {{--<a href="{{route('users.edit',['id' => $user])}}">Editar</a>--}}
                {{--CODIGO MAS SIMPLIFICADO--}}
                <a href="{{route('users.show', $user)}} ">Ver detalles</a> |
                <a href="{{route('users.edit', $user)}}">Editar</a> |

                {{--este no funciona por que para borrar tiene que ser post--}}
                {{--<a href="{{route('users.destroy', $user)}} ">Eliminar</a>--}}

                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit">Eliminar</button>
                </form>


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