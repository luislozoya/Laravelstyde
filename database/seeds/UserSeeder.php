<?php

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
        DB::table('users')->insert([
            'name' => 'Duilio Palacios',
            'email' => 'duilio@styde.net',
            //bcrypt encrypta la contraseña
            'password' => bcrypt('laravel')
            //'profession_id' => '???'
        ]);
    }
}
