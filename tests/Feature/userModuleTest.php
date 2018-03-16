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
        $user = factory(User::class)->create([
           'name' => 'Duilio Palacios'
        ]);

        //$this->get('/usuarios/'.$user->id)
        $this->get("/usuarios/{$user->id}")
        ->assertStatus(200)
        //->assertSee("Mostrando detalle del usuario: Joel");
        ->assertSee("Duilio Palacios");

    }

    function test_it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }


    function test_it_loads_the_new_users_page()
    {
        //$this->withoutExceptionHandling();

        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee("Crear nuevo usuario");

    }

    function test_it_creates_a_new_user()
    {
        $this->post('/usuarios/',[
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
            'password' => '123456'
        ])->assertRedirect('usuarios'); // or assertRedirect(route('users.index'));

        //para comprobaciones en base de datos con post se puede usar
        //$this->assertDatabaseHas
        //pero como es el caso de un usuario se necesita el siguiente
        $this->assertCredentials([
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
            'password' => '123456',
        ]);
    }

    function test_the_name_is_required()
    {
        //permite identificar los errores por ejemplo salia 500 y no decia mas nada yu con estese sabe
        //$this->withoutExceptionHandling();

        //from esta puesto por que si no la prueba falla ya que regresa al
        //usuario en la pagina que estaba y como no estaba posicionado en
        //esta pagina el assert redirect no la obtiene
        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name' => '',
                'email' => 'duilio@styde.net',
                'password' => '123456',
                ])
            ->assertRedirect('usuarios/nuevo')
          //->assertSessionHasErrors(['name'])
          ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio'])
        ;

        $this->assertEquals(0, User::count());

        /*$this->assertDatabaseMissing('users',[
            'email' => 'duilio@styde.net',
        ]);*/
    }


    function test_the_email_is_required()
    {

        //permite identificar los errores por ejemplo salia 500 y no decia mas nada yu con estese sabe
        //$this->withoutExceptionHandling();

        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name' => 'Duilio',
                'email' => '',
                'password' => '123456',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email'])
        ;

        $this->assertEquals(0, User::count());

    }


    function test_the_email_must_be_valid()
    {

        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name' => 'Duilio',
                'email' => 'correo-no-valido',
                'password' => '123456',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email'])
        ;

        $this->assertEquals(0, User::count());

    }


    function test_the_email_must_be_unique()
    {
        factory(User::class)->create([
            'email' => 'duilio@styde.net'
        ]);


        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '123456',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email'])
        ;

        $this->assertEquals(1, User::count());

    }

    function test_the_password_is_required()
    {

        //permite identificar los errores por ejemplo salia 500 y no decia mas nada yu con estese sabe
        //$this->withoutExceptionHandling();

        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['password'])
        ;

        $this->assertEquals(0, User::count());

    }

    function test_it_loads_the_edit_user_page()
    {
        //$this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->get("/usuarios/{$user->id}/editar")
            ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSee('Editar usuario')
            ->assertViewHas('user', function($viewUser) use ($user){
                return $viewUser->id === $user->id;
            })
            ;

    }

    function test_it_updates_a_user()
    {
        $user = factory(User::class)-> create();

        $this->put("/usuarios/{$user->id}",[
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
            'password' => '123456'
        ])->assertRedirect("/usuarios/{$user->id}"); // or assertRedirect(route('users.index'));

        //para comprobaciones en base de datos con post se puede usar
        //$this->assertDatabaseHas
        //pero como es el caso de un usuario se necesita el siguiente
        $this->assertCredentials([
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
            'password' => '123456',
        ]);
    }

    function test_the_name_is_required_when_updating_a_user()
    {

        $user = factory(User::class)->create();

        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}",[
                'name' => '',
                'email' => 'duilio@styde.net',
                'password' => '123456',
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['name'])
        ;

        $this->assertDatabaseMissing('users', ['email' => 'duilio@styde.net']);

    }


    function test_the_email_must_be_valid_when_updating_the_user()
    {

        $user = factory(User::class)->create();

        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}",[
                'name' => 'Duilio Palacios',
                'email' => 'correo-no-valido',
                'password' => '123456',
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email'])
        ;

        $this->assertDatabaseMissing('users', ['name' => 'Duilio Palacios']);


    }


    function test_the_email_must_be_unique_when_updating_the_user()
    {
        //self::markTestIncomplete();
        //return;

        factory(User::class)->create([
            'email' => 'existing-email@example.com'
        ]);

        $user = factory(User::class)->create([
            'email' => 'duilio@styde.net'
        ]);


        $this->from("usuarios/{$user->id}/editar")
            ->put("/usuarios/{$user->id}",[
                'name' => 'Duilio',
                //'email' => 'duilio@styde.net',
                'email' => 'existing-email@example.com',
                'password' => '123456',
            ])
            //->assertRedirect('usuarios/nuevo')
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email'])
        ;

        //$this->assertEquals(1, User::count());

    }

    //si se necesitara que fuera obligatoria
    /*
    function test_the_password_is_required_when_updating_the_user()
    {

        $user = factory(User::class)->create();


        $this->from("usuarios/{$user->id}/editar")
            ->put("/usuarios/{$user->id}",[
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '',
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['password'])
        ;

        $this->assertDatabaseMissing('users', ['email' => 'duilio@styde.net']);

    }
    */

    function test_the_users_email_can_stay_the_same_when_updating_the_user()
    {
        //$this->withoutExceptionHandling();
        $user = factory(User::class)->create([
            'email' => 'duilio@styde.net'
        ]);


        $this->from("usuarios/{$user->id}/editar")
            ->put("/usuarios/{$user->id}",[
                'name' => 'Duilio Palacios',
                'email' => 'duilio@styde.net',
                'password' => '123456',
            ])
            ->assertRedirect("usuarios/{$user->id}") //(users.show)
        ;

        $this->assertDatabaseHas('users', [
            'name' => 'Duilio Palacios',
            'email' => 'duilio@styde.net',
        ]);

    }


    function test_the_password_is_optional_when_updating_the_user()
    {
        //$this->withoutExceptionHandling();
        $oldPassword = 'CLAVE_ANTERIOR';
        $user = factory(User::class)->create([
            'password' => bcrypt($oldPassword)
        ]);


        $this->from("usuarios/{$user->id}/editar")
            ->put("/usuarios/{$user->id}",[
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '',
            ])
            ->assertRedirect("usuarios/{$user->id}") //(users.show)
        ;

        $this->assertCredentials( [
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
            'password' => $oldPassword,
        ]);

    }

    function test_it_deletes_a_user()
    {
        $user = factory(User::class)->create();

        $this ->delete("usuarios/{$user->id}")
            ->assertRedirect('usuarios');

        $this->assertDatabaseMissing('users',[
            'id'=> $user->id
        ]);

        //otra forma
        //$this->assertSame(0, User::count());
    }


}
