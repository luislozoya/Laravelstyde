<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //sirve para llamar a la tabla, el nombre fue cambiado como parte de un ejemplo en el cual cuando tiene professions sola laravel busca la tabla con respecto al nombre del archivo pero si este se le acambia en el archivo se utiliza esto para indicar el cambio
    //protected $table = 'my_professions';

    //para indicar que no se quieren utilizar los siguientes campos en la base de datos
    public $timestamps = false;
}
