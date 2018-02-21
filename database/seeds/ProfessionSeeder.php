<?php

use Illuminate\Database\Seeder;
use App\Models\Profession;
//se importo
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* FORMA MANUAL
        //para escribir sl manualmente pero expone a ataques de inyección, usar mejor ejemplo de abajo
        //DB::insert('INSERT INTO professions (title) VALUES ("Desarrollador back-end")');

        //con seguridad
        DB::insert('INSERT INTO professions (title) VALUES (?)', ['Desarrollador back-end']);

        //varios parametros
        DB::insert('INSERT INTO professions (title) VALUES (:title)', [
            'title' => 'Desarrollador back-end'
        ]);
        */

        /***CON CONSTRUCTOR DE CONSULTAS***/
        //\Illuminate\Support\Facades\DB::;
        /*DB::table('professions')->insert([
        'title' => 'Desarrollador back-end',
        ]);

        DB::table('professions')->insert([
            'title' => 'Desarrollador front-end',
        ]);

        DB::table('professions')->insert([
            'title' => 'Diseñador web',
        ]);
        */


        /***USANDO UN NIVEL MAS ALTO CON MODELOS DE LARAVEL***/
        \App\Models\Profession::create([
            'title' => 'Desarrollador back-end',
        ]);

        \App\Models\Profession::create([
            'title' => 'Desarrollador front-end',
        ]);

        \App\Models\Profession::create([
            'title' => 'Diseñador web',
        ]);

    }
}
