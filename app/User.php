<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //el modelo user esta enlazado con la tabla users pero se puede personalizar
    //hacia una tabla
    //protected  $table = 'users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $cast = [
        'is_admin' => 'boolean'
    ];

    public static function findByEmail($email){

        //static es equivalente a usar User por estar dentro de la clase user
        //return User::where(compact('email'))->first();
        //si no existe el usuario el methodo first devolvera null
        return static::where(compact('email'))->first();
    }

    /****Relacion un usuario pertenece a una profesion***/
    //para regresar un objeto de la clase profession
    //eloquent utiliza el nombre de la relacion profesion y busca una columna llamada profesion id
    public function profession(){ //busca profession_id
        return $this->belongsTo(Profession::class);

        //si el ID es diferente se puede pasar como segundo argumento
        //return $this->belongsTo(Profession::class, 'id_profession');
    }

    public function isAdmin(){
        return $this->email === 'dulio@styde.net';
    }


}
