<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    //antes
    /*function test_it_welcomes_users_with_nickname()
    {
        $this->get('saludo/luis/seres')
            ->assertStatus(200)
            ->assertSee('bienvenido luis, tu apodo es seres');
    }

    function test_itwelcomes_users_without_nickname()
    {
        $this->get('saludo/luis')
            ->assertStatus(200)
            ->assertSee('bienvenido luis, no tienes apodo');
    }*/

    //despues
    function test_it_welcomes_users_with_nickname()
    {
        $this->get('saludo/luis/seres')
            ->assertStatus(200)
            ->assertSee('Bienvenido Luis, tu apodo es Seres');
    }

    function test_itwelcomes_users_without_nickname()
    {
        $this->get('saludo/luis')
            ->assertStatus(200)
            ->assertSee('Bienvenido Luis');
    }


}
