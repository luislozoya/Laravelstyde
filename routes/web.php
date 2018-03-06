<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//se esta declarando una ruta del tipo get para la url del home "/" .
//la ruta a su vez regresa una vista que se llama welcome dentro de resources / views / welcome blade
/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/usuarios', 'UserController@index')
    ->name('users');


Route::get('/', function(){
    return 'Home';
});

Route::get('/usuarios/{id}', 'UserController@show')
    ->where('id', "[0-9]+")
    ->where('id', "^((?!nuevo).)*$")
    ->name('users.show');
;

Route::get('/usuarios/nuevo', 'UserController@create')
    ->name('users.create');
;

//Route::get('/saludo/{name}/{nickname?}', 'WelcomeUserController@index');

/***tener un controlador que solo tenga una accion
 * es decir solo un metodo publico se usa __invoke***/
Route::get('/saludo/{name}/{nickname?}', 'WelcomeUserController');



/***Comentados para ser cargados en los controladores***/
/*
Route::get('/usuarios', function(){
   return 'Usuarios';
});

//Nueva manera
Route::get('/usuarios/{id}', function($id){
    //return 'Mostrando detalle del usuario :' . $id;
    //otra forma con comillas dobles y entre llaves para mejorar la legibilidad
    return "Mostrando detalle del usuario: {$id}";
    //acceso en la web: http://127.0.0.1:8000/usuarios/5
})->where('id', "\d+"); //expresion regular que indica que solo digitos y mas de una vez
//para letras y numeros es \w


Route::get('/usuarios/detalles', function(){
    return 'Mostrando detalle del usuario :' . $_GET['id'];
    //acceso en la web: http://127.0.0.1:8000/usuarios/detalles?id=5
})->where('id', "[0-9]+"); //expresion regular que indica que solo del cero al nueve y mas de una vez



Route::get('/usuarios/nuevo', function(){
    return 'Crear nuevo usuario';
});



//el parametro nickname se hace opcional si se pone ? y se agrega la condicion siguiente

Route::get('/saludo/{name}/{nickname?}', function($name, $nickname = null){
   $name = ucfirst($name);
   $nickname = ucfirst($nickname);

    if ($nickname){
        return "Bienvenido {$name}, tu apodo es {$nickname}";
    } else{
        return "Bienvenido {$name}";
    }

});

*/