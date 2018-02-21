<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //para ser llamado desde la consola con
        //php artisan db:seed

        //para detener la ejecucion probablemente
        //dd(ProfessionSeeder::class);

        // $this->call(UsersTableSeeder::class);
        //esto va a regresar el nombre de la clase
        $this->call(ProfessionSeeder::class);
    }
}
