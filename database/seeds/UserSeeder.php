<?php

use App\User;
use \App\Models\Profession;
use Illuminate\Database\Seeder;
//se importo
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //De forma manual
        //$professions = DB::select('SELECT id FROM professions WHERE title = ? LIMIT 0,1', ['Desarrollador back-end']);
        //para saber el indice y lo que trae
        //dd($professions);
        //dd('profession_id' => $professions[0]->id);

        /*con contructor laravel
        //$professions = DB::table('professions')->select('id')->take(1)->get();
        //para obtener un solo resultado y que no traiga la coleccion completa
        $professions = DB::table('professions')->select('id')->first();

        //Pasar mas argumentos
        $professions = DB::table('professions')->select('id', 'title')->where('title', '=', 'Desarrollador back-end')->first();
        $professions = DB::table('professions')->where('title', '=', 'Desarrollador back-end')->first();
        $professions = DB::table('professions')->where('title', 'Desarrollador back-end')->first();
        $professions = DB::table('professions')->where(['title' => 'Desarrollador back-end'])->first();
        //Acomodados de diferente manera
        $professions = DB::table('professions')
            ->select('id', 'title')
            ->where('title', '=', 'Desarrollador back-end')
            ->first();
        //con value y cambiado profession id
        $professionId = DB::table('professions')
            ->select('id', 'title')
            ->where('title' , 'Desarrollador back-end')
            ->value('id');

        //Metodo magico
        $professionId = DB::table('professions')
            ->select('id', 'title')
            ->whereTitle('Desarrollador back-end')
            ->value('id');
        //dd($professions);
        //dd($professions->first()); //$professions[0]
        //dd($professions->first()->id); //$professions[0]
        */

        /*****Constructor de consultas***/
        /*
         * DB::table('users')->insert([
            'name' => 'Duilio Palacios',
            'email' => 'duilio@styde.net',
            //bcrypt encrypta la contraseña
            'password' => bcrypt('laravel'),
            //'profession_id' => $professions[0]->id,
            //'profession_id' => $professions->first()->id,
            //'profession_id' => $professions->id,
            'profession_id' => $professionId,
        ]);
        */

        $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');

        /***Eloquent***/
        User::create([
        'name' => 'Duilio Palacios',
            'email' => 'duilio@styde.net',
            //bcrypt encrypta la contraseña
            'password' => bcrypt('laravel'),
            //'profession_id' => $professions[0]->id,
            //'profession_id' => $professions->first()->id,
            //'profession_id' => $professions->id,
            'profession_id' => $professionId,
        ]);

        //Crear usuarios de forma aleatorea
        factory(User::class)->create([
            'profession_id' => $professionId
        ]);

        factory(User::class)->create();

        //agregar 48 usuarios
        factory(User::class, 48)->create();

    }
}
