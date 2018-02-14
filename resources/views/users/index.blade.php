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
            <li>{{$user}}</li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>

@endsection

@section('sidebar')
    @parent

    <h2>Barra lateral personalizada</h2>
@endsection