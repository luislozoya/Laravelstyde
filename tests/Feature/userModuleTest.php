<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class userModuleTest extends TestCase
{
    use RefreshDatabase;

    /**@test */
    function test_it_shows_the_users_list()
    {

        factory(User::class)->create([
            'name' => 'Joel',
            //'website' => 'thelastofus.com',
        ]);

        factory(User::class)->create([
            'name' => 'Ellie',
        ]);

        //$this->assertTrue(true);
        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('Listado de usuarios')
        ->assertSee('Joel')
        ->assertSee('Ellie');
    }

    function test_It_shows_a_default_message_if_the_user_list_is_empty()
    {
        //ya no es necesario RefreshDatabase limpia para cada prueba
        //DB::table('users')->truncate();

        //$this->assertTrue(true);
        //$this->get('/usuarios?empty')
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }

    function test_it_loads_the_users_details_page()
    {
        $this->get('/usuarios/Joel')
        ->assertStatus(200)
        ->assertSee("Mostrando detalle del usuario: Joel");

    }

    function test_it_loads_the_new_users_page()
    {
        //$this->withoutExceptionHandling();

        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee("Crear nuevo usuario");

    }
}
