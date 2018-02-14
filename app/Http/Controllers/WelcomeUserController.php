<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    /***tener un controlador que solo tenga una accion
     * es decir solo un metodo publico se usa __invoke***/
    public function __invoke($name, $nickname = null)
    {
        $name = ucfirst($name);
        $nickname = ucfirst($nickname);

        if ($nickname){
            return "Bienvenido {$name}, tu apodo es {$nickname}";
        } else{
            return "Bienvenido {$name}";
        }
    }

    /*public function index($name, $nickname = null)
    {
        $name = ucfirst($name);
        $nickname = ucfirst($nickname);

        if ($nickname){
            return "Bienvenido {$name}, tu apodo es {$nickname}";
        } else{
            return "Bienvenido {$name}";
        }
    }
    */
}
