<?php

use Illuminate\Database\Seeder;

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
        //\Illuminate\Support\Facades\DB::;
        DB::table('professions')->insert([
           'title' => 'Desarrollador back-end',
        ]);
    }
}
