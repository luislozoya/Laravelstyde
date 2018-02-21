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

        //seleccion del codigo, boton derecha, refractor, extract y method
        $this->truncateTables([
            'users',
            'professions'
        ]);


        // $this->call(UsersTableSeeder::class);
        //esto va a regresar el nombre de la clase
        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
    }

    public function truncateTables(array $tables): void
    {
        //se movio aqui para facilidad, orden y evitar repeticion
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($tables as $table){
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
