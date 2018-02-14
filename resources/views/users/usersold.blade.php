<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de usuarios</title>
</head>
<body>

    <h1><?= e($title) ?></h1>

    <p>paragraph.</p>
    <p>horizontal line</p>
    <hr>

    <!--*** si lista de usuarios esta vacia digamos de BD que no tenga a nadie registrado
            regresa empty y lo siguiente lo procesa -->

    <!--Antigua forma-->
    <!--@ unless (empty($users))-->
    <!--@ if (! empty($users))-->
    @php
        /*
        @empty($users)
            <p>No hay usuarios registrados.</p>
        @else
            <ul>
                <?php foreach ($users as $user): ?>
                    <!--*** "e" es la funcion que escapa los caracteres especiales***-->
                    <li><?php echo e($user) ?></li>
                <?php endforeach; ?>

                @foreach ($users as $user)
                    <li><{{$user}}</li>
                @endforeach
            </ul>
        @endempty
        */
    @endphp
    {{-- This comment will not be present in the rendered HTML --}}

    <!--Nueva forma-->
    <ul>
        @forelse ($users as $user)
            <li><{{$user}}</li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>

    {{time()}}


</body>
</html>
