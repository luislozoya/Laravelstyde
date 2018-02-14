<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //return 'Usuarios';

        if (request()->has('empty')) {
            $users = [];
        } else  {
            //arreglo estatico
            $users = [
                'Joel', 'Ellie',
                'Tess',
                'Tommy',
                'Bill',

                /*** suponiendo que estos usuarios los cargamos de bases de datos y que permitimos a cualquier usuario
                registrarse en nuestra aplicación, este podria inyectar codigo malicioso de java script***/
                '<script>alert("Clicker")</script>'
            ];
        }

        $title = 'Listado de usuarios';

        /***dumpear las variables, ver que traen***/
        //var_dump(compact('title','users'));
        //die();
        //dd(compact('title', 'users'));

        //si las variables que se mandan se llaman igual a las variables declaradas en esta seccion se puede usar compact
        //nueva forma de pasar a vista
        return view('users.index', compact('title', 'users'));

        //antiguas formas de pasar a vista
        /*
        return view('users', [
            'users' => $users,
            'title' => 'Listado de usuarios'
        ]);
        */

        //otra forma
        /*
        return view('users')->with( [
            'users' => $users,
            'title' => 'Listado de usuarios'
        ]);
        */

        //otra forma usada mucho en laravel
        /*
        return view('users')
            ->with( 'users' , $users)
            ->with( 'title' ,'Listado de usuarios');
        */

    }

    public function show($id)
    {
        //ANTIGUA
        //return "Mostrando detalle del usuario: {$id}";
       // $data = request('data');

        $users = [
            'Joel', 'Ellie',
            'Tess',
            'Tommy',
            'Bill',
        ];
        //echo    $id . '<br>';
        for ($i = 0; $i <= COUNT($users)-1; $i++) {
            //echo    $users[$i] . '<br>';
            if ($users[$i] == $id){
                $data = "Mostrando detalle del usuario: {$id}";
                //return view('show', compact('data'));

                return view('users.show',[
                    'data' => $data,
                    'id'   => $id
                ]);

            }
        }

    }

    public function create()
    {
        return 'Crear nuevo usuario';
    }
}
