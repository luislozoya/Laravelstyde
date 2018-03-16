@extends('layout')

@section('title', "Usuarios")

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">

        <h1 class="pb-q">{{ $title  }}</h1>

        <p>
            <a href=" {{route('users.create')}}" class="btn btn-primary">Nuevo usuario</a>
        </p>

    </div>

    <h1><?= e($title) ?></h1>

    <p>paragraph.</p>
    <p>horizontal line</p>
    <hr>



    @if($users->isNotEmpty())

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>

                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <a href="{{route('users.show', $user)}}"class="btn btn-link"><span class="oi oi-eye"></span></a>
                    <a href="{{route('users.edit', $user)}}"class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    {{--Trash con contorno de boton--}}
                    {{--<button type="submit"><span class="oi oi-trash"></span></button>--}}
                    {{--trash sin contorno de boton--}}
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    @else
        <p>No hay usuarios registrados.</p>
    @endif

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