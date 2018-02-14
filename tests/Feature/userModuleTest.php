<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class userModuleTest extends TestCase
{
    /**@test */
    function it_shows_the_users_list()
    {
        //$this->assertTrue(true);
        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('Listado de usuarios')
        ->assertSee('Joel')
        ->assertSee('Ellie');
    }

    function It_shows_a_default_message_if_the_user_list_is_empty()
    {
        //$this->assertTrue(true);
        $this->get('/usuarios?empty')
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
